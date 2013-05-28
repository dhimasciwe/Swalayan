<?
session_start();
// script mengambil nilai a_id dan s_id
$a_id=(int)addslashes($_GET['a_id']);
$s_id=(int)addslashes($_GET['s_id']);
// script untuk mengecek kembali apakah admin sudah login dengan benar
if((!isset($_SESSION['loginadmin'])) || (($s_id <= $_SESSION['status']) && ($a_id!=$_SESSION['loginadmin']))) {
	echo"<Script>alert('Anda harus login dengan admin bersangkutan');window.history.go(-1)</script>";
	exit();
}
// script mengecek status orang yang login
if($_SESSION['status']>2){
	echo"<Script>alert('Anda harus login sebagai administrator');window.history.go(-1)</script>";
	exit();
}

	$data = new Mysql();
	$data->connect();

// script untuk mengambil nilai inputan yang berasal dari form edit password
if(isset($_POST['edit'])){
	$passwordlama=$_POST['passwordlama'];
	$password = $_POST['password'];
	$password2 = $_POST['password2'];
	$polapassword = "^.{6,}$";

// query select data yang sesuai id nya
if($data->execute("select ad_id, password from admin where ad_id=$a_id and password=md5('$passwordlama')")){
	$cekPassAdmin = $data->getDataSet();
	}
// script menampilkan pesan kesalahan jika password lama belum diisi
if (!($passwordlama)) {
echo"<Script>alert('Tolong inputkan password yang lama');window.history.go(-1)</script>";
exit;
}
// script menampilkan pesan kesalahan jika data masih belum ditemukan
if(count($cekPassAdmin)==0){
echo"<Script>alert('Input password yang lama masih salah !');window.history.go(-1)</script>";
exit;
}

if (!($password)) {
echo"<Script>alert('Tolong inputkan password');window.history.go(-1)</script>";
exit;
} 

if (!($password2)) {
echo"<Script>alert('Tolong inputkan retype password');window.history.go(-1)</script>";
exit;
}
	
if (($password!=$password2)) {
echo"<Script>alert('Tolong ulangi input retype password');window.history.go(-1)</script>";
exit;
}
 
if(!eregi($polapassword, $password)){ 
echo"<Script>alert('Tolong isi Password, Harus Lebih dari 6 Karakter');window.history.go(-1)</script>";
exit;
} else {

// query update data password
if($data->execute("Update admin set password=md5('$password') where ad_id=$a_id")){
		echo"<meta http-equiv='refresh' content='0;URL=main.php?page=2&a_id=$a_id&s_id=$s_id'>";
		} else {
			$error = "<div style=\"font-size:14px;color:red\">Password tidak bisa disimpan</div>";
		}
	}

}
// query select data password kemudian menyimpannya dalam variabel
if($data->execute("select password from admin where ad_id=$a_id")){ 
$getDataEn = $data->getDataSet();

?>


<html>
<head>


</head>

<body>
<div class="post">
    <h2 class="title">Ubah Password Admin </h2>
    <p class="byline"> 
<?

echo $error;
?>
Selamat datang &quot;<?=$nama?>&quot;
, anda login sebagai &quot;<?=$status?>&quot;<br>
&gt;&gt; Berikut ini adalah form untuk ubah  password admin. </p>
    <div align="center" style="padding-left:20px;padding-right:20px">
<!-- script membuat form -->
<form action="" method="post" enctype="multipart/form-data" id="formpost">
<table width="100%" border="0">
  <tr>
    <td width="16%" valign="top"><div align="left">Password  Lama </div></td>
    <td width="2%" valign="top"><div align="center">:</div></td>
    <td width="82%"><div align="left">
      <input name="passwordlama" type="password" id="passwordlama" size="20" value="">
    </div></td>
  </tr>
  <tr>
    <td valign="top"><div align="left">Password Baru </div></td>
    <td valign="top"><div align="center">:</div></td>
    <td><div align="left">
      <input name="password" type="password" id="password" size="20" value="">
    </div></td>
  </tr>
  <tr>
    <td valign="top"><div align="left">ReType Password  </div></td>
    <td valign="top"><div align="center">:</div></td>
    <td><div align="left">
      <input name="password2" type="password" id="password2" size="20" value="">
    </div></td>
  </tr>
  <tr>
    <td colspan="3"><div align="left"><span class="style3"></span></div></td>
  </tr>
  <tr>
    <td><div align="left"><span class="style3"></span></div></td>
    <td><div align="left"><span class="style2"><span class="style3"><span class="style3"></span></span></span></div></td>
    <td><div align="left"><span class="style3">
	<!-- Script membuat link button Ubah -->
      <input type="submit" name="edit" value="Ubah">
    <a href="main.php?page=2&a_id=<?=$a_id?>&s_id=<?=$s_id?>" style="text-decoration:none"><input type="button" value="Batal"></a></td>
  </tr>
</table>
</form>
</div>
</div>
</body>
</html>
<?

} else {
	echo "tidak ada data yang akan diedit";
}
?>

