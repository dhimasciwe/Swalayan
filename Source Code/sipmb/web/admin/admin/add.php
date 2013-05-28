<?php
session_start();
// script menampilkan pesan kesalahan jika ada orang yang belum logi
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

// query untuk select data status di tabel status admin
if($mysql->execute("select sa_id, sa_nama from status_admin order by sa_id")){
	$datastatus = $mysql->getDataSet();
}
// script untuk mengambil nilai inputan yang berasal dari form
if(isset($_POST['simpan'])){
$id_admin = $_POST['id_admin'];
$id_status = $_POST['id_status'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$no_tlp = $_POST['no_tlp'];
$username= $_POST['username'];
$password = $_POST['password'];
$password2 = $_POST['password2'];
$pola_tlp = "^[0-9]+$";
$polapassword = "^.{6,}$";
 
		// script untuk menampilkan pesan kesalahan dan validasi inputan
		if(empty($nama)){
					echo"<Script>alert('Tolong inputkan nama');window.history.go(-1)</script>";
					exit;
		} else if (empty($id_status)){
					echo"<Script>alert('Tolong inputkan status');window.history.go(-1)</script>";
					exit;
		} else if (empty($alamat)){
					echo"<Script>alert('Tolong inputkan alamat');window.history.go(-1)</script>";
					exit;
		} else if (empty($no_tlp)){
					echo"<Script>alert('Tolong inputkan No Telpon');window.history.go(-1)</script>";
					exit;
		} else if (empty($username)){
					echo"<Script>alert('Tolong inputkan Username');window.history.go(-1)</script>";
					exit;
		} else if (!($password)) {
					echo"<Script>alert('Tolong inputkan password');window.history.go(-1)</script>";
					exit;
		} else if (($password!=$password2)) {
					echo"<Script>alert('Tolong ulangi input retype password');window.history.go(-1)</script>";
					exit;
		} else if(!eregi($polapassword, $password)){ 
					echo"<Script>alert('Tolong isi Password, Harus Lebih dari 6 Karakter');window.history.go(-1)</script>";
					exit;
		} else if(!eregi($pola_tlp, $no_tlp)){ 
					echo"<Script>alert('Tolong isi Telpon, Harus Angka Ex. 08985176246');window.history.go(-1)</script>";
					exit;
		} else {
					
		// query untuk insert data ke database
		if($mysql->execute("INSERT INTO admin (ad_nama, ad_alamat, ad_tlp, username, password, sa_id) values ('$nama', '$alamat', '$no_tlp', '$username', md5('$password'), '$id_status')"))
		{
			echo"<meta http-equiv='refresh' content='1;URL=main.php?page=1'>";
		} else {
			$error = "<div style=\"font-size:14px;color:red\">tidak bisa disimpan</div>";
		}
	
		
	}
}
?>
<div class="post">
<h2 class="title">Tambah Admin</h2>
<p class="byline">
Selamat datang &quot;<?=$nama?>&quot;
, anda login sebagai &quot;<?=$status?>&quot;<br />
&gt;&gt; Tambah Admin.</p>
<table width="100%" border="0" cellspacing="2" align="center">
  <tr>
    <td>
	<!-- script membuat form -->
	<form action="" method="post" enctype="multipart/form-data" id="formpost">
      
      <table width="100%" border="0">
        <tr>
          <td>Nama</td>
          <td><div align="center">:</div></td>
          <td><input type="text" name="nama"/></td>
          </tr>
        <tr valign="top">
          <td>Alamat</td>
          <td><div align="center">:</div></td>
          <td><textarea name="alamat" cols="40" rows="3" wrap="off"></textarea></td>
        </tr>
        <tr>
          <td>No Tlp</td>
          <td><div align="center">:</div></td>
          <td><input type="text" name="no_tlp"/></td>
          </tr>
		  <? if($_SESSION['loginadmin']==1){?>
        <tr>
          <td>Status</td>
          <td><div align="center">:</div></td>
          <td>
		  <!-- script menampilkan pilihan status admin -->
		  <select name="id_status" > 
            <option value="0">- Pilih Status -</option>
			 <?
	  		for($i=0;$i<count($datastatus);$i++){ 
	      ?>
			<option value="<?=$datastatus[$i][0]?>"><?=$datastatus[$i][1]?></option>
			<? } ?>
          </select></td>
        </tr>
		<? } ?>
        <tr>
          <td>Username</td>
          <td><div align="center">:</div></td>
         <td><input type="text" name="username"/></td>
        </tr>
        <tr>
          <td>Password</td>
          <td><div align="center">:</div></td>
          <td><input type="password" name="password"/></td>
        </tr>
		<tr>
          <td>ReType Password</td>
          <td><div align="center">:</div></td>
          <td><input type="password" name="password2"/></td>
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
		  <!-- Script membuat link button simpan -->
		  <input name="simpan" type="submit" class="button" id="simpan" value="Simpan" />
            <a href="main.php?page=1" style="text-decoration:none">
            <input name="button" type="button" value="Batal" />
            </a></td>
          </tr>
      </table>
      <br />
    </form></td>
  </tr>
</table>
</center>
</div>