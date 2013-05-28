<?
session_start();
// script ambil nilai t dan id
$t=(int)addslashes($_GET['t']);
$id=(int)addslashes($_GET['id']);
// script mengecek variabel session loginadmin
if(!isset($_SESSION['loginadmin'])) {
	echo"<Script>alert('Anda harus login dengan admin bersangkutan');window.history.go(-1)</script>";
	exit();
}

$mysql = new Mysql();
$mysql->connect();
// script untuk mengambil nilai status kemudian menyimpan ke variabel $status		
if(isset($_POST['edit'])){
	$status = $_POST['status'];
	$jurusan = $_POST['jurusan'];
		// query update nilai status dalam tabel pendaftaran
		if($mysql->execute("Update pendaftaran set st_id='$status', ju_fix='$jurusan' where p_id=$id")){
			echo"<meta http-equiv='refresh' content='1;URL=main.php?page=6&t=$t'>";
		} else {
			$error = "<div style=\"font-size:14px;color:red\">Data Admin tidak bisa disimpan</div>";
		}
	
}
// query select data pendaftaran
	if($mysql->execute("select a.st_id, b.st_nama, a.ju_id, a.ju_id2 from pendaftaran a, status b where a.st_id=b.st_id and a.p_id='".$id."'")){
		$dataadmin = $mysql->getDataSet();
	} else {
		$dataadmin = 0;
	}

// jika data ketemu, maka masukkan nilai ke variabel baru 
if($dataadmin!=0){
$ju_id1=$dataadmin[0][2];
$ju_id2=$dataadmin[0][3];
// query select data status
if($mysql->execute("select st_id, st_nama from status order by st_id")){
	$datastatus = $mysql->getDataSet();
}
// query select data jurusan
if($mysql->execute("select ju_id, ju_nama from jurusan where ju_id=$ju_id1 or ju_id=$ju_id2 order by ju_id")){
	$datajurusan = $mysql->getDataSet();
}
?>
<div class="post">
<h2 class="title">Ubah Status [ Tes Tertulis]</h2>
<p class="byline">
<?
echo $error;
?>
Selamat datang <?=$nama?>, anda login sebagai <?=$status?>
<br />ini form untuk mengubah status tes.
</p>
<center>
<table width="100%" border="0" cellspacing="2" >
  <tr>
    <td><form action="" method="post" enctype="multipart/form-data" id="formpost">
      
      <table width="100%" border="0">
        <tr>
          <td>Status</td>
          <td><div align="center">:</div></td>
          <td>
		  <!-- script membuat pilihan status tes -->
		  	<select name="status" > 
			
            <option value="<?=$dataadmin[0][0]?>">- <?=$dataadmin[0][1]?> -</option>
			<?
			if($t==1){
			for($i=0;$i<2;$i++){
				$status=$datastatus[$i][0];
			 ?>
			 <option value="<?=$datastatus[$i][0]?>"><?=$datastatus[$i][1]?></option>
			<?
			}	
			
			?>
          </select></td>
        </tr>        
        <tr>
          <td>Di terima di </td>
          <td><div align="center">:</div></td>
          <td>
		  <!-- script membuat pilihan status tes -->
		  <select name="jurusan" >
              <option value="">- Pilih -</option>
              <?
	  		for($i=0;$i<count($datajurusan);$i++){		 
				$status=$datajurusan[$i][0];
			?>
              <option value="<?=$datajurusan[$i][0]?>"><?=$datajurusan[$i][1]?>
              </option>
              <?
			}
			}
			?>
          </select>
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
          <td><div align="left">
            <input name="edit" type="submit" class="button" id="edit" value="Ubah" />
            <a href="main.php?page=1" style="text-decoration:none">
              <input name="button" type="button" value="Cancel" />
            </a> </div></td>
        </tr>
      </table>
      <br />
    </form></td>
  </tr>
</table>
</center>
<?

} else {
	echo "tidak ada data yang akan diedit";
}
?>
</div>