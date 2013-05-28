<p align="center"><b>
Pendaftaran Calon Mahasiswa Nama Kampus Anda<br />
Tahun Akademik: 2010/2011</b>
</p>
<p><small>
	  Propinsi * :<br/>
	  <select name="propinsi">
	 <option value="0">- Pilih Propinsi -</option>
<?php
$db = mysql_connect($host,$user,$pass);
mysql_select_db($database,$db) or die ("Query 1 failed");

$data = mysql_query("SELECT pr_id, pr_nama from propinsi order by pr_nama") or die(mysql_error());
	$rows = mysql_num_rows($data); 
	while ($line = mysql_fetch_object($data)) 
		{
			print"<option value=\"$line->pr_id\">$line->pr_nama</option>";
		}
?>
	  </select><br/>
	  <br/>
	  Catatan :<br/>
	   • Pilih Propinsi Anda Berasal.<br/>
</small></p>
<p align="center">
<anchor>next<?php print "<go href=\"main.php?page=18\" method=\"post\">";?>
<postfield name="propinsi" value="$(propinsi)"/> 
</go></anchor><br/>
</p>
