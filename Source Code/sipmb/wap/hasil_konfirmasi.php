<p align="center">
<b>Konfirmasi Pembayaran</b></big><br/>
<br />
Tahun Akademik 2010/2011<br/>
</p>
<?php 

$db = mysql_connect($host,$user,$pass);
mysql_select_db($database,$db) or die ("Query 1 failed");

$cari_nama = $_POST['nama'];
if(empty($cari_nama)){
print "<p align=\"center\"><b>Anda belum input Nomor pendaftaran!</b></p>";
}
else {
$id = $_GET['id'];

if(!($id==0)){
$data = mysql_query("SELECT a.p_id, a.p_nama, a.p_asal, a.g_id FROM pendaftaran a, gelombang k where a.g_id=k.g_id and ((a.p_nama LIKE '%$cari_nama%') or a.p_id='$cari_nama') and a.g_id=$id order by a.p_id") or die(mysql_error());
	$rows = mysql_num_rows($data); 
} else {
$data = mysql_query("SELECT a.p_id, a.p_nama, a.p_asal, a.g_id FROM pendaftaran a, gelombang k where a.g_id=k.g_id and ((a.p_nama LIKE '%$cari_nama%') or a.p_id='$cari_nama') order by a.p_id") or die(mysql_error());
	$rows = mysql_num_rows($data); 
}
if(empty($rows))
{
print "<p align=\"center\"><b>Data Pendaftar Tidak Ada!</b></p>";
} else {

?>
<p align="center"><small>klik pada nama Anda untuk melakukan konfirmasi
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
			print "<td><a href=\"main.php?page=15&id=$line->p_id\">$line->p_nama</a></td>";
			print "<td>$line->p_asal</td>";
			print "</tr>";
		}
mysql_close();
?>
</table>
</p>

<?php
}
}
?>
