<?
session_start();
$hurufangka="ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
$cek=substr(str_shuffle($hurufangka),0,5);
$_SESSION['image_random_value']=md5($cek);
$gambar=imagecreate(60, 30);
$warna=imagecolorallocate($gambar, 0, 255, 255);
$warnatext=imagecolorallocate($gambar, 0, 0, 0);
imagestring($gambar, 5, 5, 8, $cek, $warnatext);
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Last-Modified:" . gmdate("D, d M Y H:i:s"). " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header('Content-type:image/jpeg');
imagejpeg($gambar);
imagedestroy($gambar);
?>