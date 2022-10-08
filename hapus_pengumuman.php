<?php 
include "../config/koneksi.php";

$ID =$_GET['hapus'];
$sql = "DELETE FROM pengumuman WHERE id_pengumuman = '$ID'";

$qry = mysql_query($sql);
if($qry){
	//echo "Data berhasil dihapus";
	echo "<script>document.location='?p=pengumuman'</script>";
	}
	else 
	echo "Gagal Menghapus";
?>