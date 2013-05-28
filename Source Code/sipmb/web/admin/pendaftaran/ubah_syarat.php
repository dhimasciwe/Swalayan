<?php
session_start();
$id=(int)addslashes($_GET['id']);
// script menampilkan pesan kesalahan jika ada orang yang belum login
if(!isset($_SESSION['loginadmin'])) {
	echo"<Script>alert('Anda harus login dengan admin bersangkutan');window.history.go(-1)</script>";
	exit();
}

$mysql = new Mysql();
$mysql->connect();

// script untuk mengambil nilai syarat kemudian menyimpan ke variabel $syarat	
if(isset($_POST['edit'])){
	$syarat = $_POST['syarat'];
		// query update nilai syarat dalam tabel pendaftaran
		if($mysql->execute("Update pendaftaran set s_id='$syarat' where p_id=$id")){
			echo"<meta http-equiv='refresh' content='1;URL=main.php?page=7'>";
		} else {
			$error = "<div style=\"font-size:14px;color:red\">Data tidak bisa disimpan</div>";
		}
	
}
// query untuk select data pendaftaran
	if($mysql->execute("SELECT a.p_id, a.p_tgl, a.p_nama, a.p_no_id, b.j_nama, c.a_nama, a.p_asal, d.js_nama, a.p_nem, a.p_alamat, e.w_nama, a.p_kodepos, a.p_tlp, a.p_email, a.ju_id, a.ju_id2, f.i_nama, g.t_nama, h.s_nama, i.g_nama, j.b_nama, k.st_nama, a.j_id, a.a_id, a.js_id, a.w_id, a.s_id, a.t_id FROM pendaftaran a, jenis b, agama c, jurusan_smu d, warga e, info f, tempat g, syarat h, gelombang i, beasiswa j, status k where a.j_id=b.j_id and a.a_id=c.a_id and a.js_id=d.js_id and a.w_id=e.w_id and a.i_id=f.i_id and a.t_id=g.t_id and a.s_id=h.s_id and a.g_id=i.g_id and a.b_id=j.b_id and a.st_id=k.st_id and a.p_id=$id"))
	{
		$dataadmin = $mysql->getDataSet();
	}else{
		$dataadmin=0;
	}
// script untuk menjalankan query select syarat
if($dataadmin!=0){
if($mysql->execute("select s_id, s_nama from syarat order by s_id")){
	$datastatus = $mysql->getDataSet();
}
?>
<div class="post">
<h2 class="title">Ubah Syarat</h2>
<p class="byline">
<?

echo $error;
?>
Selamat datang <?=$nama?>,anda login sebagai <?=$status?>
<br />ini form untuk mengubah syarat.
</p>
<center>
<table width="100%" border="0" cellspacing="2" >
  <tr>
    <td><form action="" method="post" enctype="multipart/form-data" id="formpost">
      
      <table width="551" border="0">
  <tr>
    <td width="173">No. Pendaftaran </td>
    <td width="10"><div align="center">:</div></td>
    <td width="450"><?=$dataadmin[0][0];?></td>
  </tr>
  <tr>
    <td>Tgl. Pendaftaran </td>
    <td><div align="center">:</div></td>
    <td><?=$dataadmin[0][1];?></td>
  </tr>
  <tr>
    <td>Nama</td>
    <td><div align="center">:</div></td>
    <td><?=$dataadmin[0][2];?></td>
  </tr>
  <tr>
    <td>No id </td>
    <td><div align="center">:</div></td>
    <td><?=$dataadmin[0][3];?></td>
  </tr>
  <tr>
    <td>Gender</td>
    <td><div align="center">:</div></td>
    <td><?=$dataadmin[0][4];?></td>
  </tr>
  <tr>
    <td>Agama</td>
    <td><div align="center">:</div></td>
    <td><?=$dataadmin[0][5];?></td>
  </tr>
  <tr>
    <td>Asal Sekolah </td>
    <td><div align="center">:</div></td>
    <td><?=$dataadmin[0][6];?></td>
  </tr>
  <tr>
    <td>Jurusan SMU </td>
    <td><div align="center">:</div></td>
    <td><?=$dataadmin[0][7];?></td>
  </tr>
  <tr>
    <td>Nem</td>
    <td><div align="center">:</div></td>
    <td><?=$dataadmin[0][8];?></td>
  </tr>
  <tr valign="top">
    <td>Alamat</td>
    <td><div align="center">:</div></td>
    <td><?=$dataadmin[0][9];?></td>
  </tr>
  <tr>
    <td>Kewarganegaraan</td>
    <td><div align="center">:</div></td>
    <td><?=$dataadmin[0][10];?></td>
  </tr>
  <tr>
    <td>Kodepos</td>
    <td><div align="center">:</div></td>
    <td><?=$dataadmin[0][11];?></td>
  </tr>
  <tr>
    <td>No Telepon</td>
    <td><div align="center">:</div></td>
    <td><?=$dataadmin[0][12];?></td>
  </tr>
  <tr>
    <td>Email</td>
    <td><div align="center">:</div></td>
    <td><?=$dataadmin[0][13];?></td>
  </tr>
  <tr>
    <td>Pilihan ke 1. </td>
    <td><div align="center">:</div></td>
    <td><?
				$ju1=$dataadmin[0][14];
				if($mysql->execute("SELECT ju_nama from jurusan where ju_id=$ju1")){
				$dataJU1 = $mysql->getDataSet();} 
			?>
		
		<?=$dataJU1[0][0];?>	  </td>
  </tr>
  <tr>
    <td>Pilihan ke 2. </td>
    <td><div align="center">:</div></td>
    <td><?
				$ju2=$dataadmin[0][15];
				if($mysql->execute("SELECT ju_nama from jurusan where ju_id=$ju2")){
				$dataJU2 = $mysql->getDataSet();} 
			?>

		<?=$dataJU2[0][0];?></td>
  </tr>
  <tr>
    <td>Info</td>
    <td><div align="center">:</div></td>
    <td><?=$dataadmin[0][16];?></td>
  </tr>
  <tr>
    <td>Tempat Pendaftaran </td>
    <td><div align="center">:</div></td>
    <td><?=$dataadmin[0][17];?></td>
  </tr>
  <tr>
    <td>Syarat</td>
    <td><div align="center">:</div></td>
    <td><select name="syarat" > 
			
            <option value="<?=$dataadmin[0][26];?>">- <?=$dataadmin[0][18];?>-</option>
			<?
			
			//list menu
	  		for($i=0;$i<count($datastatus);$i++){ 
				$status=$datastatus[$i][0];
			?>
				
			 <option value="<?=$datastatus[$i][0]?>"><?=$datastatus[$i][1]?></option>
			<?
			}
			?>
          </select></td>
  </tr>
  <tr>
    <td>Gelombang</td>
    <td><div align="center">:</div></td>
    <td><?=$dataadmin[0][19];?></td>
  </tr>
  <tr>
    <td>Beasiswa</td>
    <td><div align="center">:</div></td>
    <td><?=$dataadmin[0][20];?></td>
  </tr>
  <tr>
    <td>Status Pendaftaran </td>
    <td><div align="center">:</div></td>
    <td><?=$dataadmin[0][21];?></td>
  </tr>
  <tr>
    <td>Pembayaran Pendaftaran </td>
    <td><div align="center">:</div></td>
    <td>
	<!-- script untuk mengecek pembayaran pendaftaran -->
	<? 
	$k=$dataadmin[0][27];
	if ($k==1){ 
	?>
      [<a href="main.php?page=13&amp;id=<?=$dataadmin[0][0];?>">cek konfirmasi</a>]
      <? } else { ?>
      [pembayaran via offline]
      <? } ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><label>
	<!-- script mebuat link ubah -->
        <input name="edit" type="submit" class="button" id="edit" value="Ubah" />
        <a href="main.php?page=7"> <input name="cancel" type="submit" class="button" id="cancel" value="Batal" /></a>
    </label></td>
  </tr>
</table>

      <br />
    </form></td>
  </tr>
</table>
</center>
<?

} else {
	echo "tidak ada data yang akan diedit";
}
?>
</div>