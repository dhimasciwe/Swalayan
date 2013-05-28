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

// script untuk menghapus admin
if($_GET['delete']==1){
	$a_id= (int) addslashes($_GET['a_id']);

	$mysql->execute("delete from pendaftaran where p_id=$a_id");
}
// script untuk mengambil nilai gelombang
if(isset($_POST['urut'])){
	$gelombang = $_POST['gelombang'];
	
	if(empty($gelombang)){
		$sql1 = "";
	} else {
		$sql1 = " and a.g_id=$gelombang ";
	}

}
// query select data pendaftar sesuai gelombang
	if($mysql->execute("SELECT a.p_id, a.p_tgl, a.p_nama, a.p_nem, b.b_nama, a.ju_id, a.ju_id2, a.ju_fix, c.s_nama, d.st_nama, e.g_nama  FROM pendaftaran a, beasiswa b, syarat c, status d, gelombang e where a.b_id=b.b_id and a.s_id=c.s_id and a.st_id=d.st_id and a.g_id=e.g_id $sql1 order by a.p_id "))
	{
		$getdataA = $mysql->getDataSet();
	}else{
		$getdataA=0;
	}
// query select data di tabel gelombang	
	if($mysql->execute("SELECT g_id, g_nama from gelombang"))
	{
		$getdataG = $mysql->getDataSet();
	}
	
?>

<div class="post">
    <h2 class="title">Data Pendaftar </h2>
    <p class="byline">

	Selamat datang &quot;<?=$nama;?>&quot;, anda login sebagai &quot;<?=$status;?>&quot;<br />
  &gt;&gt; Berikut ini adalah Data Pendaftar Mahasiswa Baru Tahun 2010/2011. </p>

    <table width="100%" border="0" cellspacing="0" bgcolor="#999999">
  <tr>
    <td><table width="100%" border="0" cellspacing="1" cellpadding="3" >
      <tr>
        <td colspan="7" align="right" bgcolor="#FFFFFF">
		<form action="" method="post" enctype="multipart/form-data" id="formpost">
		<!-- script select option gelombang -->
		<select name="gelombang">
		<option value="0">- Semua Gelombang -</option>
  		<? for($i=0;$i<count($getdataG);$i++) { ?>
	   	<option value="<?=$getdataG[$i][0];?>"><?=$getdataG[$i][1];?></option>
	   	<? } ?>
    	</select> <input name="urut" id="urut" type="submit" value="Sort" />
		</form>
		</td>
        </tr>
      <tr>
        <td width="6%" bgcolor="#CCCCCC" ><div align="center"><strong>No</strong></div></td>
		<td width="13%" bgcolor="#CCCCCC" ><div align="center"><strong>Nama</strong></div></td>
		<td width="8%" bgcolor="#CCCCCC" ><div align="center"><strong>NEM</strong></div></td>
		<td width="16%" bgcolor="#CCCCCC" ><div align="center"><strong>Pilihan 1 </strong></div></td>
		<td width="14%" bgcolor="#CCCCCC" ><div align="center"><strong>Pilihan 2 </strong></div></td>
		<td width="18%" bgcolor="#CCCCCC" ><div align="center"><strong>Gelombang</strong></div></td>
		<td width="17%" bgcolor="#CCCCCC" ><div align="center"><strong>Action</strong></div></td>
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
		<td bgcolor="#FFFFFF" ><?=$getdataA[$i][10];?></td>
		<td bgcolor="#FFFFFF" ><div align="center">
		<!-- script membuat link edit dan delete -->
		<a href="main.php?page=12&a_id=<?=$getdataA[$i][0];?>"><img src="images/edit.png" border="0" title="edit" /></a> <a href="main.php?page=11&delete=1&a_id=<?=$getdataA[$i][0];?>"><img src="images/hapus.png" border="0" title="hapus" /></a></div></td>
		</tr>
	  <?
	  }
	  ?>
    </table></td>
  </tr>
</table>
<br />
<!-- script untuk membuat link tambah admin -->
      <a href="main.php?page=14" style="text-decoration:none" ><input type="submit" name="Submit" value="Tambah Pendaftaran" /></a>
        

    <p align="right">&nbsp;</p>
</div>

