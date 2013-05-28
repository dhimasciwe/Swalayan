<?php
session_start(); 
// script untuk memasukkan nilai session ke dalam variabel baru
if(isset($_SESSION['loginadmin'])){
	$nama=$_SESSION['namaadmin'];
	$status=$_SESSION['adminstatus'];
?>
<table border="0" cellpadding="0" cellspacing="0" width="100%">
  <tr>
    <td background="images/Untitled-1_01.png" width="16" height="34" style="background-repeat:no-repeat;">&nbsp;</td>
    <td background="images/Untitled-1_02.png" height="34" style="background-repeat:repeat-x;" align="center"><strong><h3>Status Login</h3></strong></td>
    <td background="images/Untitled-1_01b.png" width="17" height="34" style="background-repeat:no-repeat;">&nbsp;</td>
  </tr>
  <tr valign="top">
    <td background="images/Untitled-1_04.png" width="16" style="background-repeat:repeat-y;">&nbsp;</td>
    <td bgcolor="#FFFFFF">
	<table border="0" width="140" align="center">
	<tr>
		<td align="center" colspan="2">welcome <b><?=$nama;?></b></td>
	</tr>
	<tr>
		<td align="left">[<a href="../admin/main.php">admin</a>]</td>
		<td align="right">[<a href="logout.php">logout</a>]</td>
	</tr>
	<tr>
	<td colspan="2" align="center"><img src="images/map.png" width="130"/></td>
	</tr>

	</table>
	</td>
    <td background="images/Untitled-1_04b.png" width="17"style="background-repeat:repeat-y;">&nbsp;</td>
  </tr>
  <tr>
    <td background="images/Untitled-1_06.png" width="16" height="17" style="background-repeat:no-repeat;">&nbsp;</td>
    <td background="images/Untitled-1_07.png" height="17" style="background-repeat:repeat-x;">&nbsp;</td>
    <td background="images/Untitled-1_06b.png" width="17" height="17" style="background-repeat:no-repeat;">&nbsp;</td>
  </tr>
</table>
	
<?
} else {
// script untuk memasukkan nilai inputan ke variabel jika ada yang melakukan login & semua form diisi
if(isset($_POST['login']) and ($_POST['login']=="Login")){
if(($_SESSION['security_code'] == $_POST['security_code']) && (!empty($_SESSION['security_code'])) ) {

	$login = new Mysql();
	$login->connect();
	
	$username = addslashes( $_POST['username']);
	$password = addslashes( $_POST['password']);

// script untuk menjalankan query mencari data yang sesuai	
	if($login->execute("select a.ad_id, a.sa_id, a.username, a.password, a.ad_nama, b.sa_nama from admin a, status_admin b where a.sa_id=b.sa_id and a.username='$username' and a.password=md5('$password')")){
		$cekLoginAdmin = $login->getDataSet();
	}
	    // script menampilkan pesan kesalahan
		if(count($cekLoginAdmin)==0)
		{
			
		echo"<Script>alert('username dan password belum benar');window.history.go(-1)</script>";
					
		} else
		// script untuk mengisi masing-masing variabel session dengan data yang ditemukan
		{
		$_SESSION['loginadmin']=$cekLoginAdmin[0][0];
		$_SESSION['status']=$cekLoginAdmin[0][1];
		$_SESSION['namaadmin']=$cekLoginAdmin[0][4];
		$_SESSION['adminstatus']=$cekLoginAdmin[0][5];

		echo"<meta http-equiv='refresh' content='0;URL=main.php'>";
		exit;
		}
		
	  } else {
	 	echo"<Script>alert('masukkan security code dengan benar');window.history.go(-1)</script>";
	  }
			 	
}

?>
		

<html>
<head>

<title>Untitled Document</title>
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
.style1 a{color: #CCCCCC}
.style1 a:hover{color: #FFFFFF}
-->
</style>
</head>

<body>
<center>
<table width="200" border="0">
  <tr bgcolor="#996600">
    <td><div align="center"><img src="images/login.png" /></div></td>
  </tr>
</table>
</center>
<!-- script untuk membuat form login -->
<form id="form1" method="post" action="">
<table width="191" border="0" align="center" bgcolor="#996600">

  <tr>
    <td width="80"><span class="style1">username</span></td>
    <td width="10">:</td>
    <td width="249"><input name="username" type="text" size="23" style="font-size:12px;" /></td>
  </tr>
  <tr>
    <td><span class="style1">password</span></td>
    <td>:</td>
    <td><input type="password" name="password" size="23" style="font-size:12px;" /></td>
  </tr>
      <tr valign="top">
        <td colspan="3" align="right"><table width="100%" border="0">
          <tr>
		    <!-- script memanggil fungsi captcha -->
            <td><img src="captchasecurityimages.php?width=100&amp;height=30&amp;character=5" height="30" /></td>
            <td><input name="security_code" type="text" id="security_code" size="15" /></td>
          </tr>
        </table></td>
      </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td align="right">&nbsp;</td>
  <td align="right"><input type="submit" name="login" value="Login"  style="font-size:12px;" />      </td></tr></table>
</form>
</body>
</html>
    <?php		
}
	?>
		