<? // script memulai session dan mengecek apakah ada seseorang yang login
session_start(); 
if(isset($_SESSION['loginadmin'])){
	echo"<meta http-equiv='refresh' content='0;URL=main.php'>";
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
<!-- div membuat layout website -->
<div id="wrapper">
<? include('head.php'); ?>
<div id="page">
<? include('login.php');?>
</div>
<div id="footer">
</div>
</div>

</div>
</body>
</html>
