<?php 

$ID =$_GET['hapus'];
$sql = "DELETE FROM jadwal WHERE id_jadwal = '$ID'";

$qry = mysql_query($sql);
if($qry){
	//echo "Data berhasil dihapus";
	echo "<script>document.location='homepage.php?p=riwayat_jadwal'</script>";
	}
	else 
	echo "Gagal Menghapus";
?>