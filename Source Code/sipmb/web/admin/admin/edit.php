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
// script mengecek status orang yang login
if($_SESSION['status']>2){
	echo"<Script>alert('Anda harus login sebagai administrator');window.history.go(-1)</script>";
	exit();
}

$mysql = new Mysql();
$mysql->connect();

// script untuk mengambil nilai inputan yang berasal dari form	
if(isset($_POST['edit'])){
	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$no_tlp = $_POST['no_tlp'];
	$pola_tlp = "^[0-9]+$";
	$id_status = $_POST['id_status'];
	
		// script untuk menampilkan pesan kesalahan dan validasi inputan
		if(empty($nama)){
		echo"<Script>alert('Tolong inputkan nama');window.history.go(-1)</script>";
					exit;
		} else if (empty($alamat)){
					echo"<Script>alert('Tolong inputkan alamat');window.history.go(-1)</script>";
					exit;
		} else if (empty($no_tlp)){
					echo"<Script>alert('Tolong inputkan No Telpon');window.history.go(-1)</script>";
					exit;
		} else if(!eregi($pola_tlp, $no_tlp)){ 
					echo"<Script>alert('Tolong isi Telpon, Harus Angka Ex. 08985176246');window.history.go(-1)</script>";
					exit;

					} else
		
		// query update data admin yg sesuai id nya
		{
		if($mysql->execute("Update admin set ad_nama='$nama', ad_alamat='$alamat', ad_tlp='$no_tlp', sa_id='$id_status' where ad_id=$a_id")){
			//echo"<div style=\"font-size:14px;color:green\">Berita bisa disimpan</div>";
			echo"<meta http-equiv='refresh' content='1;URL=main.php?page=1'>";
		} else {
			$error = "<div style=\"font-size:14px;color:red\">Data Admin tidak bisa disimpan</div>";
		}
	
		
	}
}
// query select data dari tabel admin dan status admin
	if($mysql->execute("select a.ad_id, a.ad_nama, a.ad_alamat, a.ad_tlp, a.username, b.sa_nama, a.sa_id from admin a, status_admin b where a.sa_id=b.sa_id and ad_id=$a_id")){
		$dataadmin = $mysql->getDataSet();
	} else {
		$dataadmin = 0;
	}
// script untuk menjalankan query select status admin
if($dataadmin!=0){
if($mysql->execute("select sa_id, sa_nama from status_admin order by sa_id")){
	$datastatus = $mysql->getDataSet();
}
?>
<div class="post">
<h2 class="title">Admin Konfigurasi </h2>
<p class="byline">
Selamat datang &quot;<?=$nama?>&quot;
, anda login sebagai &quot;<?=$status?>&quot;<br />
&gt;&gt; ini form untuk merubah Admin.
</p>
<center>
<table width="100%" border="0" cellspacing="2" >
  <tr>
    <td>
	<!-- script membuat form dan menampilkan data-->
	<form action="" method="post" enctype="multipart/form-data" id="formpost">
      
      <table width="100%" border="0">
        <tr>
          <td>Nama</td>
          <td><div align="center">:</div></td>
          <td ><div align="left">
            <input type="text" name="nama" value="<?=$dataadmin[0][1];?>" />
          </div></td>
        </tr>
        
        <tr valign="top">
          <td>Alamat</td>
          <td><div align="center">:</div></td>
          <td><div align="left">
            <textarea name="alamat" cols="50" rows="3" wrap="off"><?=$dataadmin[0][2];?></textarea>
          </div></td>
          </tr>
        <tr>
          <td>No Telp </td>
          <td><div align="center">:</div></td>
          <td><div align="left">
            <input name="no_tlp" type="text" value="<?=$dataadmin[0][3];?>" size="35" />
          </div></td>
        </tr>
        <tr>
          <td>Status</td>
          <td><div align="center">:</div></td>
          <td>
		  <!-- script membuat pilihan status admin -->
		  	<select name="id_status" >
            <option value="<?=$dataadmin[0][6];?>">- <?=$dataadmin[0][5];?> -</option>
			<?
			
			//looping for list menu
	  		for($i=0;$i<count($datastatus);$i++){ 
				$status=$datastatus[$i][0];
				
			//list menu sesuai tingkat status admin	
				if ($_SESSION['status'] > $status){
				
			//disable list menu
	      	?>
			<option value="<?=$datastatus[$i][0]?>" disabled="disabled"><?=$datastatus[$i][1]?></option>
			<?
			 	} else { 
				
			//view list menu status admin
			 ?>
			 <option value="<?=$datastatus[$i][0]?>"><?=$datastatus[$i][1]?></option>
			<?
			}
			}
			?>
          </select></td>
        </tr>
        <tr>
          <td>Username</td>
          <td><div align="center">:</div></td>
          <td><div align="left">
            <table width="200" border="0">
              <tr>
                <td width="94"><font color="#993300">
                  <?=$dataadmin[0][4];?>
                  </font></td>
				  <!-- script membuat link ubah username -->
                    <td width="96">&gt;&gt;&gt; <a href="main.php?page=4&a_id=<?=$dataadmin[0][0];?>&s_id=<?=$s_id;?>" style="text-decoration:none">change</a> </td>
                  </tr>
            </table>
          </div></td>
          </tr>
        <tr>
          <td>Password</td>
          <td><div align="center">:</div></td>
          <td><div align="left">
            <table width="200" border="0">
              <tr>
                <td width="94"><font color="#993300">
                  ********
                  </font></td>
				  <!-- script membuat link ubah password -->
                  <td width="96">&gt;&gt;&gt; <a href="main.php?page=3&a_id=<?=$dataadmin[0][0];?>&s_id=<?=$s_id?>" style="text-decoration:none">change</a> </td>
                </tr>
            </table>
          </div></td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td><div align="left"></div></td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td><div align="left">
		  <!-- Script membuat link button Ubah -->
            <input name="edit" type="submit" class="button" id="edit" value="Ubah" />
            <a href="main.php?page=1" style="text-decoration:none"><input name="button" type="button" value="Batal" /></a>
			</div></td>
          </tr>
      </table>
      <br />
    </form></td>
  </tr>
</table>
</center>
<?
// script pesan kesalahan jika data admin tidak ditemukan
} else {
	echo "tidak ada data yang akan diedit";
}
?>
</div>