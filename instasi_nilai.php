<?php include '../config/koneksi.php'; 




$ID = $_SESSION['username'];
$sql = mysql_query("SELECT * FROM admin = '$ID'");
$data = mysql_fetch_array($sql);

$sql2 = mysql_query("SELECT * FROM mahasiswa");
$data2 = mysql_fetch_array($sql);


?>
    
  
<section class="content-header">      
    <h1>Input Nilai KP Mhs dari instasi  </h1>
    <ol class="breadcrumb">
        <li><a href="homepage.php?p=dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Input Nilai KP Mhs dari instasi</li>
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
                                                echo "<option value='$s[nama_lengkap]','$s[nim]'selected>Nama Mahasiswa : $s[nama_lengkap] , NIM : $s[nim]  </option>";
   
                                              
                                            }
                                            else {
                                                echo "<option value='$s[nama_lengkap]','$s[nim]'> Nama Mahasiswa : $s[nama_lengkap] , NIM : $s[nim] </option>";
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
                                        $qsp = mysql_query("SELECT * FROM mahasiswa");
                                        while ($s=mysql_fetch_array($qsp)) {
                                            if ($s[nim]==$data[nim]){
                                                echo "<option value='$s[nim]' selected>$s[nim]</option>";
   
                                              
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
<label for="nama_supervisor">Nama Supervsior</label>
<input type="text" class="form-control" id="nama_supervisor" name="nama_supervisor" required>
</div>     
                                   
               
      
<div class="form-group">
<label for="nilai1">Nilai1</label>
<input type="text" class="form-control" id="nilai1" name="nilai1" required>
</div>                        
                                
<div class="form-group">
<label for="nilai2">Nilai2</label>
<input type="text" class="form-control" id="nilai2" name="nilai2" required>
</div>  

<div class="form-group">
<label for="nilai3">Nilai3</label>
<input type="text" class="form-control" id="nilai3" name="nilai3" required>
</div>                        
                                
<div class="form-group">
<label for="nilai4">Nilai4</label>
<input type="text" class="form-control" id="nilai4" name="nilai4" required>
</div>                     

<div class="form-group">
<label for="nilai5">Nilai5</label>
<input type="text" class="form-control" id="nilai5" name="nilai5" required>
</div>                        
                                
<div class="form-group">
<label for="nilai6">Nilai6</label>
<input type="text" class="form-control" id="nilai6" name="nilai6" required>
</div>       
                        
<div class="form-group">
<label for="nilai7">Nilai7</label>
<input type="text" class="form-control" id="nilai7" name="nilai7" required>
</div>       

<div class="form-group">
<label for="nilai8">Rata-rata Nilai</label>
<input type="text" class="form-control" id="nilai8" name="nilai8" required>
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
$nama_supervisor= trim($_POST['nama_supervisor']);


$nilai8= trim($_POST['nilai8']);
$nilai7= trim($_POST['nilai7']);

$nilai6= trim($_POST['nilai6']);
$nilai5= trim($_POST['nilai5']);

$nilai4= trim($_POST['nilai4']);
$nilai3= trim($_POST['nilai3']);


$nilai2= trim($_POST['nilai2']);
$nilai1= trim($_POST['nilai1']);




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
                                echo "<script language='javascript'>alert('Ukuran file terlalu besar');document.location='homepage.php?p=instasi_nilai';</script>";
                            } else if ($ukuran_file < $size) {
                                $q = mysql_query("INSERT INTO instasi_nilai (nama_mhs,nim,nilai1,nilai2,nilai3,nilai4,nilai5,nilai6,nilai7,nilai8,nama_supervisor,file) VALUES ('$nama_mhs','$nim','$nilai1','$nilai2','$nilai3','$nilai4','$nilai5','$nilai6','$nilai7','$nilai8','$nama_supervisor','$nama_file')");
                                if (mysql_affected_rows($connect) > 0) {
                                    echo "<script language='javascript'>alert('Laporan Anda Berhasil Diajukan');document.location='homepage.php?p=instasi_nilai';</script>";
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

