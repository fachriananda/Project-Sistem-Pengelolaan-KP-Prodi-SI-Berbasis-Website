<?php
$ID = $_GET['ubah'];
$sql = mysql_query("SELECT * FROM bimbingankp WHERE id_bimbingan = '$ID'");
$data = mysql_fetch_array($sql);

// print_r($data);

$nim = $data['nim'];
$nama = $data['nama_lengkap'];
// echo $nama;
$prodi = $data['program_studi'];
$dosen = $data['dosen_pembimbing'];
$tgl_input = $data['tgl_input'];
$semestermulaikp = $data['semester_mulai_kp'];
$semesterselesaikp = $data['semester_selesai_kp'];
$aktivitas = $data['aktivitas'];
$nama_file = $data['file'];
$status = $data['status'];
$tgl_koreksi = $data['tgl_koreksi'];
$uraian = $data['uraian'];
$time = time();
?>


<section class="content-header">
    <h1> Revisi Bimbingan Kerja Praktek</h1>
    <ol class="breadcrumb">
        <li><a href="homepage.php?p=dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Konsultasi Kerja Praktek</li>
        <li class="active">Kerja Praktek</li>
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
                                <label>NIM</label>
                                <input type="text" class="form-control" id="nim" placeholder="222120004" name="nim" value="<?php echo $nim; ?>" readonly>
                            </div>
                            <!-- form nama lengkap-->
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama_lengkap" placeholder="masukkan nama" name="nama_lengkap" value="<?php echo $nama; ?>" readonly>
                            </div>
                            <!-- form prodi-->
                            <div class="form-group">
                                <label>Program Studi</label>
                                <input type="text" class="form-control" placeholder="masukkan nama" name="program_studi" value="<?php echo $prodi; ?>" readonly>
                            </div>
                            <!-- form dosbing-->
                            <div class="form-group">
                                <label>Dosen Pembimbing</label>
                                <input type="text" class="form-control" name="dosen_pembimbing" value="<?php echo $dosen; ?>" readonly>
                            </div>
                            <!-- form tanggal input-->
                            <div class="form-group">
                                <div class='form-group header-group-0'>
                                    <label for="tanggal">Tanggal Input</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><a><i class='fa fa-calendar '></i></a></span>
                                        <input type='text' value="<?= strftime('%d %B %Y', $data['tgl_input']); ?>" required class='form-control notfocus' name="tgl_input" id="tgl_input" value='' readonly />
                                    </div>
                                    <div class="text-danger"></div>
                                    <p class='help-block'></p>
                                </div>
                            </div>
                            <!-- form semester mulai kp -->
                            <div class="form-group">
                                <label>Semester Mulai KP</label>
                                <input type="text" class="form-control" name="semestermulaikp" value="<?php echo $semestermulaikp; ?>" readonly></input>
                            </div>
                            <!-- form aktivitas-->
                            <div class="form-group">
                                <label>Aktivitas</label>
                                <input type="text" class="form-control" id="aktivitas" name="aktivitas" value="<?php echo $aktivitas; ?>" readonly>
                            </div>
                            <!-- form file laporan-->
                            <div class="form-group">
                                <label>Nama File Laporan</label>
                                <input type="text" class="form-control" id="file" name="file" value="<?php echo $nama_file; ?>" readonly>
                                <td>
                                    <a href="../mahasiswa/file/<?php echo $data[file]; ?>" class='btn btn-xs btn-primary' title='View Document' target="_blank"><span class='glyphicon glyphicon-eye-open' aria-hidden='true'></span> View</a>
                                </td>
                            </div>
                            <!-- form status-->
                            <div class="form-group">
                                <label>Status </label>
                                <select class="form-control" name="status" required>
                                    <option value="New" <?= ($status == 'New') ? 'selected' : ''; ?>>New</option>
                                    <option value="ACC" <?= ($status == 'ACC') ? 'selected' : ''; ?>>ACC</option>
                                    <option value="Revisi" <?= ($status == 'Revisi') ? 'selected' : ''; ?>>Revisi</option>
                                </select>
                            </div>
                            <!-- form semester selesai kp -->
                            <?php if ($aktivitas == "BAB V") : ?>
                                <div class="form-group">
                                    <label>Semester Selesai KP</label>
                                    <select class="form-control" name="semesterselesaikp">
                                        <option value='' selected></option>
                                        <?php
                                        $qta = mysql_query("SELECT * FROM tahunajaran");
                                        while ($z = mysql_fetch_array($qta)) {
                                            if ($z["tahunajaran"] == $semesterselesaikp) {
                                                echo "<option value='$z[tahunajaran]' selected>$z[tahunajaran]</option>";
                                            } else {
                                                echo "
                                            <option value='$z[tahunajaran]'>$z[tahunajaran]</option>
                                            ";
                                            }
                                        }
                                        ?>
                                    </select>
                                    <span>*Kosongkan kolom ini saat bimbingan masih dalam proses</span><br>
                                    <span>*Isi kolom ini saat mahasiswa sudah selesai mengerjakan KP hingga BAB V</span>
                                </div>
                            <?php endif; ?>
                            <!-- form tanggal koreksi -->
                            <div class="form-group">
                                <div class='form-group form-datepicker header-group-0 ' id='form-group-due_date' style="">
                                    <!-- <label for="tanggal">Tanggal Koreksi<span class='text-danger' title='This field is required'>*</span>
                                </label> -->
                                    <label for="tanggal">Tanggal Koreksi</label>
                                    <div class="input-group">
                                        <span class="input-group-addon open-datetimepicker"><a><i class='fa fa-calendar '></i></a></span>
                                        <?php if ($data["tgl_koreksi"] == null) : ?>
                                            <input type='text' title="Tanggal Koreksi" value="<?= strftime('%d %B %Y', time()); ?>" required class='form-control' name="tgl_koreksi" id="tgl_koreksi" readonly />
                                        <?php else : ?>
                                            <input type='text' title="Tanggal Koreksi" value="<?= strftime('%d %B %Y', $data['tgl_koreksi']); ?>" required class='form-control' name="tgl_koreksi" id="tgl_koreksi" readonly />
                                        <?php endif; ?>
                                    </div>
                                    <div class="text-danger"></div>
                                    <p class='help-block'></p>
                                </div>
                            </div>

                            <!-- form uraian -->
                            <div class="form-group">
                                <label>Uraian</label>
                                <textarea required class="form-control" name="uraian" rows="3" placeholder="Isi berdasarkan hasil file laporan" selected value="<?php echo $uraian; ?>"><?php echo $uraian; ?></textarea>
                            </div>

                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" name="simpan" class="btn btn-primary"><i class="fa fa-check"></i> Simpan</button>
                                <a class="btn btn-primary" href="homepage.php?p=bimbingan_kp"><i class="fa fa-mail-reply"></i> Batal </a>
                            </div>
                        </div>
                    </form>

                    <?php

                    $x1 = trim($_POST['nim']);
                    $x2 = trim($_POST['nama_lengkap']);
                    $x3 = trim($_POST['program_studi']);
                    $x4 = trim($_POST['dosen_pembimbing']);
                    // $x5 = date('Y-m-d', strtotime($_POST['tgl_input']));
                    $x6 = $_POST['semestermulaikp'];
                    $x7 = trim($_POST['semesterselesaikp']);
                    $x6 = trim($_POST['aktivitas']);
                    // $x7 = trim ($_POST['jenis_laporan']);
                    $x8 = trim($_POST['file']);
                    $x9 = trim($_POST['status']);
                    $x10 = time();
                    $x11 = $_POST['uraian'];

                    // $lokasi_file    = $_FILES['fupload']['tmp_name'];
                    // $nama_file      = $_FILES['fupload']['name'];
                    // $ukuran_file    = $_FILES['fupload']['size'];
                    // if($pass==NULL)

                    // query for update data
                    if (isset($_POST["simpan"])) {
                        if ($x9 == "New") {
                            echo "<script language='javascript'>alert('Status Belum Diubah');</script>";
                        } elseif ($x9 != "New") {
                            if ($x9 == "ACC" && $x6 == "BAB V") {
                                $status_kp = "SELESAI";
                                $q = mysql_query("UPDATE bimbingankp SET nim='$x1',nama_lengkap='$x2',program_studi='$x3',dosen_pembimbing='$x4',aktivitas='$x6',file='$x8',status='$x9',tgl_koreksi='$x10',uraian='$x11' WHERE id_bimbingan=$ID ");
                                $updateStatusKP = mysql_query("UPDATE bimbingankp SET status_kp = '$status_kp', semester_selesai_kp='$x7' WHERE nim = '$x1'");
                                if ($q) {
                                    echo "<script language='javascript'>alert('Data Berhasil Disimpan');document.location='homepage.php?p=bimbingan_kp';</script>";
                                } else {
                                    echo "<script language='javascript'>alert('Data Gagal Diubah');document.location='homepage.php?p=bimbingan_kp';</script>";
                                }
                            } elseif ($x9 == "Revisi") {
                                $q = mysql_query("UPDATE bimbingankp SET nim='$x1',nama_lengkap='$x2',program_studi='$x3',dosen_pembimbing='$x4',aktivitas='$x6',file='$x8',status='$x9',tgl_koreksi='$x10',uraian='$x11' WHERE id_bimbingan=$ID ");
                                if ($q) {
                                    echo "<script language='javascript'>alert('Data Berhasil Disimpan');document.location='homepage.php?p=bimbingan_kp';</script>";
                                } else {
                                    echo "<script language='javascript'>alert('Data Gagal Diubah');document.location='homepage.php?p=bimbingan_kp';</script>";
                                }
                            } else {
                                $q = mysql_query("UPDATE bimbingankp SET nim='$x1',nama_lengkap='$x2',program_studi='$x3',dosen_pembimbing='$x4',aktivitas='$x6',file='$x8',status='$x9',tgl_koreksi='$x10',uraian='$x11' WHERE id_bimbingan=$ID ");
                                if ($q) {
                                    echo "<script language='javascript'>alert('Data Berhasil Disimpan');document.location='homepage.php?p=bimbingan_kp';</script>";
                                } else {
                                    echo "<script language='javascript'>alert('Data Gagal Diubah');document.location='homepage.php?p=bimbingan_kp';</script>";
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
    // $( ".datepicker" ).datepicker( "option", "dateFormat", 'Y-M-d' );
    $('.datepicker').datepicker({
        format: 'dd-mm-yyyy'
    });
</script>