<?php include '../config/koneksi.php';


 
    $ID =$_GET['ubah'];
    $sql = mysql_query("SELECT * FROM seminar WHERE id = '$ID'");
    $data=mysql_fetch_array($sql);

    $nama_mhs= $data['nama_mhs'];

$pembimbing1= $data['pembimbing1'];

$penguji1= $data['penguji1'];
$k_penguji1= $data['k_penguji1'];
$tanggal=$data['tanggal'];

$tempat=$data['tempat'];
$jam= $data['jam'];
$jam01= $data['jam01'];
$status= trim($_POST['status']);
?>

<section class="content-header">      
    <h1> Edit Seminar </h1>
    <ol class="breadcrumb">
        <li><a href="homepage.php?p=dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Seminar</li>
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
                                <label for="nama_mhs">Pilih Nama Mahasiswa</label>
                                <select class="form-control" name="nama_mhs" id="nama_mhs" required>
                                    <option value="">Pilih Mahasiswa </option>
                                    <?php
                                        $qsp = mysql_query("SELECT * FROM bimbingankp");
                                        while ($s=mysql_fetch_array($qsp)) {
                                            if ($s[nama_lengkap]==$data[nama_mhs]){
                                                echo "<option value='$s[nama_lengkap]','$s[nim]','$s[dosen_pembimbing]','$s[status]' selected>Nama Mahasiswa : $s[nama_lengkap] , NIM : $s[nim],Dosen Pembimbing : $s[dosen_pembimbing],Status Bimbingan : $s[status]</option>";
   
                                              
                                            }
                                            else {
                                                echo "<option value='$s[nama_lengkap]','$s[nim]','$s[dosen_pembimbing]','$s[status]'  >Nama Mahasiswa : $s[nama_lengkap] , NIM : $s[nim] , Dosen Pembimbing : $s[dosen_pembimbing] , Status Bimbingan : $s[status]</option>";
                                            }
                                        }
                                    ?>
                            </div>
                            </select>
                            </div>

                            <div class="form-group">
                                <label for="pembimbing1">Nama Dosen Pembimbing</label>
                               
                                <select class="form-control" name="pembimbing1" id="pembimbing1"          value="<?php echo "$pembimbing1";?>" required>
                                    <option value="">Pilih Dosen Pembimbing</option>
                                    <?php
                                        $qsp = mysql_query("SELECT * FROM dosen");
                                        while ($s=mysql_fetch_array($qsp)) {
                                            if ($s[nama_lengkap]==$data[pembimbing1]){
                                                echo "<option value='$s[nama_lengkap]' selected>$s[nama_lengkap]</option>";
                                              
                                            }
                                            else {
                                                echo "<option value='$s[nama_lengkap]'>$s[nama_lengkap]</option>";
                                            }
                                        }
                                    ?>
                            </div>
                            </select>
                            </div>  
                                
                                
                            
                         
                        

                            <div class="form-group">
                                <label>penguji</label>
                                <input type="text" class="form-control" id="penguji1" placeholder="masukkan penguji" name="penguji1" value="<?php echo "$penguji1";?>" required>
                            </div>
                            <div class="form-group">
                                <label>kontak dosen penguji</label>
                                <textarea type="text" class="form-control" name="k_penguji1"  placeholder="masukkan kontak penguji yang dapat dihubungi...." style="width: 100%; height: 50px;" required> <?php echo "$k_penguji1";?> </textarea> 
                            </div>
                            <div class="form-group">


<label for="tanggal">Tanggal Jadwal Seminar</label>
<input type="date" class="form-control" id="tanggal" name="tanggal" value="<?php echo "$tanggal";?>" required>
</div>
<div class="form-group">
<label for="jam">jam awal Jadwal Seminar</label>
<input type="time" class="form-control" id="jam" name="jam" value="<?php echo "$jam";?>" required>
</div>
<div class="form-group">
<label for="jam01">jam selesai awal Jadwal Seminar</label>
<input type="time" class="form-control" id="jam01" name="jam01" value="<?php echo "$jam01";?>" required>
<div class="form-group">
                                <label>Tempat</label>
                                <input type="text" class="form-control" id="tempat" placeholder="masukkan tempat" name="tempat" value="<?php echo "$tempat";?>" required>
                            </div>
                          
</div>

<label for="status">Status Sidang</label>
                                <select class="form-control" name="status" id="status" value="<?php echo "$status";?>" required>
                              
                                    <option value="0">Sedang Sidang</option>
                                    <option value="1">Belum Sidang</option>
                                    <option value="2">Selesai Sidang</option>

                                </select>
                                </div>

                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" name="simpan" class="btn btn-primary"><i class="fa fa-check"></i> simpan</button>
                        <a class="btn btn-primary" href="homepage.php?p=index11"><i class="fa fa-mail-reply"></i> batal </a>
                    </div>
                    </form>
                    <?php
                      $nama_mhs= trim($_POST['nama_mhs']);

                      $pembimbing1= trim($_POST['pembimbing1']);
                      
                      $penguji1= trim($_POST['penguji1']);
                      $k_penguji1= trim($_POST['k_penguji1']);


                      $tanggal= trim($_POST['tanggal']);
                      $tempat= trim($_POST['tempat']);
           
                      $jam01= trim($_POST['jam01']);
                      $jam= trim($_POST['jam']);
                      $status= trim($_POST['status']);
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
                                            echo "<script language='javascript'>alert('Ukuran file terlalu besar');document.location='homepage.php?p=index11';</script>";
                                        } else if ($ukuran_file < $size) {
                                            $q = mysql_query("UPDATE seminar set nama_mhs='$nama_mhs', pembimbing1='$pembimbing1', penguji1='$penguji1', k_penguji1='$k_penguji1', tanggal='$tanggal',jam='$jam' , jam01='$jam01', tempat='$tempat' , status='$status' WHERE id='$ID' ");
                                                  if (mysql_affected_rows($connect) > 0) {
                                                echo "<script language='javascript'>alert('Laporan Anda Berhasil Diajukan');document.location='homepage.php?p=index11';</script>";
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