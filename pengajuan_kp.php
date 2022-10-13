<?php include '../config/koneksi.php';
	$id =$_GET['pengajuan'];
	$sql = mysql_query("SELECT * FROM pengajuan WHERE id_pengajuan = '$id'");
	$data=mysql_fetch_array($sql);
    
    $id=$data['id_pengajuan'];
	$judul=$data['judul'];
	$nim=$data['nim'];
	$nama=$data['nama_lengkap'];
    $nama_do=$data['dosen_pembimbing'];
    $jl=$data['jenis_laporan'];
    $no_urut=$data['no_urut'];
    $Komentar=$data['Komentar'];
    $file2=$data['file2'];
?>

<section class="content-header">      
    <h1> Pengajuan Proposal Kerja Praktek dan Distribusi Dosen Pembimbing</h1>
    <ol class="breadcrumb">
        <li><a href="homepage.php?p=dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Pengajuan Kerja Praktek</li>
    </ol>
</section>

<section class="content">
    <!-- quick email widget -->
    <div class="box box-info">            
        <div class="box-header">
            <div class="row-fluid">

                <div class="col-md-8">
					<form  method="post">
						<div class="box-body">
								<!-- form NIM-->
                                <div class="form-group">
                                <label>NIM</label>
                                <input type="text" class="form-control" id="nim" placeholder="222120004" name="nim" value="<?php echo "$nim";?>" readonly>
							</div>
							<!-- form nama lengkap-->
                            <div class="form-group">
                                <label>Nama Mahasiswa</label>
                                <input type="text" class="form-control" id="nama" placeholder="nama lengkap" name="nama" value="<?php echo "$nama";?>" readonly>
                            </div>
							<!-- form jenis laporan-->
                            <div class="form-group">
                                <label>Jenis Laporan</label>
                                <input type="text" class="form-control" id="jl" placeholder="masukkan jenis laporan" name="jl" value="<?php echo "$jl";?>" readonly>
                            </div>
                   
							<!-- form Plagiasi KP-->
							<div class="form-group">
								<label>Judul yang di uji dengan data kerja praktek</label>
								<div>
									<textarea name="kal2" placeholder="masukkan judul yang diuji..." style="width: 100%; height: 50px;" required><?php echo "$judul";?></textarea>
								</div>
							</div>
							<!-- untuk selanjutnya kita buat action jika  tombol submit di klik -->
							<?php
								if (isset($_POST['kal2'])) {
									$k1 = $_POST['kal2'];
									$k2 = mysql_fetch_array(mysql_query("SELECT judul FROM tblkp"));
									
									foreach ($k2 as $judul) {
										similar_text($k1,$judul,$persen);
									}
									
									$persen=round($persen, 2);
									if ($persen>101){$ket="TERDETEKSI PLAGIASI"; $warna="#fc3804";} 
                                    else {$ket="Pengajuan Proposal Kerja Praktek Tersimpan"; $warna="#33b823";}
							?> 
							<!--dan terakhir kita tutup form dan tabel yang telah dibuat -->
							<tr><td colspan=2 align=center><font size="3"> 
							<?=$ket?></span></font></td></tr>
							<?php } ?>
							<!-- form status-->
                            <!-- <div class="form-group">
                                <label for="status">Status Laporan</label>
                                <select class="form-control" name="status" required>
                                    <option selected>Pilih Status</option>
                                    <option value="1">Diterima</option>
                                    <option value="2">Ditolak</option>
                                </select>
                            </div> -->
                            <div class="form-group">
								<label>Pesan</label>
								<div>
									<textarea name="Komentar" placeholder="masukkan Pesan ..." style="width: 100%; height: 50px;" required></textarea>
								</div>
							</div>
                            <div class="form-group">
                                <label for="exampleInputFile">File Laporan</label>
                                <input type="file" id="exampleInputFile" name="file2" required>
                                <p class="help-block">Format Laporan : Surat Permohonan KP_Nama Mahasiswa.pdf || Size Maksimal File 10 MB</p>
                            </div>
                            <?php
                    $nim = trim($_POST['nim']);
                    $nama = trim($_POST['nama_lengkap']);
                    $prodi = trim($_POST['program_studi']);
                    
                    
           
                    // $jenis_laporan= ucwords($_POST['jenis_laporan']);
                    // $lokasi_file    = $_FILES['fupload']['tmp_name'];
                    // $nama_file      = $_FILES['fupload']['name'];
                    // move_uploaded_file($lokasi_file,"file/$nama_file");
                    // $status = "New";
                    $lokasi_file    = $_FILES['file2']['tmp_name'];
                    $nama_file      = $_FILES['file2']['name'];
                    $ukuran_file    = $_FILES['file2']['size'];
                    $ekstensi_diperbolehkan    = array('pdf','txt');
                    $x = explode('.', $nama_file);
                    $ekstensi = strtolower(end($x));
                    move_uploaded_file($lokasi_file, "file/$nama_file");

                    // 10MB
                    $size = 10000000;
                    // $status = trim ($_POST['status']);
                    // $status = 'Baru';

                    

                    ?>
                </div>
            </div>
        </div>
    </div>
                            <div class="form-group">
                                <label for="status">Status Laporan</label>
                                <select class="form-control" name="status" id="status" required>
                                    <option value="">Pilih Status</option>
                                    <option value="1">Diterima</option>
                                    <option value="2">Ditolak</option>
                                </select>
                                </div>
                        
                            <!-- form Pembimbing 1-->
                            <div class="form-group">
                                <h3><label>_____________________________________________</label></h2>
                                <h3><label>Distribusi Dosen Pembimbing</label></h3>
                            <ul class="timeline">
                            <li class="time-label">
                                  <span class="bg-red">
                                    *pilih dosen pembimbing sesuai dengan judul yang diterima
                                  </span>
                                </li>
                             </ul>
                                <label for="pembimbing1">pilih Dosen Pembimbing</label>
                                <select class="form-control" name="pembimbing1" id="pembimbing1" required>
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
                                </select>
                            </div>

                         
							<div class="box-footer">
								<button type="submit" name="simpan" class="btn btn-primary"><i class="fa fa-check"></i> Simpan Status</button>
								<a class="btn btn-primary" href="homepage.php?p=kp"><i class="fa fa-mail-reply"></i> Batal</a>
                            </div>
                        <div class="box box-info">
						</div>
					</form>
					<?php
                        $x1 = trim ($_POST['nim']);
                        $x2 = trim ($_POST['nama']);
                        $x3 = trim ($_POST['jl']);
                        $x4 = trim ($_POST['kal2']);
                        $x5 = trim ($_POST['status']);
                        $x6 = trim ($_POST['pembimbing1']);
                        $x7 = trim ($_POST['Komentar']);   
                        $x8 = trim ($_POST['file2']);   
                      
                        if (isset($_POST[simpan])) {
                            {
                                $q = mysql_query("UPDATE pengajuan set nim='$x1',nama_lengkap='$x2',judul='$x4',jenis_laporan='$x3',status='$x5',pembimbing1='$x6',Komentar='$x7',file2='$x8' WHERE id_pengajuan='$id'");
                                    if($q){
                                    echo "<script language='javascript'>alert('Data Berhasil Diubah');document.location='homepage.php?p=kp';</script>";
                                    }
                                    else{
                                    echo "<script language='javascript'>alert('Data Gagal Diubah');document.location='homepage.php?p=kp';</script>"; 
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