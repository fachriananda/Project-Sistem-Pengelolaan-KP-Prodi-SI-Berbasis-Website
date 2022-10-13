<?php 
include "../config/koneksi.php";

$ID =$_GET['hapus'];
$sql = "DELETE FROM prodi WHERE id_prodi = '$ID'";

$qry = mysql_query($sql);
if($qry){
	//echo "Data berhasil dihapus";
	echo "<script>document.location='?p=prodi'</script>";
	}
	else 
	echo "Gagal Menghapus";
?>