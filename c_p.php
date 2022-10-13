<?php include '../config/koneksi.php'; 




$ID = $_SESSION['username'];
$sql = mysql_query("SELECT * FROM admin = '$ID'");
$data = mysql_fetch_array($sql);

$sql2 = mysql_query("SELECT * FROM mahasiswa");
$data2 = mysql_fetch_array($sql);


?>
    
  
<section class="content-header">      
    <h1>Calon Dosen Pembimbing   </h1>
    <ol class="breadcrumb">
        <li><a href="homepage.php?p=dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Calon Dosen Pembimbing   </li>
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
                                <label for="nama_lengkap">Nama Dosen Pembimbing</label>
                               
                                <select class="form-control" name="nama_lengkap" id="nama_lengkap" required>
                                    <option value="">Pilih Dosen pembimbing</option>
                                    <?php
                                        $qsp = mysql_query("SELECT * FROM dosen");
                                        while ($s=mysql_fetch_array($qsp)) {
                                            if ($s[nama_lengkap]==$data[nama_lengkap]){
                                                echo "<option value='$s[nama_lengkap]' , '$s[nidn]'selected>$s[nama_lengkap],  NIP : $s[nidn]</option>";
                                              
                                            }
                                            else {
                                                echo "<option value='$s[nama_lengkap]','$s[nidn]' >$s[nama_lengkap],  NIP : $s[nidn] </option>";
                                            }
                                        }
                                    ?>
                            </div>
                            </select>
                            </div>  
                                
                                   
               

                            <div class="form-group">
                                <label for="nip">NIP dari Dosen Pembimbing</label>
                               
                                <select class="form-control" name="nip" id="nip" required>
                                    <option value="">Pilih NIP</option>
                                    <?php
                                        $qsp = mysql_query("SELECT * FROM dosen");
                                        while ($s=mysql_fetch_array($qsp)) {
                                            if ($s[nidn]==$data[nip]){
                                                echo "<option value='$s[nidn]' selected>$s[nidn]</option>";
                                              
                                            }
                                            else {
                                                echo "<option value='$s[nidn]'>$s[nidn]</option>";
                                            }
                                        }
                                    ?>
                            </div>
                            </select>
                            </div>  



                        
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                                <a class="btn btn-primary" href="homepage.php?p=c_p"><i class="fa fa-mail-reply"></i> Batal </a>
                            </div>
                    </form>
              
                           <?php
                     

$nip= trim($_POST['nip']);
$nama_lengkap= trim($_POST['nama_lengkap']);







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
                                echo "<script language='javascript'>alert('Ukuran file terlalu besar');document.location='homepage.php?p=c_p';</script>";
                            } else if ($ukuran_file < $size) {
                                $q = mysql_query("INSERT INTO  calon_dosenpembimbing (nama_lengkap,nip,file) VALUES ('$nama_lengkap','$nip','$nama_file')");
                                if (mysql_affected_rows($connect) > 0) {
                                    echo "<script language='javascript'>alert('Laporan Anda Berhasil Diajukan');document.location='homepage.php?p=c_p';</script>";
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

