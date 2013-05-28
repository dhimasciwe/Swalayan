<?
session_start();
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

// query select data pendaftaran
if($mysql->execute("SELECT a.p_id, a.p_tgl, a.p_nama, a.p_nem, b.b_nama, a.ju_id, a.ju_id2, a.ju_fix, c.s_nama, d.st_nama, e.g_nama  FROM pendaftaran a, beasiswa b, syarat c, status d, gelombang e where a.b_id=b.b_id and a.s_id=c.s_id and a.st_id=d.st_id and a.g_id=e.g_id and (a.s_id = 1 or a.s_id=3) order by a.p_id "))
	{
		$getdataA = $mysql->getDataSet();
	}else{
		$getdataA=0;
	}
	
?>

<div class="post">
    <h2 class="title">Seleksi Syarat Pendaftaran </h2>
    <p class="byline">
	Selamat datang &quot;<?=admin;?>&quot;, anda login sebagai &quot;<?=$status;?>&quot;<br />
  &gt;&gt; Berikut ini adalah Data Pendaftar Mahasiswa Baru Tahun 2010/2011. </p>

    <table width="100%" border="0" cellspacing="0" bgcolor="#999999">
  <tr>
    <td><table width="100%" border="0" cellspacing="1" cellpadding="3" >
      <tr>
        <td width="6%" bgcolor="#CCCCCC" ><div align="center"><strong>No</strong></div></td>
		<td width="13%" bgcolor="#CCCCCC" ><div align="center"><strong>Nama</strong></div></td>
		<td width="8%" bgcolor="#CCCCCC" ><div align="center"><strong>NEM</strong></div></td>
		<td width="16%" bgcolor="#CCCCCC" ><div align="center"><strong>Pilihan 1 </strong></div></td>
		<td width="14%" bgcolor="#CCCCCC" ><div align="center"><strong>Pilihan 2 </strong></div></td>
		<td width="14%" bgcolor="#CCCCCC" ><div align="center"><strong>Syarat</strong></div></td>
		<td width="18%" bgcolor="#CCCCCC" ><div align="center"><strong>Gelombang</strong></div></td>
		</tr>
	  <!-- script looping for -->
	  <?
	  for($i=0;$i<count($getdataA);$i++){
	  ?>
	  <!-- menampilkan data dalam bentuk array -->
      <tr>
        <td align="left" valign="top" bgcolor="#FFFFFF"><?=$i+1;?></td>
        <td align="left" valign="top" bgcolor="#FFFFFF"><?=$getdataA[$i][2];?></td>
		<td align="right" valign="top" bgcolor="#FFFFFF"><?=$getdataA[$i][3];?></td>
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
		<td align="left" valign="top" bgcolor="#FFFFFF"><a href="main.php?page=8&id=<?=$getdataA[$i][0];?>"><?=$getdataA[$i][8];?></a></td>
		<td bgcolor="#FFFFFF" ><?=$getdataA[$i][10];?></td>
		</tr>
	  <?
	  }
	  ?>
    </table></td>
  </tr>
</table>
<br />
</div>

