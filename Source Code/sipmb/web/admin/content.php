<table border="0" cellpadding="0" cellspacing="0" width="100%" bgcolor="#FFFFFF">
  <tr>
    <td background="images/h1.png" width="5" height="35" style="background-repeat:no-repeat;b">&nbsp;</td>
    <td background="images/h2.png" height="35" style="background-repeat:repeat-x;" align="left" width="99%"><strong><center>.: Halaman Konfigurasi :.</center></strong></td>
    <td background="images/h3.png" width="10" height="35" style="background-repeat:no-repeat;">&nbsp;</td>
  </tr>
  <tr valign="top">
    <td background="images/bg1.png" width="5" style="background-repeat:repeat-y;">&nbsp;</td>
    <td bgcolor="#FFFFFF">
	<?php // script untuk mendefinisikan variable halaman
		$page = $_GET['page'];
		if(!isset($page)){
			echo "Silahkan pilih menu admin di sebelah kiri";
		} else if($page==1){
			include('admin/list.php');
		} else if($page==2){
			include('admin/edit.php');
		} else if($page==3){
			include('admin/edit_password.php');
		} else if($page==4){
			include('admin/edit_username.php');
		} else if($page==5){
			include('admin/add.php');
		}else if($page==6){
			include('pendaftaran/list.php');
		}else if($page==7){
			include('pendaftaran/cek_pendaftaran.php');
		}else if($page==8){
			include('pendaftaran/ubah_syarat.php');
		}else if($page==9){
			include('pendaftaran/ubah_status.php');
		}else if($page==10){
			include('pendaftaran/pilih_jurusan.php');
		}else if($page==11){
			include('pendaftaran/data_pendaftaran.php');
		} else if($page==12){
			include('pendaftaran/detail_pendaftaran.php');
		} else if($page==13){
			include('pendaftaran/cek_pembayaran.php');
		} else if($page==14){
			include('pendaftaran/pendaftaran.php');
		} else if($page==15){
			include('kos/edit_username.php');
		} else if($page==16){
			include('konfigurasi_pmb/list.php');
		}else if($page==17){
			include('rss/list.php');
		}else if($page==18){
			include('rss/edit.php');
		}else if($page==19){
			include('rss/add.php');
		} else if($page==20){
			include('user/list.php');
		} else if($page==21){
			include('user/edit.php');
		} else if($page==22){
			include('user/edit_password.php');
		} else if($page==23){
			include('user/edit_username.php');
		} else if($page==24){
			include('user/add.php');
		}else if($page==25){
			include('pemesanan/list.php');
		}else if($page==26){
			include('pemesanan/edit.php');
		}
			
		?></td>
    <td background="images/bg1.png" width="10" style="background-repeat:repeat-y;background-position:right;">&nbsp;</td>
  </tr>
  
</table>

