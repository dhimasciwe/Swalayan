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
// script mengambil nilai a_id
$a_id=(int)addslashes($_GET['a_id']);

// script untuk mengambil nilai inputan yang berasal dari form
if(isset($_POST['edit'])){
	$nama = $_POST['nama'];
	$no_id = $_POST['no_id'];
	$jenis = $_POST['jenis'];
	$agama = $_POST['agama'];
	$sekolah = $_POST['sekolah'];
	$jurusan = $_POST['jurusan'];
	$nem = $_POST['nem'];
	$alamat = $_POST['alamat'];
	$warga = $_POST['warga'];
	$kodepos = $_POST['kodepos'];
	$tlp = $_POST['tlp'];
	$email = $_POST['email'];
	$ju_id = $_POST['ju_id'];
	$ju_id2 = $_POST['ju_id2'];

		// script untuk menampilkan pesan kesalahan dan validasi inputan
		if(empty($nama)){
		echo"<Script>alert('Tolong inputkan nama');window.history.go(-1)</script>";
					exit;
		} else if (empty($no_id)){
					echo"<Script>alert('Tolong inputkan Nomor ID');window.history.go(-1)</script>";
					exit;
		} else if (empty($jenis)){
					echo"<Script>alert('Tolong inputkan Jenis Kelamin');window.history.go(-1)</script>";
					exit;
		} else if (empty($agama)){
					echo"<Script>alert('Tolong inputkan Agama');window.history.go(-1)</script>";
					exit;
		} else if (empty($sekolah)){
					echo"<Script>alert('Tolong inputkan Asal Sekolah');window.history.go(-1)</script>";
					exit;
		} else if (empty($jurusan)){
					echo"<Script>alert('Tolong inputkan Jurusan SMU');window.history.go(-1)</script>";
					exit;
		} else if (empty($nem)){
					echo"<Script>alert('Tolong inputkan Nilai NEM');window.history.go(-1)</script>";
					exit;
		} else if (empty($alamat)){
					echo"<Script>alert('Tolong inputkan Alamat');window.history.go(-1)</script>";
					exit;
		} else if (empty($warga)){
					echo"<Script>alert('Tolong inputkan Kewarganegaraan');window.history.go(-1)</script>";
					exit;
		} else if (empty($kodepos)){
					echo"<Script>alert('Tolong inputkan Kodepos');window.history.go(-1)</script>";
					exit;
		} else if (empty($tlp)){
					echo"<Script>alert('Tolong inputkan Nomor Telepon');window.history.go(-1)</script>";
					exit;
		} else if (empty($email)){
					echo"<Script>alert('Tolong inputkan Email');window.history.go(-1)</script>";
					exit;
		} else if (empty($ju_id)){
					echo"<Script>alert('Tolong inputkan Jurusan ke 1');window.history.go(-1)</script>";
					exit;
		} else if (empty($ju_id2)){
					echo"<Script>alert('Tolong inputkan Jurusan ke 2');window.history.go(-1)</script>";
					exit;
		} else {
		
		// query update data pendaftaran yg sesuai id nya
		if($mysql->execute("Update pendaftaran set p_nama='$nama', p_no_id='$no_id', j_id='$jenis', a_id='$agama', p_asal='$sekolah', js_id='$jurusan', p_nem='$nem', p_alamat='$alamat', w_id='$warga', p_kodepos='$kodepos', p_tlp='$tlp', p_email='$email', ju_id='$ju_id', ju_id2='$ju_id2' where p_id=$a_id")){
			//echo"<div style=\"font-size:14px;color:green\">Data bisa disimpan</div>";
			echo"<meta http-equiv='refresh' content='1;URL=main.php?page=11'>";
		} else {
			$error = "<div style=\"font-size:14px;color:red\">Data tidak bisa disimpan</div>";
		}
	
		
	}
}
// query untuk select data pendaftaran
	if($mysql->execute("SELECT a.p_id, a.p_tgl, a.p_nama, a.p_no_id, b.j_nama, c.a_nama, a.p_asal, d.js_nama, a.p_nem, a.p_alamat, e.w_nama, a.p_kodepos, a.p_tlp, a.p_email, a.ju_id, a.ju_id2, f.i_nama, g.t_nama, h.s_nama, i.g_nama, j.b_nama, k.st_nama, a.j_id, a.a_id, a.js_id, a.w_id, l.k_nama, a.t_id FROM pendaftaran a, jenis b, agama c, jurusan_smu d, warga e, info f, tempat g, syarat h, gelombang i, beasiswa j, status k, kabupaten l where a.j_id=b.j_id and a.a_id=c.a_id and a.js_id=d.js_id and a.w_id=e.w_id and a.i_id=f.i_id and a.t_id=g.t_id and a.s_id=h.s_id and a.g_id=i.g_id and a.b_id=j.b_id and a.st_id=k.st_id and a.k_id=l.k_id and a.p_id=$a_id"))
	{
		$getdataA = $mysql->getDataSet();
	}else{
		$getdataA=0;
	}
	
// script menjalankan query dan memanggil function	
if($mysql->execute("SELECT j_id, j_nama from jenis"))
	{
		$getdatajenis = $mysql->getDataSet();
	}
if($mysql->execute("SELECT a_id, a_nama from agama"))
	{
		$getdataagama = $mysql->getDataSet();
	}
if($mysql->execute("SELECT js_id, js_nama from jurusan_smu"))
	{
		$getdatajs = $mysql->getDataSet();
	}
if($mysql->execute("SELECT w_id, w_nama from warga"))
	{
		$getdatawarga = $mysql->getDataSet();
	}
if($mysql->execute("SELECT ju_id, ju_nama from jurusan"))
	{
		$getdatajurusan = $mysql->getDataSet();
	}
?>

<div class="post">
    <h2 class="title">Edit Data Pendaftar </h2>
    <p class="byline">
	Selamat datang &quot;<?=$nama;?>&quot;, anda login sebagai &quot;<?=$status;?>&quot;<br />
  &gt;&gt; Berikut ini adalah data detail pendaftaran. </p>
<form action="" method="post" enctype="multipart/form-data" id="formpost">
<table width="551" border="0">
  <tr>
    <td width="178">No. Pendaftaran </td>
    <td width="10"><div align="center">:</div></td>
    <td width="349"><?=$getdataA[0][0];?></td>
  </tr>
  <tr>
    <td>Tgl. Pendaftaran </td>
    <td><div align="center">:</div></td>
    <td><?=$getdataA[0][1];?></td>
  </tr>
  <tr>
    <td>Nama</td>
    <td><div align="center">:</div></td>
    <td><input name="nama" type="text" value="<?=$getdataA[0][2];?>" size="40" /></td>
  </tr>
  <tr>
    <td>No id </td>
    <td><div align="center">:</div></td>
    <td><input name="no_id" type="text" value="<?=$getdataA[0][3];?>" size="40" /></td>
  </tr>
  <tr>
    <td>Gender</td>
    <td><div align="center">:</div></td>
    <td><select name="jenis">
      <option value="<?=$getdataA[0][22];?>">- <?=$getdataA[0][4];?> -</option>
	  <? for($i=0;$i<count($getdatajenis);$i++) { ?>
	   <option value="<?=$getdatajenis[$i][0];?>"><?=$getdatajenis[$i][1];?></option>
	   <? } ?>
    </select></td>
  </tr>
  <tr>
    <td>Agama</td>
    <td><div align="center">:</div></td>
    <td>
	<!-- script menampilkan pilihan agama -->
	<select name="agama">
      <option value="<?=$getdataA[0][23];?>">- <?=$getdataA[0][5];?> -</option>
	  <? for($i=0;$i<count($getdataagama);$i++) { ?>
	   <option value="<?=$getdataagama[$i][0];?>"><?=$getdataagama[$i][1];?></option>
	   <? } ?>
    </select></td>
  </tr>
  <tr>
    <td>Asal Sekolah </td>
    <td><div align="center">:</div></td>
    <td><input name="sekolah" type="text" value="<?=$getdataA[0][6];?>" size="40" /></td>
  </tr>
  <tr>
    <td>Jurusan SMU </td>
    <td><div align="center">:</div></td>
    <td>
	<!-- script menampilkan pilihan jurusan smu -->
	<select name="jurusan">
      <option value="<?=$getdataA[0][24];?>">- <?=$getdataA[0][7];?> -</option>
	  <? for($i=0;$i<count($getdatajs);$i++) { ?>
	   <option value="<?=$getdatajs[$i][0];?>"><?=$getdatajs[$i][1];?></option>
	   <? } ?>
    </select></td>
  </tr>
  <tr>
    <td>Nem</td>
    <td><div align="center">:</div></td>
    <td><input name="nem" type="text" value="<?=$getdataA[0][8];?>" size="4" /></td>
  </tr>
  <tr valign="top">
    <td>Alamat</td>
    <td><div align="center">:</div></td>
    <td><textarea name="alamat" cols="50" rows="3"><?=$getdataA[0][9];?></textarea></td>
  </tr>
  <tr>
    <td>Kewarganegaraan</td>
    <td><div align="center">:</div></td>
    <td>
	<!-- script menampilkan pilihan warga -->
	<select name="warga">
      <option value="<?=$getdataA[0][25];?>">- <?=$getdataA[0][10];?> -</option>
	  <? for($i=0;$i<count($getdatawarga);$i++) { ?>
	   <option value="<?=$getdatawarga[$i][0];?>"><?=$getdatawarga[$i][1];?></option>
	   <? } ?>
    </select></td>
  </tr>
  <tr>
    <td>Kabupaten</td>
    <td><div align="center">:</div></td>
    <td><?=$getdataA[0][26];?></td>
  </tr>
  <tr>
    <td>Kodepos</td>
    <td><div align="center">:</div></td>
    <td><input name="kodepos" type="text" value="<?=$getdataA[0][11];?>" size="6" /></td>
  </tr>
  <tr>
    <td>No Telepon</td>
    <td><div align="center">:</div></td>
    <td><input name="tlp" type="text" value="<?=$getdataA[0][12];?>" size="20" /></td>
  </tr>
  <tr>
    <td>Email</td>
    <td><div align="center">:</div></td>
    <td><input name="email" type="text" value="<?=$getdataA[0][13];?>" size="40" /></td>
  </tr>
  <tr>
    <td>Pilihan ke 1. </td>
    <td><div align="center">:</div></td>
    <td><?
				$ju1=$getdataA[0][14];
				if($mysql->execute("SELECT ju_nama from jurusan where ju_id=$ju1")){
				$dataJU1 = $mysql->getDataSet();} 
			?>
		
		<select name="ju_id">
      <option value="<?=$getdataA[0][14];;?>">- <?=$dataJU1[0][0];?> -</option>
	  <? for($i=0;$i<count($getdatajurusan);$i++) { ?>
	   <option value="<?=$getdatajurusan[$i][0];?>"><?=$getdatajurusan[$i][1];?></option>
	   <? } ?>
    </select>	  </td>
  </tr>
  <tr>
    <td>Pilihan ke 2. </td>
    <td><div align="center">:</div></td>
    <td><?
				$ju2=$getdataA[0][15];
				if($mysql->execute("SELECT ju_nama from jurusan where ju_id=$ju2")){
				$dataJU2 = $mysql->getDataSet();} 
			?>

		<select name="ju_id2">
      <option value="<?=$getdataA[0][15];;?>">- <?=$dataJU2[0][0];?> -</option>
	  <? for($i=0;$i<count($getdatajurusan);$i++) { ?>
	   <option value="<?=$getdatajurusan[$i][0];?>"><?=$getdatajurusan[$i][1];?></option>
	   <? } ?>
    </select></td>
  </tr>
  <tr>
    <td>Info</td>
    <td><div align="center">:</div></td>
    <td><?=$getdataA[0][16];?></td>
  </tr>
  <tr>
    <td>Tempat Pendaftaran </td>
    <td><div align="center">:</div></td>
    <td><?=$getdataA[0][17];?></td>
  </tr>
  <tr>
    <td>Syarat</td>
    <td><div align="center">:</div></td>
    <td><?=$getdataA[0][18];?></td>
  </tr>
  <tr>
    <td>Gelombang</td>
    <td><div align="center">:</div></td>
    <td><?=$getdataA[0][19];?></td>
  </tr>
  <tr>
    <td>Beasiswa</td>
    <td><div align="center">:</div></td>
    <td><?=$getdataA[0][20];?></td>
  </tr>
  <tr>
    <td>Status Pendaftaran </td>
    <td><div align="center">:</div></td>
    <td><?=$getdataA[0][21];?></td>
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
	<!-- script mebuat submit link -->
      <input name="edit" type="submit" class="button" id="edit" value="Ubah" />
	  <a href="main.php?page=11"> <input name="cancel" type="submit" class="button" id="cancel" value="Batal" /></a>
    </label></td>
  </tr>
</table>
</form>

    <p align="right">&nbsp;</p>
</div>

