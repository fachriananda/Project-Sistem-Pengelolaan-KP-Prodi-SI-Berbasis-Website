<?php 
include "../config/koneksi.php";

$ID =$_GET['hapus'];
$sql = "DELETE FROM surat_keputusan WHERE id_surat = '$ID'";

$qry = mysql_query($sql);
if($qry){
	//echo "Data berhasil dihapus";
	echo "<script>document.location='?p=cetak_laporan'</script>";
	}
	else 
	echo "Gagal Menghapus";
?>