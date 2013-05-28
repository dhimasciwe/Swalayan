<?php 
header("Content-type: text/vnd.wap.wml\n");
echo("<?xml version=\"1.0\"?>\n");
echo("<!DOCTYPE wml PUBLIC \"-//WAPFORUM//DTD WML 1.1//EN\" \"http://www.wapforum.org/DTD/wml_1.1.xml\">\n");
?>
<wml>
<card title=".:: Nama Kampus Anda ::.">
<?php
include('../inc/config.inc.php');include('../inc/func.inc.php');
?>
<small>
<p align="left">
		<?php
		$page = $_GET['page'];
		if(!isset($page) || $page==0 ){
			echo"<meta http-equiv='refresh' content='0;URL=index.php'>";
		} else if($page==1){
			include('infoprodi.php');
		} else if($page==2){
			include('infobiaya.php');
		} else if($page==3){
			include('pendaftaran.php');
		} else if($page==4){
			include('post.php');
		}else if($page==5){
			include('data_pendaftar.php');
		}else if($page==6){
			include('cari_pendaftar.php');
		}else if($page==7){
			include('hasil_pendaftar.php');
		}else if($page==8){
			include('detail_pendaftar.php');
		}else if($page==9){
			include('data_kelulusan.php');
		}else if($page==10){
			include('cari_kelulusan.php');
		}else if($page==11){
			include('hasil_kelulusan.php');
		}else if($page==12){
			include('jadwal.php');
		}else if($page==13){
			include('cari_konfirmasi.php');
		}else if($page==14){
			include('hasil_konfirmasi.php');
		}else if($page==15){
			include('detail_konfirmasi.php');
		}else if($page==16){
			include('konfirmasi.php');
		}else if($page==17){
			include('post_konfirmasi.php');
		}else if($page==18){
			include('pendaftaran2.php');
		}
			
		?>
</p>  
</small>
<?php include('footer.php'); ?>
</card>
</wml>