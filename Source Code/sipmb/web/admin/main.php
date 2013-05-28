<? 
session_start();
// script untuk membawa ke halaman index admin jika ternyata variabel session masih kosong 
if(!isset($_SESSION['loginadmin'])){
	header('location:../admin');
	exit();
}
// script memanggil class.mysql.php
require_once('../inc/class.mysql.php');
?>

<html>
<head>

<title>Nama Kampus Anda</title>
<link href="default.css" rel="stylesheet" type="text/css" media="screen">
</head>
<body>
<div id="wrapper">
<? include('head.php'); ?>
<div id="page">
<div id="sidebar">
<? include('sidebar.php');?>
</div>
<div id="content">
<? include('content.php');?>
</div>
<div id="footer">
</div>
</div>

</div>
</body>
</html>
