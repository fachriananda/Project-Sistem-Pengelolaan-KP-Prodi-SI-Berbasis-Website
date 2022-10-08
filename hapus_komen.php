<?php 
include "../config/koneksi.php";

$ID =$_GET['hapus'];
$sql = "DELETE FROM komentar WHERE id_komentar = '$ID'";

$qry = mysql_query($sql);
if($qry){
	//echo "Data berhasil dihapus";
	echo "<script>document.location='?p=persetujuan_kpterima'</script>";
	}
	else 
	echo "Gagal Menghapus";
?>