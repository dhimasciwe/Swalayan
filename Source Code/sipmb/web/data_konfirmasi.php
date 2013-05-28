<?
// script memanggil class mysql dan membuat objek mysql baru
require_once('inc/class.mysql.php');
$mysql = new Mysql();
$mysql->connect();

// script untuk menjalankan query jika mhs telah menginputkan karakter di form
if(isset($_POST['cari'])){
$cari_nama = $_POST['cari_nama'];
if($mysql->execute("SELECT a.p_id, a.p_nama, a.p_nem, a.ju_id, a.ju_id2, k.g_nama FROM pendaftaran a, gelombang k where a.g_id=k.g_id and ((a.p_nama LIKE '%$cari_nama%') or a.p_id='$cari_nama') order by a.p_id")){
	$data = $mysql->getDataSet();
}
} else 

// script untuk menjalankan query menampilkan semua data mahasiswa saat mhs meng-klik menu konfirmasi pembayaran
{
if($mysql->execute("SELECT a.p_id, a.p_nama, a.p_nem, a.ju_id, a.ju_id2, k.g_nama FROM pendaftaran a, gelombang k where a.g_id=k.g_id order by a.p_id")){
	$data = $mysql->getDataSet();
}
}
?>

<html>
<head>

<title>Untitled Document</title>
</head>

<body>
<table width="720" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td valign="middle" align="center" height="30"><strong>Form Konfirmasi </strong><br />
      <strong>Tahun Akademik        2010/2011 </strong></td>
  </tr>
  <tr>
    <td valign="middle" width="50%" align="center" height="30">
	<!-- script untuk membuat form pencarian -->
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
    </form>	</td>
  </tr>
  <tr>
    <td valign="top" align="center" bgcolor="#6600CC"><table width="100%" border="0" cellpadding="2" cellspacing="1">
      <tbody>
        <tr>
          <td width="24" align="center" bgcolor="#6600FF"><strong>No.</strong></td>
          <td width="50" align="center" bgcolor="#6600FF"><strong>No. Daftar</strong></td>
          <td width="189" align="center" bgcolor="#6600FF"><strong>Nama</strong></td>
          <td width="38" align="center" bgcolor="#6600FF"><strong>NEM</strong></td>
          <td width="76" align="center" bgcolor="#6600FF"><strong>Gelombang</strong></td>
          <td width="80" align="center" bgcolor="#6600FF"><strong>Pil-1</strong></td>
          <td width="74" align="center" bgcolor="#6600FF"><strong>Pil-2</strong></td>
          <td width="64" align="center" bgcolor="#6600FF"><strong>Action</strong></td>
          </tr>
		<!-- script untuk menampilkan data dalam bentuk array -->
        <? for($i=0;$i<count($data);$i++){ ?>
        <tr bgcolor="#FFFFFF">
          <td align="center"><?=$i+1;?>.</td>
          <td align="center"><?=$data[$i][0];?></td>
          <td align="left"><?=$data[$i][1];?></td>
          <td align="right"><?=$data[$i][2];?></td>
          <td align="center"><?=$data[$i][5];?></td>
          <td align="center">
		  <!-- script untuk menampilkan pilihan jurusan -->
			<?
				$ju1=$data[$i][3];
				if($mysql->execute("SELECT ju_nama from jurusan where ju_id=$ju1")){
				$dataJU1 = $mysql->getDataSet();} 
			?>
			<?=$dataJU1[0][0];?>		  </td>
          <td align="center">
		    <?
				$ju1=$data[$i][4];
				if($mysql->execute("SELECT ju_nama from jurusan where ju_id=$ju1")){
				$dataJU2 = $mysql->getDataSet();} 
			?>
		  <?=$dataJU2[0][0];?>		  </td>
		  <!-- script membuat link untuk menuju halaman konfirmasi -->
          <td align="center" nowrap="nowrap"><a href="main.php?page=11&id=<?=$data[$i][0];?>">konfirmasi</a></td>
          </tr>
<? } ?>
      </tbody>
    </table></td>
  </tr>
</table>
</body>
</html>
