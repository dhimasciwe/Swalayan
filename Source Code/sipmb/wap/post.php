<p align="center"><b>
Pendaftaran Calon Mahasiswa Nama Kampus Anda<br />
Tahun Akademik: 2010/2011</b>
</p>
<p align="center"><br /><small>
<?php
$db = mysql_connect($host,$user,$pass);
mysql_select_db($database,$db) or die ("Query 1 failed");

if (isset($_GET['type']) == "post")
{
$nama = $_POST['nama'];
$id = $_POST['id'];
$jenis = $_POST['jenis'];
$agama = $_POST['agama'];
$asal = $_POST['asal'];
$jurusan = $_POST['jurusan'];
$nem = $_POST['nem'];
$alamat = $_POST['alamat'];
$warga = $_POST['warga'];
$propinsi = $_POST['propinsi'];
$kabupaten = $_POST['kabupaten'];
$kode = $_POST['kode'];
$tlp = $_POST['tlp'];
$email = $_POST['email'];
$pil1 = $_POST['pil1'];
$pil2 = $_POST['pil2'];
$info = $_POST['info'];

		if(empty($nama)){
					print "<p>Tolong masukkan data&nbsp;<b><i>nama !!</i></b</p>";
		} else if (empty($id)){
					print "<p>Tolong masukkan data&nbsp;<b><i>nomor id !!</i></b</p>";
					print "<a href=\"pendaftaran.php?nama=$nama&amp\">Ulangi</a>";
		} else if (empty($jenis)){
					print "<p>Tolong masukkan data&nbsp;<b><i>gender anda !!</i></b</p>";
		} else if (empty($agama)){
					print "<p>Tolong masukkan data&nbsp;<b><i>agama anda !!</i></b</p>";
		} else if (empty($asal)){
					print "<p>Tolong masukkan data&nbsp;<b><i>asal sekolah anda !!</i></b</p>";
		} else if (empty($jurusan)){
					print "<p>Tolong masukkan data&nbsp;<b><i>jurusan smu anda !!</i></b</p>";
		} else if (empty($nem)){
					print "<p>Tolong masukkan data&nbsp;<b><i>nem anda !!</i></b</p>";
		} else if (empty($alamat)){
					print "<p>Tolong masukkan data&nbsp;<b><i>alamat anda !!</i></b</p>";
		} else if (empty($warga)){
					print "<p>Tolong masukkan data&nbsp;<b><i>kewarganegaraan anda !!</i></b</p>";
		} else if (empty($kabupaten)){
					print "<p>Tolong masukkan data&nbsp;<b><i>kabupaten anda berasal !!</i></b</p>";
		} else if (empty($pil1)){
					print "<p>Tolong masukkan data&nbsp;<b><i>pilihan jurusan pertama anda !!</i></b</p>";
		} else if (empty($pil2)){
					print "<p>Tolong masukkan data&nbsp;<b><i>pilihan jurusan kedua anda !!</i></b</p>";
		} else {
					
				
		$sql="INSERT INTO $table (p_nama, p_no_id, j_id, a_id, p_asal, js_id, p_nem, p_alamat, w_id, p_id, k_id, p_kodepos, p_tlp, p_email, ju_id, ju_id2, i_id, p_tgl) VALUES ('$nama', '$id', '$jenis', '$agama', '$asal', '$jurusan', '$nem', '$alamat', '$warga', '$propinsi', '$kabupaten', '$kode', '$tlp', '$email', '$pil1', '$pil2', '$info', NOW())";

				mysql_query($sql, $db) or die ("Query 3 failed");
				print "<p>Terimakasih&nbsp;<b>".$continue."</b>&nbsp;anda telah mendaftar di Nama Kampus Anda,  pantau terus informasi penerimaan mahasiswa baru<br/></p>";

		}
}
?>
</small></p>