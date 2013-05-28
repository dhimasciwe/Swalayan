<?php 

$db = mysql_connect($host,$user,$pass);
mysql_select_db($database,$db) or die ("Query 1 failed");

$cari_id = $_GET['id'];

$data = mysql_query("SELECT a.p_id, a.p_tgl, a.p_nama, a.p_nem, a.ju_id, a.ju_id2, j.s_nama, k.g_nama FROM pendaftaran a, syarat j, gelombang k where a.s_id=j.s_id and a.g_id=k.g_id and a.p_id='$cari_id' order by a.p_id") or die(mysql_error());
$rows = mysql_num_rows($data); 
	$rows = mysql_num_rows($data); 

?>
<p align="center"><b>
Data Pendaftar Calon Mahasiswa Nama Kampus Anda<br />
Tahun Akademik: 2010/2011</b>
</p>

<p>

<?php

		while ($line = mysql_fetch_object($data)) 
		{
			print "<p align=\"center\"><br/><a href=\"main.php?page=16&id=$line->p_id\">Jika data dibawah sesuai, lakukan Konfirmasi Pembayaran disini</a></p>";
			print "<table columns=\"2\">";
			print "<tr>";
			print "<td>No Pendaftaran</td>";
			print "<td>";
			print "$line->p_id";
			print "</td></tr>";
			print "<tr>"; 
			print "<td>Tanggal Pendaftaran</td>";
			print "<td>";
			print "$line->p_tgl";
			print "</td></tr>";
			print "<tr>"; 
			print "<td>Nama</td>";
			print "<td>";
			print "$line->p_nama";
			print "</td></tr>";
			print "<td>NEM</td>";
			print "<td>";
			print "$line->p_nem";
			print "</td></tr>";
			print "<tr>"; 
			print "<td>Pilihan-1</td>";
			print "<td>";
			$ju1=$line->ju_id;
			$data1 = mysql_query("Select ju_nama from jurusan where ju_id=$ju1") or die(mysql_error());
			$rows1 = mysql_num_rows($data1); 
			while ($line1 = mysql_fetch_object($data1)) 
			{
			print "$line1->ju_nama";
			}
			print "</td></tr>";
			
			print "<tr>"; 
			print "<td>Pilihan-2</td>";
			print "<td>";
			$ju2=$line->ju_id2;
			$data2 = mysql_query("Select ju_nama from jurusan where ju_id=$ju2") or die(mysql_error());
			$rows2 = mysql_num_rows($data2); 
			while ($line2 = mysql_fetch_object($data2)) 
			{
			print "$line2->ju_nama";
			}
			print "</td></tr>";
			
			print "<tr>"; 
			print "<td>Syarat</td>";
			print "<td>";
			print "$line->s_nama";
			print "</td></tr>";
			print "<tr>"; 
			print "<td>Gelombang</td>";
			print "<td>";
			print "$line->g_nama";
			print "</td></tr>";
			print "</table>";
			print "<br/>";
		}
mysql_close();
?>

</p>
