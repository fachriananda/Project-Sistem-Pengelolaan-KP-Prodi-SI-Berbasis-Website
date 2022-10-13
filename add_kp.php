<?php include '../config/koneksi.php'; ?>

<section class="content-header">      
    <h1> Tambah Kerja Praktek</h1>
    <ol class="breadcrumb">
        <li><a href="homepage.php?p=dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Tambah Kerja Praktek</li>
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
                                <label>NIM</label>
                                <input type="text" class="form-control" id="nim" placeholder="223120001" name="nim" required>
                            </div>
                            <!-- form nama lengkap-->
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama" placeholder="masukkan nama" name="nama" required>
                            </div>
                            <!-- form judul-->
                            <div class="form-group">
                                <label>Judul</label>
                                <textarea class="form-control" name="judul" rows="3" placeholder="Tuliskan Judul"  required><?php echo "$judul";?></textarea>
                                <p class="help-block">*Judul tidak boleh ada singkatan</p>
                            </div>
                            <!-- form pembimbing1-->
                            <div class="form-group">
                                <label>Dosen Pembimbing</label>
                                <select class="form-control" name="dosbing1" required>
                                <option selected>Pilih Dosen Pembimbing</option>
                                   <?php
                                        $qsp = mysql_query("SELECT * FROM dosen");
                                        while ($s=mysql_fetch_array($qsp)) {
                                            if ($s[nama_lengkap]==$data[pembimbing_1]){
                                                echo "<option value='$s[nama_lengkap]' selected>$s[nama_lengkap]</option>";
                                            } else {
                                                echo "<option value='$s[nama_lengkap]'>$s[nama_lengkap]</option>";
                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                            <!-- form program studi-->
                            <div class="form-group">
                                <label>Program Studi</label>
                                <select class="form-control" name="prodi" required>
                                <option selected>Pilih Program Studi</option>
                                    <?php
                                        $qsp = mysql_query("SELECT * FROM prodi");
                                        while ($s=mysql_fetch_array($qsp)) {
                                            if ($s[pnama]==$data[program_studi]){
                                                echo "<option value='$s[pnama]' selected>$s[pnama]</option>";
                                            } else {
                                                echo "<option value='$s[pnama]'>$s[pnama]</option>";
                                            }
                                        }
                                    ?>
                                </select>
                            </div><!-- form semester-->
                            <div class="form-group">
                                <label>Semester</label>
                                <div class="radio" name="semester" required>
                                    <p><label><input type="radio" name="semester" value="ganjil">Ganjil</label></p>
                                    <p><label><input type="radio" name="semester" value="genap">Genap</label></p>
                                </div>
                            </div>
                            <!-- form ajaran-->
                            <div class="form-group">
                                <label>Tahun Ajaran</label>
                                <input type="text" class="form-control" id="ajaran" placeholder="2017/2018" name="ajaran" required>
                                <p class="help-block">*Contoh : 2018/2019</p>
                            </div> 
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" name="simpan" class="btn btn-primary"><i class="fa fa-check"></i> simpan</button>
                        <a class="btn btn-primary" href="homepage.php?p=data_kp"><i class="fa fa-mail-reply"></i> batal </a>
                    </div>
                    </form>
                    <?php
                    $x1 = trim ($_POST['nim']);
                    $x2 = trim ($_POST['nama']);
                    $x3 = trim ($_POST['judul']);
                    $x4 = trim ($_POST['dosbing1']);
                    $x5 = trim ($_POST['prodi']);
                    $x6 = trim ($_POST['semester']);
                    $x7 = trim ($_POST['ajaran']);
                    if (isset($_POST[simpan])) {   
                        $q = mysql_query("INSERT INTO tblkp (nim,nama,judul,pembimbing_1,program_studi,tahun_ajaran,semester)
                            VALUES ('$x1','$x2','$x3','$x4','$x5','$x6','$x7')");
                            if($q){
                                echo "<script language='javascript'>alert('Data Berhasil Ditambahkan');document.location='homepage.php?p=data_kp';</script>";
                            }
                            else{
                            echo "<script language='javascript'>alert('Data Gagal Ditambahkan');document.location='homepage.php?p=add_kp';</script>"; 
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
<!-- /.row (main row) -->
</section> 