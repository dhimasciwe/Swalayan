<?php
session_start();
// script mengambil nilai a_id dan s_id
$a_id=(int)addslashes($_GET['a_id']);
$s_id=(int)addslashes($_GET['s_id']);
// script untuk mengecek kembali apakah admin sudah login dengan benar
if((!isset($_SESSION['loginadmin'])) || (($s_id <= $_SESSION['status']) && ($a_id!=$_SESSION['loginadmin']))) {
	echo"<Script>alert('Anda harus login dengan admin bersangkutan');window.history.go(-1)</script>";
	exit();
}

	$data = new Mysql();
	$data->connect();
// script untuk mengambil nilai inputan yang berasal dari form edit username  
if(isset($_POST['edit'])){
$username = $_POST['username'];

// script menampilkan pesan kesalahan jika username belum diisi
if (!($username)) {
echo"<Script>alert('Tolong inputkan username');window.history.go(-1)</script>";
exit;
}

// query update data username
if($data->execute("Update admin set username='$username' where ad_id=$a_id")){
		echo"<meta http-equiv='refresh' content='0;URL=main.php?page=2&a_id=$a_id&s_id=$s_id'>";
		} else {
			$error = "<div style=\"font-size:14px;color:red\">Username tidak bisa disimpan</div>";
		}
	}

// query select data username kemudian menyimpannya dalam variabel		
if($data->execute("select username from admin where ad_id=$a_id")){ 
$getDataEn = $data->getDataSet();

?>


<html>
<head>



</head>

<body>
<div class="post">
    <h2 class="title">Ubah Username Admin</h2>
    <p class="byline"> 
<?

echo $error;
?>
Selamat datang &quot;<?=$nama?>&quot;
, anda login sebagai &quot;<?=$status?>&quot;
<br>
&gt;&gt; Berikut ini adalah form untuk ubah  username admin. </p>
    <div align="center" style="padding-left:20px;padding-right:20px">
<form action="" method="post" enctype="multipart/form-data" id="formpost">
<table width="400" border="0" align="left">
  <tr>
    <td width="20%" height="21"><span class="style3"></span></td>
    <td width="6%"><span class="style3"></span></td>
    <td width="74%"><span class="style3"></span></td>
  </tr>
  <tr>
    <td valign="top">Username  </td>
    <td valign="top"><div align="center">:</div></td>
    <td><input name="username" type="text" id="user" size="20" value="<?=$getDataEn[0][0];?>">
	</td>
  </tr>
  <tr>
    <td colspan="3"><span class="style3"></span></td>
  </tr>
  <tr>
    <td><span class="style3"></span></td>
    <td><div align="center"><span class="style2"><span class="style3"><span class="style3"></span></span></span></div></td>
    <td><span class="style3">
	<!-- Script membuat link button Ubah -->
      <input type="submit" name="edit" value="Ubah">
      <a href="main.php?page=2&a_id=<?=$a_id;?>&s_id=<?=$s_id;?>" style="text-decoration:none">
      <input name="button" type="button" value="Batal">
      </a></span></td>
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

