<p align="center"><b>
Pendaftaran Calon Mahasiswa Nama Kampus Anda<br />
Tahun Akademik: 2010/2011</b>
</p>
<p align="center"><br /><small>
<?php
include('../inc/config.inc.php');
$db = mysql_connect($host,$user,$pass);
mysql_select_db($database,$db) or die ("Query 1 failed");

$id = $_GET['id'];
$tgl = $_POST['tgl'];
$jam = $_POST['jam'];
$no_rek = $_POST['no_rek'];

		if(empty($tgl)){
					print "<p>Tolong masukkan data&nbsp;<b><i>tanggal transfer !!</i></b</p>";
		} else if (empty($jam)){
					print "<p>Tolong masukkan data&nbsp;<b><i>jam transfer !!</i></b</p>";
		} else if (empty($no_rek)){
					print "<p>Tolong masukkan data&nbsp;<b><i>no rekening anda !!</i></b</p>";
		} else {
					
				
		$sql="UPDATE pendaftaran set ko_tgl='$tgl', ko_jam='$jam', ko_no_rek='$no_rek' where p_id='$id'";

				mysql_query($sql, $db) or die ("Query 3 failed");
				print "<p>Terimakasih&nbsp;<b>".$continue."</b>&nbsp;anda telah melakukan konfirmasi pembayaran pendaftaran calon mahasiswa/i di Nama Kampus Anda.  Admin kami akan segera mengecek pembayaran Anda<br/></p>";

		}
?>
</small></p>
<?php include('footer.php'); ?>