<p align="center"><b>
Pendaftaran Calon Mahasiswa UNIVERSITAS SUKSES Yogyakarta<br />
Tahun Akademik: 2010/2011</b>
</p>
<p><br />
	  Nama Lengkap * :<br/><input name="nama" /><br/>
	  Nomor Identitas (KTP/SIM/Paspor) *:<br/><input name="id"/><br/>
      Jenis Kelamin * : <br/>
	  <select name="jenis">
	  		<option value="0">- Pilih Menu -</option>
<?php
$db = mysql_connect($host,$user,$pass);
mysql_select_db($database,$db) or die ("Query 1 failed");

$data = mysql_query("SELECT j_id, j_nama from jenis order by j_id") or die(mysql_error());
	$rows = mysql_num_rows($data); 
	while ($line = mysql_fetch_object($data)) 
		{
			print"<option value=\"$line->j_id\">$line->j_nama</option>";
		}
?>
	  </select><br/>
      Agama * :<br/>
      <select name="agama">
	  		<option value="0">- Pilih Agama -</option>
<?php
$db = mysql_connect($host,$user,$pass);
mysql_select_db($database,$db) or die ("Query 1 failed");

$data = mysql_query("SELECT a_id, a_nama from agama order by a_id") or die(mysql_error());
	$rows = mysql_num_rows($data); 
	while ($line = mysql_fetch_object($data)) 
		{
			print"<option value=\"$line->a_id\">$line->a_nama</option>";
		}
?>
	  </select><br/>
      Asal Sekolah * :<br/>
      <input name="asal"/><br/>
	  Jurusan SMU * :<br/>
      <select name="jurusan">
	  		<option value="0">- Jurusan SMU -</option>
<?php
$db = mysql_connect($host,$user,$pass);
mysql_select_db($database,$db) or die ("Query 1 failed");

$data = mysql_query("SELECT js_id, js_nama from jurusan_smu order by js_id") or die(mysql_error());
	$rows = mysql_num_rows($data); 
	while ($line = mysql_fetch_object($data)) 
		{
			print"<option value=\"$line->js_id\">$line->js_nama</option>";
		}
?>
	  </select><br/>
	  Rata-rata NEM * :<br/><input name="nem" size="4" maxlength="4" />
	  [contoh 8.55]<br/>
      Alamat :<br/><input name="alamat" size="15" /> <br/>
	  Kewarganegaraan * : <br/>
	  <select name="warga">
	  		<option value="0">- Pilih -</option>
<?php
$db = mysql_connect($host,$user,$pass);
mysql_select_db($database,$db) or die ("Query 1 failed");

$data = mysql_query("SELECT w_id, w_nama from warga order by w_id") or die(mysql_error());
	$rows = mysql_num_rows($data); 
	while ($line = mysql_fetch_object($data)) 
		{
			print"<option value=\"$line->w_id\">$line->w_nama</option>";
		}
?>
	  </select><br/>
	  Kabupaten * :<br/>
	  <select name="kabupaten">
	  		<option value="0">- Pilih Kabupaten -</option>
<?php
$p = $_POST['propinsi'];
$db = mysql_connect($host,$user,$pass);
mysql_select_db($database,$db) or die ("Query 1 failed");

$data = mysql_query("SELECT k_id, k_nama from kabupaten where pr_id=$p order by k_nama") or die(mysql_error());
	$rows = mysql_num_rows($data); 
	while ($line = mysql_fetch_object($data)) 
		{
			print"<option value=\"$line->k_id\">$line->k_nama</option>";
		}
?>
	  </select><br/>
	  Kode Pos * :<br/><input name="kode" maxlength="6" size="4"/><br/>
	  Telepon * :<br/><input name="tlp"/><br/>
	  Email * :<br/><input name="email"/><br/>
	  Pilihan 1 * : <br/>
	  <select name="pil1">
	  		<option value="0">- Pilihan 1 -</option>
<?php
$db = mysql_connect($host,$user,$pass);
mysql_select_db($database,$db) or die ("Query 1 failed");

$data = mysql_query("SELECT ju_id, ju_nama from jurusan order by ju_id") or die(mysql_error());
	$rows = mysql_num_rows($data); 
	while ($line = mysql_fetch_object($data)) 
		{
			print"<option value=\"$line->ju_id\">$line->ju_nama</option>";
		}
?>
	  </select><br/>
	  Pilihan 2 * : <br/>
	  <select name="pil2">
	  		<option value="0">- Pilihan 2 -</option>
<?php
$db = mysql_connect($host,$user,$pass);
mysql_select_db($database,$db) or die ("Query 1 failed");

$data = mysql_query("SELECT ju_id, ju_nama from jurusan order by ju_id") or die(mysql_error());
	$rows = mysql_num_rows($data); 
	while ($line = mysql_fetch_object($data)) 
		{
			print"<option value=\"$line->ju_id\">$line->ju_nama</option>";
		}
?>
	  </select><br/>
	  Info pertama kali dari * : <br/>
	  <select name="info">
	  		<option value="0">- Pilih -</option>
<?php
$db = mysql_connect($host,$user,$pass);
mysql_select_db($database,$db) or die ("Query 1 failed");

$data = mysql_query("SELECT i_id, i_nama from info order by i_id") or die(mysql_error());
	$rows = mysql_num_rows($data); 
	while ($line = mysql_fetch_object($data)) 
		{
			print"<option value=\"$line->i_id\">$line->i_nama</option>";
		}
?>
	  </select><br/>
	  Catatan :<br/>
	   • Form bertanda * harus diisi.<br/>
</p>
<p align="center">
<anchor>daftar<?php print "<go href=\"main.php?page=4\" method=\"post\">";?>
<postfield name="nama" value="$(nama)"/> 
<postfield name="id" value="$(id)"/> 
<postfield name="jenis" value="$(jenis)"/>
<postfield name="agama" value="$(agama)"/>
<postfield name="asal"  value="$(asal)"/>
<postfield name="jurusan" value="$(jurusan)"/> 
<postfield name="nem" value="$(nem)"/>
<postfield name="alamat" value="$(alamat)"/>
<postfield name="warga" value="$(warga)"/> 
<postfield name="propinsi" value="$(propinsi)"/>  
<postfield name="kabupaten" value="$(kabupaten)"/> 
<postfield name="kode" value="$(kode)"/> 
<postfield name="tlp" value="$(tlp)"/> 
<postfield name="email" value="$(email)"/> 
<postfield name="pil1" value="$(pil1)"/> 
<postfield name="pil2" value="$(pil2)"/> 
<postfield name="info" value="$(info)"/> 
</go></anchor><br/>
</p></small>
