<?php 

$db = mysql_connect($host,$user,$pass);
mysql_select_db($database,$db) or die ("Query 1 failed");

$id = $_GET['id'];

$data = mysql_query("SELECT a.p_id, a.p_nama, a.ju_fix FROM pendaftaran a, status l where a.st_id=l.st_id order by a.p_id") or die(mysql_error());
	$rows = mysql_num_rows($data); 

?>

<?php 
$id = $_GET['id'];
?>
<p align="center">
<b>Hasil Tes Tertulis dan Wawancara</b><br/>
<br />
Tahun Akademik : 2010/2011<br/>
</p>
<p align="center">Pencarian Data Kelulusan<br />
(Masukkan nama atau nomor pendaftaran)<br />
Pencarian
<input name="nama" /><anchor>Cari<go href="main.php?page=11&id=<?=$id;?>" method="post">";?>
		<postfield name="nama" value="$(nama)"/>
		</go></anchor></p>
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
			print "<tr>"; 
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
