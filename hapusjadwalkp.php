<?php include '../config/koneksi.php';


 


$ID =$_GET['hapus'];
$sql = "DELETE FROM jadwalkp_mhs WHERE id = '$ID'";

$qry = mysql_query($sql);
if($qry){
	//echo "Data berhasil dihapus";
	echo "<script>document.location='?p=jadwalkp_mhs1'</script>";
	}
	else 
	echo "Gagal Menghapus";
?>