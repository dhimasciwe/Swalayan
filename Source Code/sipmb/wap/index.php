<?php 
header("Content-type: text/vnd.wap.wml\n");
echo("<?xml version=\"1.0\"?>\n");
echo("<!DOCTYPE wml PUBLIC \"-//WAPFORUM//DTD WML 1.1//EN\" \"http://www.wapforum.org/DTD/wml_1.1.xml\">\n");
?>
<wml>
<card title=".:: MENU UTAMA ::." newcontext="true">
    
<p align="center">
	<small><big><b>SELAMAT DATANG</big><br/>
	Di SI PMB "Nama Kampus Anda"</b><br/>
	==========================<br/></small>
</p>
<p align="left">
<br/>
  + <a href="main.php?page=1">Info Program Studi</a><br/>
  + <a href="main.php?page=2">Info Biaya Kuliah</a><br/>
  + <a href="main.php?page=3">Pendaftaran</a><br/>
  + <a href="main.php?page=5">Data Pendaftar</a><br/>
  + <a href="main.php?page=9">Data Kelulusan</a><br/>
  + <a href="main.php?page=12">Jadwal Kegiatan</a><br/>
  + <a href="main.php?page=13">Konfirmasi Pembayaran</a><br/>
</p>  
<?php include('footer.php'); ?>
</small>
</card>
</wml>