<?php 
    $ID = $_SESSION['nim'];
    $sql = mysql_query("SELECT * FROM mahasiswa WHERE nim = '$ID'");
    $data=mysql_fetch_array($sql);
?>

<section class="content-header">      
    <h1> Input Jadwal Kerja Praktek </h1>
    <ol class="breadcrumb">
        <li><a href="homepage.php?p=dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Input Jadwal Kerja Praktek</li>
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
                        <div class="box-body">
                            <!-- form nim-->
                            <div class="form-group">
                                <label for="nim">NIDN</label>
                                <input type="text" class="form-control" id="nim" placeholder="" value="<?php echo $_SESSION['nim'] ?>" readonly>
                            </div>
                            <!-- form nama lengkap-->
                            <div class="form-group">
                                <label for="nama">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama" placeholder="" value="<?php echo $_SESSION['nama_mhs'] ?>" readonly>
                            </div>
                            <!-- form semester-->
                            <div class="form-group">
                                <label>Semester</label>
                                <div class="radio" name="semester" required>
                                    <p><label><input type="radio" name="semester" value="ganjil">Ganjil</label></p>
                                    <p><label><input type="radio" name="semester" value="genap">Genap</label></p>
                                </div>

                                <div class="form-group">
                                <label for="ajaran">Tahun Ajaran</label>
                                <select class="form-control" name="ajaran" id="ajaran">
                                    <option selected>Pilih Tahun Ajaran</option>
                                    <option value="2020/2021">2020/2021</option>
                                    <option value="2021/2022">2021/2022</option>
                                    <option value="2022/2023">2022/2023</option>
                                </select>
                                </div>
                            </div>
                            <!-- form ajaran1-->
                            <div class="form-group">
                                <label for="ajaran">Hari</label>
                                <select class="form-control" name="ajaran" id="ajaran">
                                    <option selected>Pilih Hari</option>
                                    <option value="Senin">Senin</option>
                                    <option value="Selasa">Selasa</option>
                                    <option value="Rabu">Rabu</option>
                                    <option value="Kamis">Kamis</option>
                                    <option value="Jumat">Jumat</option>
                                </select>
                    <div class="form-group">
                                <label>Jam</label>
                                <textarea class="form-control" name="judul" rows="3" placeholder="inputkan Waktu" required></textarea>
                                <p class="help-block">**Gunakan Sistem 24 jam</p>
                            </div>
                                <select class="form-control" name="ajaran" id="ajaran">
                                    <option selected>Pilih Hari</option>
                                    <option value="Senin">Senin</option>
                                    <option value="Selasa">Selasa</option>
                                    <option value="Rabu">Rabu</option>
                                    <option value="Kamis">Kamis</option>
                                    <option value="Jumat">Jumat</option>
                                    <option value=""></option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Jam</label>
                                <textarea class="form-control" name="judul" rows="3" placeholder="inputkan Waktu" required></textarea>
                                <p class="help-block">*Gunakan Sistem 24 jam</p>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary" name="simpan">Kirim</button>
                        </div>
                    </form>
                    <?php
                        $nama           = trim($_SESSION['nama_mhs']);
                        $semester       = trim ($_POST['semester']);
                        $laporan        = trim ($_POST['jenis_laporan']);
                        $ajaran         = trim ($_POST['ajaran']);
                        $prodi          = trim ($_POST['prodi']);
                        $judul          = ucwords($_POST['judul']);
                        $tgls           = date('Y-m-d');
                        $lokasi_file    = $_FILES['fupload']['tmp_name'];
                        $nama_file      = $_FILES['fupload']['name'];
                        $ukuran_file    = $_FILES['fupload']['size'];
                        $ekstensi_diperbolehkan = array('rar','zip');
                        $x = explode('.', $nama_file);
                        $ekstensi = strtolower(end($x));
                        move_uploaded_file($lokasi_file,"file/$nama_file");
                        $size = 10000000;

                        if (isset($_POST[simpan])) {
                            
                            if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
                                if($ukuran_file > $size){
                                    echo "<script language='javascript'>alert('Gagal upload! Ukuran Maksimal 10mb, saat ini ukuran file $ukuran_file');document.location='homepage.php?p=pengajuan';</script>";
                                    exit();
                                }
                                $q = mysql_query("INSERT INTO pengajuan (nim,nama_lengkap,program_studi,semester,thn_ajaran,judul,jenis_laporan,file,tanggal) VALUES ('$ID','$nama','$prodi','$semester','$ajaran','$judul','$laporan','$nama_file','$tgls')");
                                if ($q){
                                    echo "<script language='javascript'>alert('Judul Berhasil Diajukan');document.location='homepage.php?p=dashboard';</script>";
                                } else {
                                    echo "<script language='javascript'>alert('Judul Gagal Diajukan');document.location='homepage.php?p=pengajuan';</script>";
                                }
                            }else{
                                echo "<script language='javascript'>alert('Ekstensi File Yang di Upload Tidak Diperbolehkan');document.location='homepage.php?p=pengajuan';</script>";
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
<!-- /.row (main row) -->
</section>    