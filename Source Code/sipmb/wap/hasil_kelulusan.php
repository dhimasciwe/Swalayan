<?php 

$db = mysql_connect($host,$user,$pass);
mysql_select_db($database,$db) or die ("Query 1 failed");

$cari_nama = $_POST['nama'];
$id = $_GET['id'];

if(!($id==0)){
$data = mysql_query("SELECT a.p_id, a.p_nama, a.ju_fix FROM pendaftaran a where ((a.p_nama LIKE '%$cari_nama%') or a.p_id='$cari_nama') and a.st_id=$id and a.st_id=l.st_id order by a.p_id") or die(mysql_error());
	$rows = mysql_num_rows($data); 
} else {
$data = mysql_query("SELECT a.p_id, a.p_nama, a.ju_fix FROM pendaftaran a where ((a.p_nama LIKE '%$cari_nama%') or a.p_id='$cari_nama') order by a.p_id") or die(mysql_error());
	$rows = mysql_num_rows($data); 
}

?>
<p align="center">
<b>Hasil Tes Tertulis dan Wawancara</b><br/>
<br />
Tahun Akademik : 2010/2011<br/>
</p>
<p>
<table columns="3">
<tr>
<td>No Pendaftaran</td>
<td>Nama</td>
<td>Diterima Di</td>
</tr>
<?php
		while ($line = mysql_fetch_object($data)) 
		{
			print "<tr>";
			print "<td>$line->p_id</td>";
			print "<td>$line->p_nama</a></td>";
			print "<td>";
			$ju2=$line->ju_fix;
			$data2 = mysql_query("Select ju_nama from jurusan where ju_id=$ju2") or die(mysql_error());
			$rows2 = mysql_num_rows($data2); 
			while ($line2 = mysql_fetch_object($data2)) 
			{
			print "$line2->ju_nama";
			}
			print "</td>";
			print "</tr>";
		}
mysql_close();
?>
</table>
</p>
