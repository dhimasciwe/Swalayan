<?php 
$db = mysql_connect($host,$user,$pass);
mysql_select_db($database,$db) or die ("Query 1 failed");

$cari_nama = $_POST['nama'];
$id = $_GET['id'];

$data = mysql_query("SELECT a.p_id, a.p_nama, a.p_asal, a.g_id FROM pendaftaran a, gelombang k where a.g_id=k.g_id and ((a.p_nama LIKE '%$cari_nama%') or a.p_id='$cari_nama') and a.g_id=$id order by a.p_id") or die(mysql_error());
$rows = mysql_num_rows($data); 

?>
<p align="center"><b>
Data Pendaftar Calon Mahasiswa Nama Kampus Anda<br />
Tahun Akademik: 2010/2011</b>
</p>
<p align="center">
<br />
Pencarian Data Pendaftar<br />
(Masukkan nama atau nomor pendaftaran)<br />
Pencarian
<input name="nama" /><anchor>Cari<go href="main.php?page=7&id=<?=$id;?>" method="post">;?>
	<postfield name="nama" value="$(nama)"/>
	</go></anchor></p>
<p>
<table columns="3">
<tr>
<td>No Pendaftaran</td>
<td>Nama</td>
<td>Asal Sekolah</td>
</tr>
<?php

	

		while ($line = mysql_fetch_object($data)) 
		{
			print "<tr>";
			print "<td>$line->p_id</td>";
			print "<td><a href=\"main.php?page=8&id=$line->p_id\">$line->p_nama</a></td>";
			print "<td>$line->p_asal</td>";
			print "</tr>";
		}
mysql_close();
?>
</table>
</p>
