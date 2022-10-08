<?php 
include "../config/koneksi.php";

$ID =$_GET['hapus'];
$sql = "DELETE FROM komentar_tolak WHERE id_komentar_tolak = '$ID'";

$qry = mysql_query($sql);
if($qry){
	//echo "Data berhasil dihapus";
	echo "<script>document.location='?p=persetujuan_kptolak'</script>";
	}
	else 
	echo "Gagal Menghapus";
?>