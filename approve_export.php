<?php
if (isset($_POST[simpan])) {
                            {
                                $q = mysql_query("UPDATE pengajuan set status_export =3");
                                    if($q){
                                    echo "<script language='javascript'>alert('Berhasil Approve');document.location='homepage.php?p=persetujuan_kpterima';</script>";
                                    }
                                    else{
                                    echo "<script language='javascript'>alert('Gagal Approve');document.location='homepage.php?p=persetujuan_kpterima';</script>"; 
                                    }
                            }
                        }
