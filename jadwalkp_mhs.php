<?php include '../config/koneksi.php'; 




$ID = $_SESSION['username'];
$sql = mysql_query("SELECT * FROM admin = '$ID'");
$data = mysql_fetch_array($sql);

$sql2 = mysql_query("SELECT * FROM mahasiswa");
$data2 = mysql_fetch_array($sql);


?>
    
  
<section class="content-header">      
    <h1> Penjadwalan jadwal KP Mahasiswa  </h1>
    <ol class="breadcrumb">
        <li><a href="homepage.php?p=dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Penjadwalan Jadwal KP Mahasiswa</li>
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
                    <form role="form" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                      
                    <div class="form-group">
                                <label for="nama_mhs">Pilih Nama Mahasiswa</label>
                                <select class="form-control" name="nama_mhs" id="nama_mhs" required>
                                    <option value="">Pilih Mahasiswa </option>
                                    <?php
                                        $qsp = mysql_query("SELECT * FROM pengajuan");
                                        while ($s=mysql_fetch_array($qsp)) {
                                            if ($s[nama_lengkap]==$data[nama_mhs]){
                                                echo "<option value='$s[nama_lengkap]','$s[nim]','$s[pembimbing1]' selected>Nama Mahasiswa : $s[nama_lengkap] , NIM : $s[nim],Dosen Pembimbing : $s[pembimbing1]</option>";
   
                                              
                                            }
                                            else {
                                                echo "<option value='$s[nama_lengkap]','$s[nim]','$s[pembimbing1]'> Nama Mahasiswa : $s[nama_lengkap] , NIM : $s[nim] , Dosen Pembimbing : $s[pembimbing1] </option>";
                                            }
                                        }
                                    ?>
                            </div>

                            </select>
                            </div>
                            <div class="form-group">
                                <label for="nim">Pilih NIM dari Mahasiswa</label>
                                <select class="form-control" name="nim" id="nim" required>
                                    <option value="">Pilih NIM </option>
                                    <?php
                                        $qsp = mysql_query("SELECT * FROM pengajuan");
                                        while ($s=mysql_fetch_array($qsp)) {
                                            if ($s[nim]==$data[nim]){
                                                echo "<option value='$s[nim]' selected>Nama Mahasiswa : $s[nim]</option>";
   
                                              
                                            }
                                            else {
                                                echo "<option value='$s[nim]' >  $s[nim]  </option>";
                                            }
                                        }
                                    ?>
                            </div>
                            </select>
                            </div>
      
                            <div class="form-group">
                                <label for="pembimbing1">Nama Dosen Pembimbing</label>
                               
                                <select class="form-control" name="pembimbing1" id="pembimbing1" required>
                                    <option value="">Pilih Dosen Pembimbing</option>
                                    <?php
                                        $qsp = mysql_query("SELECT * FROM pengajuan");
                                        while ($s=mysql_fetch_array($qsp)) {
                                            if ($s[pembimbing1]==$data[pembimbing1]){
                                                echo "<option value='$s[pembimbing1]' selected>$s[pembimbing1]</option>";
                                              
                                            }
                                            else {
                                                echo "<option value='$s[pembimbing1]'>$s[pembimbing1]</option>";
                                            }
                                        }
                                    ?>
                            </div>
                            </select>
                            </div>
                                   
               
      
                               
                                

                            <div class="form-group">
<label for="tanggal">Tanggal Mulai Jadwal Seminar</label>
<input type="date" class="form-control" id="tanggal" name="tanggal" required>
</div>
<div class="form-group">
<label for="tanggal1">Tanggal Berakhir Jadwal Seminar</label>
<input type="date" class="form-control" id="tanggal1" name="tanggal1" required>
</div>

                        

                        
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                                <a class="btn btn-primary" href="homepage.php?p=jadwalkp_mhs1"><i class="fa fa-mail-reply"></i> Batal </a>
                            </div>
                    </form>
              
                           <?php
                     
$nama_mhs= trim($_POST['nama_mhs']);
$nim= trim($_POST['nim']);
$pembimbing1= trim($_POST['pembimbing1']);


$tanggal1= trim($_POST['tanggal1']);
$tanggal= trim($_POST['tanggal']);

                    // $jenis_laporan= ucwords($_POST['jenis_laporan']);
                    // $lokasi_file    = $_FILES['fupload']['tmp_name'];
                    // $nama_file      = $_FILES['fupload']['name'];
                    // move_uploaded_file($lokasi_file,"file/$nama_file");
                    // $status = "New";
                    $lokasi_file    = $_FILES['fupload']['tmp_name'];
                    $nama_file      = $_FILES['fupload']['name'];
                    $ukuran_file    = $_FILES['fupload']['size'];
                    $ekstensi_diperbolehkan    = '';
                    $x = explode('.', $nama_file);
                    $ekstensi = strtolower(end($x));
                    move_uploaded_file($lokasi_file, "file/$nama_file");

                    // 10MB
                    $size = 10000000;
                    // $status = trim ($_POST['status']);
                    // $status = 'Baru';

                    if (isset($_POST['simpan'])) {
                        if ($ekstensi != $ekstensi_diperbolehkan) {
                            echo "<script>alert('Nama Ekstensi Tidak Diperbolehkan');</script>";
                        } elseif ($ekstensi == $ekstensi_diperbolehkan) {
                            if ($ukuran_file > $size) {
                                echo "<script language='javascript'>alert('Ukuran file terlalu besar');document.location='homepage.php?p=jadwalkp_mhs1';</script>";
                            } else if ($ukuran_file < $size) {
                                $q = mysql_query("INSERT INTO jadwalkp_mhs (nama_mhs,nim,pembimbing1,tanggal,tanggal1,file) VALUES ('$nama_mhs','$nim','$pembimbing1','$tanggal','$tanggal1','$nama_file')");
                                if (mysql_affected_rows($connect) > 0) {
                                    echo "<script language='javascript'>alert('Laporan Anda Berhasil Diajukan');document.location='homepage.php?p=jadwalkp_mhs1';</script>";
                                } else {
                                    // echo "<script language='javascript'>alert('Laporan Anda Gagal Diajukan');document.location='homepage.php?p=bimbingan_kp';</script>";
                                    echo mysql_error($connect);
                                }
                            }
                        }
                    }

                    ?>   
                 
                </div>
            </div>
        </div>
    </div>
<!-- /.row (main row) -->
</section>    

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="../bower_components/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script>
    // $('.datepicker').datepicker();
    // $('.datepicker').on('changeDate', function(ev){
    //     $(this).datepicker('hide');
    // });
    $('.datepicker').datepicker({
        format: 'dd-mm-yyyy'
    });
</script>

