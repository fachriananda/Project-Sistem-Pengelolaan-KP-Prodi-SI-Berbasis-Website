<?php include '../config/koneksi.php'; ?>

<?php 
    $ID =$_GET['ubah'];
    $sql = mysql_query("SELECT * FROM surat_keputusan WHERE id_surat = '$ID'");
    $data=mysql_fetch_array($sql);

    $sk=$data['no_sk'];
    $kode=$data['fsop'];
    $prodi=$data['program_studi'];
?>

<section class="content-header">      
    <h1> Edit Surat Keputusan</h1>
    <ol class="breadcrumb">
        <li><a href="homepage.php?p=dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Surat Keputusan</li>
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
                            <!-- form NIM-->
                            <div class="form-group">
                                <label>No. Surat Keputusan</label>
                                <input type="text" class="form-control" id="sk" placeholder="055/SK/DEK/FTI/UNAKI/II/2019" name="sk" value="<?php echo "$sk";?>" required>
                            </div>
                            <!-- form fsop-->
                            <div class="form-group">
                                <label>Kode FSOP</label>
                                <input type="text" class="form-control" id="kode" placeholder="04-02-02/E.01R2" name="kode" value="<?php echo "$kode";?>" required>
                            </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" name="simpan" class="btn btn-primary"><i class="fa fa-check"></i> simpan</button>
                        <a class="btn btn-primary" href="homepage.php?p=cetak_laporan"><i class="fa fa-mail-reply"></i> batal </a>
                    </div>
                    </form>
                    <?php
                        $x1 = trim ($_POST['sk']);
                        $x2 = trim ($_POST['kode']);
                        $tgls = date('Y-m-d');
                            
                        if (isset($_POST[simpan])) {
                            $q = mysql_query("UPDATE surat_keputusan set no_sk='$x1',fsop='$x2',tanggal='$tgls' WHERE id_surat='$ID'");
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