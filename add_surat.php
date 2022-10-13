<?php include '../config/koneksi.php'; ?>
<?php session_start(); ?>
<?php 
    $ID = $_SESSION['no_sk'];
    $sql = mysql_query("SELECT * FROM surat_keputusan WHERE no_sk = '$ID'");
    $data=mysql_fetch_array($sql);
?>

<section class="content-header">      
    <h1> Tambah Surat Keputusan </h1>
    <ol class="breadcrumb">
        <li><a href="homepage.php?p=dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Tambah Surat Keputusan</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- quick email widget -->
    <div class="box box-info">            
        <div class="box-header">
            <div class="row-fluid">
                <div class="col-md-8">
                    <!-- form start -->
                    <form method="POST" enctype="multipart/form-data">
                        <div class="box-body">
                            <!-- form nim-->
                            <div class="form-group">
                                <label>No. Surat Keputusan</label>
                                <input type="text" class="form-control" id="surat" placeholder="055/SK/DEK/FTI/UNAKI/II/2019" name="surat" required>
                            </div>
                            <!-- form fsop-->
                            <div class="form-group">
                                <label>Kode FSOP</label>
                                <input type="text" class="form-control" id="kode" placeholder="04-02-02/E.01R2" name="kode" required>
                            </div>
                            <!-- form program studi-->
                            <div class="form-group">
                                <label>Program Studi</label>
                                <select class="form-control" name="prodi" required>
                                <option selected>Pilih Program Studi</option>
                                   <?php
                                        $qsp = mysql_query("SELECT * FROM prodi");
                                        while ($s=mysql_fetch_array($qsp)) {
                                        echo "<option value='$s[pnama]'>$s[pnama]</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" name="simpan" class="btn btn-primary"><i class="fa fa-check"></i> simpan</button>
                                <a class="btn btn-primary" href="homepage.php?p=cetak_laporan"><i class="fa fa-mail-reply"></i> batal </a>
                            </div>
                        </div>
                    </form>
                    <?php
                        $x1 = trim ($_POST['surat']);
                        $x2 = trim ($_POST['prodi']);
                        $x3 = trim ($_POST['kode']);
                        $tgls = date('Y-m-d');
                            
                        if (isset($_POST[simpan])) {
                        $q = mysql_query("INSERT INTO surat_keputusan (no_sk,fsop,tanggal,program_studi) VALUES ('$x1','$x3','$tgls','$x2')");
                            if ($q){
                                echo "<script language='javascript'>alert('Surat Keputusan Berhasil Dikeluarkan');document.location='homepage.php?p=cetak_laporan';</script>";
                            } else {
                                echo "<script language='javascript'>alert('Surat Keputusan Gagal Dikeluarkan');document.location='homepage.php?p=cetak_laporan';</script>";
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
<!-- /.row (main row) -->
</section> 