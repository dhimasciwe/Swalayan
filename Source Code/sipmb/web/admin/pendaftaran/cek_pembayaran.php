<?php
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
// script untuk ambil nilai id
$id=(int)addslashes($_GET['id']);
	// query select data konfirmasi
	if($mysql->execute("SELECT ko_tgl, ko_jam, ko_no_rek from konfirmasi where ko_id=$id"))
	{
		$getdataA = $mysql->getDataSet();
	}else{
		$getdataA=0;
	}
	
?>

<div class="post">
    <h2 class="title">Cek Konfirmasi Pembayaran </h2>
    <p class="byline">
	Selamat datang &quot;<?=$nama;?>&quot;, anda login sebagai &quot;<?=$status;?>&quot;<br />
  &gt;&gt; Berikut ini adalah List konfirmasi pembayaran di web ini. </p>
    <form action="" method="post" enctype="multipart/form-data" id="formpost">
<table width="551" border="0">
  <tr>
    <td width="178">Tanggal</td>
    <td width="10"><div align="center">:</div></td>
    <td width="349">
	<!-- script menampilkan data jika data tidak ditemukan -->
	<?
	if(count($getdataA)==0)
	{ 
	echo" --- ";
	} else { 
	echo $getdataA[0][0]; 
	}
	?></td>
  </tr>
  <tr>
    <td>Jam</td>
    <td><div align="center">:</div></td>
    <td>
	<?
	if(count($getdataA)==0)
	{ 
	echo" --- ";
	} else { 
	echo $getdataA[0][1]; 
	}
	?></td>
  </tr>
  <tr>
    <td>No Rekening </td>
    <td><div align="center">:</div></td>
    <td>
	<?
	if(count($getdataA)==0)
	{ 
	echo" --- ";
	} else { 
	echo $getdataA[0][2]; 
	}
	?>
	</td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><label><a href="main.php?page=8&id=<?=$id;?>"> <input name="cancel" type="submit" class="button" id="cancel" value="Kembali" /></a>
    </label></td>
  </tr>
</table>
</form>

</div>

