<?php
    include "mysql.php";
    $server = "localhost";
    $user = "root"; 
    $password = ""; 
    $database = "dbunaki";
    
    // $server = "localhost";
    // $user = "id17415990_satudua"; 
    // $password = "<Password123>"; 
    // $database = "id17415990_dbunaki";

    // $server = "localhost";
    // $user = "c1skripsi"; 
    // $password = "LdTd9@A7vh"; 
    // $database = "c1skripsidb1";

    // Connect Ke Mysql
    $connect = mysql_connect($server,$user,$password) or die ("Koneksi Mysql Gagal");
    mysql_select_db($database,$connect) or die ("Pilih Database Gagal");
?>