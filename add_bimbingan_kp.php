<?php include '../config/koneksi.php'; ?>


<section class="content-header">      
    <h1> Tambah Data Bimbingan Kerja Praktek </h1>
    <ol class="breadcrumb">
        <li><a href="homepage.php?p=dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Bimbingan Kerja Praktek</li>
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
                                <label>NIM</label>
                                <input type="text" class="form-control" id="nim" placeholder="Masukan NIM Anda" name="nim" required>
                            </div>
                            <!-- <div class="form-group">
                                <label>NIM</label>
                                <select class="form-control" name="nim">
                                <?php
                                    //      $qsp = mysql_query("SELECT * FROM mahasiswa");
                                    //      while ($s=mysql_fetch_array($qsp)) {
                                    
                                    //     echo "<option value='$s[nim]'>$s[nim]</option>";
                                        
                                    // }
                                ?>
                                </select>
                            </div> -->

                            <!-- form nama-->
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama_lengkap" placeholder="Masukkan Nama" name="nama_lengkap" required>
                            </div>

                            <!-- <div class="form-group">
                                <label for="nama">Nama Lengkap</label>
                                <input type="text" class="form-control" name="nama" id="nama" placeholder="" value="<?php echo $_SESSION['nama'] ?>" readonly>
                            </div> -->
                            <!-- form program studi-->
                            <div class="form-group">
                                <label>Program Studi</label>
                                <select class="form-control"  name="program_studi" readonly>
                                    <?php
                                         $qsp = mysql_query("SELECT * FROM prodi");
                                         while ($s=mysql_fetch_array($qsp)) {
                                            if ($s[id_prodi]==$data[program_studi]){
                                        echo "<option value='$s[pnama]' selected>$s[pnama]</option>";
                                     }else{
                                        echo "<option value='$s[pnama]'>$s[pnama]</option>";
                                     }
                                }
                                    ?>
                                </select>
                            </div>
                            <!-- form dosbing-->
                            <div class="form-group">
                                <label>Dosen Pembimbing</label>
                                <?php
                                // $qsp = mysql_query("SELECT * FROM dosen");
                                //          $hasil=mysql_fetch_array($qsp);
                                //          print_r($hasil);
                                ?>

                                <select class="form-control" name="dosen_pembimbing">
                                <?php
                                         $qsp = mysql_query("SELECT * FROM dosen");
                                         while ($s=mysql_fetch_array($qsp)) {
                                    
                                        echo "<option value='$s[nama_lengkap]'>$s[nama_lengkap]</option>";
                                        
                                    }
                                ?>
                                    <!-- <option selected>Pilih Dosen Pembimbing</option>
                                    <option value="nidn">Nama Dosen</option> -->
                                </select>
                            </div>
                            <!-- form due date-->
                            <div class="form-group">
                            <div class='form-group form-datepicker header-group-0 ' id='form-group-due_date'style="">
                                <label for="tanggal">Tanggal Input
                                    <span class='text-danger' title='This field is required'>*</span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-addon open-datetimepicker"><a><i class='fa fa-calendar '></i></a></span>
                                        <input type='text' title="Due Date"

                                        required    class='form-control notfocus datepicker' name="tgl_input" id="tgl_input"
                                        value=''/>
                                </div>
                                <div class="text-danger"></div>
                                <p class='help-block'></p>
                            </div>
                            </div>
                            <!-- form judul laporan-->
                            <div class="form-group">
                                <label>Aktivitas</label>
                                <textarea class="form-control" name="aktivitas" rows="3" placeholder="Isi judul Bab yang Anda ajukan" required></textarea>
                                <p class="help-block">*misal "Bab I Pendahuluan"</p>
                            </div>
                            <!-- form jenis laporan-->
                            <div class="form-group">
                                <label>Jenis Laporan</label>
                                <select class="form-control" name="jenis_laporan" required>
                                    <option selected>Pilih Laporan</option>
                                    <option value="kp">Kerja Praktek</option>
                                    <option value="skripsi">Skripsi</option>
                                </select>
                            </div>
                            <!-- form file laporan-->
                            <div class="form-group">
                                <label for="exampleInputFile">File Laporan</label>
                                <input type="file" id="exampleInputFile" name="fupload" required>
                                <p class="help-block">format laporan : nim_namalaporan.pdf</p>
                            </div>
                            <!-- form status-->
                            <div class="form-group">
                                <label>Status</label>
                                <!-- <input type="text" class="form-control" id="file" name="file" value="<?php echo $status;?>" required> -->
                                <select class="form-control" name="status" required>
                                    <option selected>Pilih Status Laporan</option>
                                    <option value="New">New</option>
                                    <option value="ACC">ACC</option>
                                    <option value="Revisi">Revisi</option>
                                </select>
                            </div>
                            <!-- form tanggal koreksi -->
                            <div class="form-group">
                            <div class='form-group form-datepicker header-group-0 ' id='form-group-due_date'style="">
                                <label for="tanggal">Tanggal Koreksi
                                    <span class='text-danger' title='This field is required'>*</span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-addon open-datetimepicker"><a><i class='fa fa-calendar '></i></a></span>
                                        <input type='text' title="Due Date"

                                        required    class='form-control notfocus datepicker' name="tgl_koreksi" id="tgl_koreksi"
                                        value=''/>
                                </div>
                                <div class="text-danger"></div>
                                <p class='help-block'></p>
                            </div>
                            </div>
                            <!-- form uraian -->
                            <div class="form-group">
                                <label>Uraian</label>
                                <textarea class="form-control" name="uraian" rows="3" placeholder="Isi berdasarkan hasil file laporan" required></textarea>
                                <!-- <input type="text" class="form-control" id="aktivitas" placeholder="Isi judul Bab yang Anda ajukan" name="aktivitas" value="<?php echo $aktivitas;?>" required>
                                <p class="help-block">*misal "Bab I Pendahuluan"</p> -->
                            </div>
                            </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                        </div>
                    </form>
                    <?php
                        $nim = trim ($_POST['nim']);
                        $nama = trim ($_POST['nama_lengkap']);
                        $prodi = trim ($_POST['program_studi']);
                        $dosen = trim ($_POST['dosen_pembimbing']);
                        $tgl_input = date('Y-m-d', strtotime($_POST['tgl_input']));
                        $aktivitas = trim ($_POST['aktivitas']);
                        $jenis_laporan= ucwords($_POST['jenis_laporan']);
                        // $lokasi_file    = $_FILES['fupload']['tmp_name'];
                        // $nama_file      = $_FILES['fupload']['name'];
                        // move_uploaded_file($lokasi_file,"file/$nama_file");
                        // $status = "New";
                        $lokasi_file    = $_FILES['fupload']['tmp_name'];
                        $nama_file      = $_FILES['fupload']['name'];
                        $ukuran_file    = $_FILES['fupload']['size'];
                        $ekstensi_diperbolehkan	= array('rar','zip');
                        $x = explode('.', $nama_file);
			            $ekstensi = strtolower(end($x));
                        move_uploaded_file($lokasi_file,"file/$nama_file");
                        $size = 10000000;
                        $status = trim ($_POST['status']);
                        // $tgl_koreksi = date ('y-m-d', $tanggal);
                        $tgl_koreksi = date('Y-m-d', strtotime($_POST['tgl_koreksi']));
                        $uraian = trim ($_POST['uraian']);
   
                        if (isset($_POST['simpan'])) {

                        $q = mysql_query("INSERT INTO bimbingankp (nim,nama_lengkap,program_studi,dosen_pembimbing,tgl_input,aktivitas,jenis_laporan,file,status,tgl_koreksi,uraian) 
                        VALUES ('$nim','$nama','$prodi','$dosen','$tgl_input','$aktivitas','$jenis_laporan','$nama_file','$status','$tgl_koreksi','$uraian')");
                            if ($q){
                                echo "<script language='javascript'>alert('Laporan Anda Berhasil Diajukan');document.location='homepage.php?p=bimbingan_kp';</script>";
                            } else {
                                echo "<script language='javascript'>alert('Laporan Anda Gagal Diajukan');document.location='homepage.php?p=bimbingan_kp';</script>";
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
$('.datepicker').datepicker({ format: 'dd-mm-yyyy' });
</script>    