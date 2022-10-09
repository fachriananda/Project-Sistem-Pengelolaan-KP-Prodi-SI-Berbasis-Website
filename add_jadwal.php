<?php
    $ID =$_GET['ubah'];
    $sql = mysql_query("SELECT * FROM jadwal WHERE id_jadwal = '$ID'");
    $data=mysql_fetch_array($sql);

    // print_r($data);

    $nidn = $data['nidn'];
    $nama_do = $data['nama_lengkap'];
    // echo $nama;
    $semester = $data['semester'];
    $thn_ajaran = $data['thn_ajaran'];
    $ajaran=$data['tahun_ajaran'];
    $prodi=$data['program_studi'];
    $hari = $data['hari'];
    $jam = $data['jam'];
    
?>


<section class="content-header">      
    <h1> Mari Add Jadwal Bimbingan</h1>
    <ol class="breadcrumb">
        <li><a href="homepage.php?p=dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">add jadwal</li>
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
                            <!-- form NIM-->
                            <div class="form-group">
                                <label for="nidn">NIDN</label>
                                <input type="text" class="form-control" name="nidn" id="nidn" placeholder="" value="<?php echo $_SESSION['nidn'] ?>" readonly>
                            </div>
                            <!-- form nama lengkap-->
                            <div class="form-group">
                                <label for="nama">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama" placeholder="" value="<?php echo $_SESSION['nama_do'] ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="semester">Semester</label>
                                <input type="text" class="form-control" id="semester" placeholder="" value="<?php echo $data['semester'] ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="thn_ajaran">Tahun Ajaran</label>
                                <input type="text" class="form-control" id="thn_ajaran" placeholder="" value="<?php echo $data['thn_ajaran'] ?>" readonly>
                            </div>
                            
                        </div>
                            <div class="form-group">
                                <label for="ajaran">Hari</label>
                                <select class="form-control" name="hari1" id="ajaran" required>
                                    <option value="">Pilih Hari Pertama</option>
                                    <option value="Senin">Senin</option>
                                    <option value="Selasa">Selasa</option>
                                    <option value="Rabu">Rabu</option>
                                    <option value="Kamis">Kamis</option>
                                    <option value="Jumat">Jumat</option>
                                </select>
                            <div class="form-group">
                                <label>Jam</label>
                                <textarea class="form-control" name="jam1" rows="3" placeholder="*Gunakan Sistem 24 jam    (misal : 11:00 - 13:00)" required></textarea>
                                <p class="help-block"></p>
                            </div>
                            </div>
                            
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" name="simpan" class="btn btn-primary"><i class="fa fa-check"></i> Simpan</button>
                                <a class="btn btn-primary" href="homepage.php?p=riwayat_jadwal"><i class="fa fa-mail-reply"></i> Batal </a>
                            </div>
                        </div>
                    </form>

                    <?php
                      
                        $x5 = trim ($_POST['hari1']);
                        $x6 = trim ($_POST['jam1']);
                        

                        // $lokasi_file    = $_FILES['fupload']['tmp_name'];
                        // $nama_file      = $_FILES['fupload']['name'];
                        // $ukuran_file    = $_FILES['fupload']['size'];
                        // if($pass==NULL)
                            
                        // query for update data
                        if (isset($_POST[simpan])) {
                            $q = mysql_query("UPDATE jadwal SET hari_3='$x5',
                            jam_3='$x6' WHERE id_jadwal=$ID ");
                                if($q){
                                    echo "<script language='javascript'>alert('Data Berhasil Diubah');document.location='homepage.php?p=riwayat_jadwal';</script>";
                                } else {
                                    echo "<script language='javascript'>alert('Data Gagal Diubah');document.location='homepage.php?p=riwayat_jadwal';</script>"; 
                                }
                        }
                        // if ($_POST[simpan]) {    
                        //         $q = mysql_query("UPDATE bimbinganskripsi set nim='$x1',nama_lengkap='$x2',program_studi='$x3',dosen_pembimbing='$x4',tgl_input='$x5',
                        //         aktivitas='$x6',jenis_laporan='$x7',nama_file='$x8',status='$x9',tgl_koreksi='$x10',uraian='$x11' WHERE id_bimbingan='$ID' ");
                        //         if($q)
                        //             {
                        //                 echo "<script language='javascript'>alert('Data Berhasil Diubah');document.location='homepage.php?p=bimbingan_skripsi';</script>";
                        //             }
                        //         else
                        //             {
                        //                 echo "<script language='javascript'>alert('Data Gagal Diubah');document.location='homepage.php?p=bimbingan_skripsi';</script>"; 
                        //             }
                        // }
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
// $( ".datepicker" ).datepicker( "option", "dateFormat", 'Y-M-d' );
$('.datepicker').datepicker({ format: 'dd-mm-yyyy' });
</script>