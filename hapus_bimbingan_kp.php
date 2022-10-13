<?php 
include "../config/koneksi.php";

$ID =$_GET['hapus'];
$sql = "DELETE FROM bimbingankp WHERE id_bimbingan = '$ID'";

$qry = mysql_query($sql);
if($qry){
	//echo "Data berhasil dihapus";
	echo "<script>document.location='?p=bimbingan_kp'</script>";
	}
	else 
	echo "Gagal Menghapus";
?>