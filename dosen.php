<?php
    include "../config/koneksi.php";
    
    $qsp = mysql_query("SELECT * FROM dosen");
    while ($s=mysql_fetch_array($qsp)) {
        if ($s[nidn]==$data[pembimbing1]){
            echo "<option value='$s[nidn]' <selected>$s[nama_lengkap]</option>";
        }
    }
?>