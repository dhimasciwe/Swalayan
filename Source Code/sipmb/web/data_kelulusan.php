<?
require_once('inc/class.mysql.php');
$mysql = new Mysql();
$mysql->connect();

// script untuk menjalankan query jika mhs telah menginputkan karakter di form
if(isset($_POST['cari'])){
$cari_nama = $_POST['cari_nama'];
if($mysql->execute("SELECT a.p_id, a.p_nama, a.ju_fix FROM pendaftaran a where ((a.p_nama LIKE '%$cari_nama%') or a.p_id='$cari_nama') order by a.p_id")){
	$data = $mysql->getDataSet();
}
} else
// script untuk menjalankan query menampilkan semua data mahasiswa yang lulus
{
if($mysql->execute("SELECT a.p_id, a.p_nama, a.ju_fix FROM pendaftaran a where (a.st_id=1 or a.st_id=2 or a.st_id=3) order by a.p_id")){
	$data = $mysql->getDataSet();
}
}
?>

<html>
<head>

<title>Untitled Document</title>
</head>

<body>

<table cellspacing="0" cellpadding="0" width="720" align="center">
  <tr>
    <td width="100%" align="center"><strong>Hasil Test Tertulis dan Wawancara
      <br />
    Tahun Akademik 2010/2011</strong></td>
  </tr>
  <tr>
    <td align="center"><em>Pencarian Data Kelulusan
      (Masukkan nama atau nomor pendaftaran)
      </em>
      <form action="" method="post" enctype="multipart/form-data" id="formpost">
        <table border="0" cellpadding="2" cellspacing="0">
          <tbody>
            <tr>
              <td><strong>Pencarian</strong></td>
              <td><input name="cari_nama" size="40" type="text" />
                  <input name="cari" value="Cari..." type="submit" /></td>
            </tr>
          </tbody>
        </table>
    </form></td>
  </tr>
  <tr>
    <td align="center"></td>
  </tr>
  <tr>
    <td align="center" bgcolor="#6600CC">
	<table width="100%" border="0" cellpadding="2" cellspacing="1">
      <tbody>
        <tr>
          <td width="40" align="center" bgcolor="#6600FF"><strong>No.</strong></td>
          <td width="82" align="center" bgcolor="#6600FF"><strong>No. Daftar</strong></td>
          <td width="251" align="center" bgcolor="#6600FF"><strong>Nama</strong></td>
          <td width="171" align="center" bgcolor="#6600FF"><strong>Diterima di </strong></td>
        </tr>
		<!-- script untuk menampilkan data dalam bentuk array -->
        <? for($i=0;$i<count($data);$i++){ ?>
        <tr bgcolor="#FFFFFF">
          <td align="center"><?=$i+1;?>.</td>
          <td align="center"><?=$data[$i][0];?></td>
          <td align="left"><?=$data[$i][1];?></td>
          <td align="center">
		  <!-- script untuk menampilkan pilihan jurusan -->
			<?
				$ju1=$data[$i][2];
				if($mysql->execute("SELECT ju_nama from jurusan where ju_id=$ju1")){
				$dataJU1 = $mysql->getDataSet();} 
			?>
			<?=$dataJU1[0][0];?>		  </td>
        </tr>
<? } ?>
      </tbody>
    </table>  </td>
  </tr>
</table>

</body>
</html>
