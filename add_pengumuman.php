<?php include '../config/koneksi.php'; ?>

<section class="content-header">      
    <h1> Tambah Pengumuman </h1>
    <ol class="breadcrumb">
        <li><a href="homepage.php?p=dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Tambah Pengumuman</li>
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
                            <!-- form pengumuman-->
                            <div class="form-group">
                                <label>Judul Pengumuman</label>
                                <input type="text" class="form-control" id="judul" placeholder="masukkan pengumuman" name="judul" required>
                            </div>
                            <!-- form file-->
                            <div class="form-group">
                                <label>File Pengumuman</label>
                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                    <div class="input-append">
                                        <div class="uneditable-input">
                                            <span class="fileupload-preview"></span>
                                        </div>
                                        <span class="btn btn-default btn-file">
                                            <span class="fileupload-exists">Change</span>
                                            <span class="fileupload-new">Select file</span>
                                            <input type="file" name="fupload" />
                                        </span>
                                        <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
                                    </div>
                                </div>
                                <p class="help-block">Ukuran gambar jangan lebih dari 1 mb</p>
                            </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" name="simpan" class="btn btn-primary"><i class="fa fa-check"></i> simpan</button>
                        <a class="btn btn-primary" href="homepage.php?p=pengumuman"><i class="fa fa-mail-reply"></i> batal </a>
                    </div>
                    </form>
                    <?php
                        $x1 = trim ($_POST['judul']);
                        $tgls = date('Y-m-d');
                        $lokasi_file    = $_FILES['fupload']['tmp_name'];
                        $nama_file      = $_FILES['fupload']['name'];
                        move_uploaded_file($lokasi_file,"file/$nama_file");
                        
                        if (isset($_POST[simpan])) {
                            $q = mysql_query("INSERT INTO pengumuman (judul,file,tgl_pengumuman)
                            VALUES ('$x1','$nama_file','$tgls')");
                            if($q){
                                echo "<script language='javascript'>alert('Data Berhasil Ditambahkan');document.location='homepage.php?p=pengumuman';</script>";
                            }
                            else{
                               echo "<script language='javascript'>alert('Data Gagal Ditambahkan');document.location='homepage.php?p=add_pengumuman';</script>"; 
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
<!-- /.row (main row) -->
</section> 