<?php include '../config/koneksi.php'; ?>

<section class="content-header">      
    <h1> Tambah Tahun Ajaran</h1>
    <ol class="breadcrumb">
        <li><a href="homepage.php?p=dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Tambah Tahun Ajaran</li>
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

                            <!-- form tahun ajaran-->
                            <div class="form-group">
                                <label>Tahun Ajaran</label>
                                <input type="text" class="form-control" id="tahunajaran" placeholder="SEMESTER GANJIL 2017/2018" name="tahunajaran" required>
                            </div>

                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" name="tambah" class="btn btn-primary"><i class="fa fa-check"></i> tambah</button>
                                <a class="btn btn-primary" href="homepage.php?p=tahun_ajaran"><i class="fa fa-mail-reply"></i> batal </a>
                            </div>

                        </div>
                    </form>
                    <?php
                        $tahunajaran = trim($_POST['tahunajaran']);
                        $tambah = $_POST["tambah"];
                        
                        if(isset($tambah)){
                            $query = mysql_query("INSERT INTO tahunajaran (id,tahunajaran) VALUES ('','$tahunajaran')");
                            if($query){
                                echo "<script language='javascript'>document.location='homepage.php?p=tahun_ajaran';</script>";
                            }
                            else {
                                echo "<script language='javascript'>alert('Data Gagal Ditambahkan');document.location='homepage.php?p=add_tahun_ajaran';</script>";
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
<!-- /.row (main row) -->
</section> 