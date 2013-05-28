<?
session_start();
// script menampilkan pesan kesalahan jika ada orang yang belum login
if(!isset($_SESSION['loginadmin'])){
	echo"<Script>alert('Anda belum login');window.history.go(-1)</script>";
	exit();
}
// script mengecek status orang yang login
if($_SESSION['status']>2){
	echo"<Script>alert('Anda harus login sebagai administrator');window.history.go(-1)</script>";
	exit();
}
$mysql = new Mysql();
$mysql->connect();

// script untuk menghapus admin
if($_GET['delete']==1){
	$a_id= (int) addslashes($_GET['a_id']);
	$mysql->execute("delete from admin where ad_id=$a_id");
}

// script menampilkan daftar administrator
if(($_SESSION['status']==1) or ($_SESSION['status']==2))
{
	if($mysql->execute("select a.ad_id, a.ad_nama, a.ad_alamat, a.ad_tlp, a.username, b.sa_nama, a.sa_id from admin a, status_admin b where a.sa_id=b.sa_id order by a.sa_id "))
	{
		$getdataA = $mysql->getDataSet();
	}else{
		$getdataA=0;
	}
}

?>

<div class="post">
    <h2 class="title">List Admin</h2>
    <p class="byline">

	Selamat datang &quot;<?=$nama;?>&quot;, anda login sebagai &quot;<?=$status;?>&quot;<br />
  &gt;&gt; Berikut ini adalah List Admin yang ada di web ini. </p>

    <table width="100%" border="0" cellspacing="0" bgcolor="#999999">
  <tr>
    <td><table width="100%" border="0" cellspacing="1" cellpadding="2" >
      <tr>
        <td bgcolor="#CCCCCC" ><div align="center"><strong>No</strong></div></td>
		<td bgcolor="#CCCCCC" ><div align="center"><strong>Nama</strong></div></td>
		<td bgcolor="#CCCCCC" ><div align="center"><strong>Alamat</strong></div></td>
		<td bgcolor="#CCCCCC" ><div align="center"><strong>Telp</strong></div></td>
		<td bgcolor="#CCCCCC" ><div align="center"><strong>Username</strong></div></td>
		<td bgcolor="#CCCCCC" ><div align="center"><strong>Status</strong></div></td>
		<td bgcolor="#CCCCCC" ><div align="center"><strong>Action</strong></div></td>
      </tr>
	  <!-- script looping for -->
	  <?
	  for($i=0;$i<count($getdataA);$i++){
	  ?>
	  <!-- menampilkan data dalam bentuk array -->
      <tr style="background:url(../images/background2.gif)">
        <td align="left" valign="top" background="images/background2.gif" bgcolor="#FFFFFF"><?=$i+1;?></td>
        <td align="left" valign="top" background="images/background2.gif" bgcolor="#FFFFFF"><?=$getdataA[$i][1];?></td>
		<td align="left" valign="top" background="images/background2.gif" bgcolor="#FFFFFF"><?=$getdataA[$i][2];?></td>
		<td align="left" valign="top" background="images/background2.gif" bgcolor="#FFFFFF"><?=$getdataA[$i][3];?></td>
		<td align="left" valign="top" background="images/background2.gif" bgcolor="#FFFFFF"><?=$getdataA[$i][4];?></td>
		<td align="left" valign="top" background="images/background2.gif" bgcolor="#FFFFFF"><?=$getdataA[$i][5];?></td>
		<!-- script membuat link edit -->
		<td background="images/background2.gif" bgcolor="#FFFFFF" ><div align="center"><a href="main.php?page=2&a_id=<?=$getdataA[$i][0];?>&s_id=<?=$getdataA[$i][6];?>"> 
		<img src="images/edit.png" border="0" title="edit"></a>
		<!-- script membuat link delete -->  
		<a href="main.php?page=1&delete=1&a_id=<?=$getdataA[$i][0];?>">   
		<? if(($_SESSION['status']==1) && ($getdataA[$i][6]>1)){ ?> <img src="images/hapus.png" border="0" title="hapus"></a></div> <?   } ?></td>
      </tr>
	  <?
	  }
	  ?>
    </table></td>
  </tr>
</table>
<br />
      <!-- script untuk membuat link tambah admin -->
      <a href="main.php?page=5" style="text-decoration:none" >
      <? if($_SESSION['status']==1){ ?> <input name="button" type="button" value="Tambah Admin"/><? } ?>
      </a>
    <p align="right">&nbsp;</p>
</div>

