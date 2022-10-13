<?php include '../config/koneksi.php';


 


$ID =$_GET['hapus'];
$sql = "DELETE FROM seminar WHERE id = '$ID'";

$qry = mysql_query($sql);
if($qry){
	//echo "Data berhasil dihapus";
	echo "<script>document.location='?p=index11'</script>";
	}
	else 
	echo "Gagal Menghapus";
?>