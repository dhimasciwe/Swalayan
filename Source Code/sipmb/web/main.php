
<html>
<head>

<title>Nama Kampus Anda</title>
<!-- script untuk memanggil CSS -->
<link href="default.css" rel="stylesheet" type="text/css" media="screen">
</head>
<body>
<!-- script untuk merancang layout website dengan div id -->
<div id="wrapper">
<? include('head.php'); ?>
<div id="page">
<div id="sidebar">
<? include('sidebar.php');?>
</div>
<?php
// script untuk mendefinisikan variable halaman
		$page = $_GET['page'];
		if(!isset($page) || $page==0 ){
			echo"<meta http-equiv='refresh' content='0;URL=index.php'>";
		} else if($page==1){
			include('info.php');
		} else if($page==2){
			include('biaya.php');
		} else if($page==3){
			include('info_pendaftaran.php');
		} else if($page==4){
			include('pendaftaran.php');
		}else if($page==5){
			include('data_pendaftar.php');
		}else if($page==6){
			include('data_kelulusan.php');
		}else if($page==7){
			include('jadwal_kegiatan.php');
		}else if($page==8){
			include('jadwal_psu.php');
		}else if($page==10){
			include('data_konfirmasi.php');
		}else if($page==11){
			include('form_konfirmasi.php');
		}
			
		?>
</div>
</div>
</body>
</html>