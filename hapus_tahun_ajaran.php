<?php 
include "../config/koneksi.php";

$id =$_GET['hapus'];
$sql = "DELETE FROM tahunajaran WHERE id = '$id'";

$qry = mysql_query($sql);
if($qry){
	echo "<script>document.location='?p=tahun_ajaran'</script>";
	}
	else 
	echo "<script language='javascript'>alert('Data Gagak Dihapus');document.location='homepage.php?p=tahun_ajaran';</script>";
?>