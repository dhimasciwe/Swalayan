<?php
session_start();
$t=(int)addslashes($_GET['t']);
$id=(int)addslashes($_GET['id']);
if(!isset($_SESSION['loginadmin'])) {
	echo"<Script>alert('Anda harus login dengan admin bersangkutan');window.history.go(-1)</script>";
	exit();
}

$mysql = new Mysql();
$mysql->connect();
		
if(isset($_POST['edit'])){
	$beasiswa = $_POST['beasiswa'];
	$jurusan = $_POST['jurusan'];
		
		
		if($beasiswa==0){
		echo"<Script>alert('Tolong inputkan beasiswa');window.history.go(-1)</script>";
					exit;
		} else if (empty($jurusan)){
					echo"<Script>alert('Tolong inputkan jurusan');window.history.go(-1)</script>";
					exit;
		} else {
		if($mysql->execute("Update pendaftaran set b_id='$beasiswa', ju_fix='$jurusan' where p_id=$id")){
			//echo"<div style=\"font-size:14px;color:green\">Berita bisa disimpan</div>";
			echo"<meta http-equiv='refresh' content='1;URL=main.php?page=6&t=$t'>";
		} else {
			$error = "<div style=\"font-size:14px;color:red\">Data Admin tidak bisa disimpan</div>";
		}
		}
}
	if($mysql->execute("select a.st_id, b.st_nama, a.b_id, a.ju_id, a.ju_id2 from pendaftaran a, status b where a.st_id=b.st_id and a.p_id='".$id."'")){
		$dataadmin = $mysql->getDataSet();
	} else {
		$dataadmin = 0;
	}

 
if($dataadmin!=0){
$ju_id1=$dataadmin[0][3];
$ju_id2=$dataadmin[0][4];
if($mysql->execute("select st_id, st_nama from status order by st_id")){
	$datastatus = $mysql->getDataSet();
}
if($mysql->execute("select b_id, b_nama from beasiswa where b_id < 7 order by b_id")){
	$databeasiswa = $mysql->getDataSet();
}
if($mysql->execute("select ju_id, ju_nama from jurusan where ju_id=$ju_id1 or ju_id=$ju_id2 order by ju_id")){
	$datajurusan = $mysql->getDataSet();
}
?>
<div class="post">
<h2 class="title">Ubah Status [ Tes <? if($t==1){ ?>Tertulis<? } else { ?>Wawancara<? } ?>]</h2>
<p class="byline">
<?php

echo $error;
?>
<?
		$namaadmin=$_SESSION['namaadmin'];
		$adminstatus=$_SESSION['adminstatus'];
		$namabimbel=$_SESSION['namabimbel'];
	?>
Selamat datang
<?=$namaadmin?>
, anda login sebagai
<?=$adminstatus?>
pada
<?=$namabimbel?>
<br />ini form untuk merubah Admin.
</p>
<center>
<table width="100%" border="0" cellspacing="2" >
  <tr>
    <td><form action="" method="post" enctype="multipart/form-data" id="formpost">
      
      <table width="100%" border="0">
		<?
		$b=$dataadmin[0][2];
		if(($b==0) && ($t==2)){		
		?>
        <tr>
          <td>Beasiswa</td>
          <td><div align="center">:</div></td>
          <td><select name="beasiswa" >
            <option value="">- Pilih -</option>
            <?			
			//list menu beasiswa
			
	  		for($i=1;$i<count($databeasiswa);$i++){
						 
				$status=$databeasiswa[$i][0];
			?>
            <option value="<?=$databeasiswa[$i][0]?>"><?=$databeasiswa[$i][1]?></option>
            <?
			}
			?>
            
          </select></td>
        </tr>
		<? } ?>
		<?
		if($t==2){		
		?>
		<tr>
          <td>Di terima di </td>
          <td><div align="center">:</div></td>
          <td><select name="jurusan" >
            <option value="">- Pilih -</option>
            <?			
			//list menu beasiswa
			
	  		for($i=0;$i<count($datajurusan);$i++){
						 
				$status=$datajurusan[$i][0];
			?>
            <option value="<?=$datajurusan[$i][0]?>">
              <?=$datajurusan[$i][1]?>
              </option>
            <?
			}
			?>
          </select></td>
        </tr>
		<? } ?>
        
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td><div align="left"></div></td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td><div align="left">
            <input name="edit" type="submit" class="button" id="edit" value="Rubah" />
            <a href="main.php?page=1" style="text-decoration:none"><input name="button" type="button" value="Cancel" /></a>
			</div></td>
          </tr>
      </table>
      <br />
    </form></td>
  </tr>
</table>
</center>
<?php

} else {
	echo "tidak ada data yang akan diedit";
}
?>
</div>