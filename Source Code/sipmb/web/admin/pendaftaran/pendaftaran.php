<?php

$mysql = new Mysql();
$mysql->connect();

if($mysql->execute("select a_id, a_nama from agama order by a_id")){
	$dataA = $mysql->getDataSet();
}
if($mysql->execute("select js_id, js_nama from jurusan_smu order by js_id")){
	$dataJS= $mysql->getDataSet();
}
if($mysql->execute("select ju_id, ju_nama from jurusan order by ju_id")){
	$dataJU = $mysql->getDataSet();
}
if($mysql->execute("select i_id, i_nama from info order by i_id")){
	$dataI = $mysql->getDataSet();
}
if($mysql->execute("select g_id from pmb_config")){
	$dataPMB = $mysql->getDataSet();
}

if(isset($_POST['daftar'])){
$gelombang=$dataPMB[0][0];
$nama = $_POST['nama'];
$k_id = $_POST['k_id'];
$no_id = $_POST['no_id'];
$jk = $_POST['jk'];
$agama = $_POST['agama'];
$sekolah = $_POST['sekolah'];
$jurusan = $_POST['jurusan'];
$nem1 = $_POST['nem1'];
$nem2 = $_POST['nem2'];
$alamat = $_POST['alamat'];
$warga = $_POST['warga'];
$kodepos = $_POST['kodepos'];
$telepon = $_POST['telepon'];
$email = $_POST['email'];
$pilihan1 = $_POST['pilihan1'];
$pilihan2 = $_POST['pilihan2'];
$info = $_POST['info'];
$tempat = $_POST['tempat'];
$nem2=$nem2*0.01;
$nem1=$nem1+$nem2;

if($mysql->execute("select b_id, b_nama, b_max, b_min from beasiswa"))
{
	$dataB = $mysql->getDataSet();
}
for($i=0;$i<count($dataB);$i++){
$max=$dataB[$i][2];
$min=$dataB[$i][3];
if(($nem1>=$min) && ($nem1<=$max)){
$beasiswa=$dataB[$i][0];
}
}


		if($mysql->execute("INSERT INTO pendaftaran (p_tgl, p_nama, p_no_id, j_id, a_id, p_asal, js_id, p_nem, p_alamat, w_id, p_kodepos, p_tlp, p_email, ju_id, ju_id2, i_id, t_id, b_id, g_id, k_id) values (NOW(), '$nama', '$no_id', '$jk', '$agama', '$sekolah', '$jurusan', '$nem1', '$alamat', '$warga', '$kodepos', '$telepon', '$email', '$pilihan1', '$pilihan2', '$info', '$tempat', '$beasiswa', '$gelombang', '$k_id')"))
		{
			echo"<div style=\"font-size:14px;color:red\">bisa disimpan</div>";
			echo"<meta http-equiv='refresh' content='1;URL=main.php?page=11'>";
		} else {
			$error = "<div style=\"font-size:14px;color:red\">tidak bisa disimpan</div>";
		}

} else {
?>
<html>
<head>
<script type="text/javascript" src="jquery/jquery-1.2.3.pack.js"></script>
<script type="text/javascript" src="jquery/jquery.validate.pack.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$("#pendaftaran").validate({
			messages: {
			email: {
				required: "E-mail harus diisi",
				email: "Masukkan E-mail yang valid"
			}
		},
		errorPlacement: function(error, element) {
			error.appendTo(element.parent("td"));
		}
		});
})
</script>
  <script language="javascript">
   /*
   		fungsi loadData akan meng-handle semua request tipe data
   		baik pulau, propinsi atau kabupaten/kota. 
   		parameter kedua dari fungsi ini untuk mengirimkan id dari data parent.
   		contoh: apabila type=propinsi maka parentId digunakan untuk mengambil semua propinsi
   			    dengan id pulau = parentId
   */
   function loadData(type,parentId){
	  // berikan kondisi sedang loading data ketika proses pengambilan data
	  $('#loading').text('Loading '+type.replace('_','/')+' data...');
      $.post('load_data.php', // request ke file load_data.php
		{data_type: type, parent_id: parentId},
		function(data){
		  if(data.error == undefined){ // jika respon error tidak terdefinisi maka pengambilan data sukses 
			 $('#combobox_'+type).empty(); // kosongkan dahulu combobox yang ingin diisi datanya
			 $('#combobox_'+type).append('<option>-Pilih data-</option>'); // buat pilihan awal pada combobox
			 for(var x=0;x<data.length;x++){
				// berikut adalah cara singkat untuk menambahkan element option pada tag <select>
			 	$('#combobox_'+type).append($('<option></option>').val(data[x].id).text(data[x].nama));
			 }
			 $('#loading').text(''); // hilangkan text loading
		  }else{
			 alert(data.error); // jika ada respon error tampilkan alert
		  }
		},'json' // format respon yang diterima langsung di convert menjadi JSON 
      );      
   }
   $(function(){
	   // pertama kali halaman di-load, maka ambil seluruh data pulau 
	   loadData('propinsi',0); 

	   // fungsi yang dipanggil ketika isi dari combobox propinsi dipilih 
	   $('#combobox_propinsi').change(
			function(){
				// apabila nilai pilihan tidak kosong, load data kabupaten/kota
				if($('#combobox_propinsi option:selected').val() != '')
					loadData('kabupaten_kota',$('#combobox_propinsi option:selected').val());
			}
	   );
   });
  </script>

<style type="text/css">
h4 { font-size: 18px; }
input { padding: 3px; border: 1px solid #999; }
input.error, select.error { border: 1px solid red; }
label.error { color:red; margin-left: 10px; }
</style>
</head>
<body>
<form id="pendaftaran" method="post" action="">
<table cellspacing="0" cellpadding="2" align="center">
  <tr>
    <td colspan="3"><div align="center"><strong>Pendaftaran Calon Mahasiswa Nama Kampus Anda</strong></div></td>
  </tr>
  <tr>
    <td colspan="3"><div align="center"><strong>Tahun Akademik: 2010/2011</strong></div></td>
  </tr>
  <tr>
    <td width="186">&nbsp;</td>
    <td width="6">&nbsp;</td>
    <td width="462">&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Nama Lengkap </strong> <span class="style1">*</span></td>
    <td><strong>:</strong></td>
    <td><input name="nama" class="required" title="Nama harus disi" size="50" maxlength="50" type="text"></td>
  </tr>
  <tr>
    <td><strong>Nomor Identitas </strong> <span class="style1">*</span>    <br />(KTP/SIM/Paspor) </td>
    <td><strong>:</strong></td>
    <td><input name="no_id" class="required" title="No Identitas harus diisi" size="50" maxlength="50" type="text"></td>
  </tr>
  <tr>
    <td><strong>Jenis Kelamin </strong> <span class="style1">*</span></td>
    <td><strong>:</strong></td>
    <td><input name="jk" value="1" class="required" title="Jenis Kelamin harus diisi" type="radio" />Pria
		<input name="jk" value="2" type="radio">Wanita</td>
  </tr>
  <tr>
    <td><strong>Agama <span class="style1">*</span></strong></td>
    <td><strong>:</strong></td>
    <td>
	<select size="1" name="agama" class="required" title="Agama harus diisi">
      <option selected="selected" value="">--Pilih Agama--</option>
	   <? for($i=0;$i<count($dataA);$i++){ ?>
      <option value="<?=$dataA[$i][0];?>"><?=$dataA[$i][1];?></option>
	  <? } ?>
    </select>
	</td>
  </tr>
  <tr>
    <td height="25"><strong>Asal Sekolah </strong><span class="style1">*</span></td>
    <td><strong>:</strong></td>
    <td><input name="sekolah" class="required" title="Masukkan Nama Sekolah Asal" size="50" maxlength="50" type="text"></td>
  </tr>
  <tr>
    <td><strong>Jurusan SMU </strong><span class="style1">*</span></td>
    <td><strong>:</strong></td>
    <td><select size="1" name="jurusan" class="required" title="Jurusan SMU harus diisi">
      <option selected="selected" value="">Pilih Salah Satu </option>
	  <? for($i=0;$i<count($dataJS);$i++){ ?>
      <option value="<?=$dataJS[$i][0];?>"><?=$dataJS[$i][1];?></option>
	  <? } ?>
    </select></td>
  </tr>
  <tr>
    <td><strong>Rata-rata NEM </strong><span class="style1">*</span></td>
    <td><strong>:</strong></td>
    <td><input name="nem1" id="nem1" value="0" size="2" maxlength="1" class="required" title="NEM harus diisi" type="text">
      ,
      <input name="nem2" id="nem2" value="00" size="2" maxlength="2" type="text">
        <!--<input name="nem" type="text" onKeyPress="cekAngka(this.value)" size="6" maxlength="4">    (Jika belum memiliki nem, isilah nem dengan angka 0,gunakan . sebagai pemisah,cth : 7.43)--></td>
  </tr>
  <tr valign="top">
    <td><strong>Alamat </strong><span class="style1">*</span></td>
    <td><strong>:</strong></td>
    <td><textarea name="alamat" cols="50" rows="3" class="required" title="Alamat harus diisi"></textarea>    </td>
  </tr>
  <!--nambah opsi kewarganegaraan :: icang ::2010 -->
  <tr>
    <td><strong>Kewarganegaraan </strong><span class="style1">*</span></td>
    <td><strong>:</strong></td>
    <td><input name="warga" value="1" checked="checked" type="radio" class="required" title="Kewarganegaraan harus diisi">
      WNI&nbsp;
      <input name="warga" value="2" type="radio">
      WNA</td>
  </tr>
  <!-- end nambah opsi kewarganegaraan :: icang ::2010 -->
  <tr>
    <td><strong>Propinsi </strong><span class="style1">*</span></td>
    <td><strong>:</strong></td>
    <td><select id="combobox_propinsi"></select></td>
  </tr>
  <tr>
    <td><strong>Kabupaten</strong><span class="style1">*</span></td>
    <td>&nbsp;</td>
    <td><select id="combobox_kabupaten_kota" name="k_id" ></select></td>
  </tr>
  <tr>
    <td><strong>Kode Pos</strong></td>
    <td><strong>:</strong></td>
    <td><input name="kodepos" class="required" title="Kode Pos harus diisi" size="6" maxlength="6" type="text"></td>
  </tr>
  <tr>
    <td><strong>Telepon </strong> </td>
    <td><strong>:</strong></td>
    <td><input name="telepon" size="30" maxlength="50" class="required" title="No Telpon harus diisi" type="text"></td>
  </tr>
  <tr>
    <td><strong>E-mail</strong> </td>
    <td><strong>:</strong></td>
    <td><input name="email" id="email" size="50" class="required" title="Alamat Email harus diisi" maxlength="50" type="text"></td>
  </tr>
  <tr>
    <td><strong>Pilihan 1 </strong><span class="style1">*</span></td>
    <td><strong>:</strong></td>
    <td><select size="1" name="pilihan1" class="required" title="Pilihan Jurusan pertama harus diisi">
      <option selected="selected" value="">Pilih Salah Satu</option>
	   <? for($i=0;$i<count($dataJU);$i++){ ?>
      <option value="<?=$dataJU[$i][0];?>"><?=$dataJU[$i][1];?></option>
	  <? } ?>
    </select>    </td>
  </tr>
  <tr>
    <td><strong>Pilihan 2 </strong></td>
    <td><strong>:</strong></td>
    <td><select size="1" name="pilihan2" class="required" title="Pilihan Jurusan kedua harus diisi">
      <option selected="selected" value="">Pilih Salah Satu</option>
      <? for($i=0;$i<count($dataJU);$i++){ ?>
      <option value="<?=$dataJU[$i][0];?>"><?=$dataJU[$i][1];?></option>
	  <? } ?>
    </select>    </td>
  </tr>
  <tr>
    <td valign="top"><strong>Informasi Pertama Kali dari</strong></td>
    <td valign="top"><strong>:</strong></td>
    <td valign="top"><table width="99%" border="0" cellpadding="0" cellspacing="0">
      <tbody>
        <tr>
          <td><label>
            <input name="info" value="1" type="radio" class="required" title="Masukkan asal info">
            Internet</label></td>
          <td><label>
            <input name="info" value="3" type="radio">
            Brosur / Koran</label></td>
        </tr>
        <tr>
          <td><label>
            <input name="info" value="2" type="radio">
            TV / Radio</label></td>
          <td><label>
            <input name="info" value="4" type="radio">
            Teman / Saudara / Guru</label></td>
        </tr>
      </tbody>
    </table>
        <label>
        <input name="info" value="5" checked="checked" type="radio">
          Lainnya </label></td>
  </tr>
  <tr>
    <td><strong>Tempat Pendaftaran </strong> </td>
    <td><strong>:</strong></td>
    <td><em><strong>Via Offline</strong></em>
        <input name="tempat" value="2" type="hidden"></td>
  </tr>
  <tr>
    <td valign="top" height="12"></td>
    <td valign="top" height="12"></td>
    <td valign="top" height="12"></td>
  </tr>
  <tr>
    <td colspan="3" valign="top"><table width="100%" border="0" cellpadding="2" cellspacing="1">
      <tbody>
        <tr>
          <td width="50%">Catatan : <br>
            &nbsp;&nbsp;&nbsp;&bull;&nbsp;Form bertanda <span class="style1">*</span> harus diisi.<br>
            &nbsp;&nbsp;&nbsp;&bull;&nbsp;Tag HTML tidak diijinkan. </td>
          <td width="50%" align="center"><label>
          
          </label>
          <input value="Daftar" name="daftar" type="submit">
                <input value="Batal" name="reset" type="reset"></td>
        </tr>
      </tbody>
    </table></td>
  </tr>
</table>
</form>
</body>
</html>
<? } ?>