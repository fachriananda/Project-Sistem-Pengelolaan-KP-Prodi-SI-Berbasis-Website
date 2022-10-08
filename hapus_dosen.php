<?php 
include "../config/koneksi.php";

$ID =$_GET['hapus'];
$sql = "DELETE FROM dosen WHERE nidn = '$ID'";

$qry = mysql_query($sql);
if($qry){
	//echo "Data berhasil dihapus";
	echo "<script>document.location='?p=data_dosen'</script>";
	}
	else 
	echo "Gagal Menghapus";
?>