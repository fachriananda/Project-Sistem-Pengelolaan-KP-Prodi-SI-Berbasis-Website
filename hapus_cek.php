<?php 
include "../config/koneksi.php";

$ID =$_GET['hapus'];
$sql = "DELETE FROM jadwal WHERE id_jadwal = '$ID'";

$qry = mysql_query($sql);
if($qry){
	//echo "Data berhasil dihapus";
	echo "<script>document.location='?p=cek_jadwal'</script>";
	}
	else 
	echo "Gagal Menghapus";
?>