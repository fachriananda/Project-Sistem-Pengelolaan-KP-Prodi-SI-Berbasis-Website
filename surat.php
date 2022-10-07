<?php 
    include "../config/koneksi.php";
 
    $select = "SELECT * FROM surat_keputusan";
    $query = mysql_query($select);
    
    while ($data = mysql_fetch_array($query)) {
        $id    = $data['id_surat'];  // dr tabel
        $sk    = $data['no_sk'];
        $kode  = $data['fsop'];
    }
?>