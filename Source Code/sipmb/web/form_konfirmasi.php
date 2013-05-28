<?
// script memanggil class mysql dan membuat objek mysql baru
require_once('inc/class.mysql.php');
$mysql = new Mysql();
$mysql->connect();

// script untuk menjalankan query setelah nilai id dimasukkan ke $id
$id = $_GET['id'];
if($mysql->execute("SELECT a.p_id, a.p_nama, a.p_nem, a.ju_id, a.ju_id2, k.g_nama FROM pendaftaran a, gelombang k where a.g_id=k.g_id and a.p_id='$id' order by a.p_id")){
	$data = $mysql->getDataSet();
}

// script untuk mengambil nilai inputan yang berasal dari form
if(isset($_POST['konfirm'])){
$tgl = $_POST['tgl'];
$jam = $_POST['jam'];
$rek = $_POST['rek'];
$pd = $data[0][0];

		// script validasi form
		if(empty($tgl)){
		echo"<Script>alert('Tolong inputkan tanggal transfer');window.history.go(-1)</script>";
					exit;
		} else if (empty($jam)){
					echo"<Script>alert('Tolong inputkan jam transfer');window.history.go(-1)</script>";
					exit;
		} else if (empty($rek)){
					echo"<Script>alert('Tolong inputkan nomor rekening');window.history.go(-1)</script>";
					exit;
		} else {

// script untuk menjalankan query insert data
if($mysql->execute("INSERT INTO konfirmasi (ko_id, ko_tgl, ko_jam, ko_no_rek) values ('$pd', '$tgl', '$jam', '$rek')"))
		{
			echo"<center>Konfirmasi anda telah kami terima, pantau terus untuk informasi pendaftaran di web ini.";
			echo"<meta http-equiv='refresh' content='2;URL=main.php?page=10'>";
			exit;
		} 
}

}
?>

<html>
<head>

<title>Untitled Document</title>
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
</style>
</head>

<body>

<table width="720" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td width="50%" height="30" align="center" valign="middle"><strong>Form Konfirmasi Pembayaran</strong><br />
      <strong>Tahun Akademik        2010/2011 </strong></td>
  </tr>
  <tr>
  <td>&nbsp;</td>
  </tr>
  <tr>
    <td valign="top" align="center" bgcolor="#6600CC">
	
	<table width="100%" border="0" cellpadding="2" cellspacing="1">
      <tbody>
        <tr>
          <td align="center"><span class="style1">Form Konfirmasi </span></td>
          </tr>
        <tr bgcolor="#410481">
          <td align="center" bgcolor="#FFFFFF">
		  <form action="" method="post" enctype="multipart/form-data" id="formpost">
		    <table width="408" border="0">
            <tr>
              <td>No Pendftaran </td>
              <td><div align="center">:</div></td>
              <td><?=$data[0][0];?></td>
            </tr>
            <tr>
              <td width="115">Nama</td>
              <td width="10"><div align="center">:</div></td>
              <td width="269"><?=$data[0][1];?></td>
            </tr>
            <tr>
              <td>Nem</td>
              <td><div align="center">:</div></td>
              <td><?=$data[0][2];?></td>
            </tr>
            <tr>
              <td>Gelombang</td>
              <td><div align="center">:</div></td>
              <td><?=$data[0][5];?></td>
            </tr>
            <tr>
              <td>Pilihan 1 </td>
              <td><div align="center">:</div></td>
              <td><?
				$ju1=$data[0][3];
				if($mysql->execute("SELECT ju_nama from jurusan where ju_id=$ju1")){
				$dataJU1 = $mysql->getDataSet();} 
			?>
                <?=$dataJU1[0][0];?></td>
            </tr>
            <tr>
              <td>Pilihan 2 </td>
              <td><div align="center">:</div></td>
              <td><?
				$ju1=$data[0][4];
				if($mysql->execute("SELECT ju_nama from jurusan where ju_id=$ju1")){
				$dataJU2 = $mysql->getDataSet();} 
			?>
                <?=$dataJU2[0][0];?></td>
            </tr>
            <tr>
              <td>Tanggal</td>
              <td><div align="center">:</div></td>
              <td><input type="text" name="tgl" size="10"  maxlength="10"/> 
                * (dd/mm/yyyy) cth.(20/02/2010) </td>
            </tr>
            <tr>
              <td>Jam</td>
              <td><div align="center">:</div></td>
              <td><input type="text" name="jam" size="5" maxlength="5" /> 
                cth. 14:00 </td>
            </tr>
            <tr>
              <td>No Rekening </td>
              <td><div align="center">:</div></td>
              <td><input type="text" name="rek" size="35" /></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
			  <!-- script untuk submit form -->
              <td><input type="submit" name="konfirm" id="konfirm" value="Konfirm" />
                <a href="main.php?page=10"><input type="submit" value="Batal" /></a></td>
            </tr>
          </table>
		  </form></td>
          </tr>
      </tbody>
    </table></td>
  </tr>
</table>
</body>
</html>
