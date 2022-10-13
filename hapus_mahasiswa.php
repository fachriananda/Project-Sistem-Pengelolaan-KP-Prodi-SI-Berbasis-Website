<?php 
include "../config/koneksi.php";

$ID =$_GET['hapus'];
$sql = "DELETE FROM mahasiswa WHERE nim = '$ID'";

$qry = mysql_query($sql);
if($qry){
	//echo "Data berhasil dihapus";
	echo "<script>document.location='?p=data_mahasiswa'</script>";
	}
	else 
	echo "Gagal Menghapus";
?>