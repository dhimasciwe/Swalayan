<?
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

// script untuk mengambil nilai inputan yang berasal dari form
if(isset($_POST['edit'])){
	$gelombang = $_POST['gelombang'];
	$tahun = $_POST['tahun'];
	
	// script untuk menampilkan pesan kesalahan dan validasi inputan
	if(empty($gelombang)){
		echo"<Script>alert('Tolong inputkan Gelombang PMB');window.history.go(-1)</script>";
					exit;
		} else if (empty($tahun)){
					echo"<Script>alert('Tolong inputkan Tahun PMB');window.history.go(-1)</script>";
					exit;
		} else {
		// query update data pmb_config
		if($mysql->execute("Update pmb_config set g_id='$gelombang', pm_tahun='$tahun'")){
			echo"<meta http-equiv='refresh' content='1;URL=main.php?page=13'>";
		} else {
			$error = "<div style=\"font-size:14px;color:red\">Data tidak bisa disimpan</div>";
		}
		}
	
}

	// query select data pmb_config
	if($mysql->execute("SELECT b.g_nama, a.pm_tahun, a.g_id from pmb_config a, gelombang b where a.g_id=b.g_id"))
	{
		$getdataA = $mysql->getDataSet();
	}else{
		$getdataA=0;
	}
// query select data di tabel gelombang
if($mysql->execute("SELECT g_id, g_nama from gelombang"))
	{
		$getdatagelombang = $mysql->getDataSet();
	}
	
?>

<div class="post">
    <h2 class="title">Konfigurasi PMB </h2>
    <p class="byline">
	Selamat datang &quot;<?=$nama;?>&quot;, anda login sebagai &quot;<?=$status;?>&quot;<br />
  &gt;&gt; Berikut ini adalah halaman untuk konfigurasi gelombang PMB. </p>

<br />
<form action="" method="post" enctype="multipart/form-data" id="formpost">
<table width="551" border="0">
  <tr>
    <td width="173">Gelombang PMB </td>
    <td width="10"><div align="center">:</div></td>
    <td width="450">
	<!-- script menampilkan pilihan gelombang -->
	<select name="gelombang">
      <option value="<?=$getdataA[0][2];;?>">- <?=$getdataA[0][0];?> -</option>
	  <? for($i=0;$i<count($getdatagelombang);$i++) { ?>
	   <option value="<?=$getdatagelombang[$i][0];?>"><?=$getdatagelombang[$i][1];?></option>
	   <? } ?>
    </select></td>
  </tr>
  <tr>
    <td>Tahun </td>
    <td><div align="center">:</div></td>
    <td><input name="tahun" type="text" value="<?php echo $getdataA[0][1];?>" size="20" /></td>
  </tr>
  <tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  </tr>
  <tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>
    <label>
      <input type="submit" name="edit" value="Ubah" id="edit" />
      </label>

  </td>
  </tr>
</table>
</form>
</div>

