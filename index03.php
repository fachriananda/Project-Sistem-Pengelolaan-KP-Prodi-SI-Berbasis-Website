<?php include '../config/koneksi.php'; ?>
<?php session_start(); 
$ID = $_SESSION['username'];
$query4 = mysql_query("SELECT * FROM pengajuan WHERE nim = $ID AND jenis_laporan = 'kp' AND status = '1'");
$hasil4 = mysql_fetch_assoc($query4);

if (mysql_num_rows($query4) < 1) {
    echo "<script language='javascript'>alert('Halaman ini dapat diakses setelah proposal diterima');document.location='homepage.php';</script>";
}


?>

<?php
setlocale(LC_ALL, 'IND');

$ID = $_SESSION['username'];
$sql = mysql_query("SELECT * FROM mahasiswa WHERE nim = '$ID'");
$data = mysql_fetch_array($sql);

$sql2 = mysql_query("SELECT * FROM pengajuan2");
$data2 = mysql_fetch_array($sql);


?>
 
    
  
<section class="content-header">      
    <h1> Tempat Pengumpulan Akhir Laporan KP </h1>
    <ol class="breadcrumb">
        <li><a href="homepage.php?p=dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"> Tempat Pengumpulan Akhir Laporan KP</li>
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
                                <label>NIM</label>
                                <input class="form-control" name="nim" value="<?php echo $data['nim']; ?>" readonly>
                            </div>
                            <!-- form nama lengkap -->
                            <div class="form-group">
                                <label for="nama">Nama Lengkap</label>
                                <input class="form-control" name="nama_lengkap" value="<?php echo $data['nama_lengkap']; ?>" readonly>
                            </div>
                          

                            <div class="form-group">
                                <label>Jenis Kegiatan</label>
                                <div class="radio" name="jenis_laporan" required>
                                    <p><label><input type="radio" name="jenis_laporan" value="kp">Kerja Praktek</label></p>
                                   
                                </div>
                            </div>
  

                            <div class="form-group">
                                <label for="exampleInputFile">File Laporan</label>
                                <input type="file" id="exampleInputFile" name="fupload" required>
                                <p class="help-block">Format Laporan : nim_namalaporan.pdf || Size Maksimal File 10 MB</p>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                            </div>
                    </form>
              
                           <?php
                    $nim = trim($_POST['nim']);
                    $nama_lengkap = trim($_POST['nama_lengkap']);
                 $jenis_laporan=trim($_POST['jenis_laporan']);
         
          $tgl_input=date('Y-m-d');

                    // $jenis_laporan= ucwords($_POST['jenis_laporan']);
                    // $lokasi_file    = $_FILES['fupload']['tmp_name'];
                    // $nama_file      = $_FILES['fupload']['name'];
                    // move_uploaded_file($lokasi_file,"file/$nama_file");
                    // $status = "New";
                    $lokasi_file    = $_FILES['fupload']['tmp_name'];
                    $nama_file      = $_FILES['fupload']['name'];
                    $ukuran_file    = $_FILES['fupload']['size'];
                    $ekstensi_diperbolehkan    = 'pdf';
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
                                echo "<script language='javascript'>alert('Ukuran file terlalu besar');document.location='homepage.php?p=index00';</script>";
                            } else if ($ukuran_file < $size) {
                                $q = mysql_query("INSERT INTO pengajuan4 (nim,nama_lengkap,file5,jenis_laporan,tgl_input) VALUES ('$nim','$nama_lengkap','$nama_file','$jenis_laporan','$tgl_input')");
                                if (mysql_affected_rows($connect) > 0) {
                                    echo "<script language='javascript'>alert('Laporan Anda Berhasil Diajukan');document.location='homepage.php?p=index00';</script>";
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