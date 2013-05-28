<?php
session_start();
// script ambil nilai t
$t=(int)addslashes($_GET['t']);
// script menampilkan pesan kesalahan jika ada orang yang belum login
if(!isset($_SESSION['loginadmin'])){
	echo"<Script>alert('Anda belum login');window.history.go(-1)</script>";
	exit();
}
// script mengecek status orang yang login
if($_SESSION['status']>2){
	echo"<Script>alert('Anda harus login sebagai administrator');window.history.go(-1)</script>";
	exit();
}
$mysql = new Mysql();
$mysql->connect();
// query select data pendaftar yang sedang tes tertulis dan syarat sudah lengkap
if($t==1){
	if($mysql->execute("SELECT a.p_id, a.p_tgl, a.p_nama, a.p_nem, b.b_nama, a.ju_id, a.ju_id2, a.ju_fix, c.s_nama, d.st_nama, e.g_nama  FROM pendaftaran a, beasiswa b, syarat c, status d, gelombang e where a.b_id=b.b_id and a.s_id=c.s_id and a.st_id=d.st_id and a.g_id=e.g_id and (a.st_id=1 or a.st_id=2 or a.st_id=3) and a.s_id=2 order by a.p_id "))
	{
		$getdataA = $mysql->getDataSet();
	}else{
		$getdataA=0;
	}
}
	
?>

<div class="post">
    <h2 class="title">List Pendaftaran [ Tes Tertulis] </h2>
    <p class="byline">
	Selamat datang &quot;<?=$nama;?>&quot;, anda login sebagai &quot;<?=$status;?>&quot;<br />
  &gt;&gt; Berikut ini adalah List Pendaftaran yang ada di web ini. </p>

    <? if($t==1){ ?>
    <table width="100%" border="0" cellspacing="0" bgcolor="#999999">
  <tr>
    <td><table width="100%" border="0" cellspacing="1" cellpadding="3" >
      <tr>
        <td width="3%" bgcolor="#CCCCCC" ><div align="center"><strong>No</strong></div></td>
		<td width="9%" bgcolor="#CCCCCC" ><div align="center"><strong>Nama</strong></div></td>
		<td width="3%" bgcolor="#CCCCCC" ><div align="center"><strong>NEM</strong></div></td>
		<td width="12%" bgcolor="#CCCCCC" ><div align="center"><strong>Beasiswa</strong></div></td>
		<td width="10%" bgcolor="#CCCCCC" ><div align="center"><strong>Pilihan 1 </strong></div></td>
		<td width="10%" bgcolor="#CCCCCC" ><div align="center"><strong>Pilihan 2 </strong></div></td>
		<td width="7%" bgcolor="#CCCCCC" ><div align="center"><strong>Jurusan Diterima</strong></div></td>
		<td width="11%" bgcolor="#CCCCCC" ><div align="center"><strong>Status Tes</strong></div></td>
		<td width="11%" bgcolor="#CCCCCC" ><div align="center"><strong>Gelombang</strong></div></td>
		</tr>
	  <?php
	  for($i=0;$i<count($getdataA);$i++){
	  ?>
	  
      <tr>
        <td align="left" valign="top" bgcolor="#FFFFFF"><?php echo $i+1;?></td>
        <td align="left" valign="top" bgcolor="#FFFFFF"><?php echo $getdataA[$i][2];?></td>
		<td align="right" valign="top" bgcolor="#FFFFFF"><?php echo $getdataA[$i][3];?></td>
		<td align="right" valign="top" bgcolor="#FFFFFF">
		<?php 
		$bea=$getdataA[$i][4];
		if ($bea==0){
		echo "<center>---</center>";
		} else {
		echo $getdataA[$i][4];
		}
		?>		</td>
		<td align="left" valign="top" bgcolor="#FFFFFF">
		<?
				$ju1=$getdataA[$i][5];
				if($mysql->execute("SELECT ju_nama from jurusan where ju_id=$ju1")){
				$dataJU1 = $mysql->getDataSet();} 
			?>
		<?=$dataJU1[0][0];?>
		<td align="left" valign="top" bgcolor="#FFFFFF">
		<?
				$ju2=$getdataA[$i][6];
				if($mysql->execute("SELECT ju_nama from jurusan where ju_id=$ju2")){
				$dataJU2 = $mysql->getDataSet();} 
			?>
		<?=$dataJU2[0][0];?>		</td>
		<td align="left" valign="top" bgcolor="#FFFFFF">
		<?
				$ju3=$getdataA[$i][7];
				if($mysql->execute("SELECT ju_nama from jurusan where ju_id=$ju3")){
				$dataJU3 = $mysql->getDataSet();} 
				$jur_fix=$dataJU3[0][0];
				if ($jur_fix == ""){
				echo"<center>---</center>";
				}
		?>
		<?=$dataJU3[0][0];?>		</td>
		<td bgcolor="#FFFFFF" ><a href="main.php?page=9&id=<?php echo $getdataA[$i][0];?>&t=<?=$t;?>"><?php echo $getdataA[$i][9];?></a></td>
		<td bgcolor="#FFFFFF" ><?php echo $getdataA[$i][10];?></td>
		</tr>
	  <?php
	  }
	  ?>
    </table></td>
  </tr>
</table>
<? } ?>
<br />
</div>

