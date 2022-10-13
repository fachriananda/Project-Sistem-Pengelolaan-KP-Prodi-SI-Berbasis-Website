<?php include '../config/koneksi.php'; ?>

<section class="content-header">      
    <h1> Tambah Program Studi </h1>
    <ol class="breadcrumb">
        <li><a href="homepage.php?p=dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Tambah Program Studi</li>
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
                            <!-- form kode prodi-->
                            <div class="form-group">
                                <label>Kode Program Studi</label>
                                <input type="text" class="form-control" id="id_prodi" placeholder="masukkan kode prodi" name="id_prodi" required>
                            </div>
                            <!-- form nama prodi-->
                            <div class="form-group">
                                <label>Nama Program Studi</label>
                                <input type="text" class="form-control" id="prodi" placeholder="masukkan nama prodi" name="prodi" required>
                            </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" name="simpan" class="btn btn-primary"><i class="fa fa-check"></i> simpan</button>
                        <a class="btn btn-primary" href="homepage.php?p=prodi"><i class="fa fa-mail-reply"></i> batal </a>
                    </div>
                    </form>
                    <?php
                        $x1 = trim ($_POST['id_prodi']);
                        $x2 = trim ($_POST['prodi']);
                        
                        if (isset($_POST[simpan])) {
                            $q = mysql_query("INSERT INTO prodi (id_prodi,prodi)
                            VALUES ('$x1','$x2')");
                            if($q){
                                echo "<script language='javascript'>alert('Data Berhasil Ditambahkan');document.location='homepage.php?p=prodi';</script>";
                            }
                            else{
                               echo "<script language='javascript'>alert('Data Gagal Ditambahkan');document.location='homepage.php?p=add_prodi';</script>"; 
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
<!-- /.row (main row) -->
</section> 