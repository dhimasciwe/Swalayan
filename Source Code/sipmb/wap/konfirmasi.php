<?php 

$db = mysql_connect($host,$user,$pass);
mysql_select_db($database,$db) or die ("Query 1 failed");

$cari_id = $_GET['id'];
$data = mysql_query("SELECT a.p_id, a.p_nama FROM pendaftaran a where a.p_id='$cari_id' order by a.p_id") or die(mysql_error());
	$rows = mysql_num_rows($data); 

?>
<p align="center">
	<small><big><b>Halaman Konfirmasi</b></big><br/>
	Tolong masukkan form yang ada.
	</small>
</p>
<p>
<?php
while ($line = mysql_fetch_object($data)) 
		{
			print "<table columns=\"2\">";
			print "<tr>";
			print "<td>No Pendaftaran</td>";
			print "<td>";
			print "$line->p_id";
			print "</td></tr>";
			print "<tr>"; 
			print "<td>Nama</td>";
			//print "<td>:</td>";
			print "<td>";
			print "$line->p_nama";
			print "</td></tr>";
			print "</table>";
		}
?>
<br />
	<br />
	  Tanggal Transfer :<b>Format tgl adalah tahun-bulan-tgl(2010-06-20)</b><br/>
	  <input name="tgl" /><br />
	  Jam Transfer :<b>Format jam adalah 00:00:00</b><br/>
	  <input name="jam" /><br />
	  No Rekening :<br/>
	  <input name="no_rek" /><br />
	  
	<anchor>Konfirmasi !<go href="main.php?page=17&id=<?=$cari_id;?>&type=post" method="post">";?>
	<postfield name="tgl" value="$(tgl)"/>
	<postfield name="jam" value="$(jam)"/>
	<postfield name="no_rek" value="$(no_rek)"/>
	</go></anchor> 
