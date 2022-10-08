<?php
    $id =$_GET['ubah'];
    $sql = mysql_query("SELECT * FROM pengajuan WHERE id_pengajuan = '$id'");
    $data=mysql_fetch_array($sql);
    
    $id=$data['id_pengajuan'];
    $judul=$data['judul'];
    $nim=$data['nim'];
    $nama=$data['nama_lengkap'];
    $nama_do=$data['dosen_pembimbing'];
    $jl=$data['jenis_laporan'];
    $no_urut=$data['no_urut'];
    $status=$data['status'];


?>

<section class="content-header">      
    <h1> Ubah Data Distribusi Dosen Pembimbing</h1>
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
                                <input type="text" class="form-control" name="id" value="<?php echo "$id";?>" readonly>
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
                            <!-- form Plagiasi Skripsi-->
                            <div class="form-group">
                                <label>Judul yang di uji dengan data kerja praktek</label>
                                <div>
                                    <textarea name="judul" placeholder="masukkan judul yang diuji..." style="width: 100%; height: 50px;" required><?php echo "$judul";?></textarea>
                                </div>
                            </div>
                            <!-- untuk selanjutnya kita buat action jika  tombol submit di klik -->
                            <?php
                                if (isset($_POST['judul'])) {
                                    $k1 = $_POST['judul'];
                                    $k2 = mysql_fetch_array(mysql_query("SELECT judul FROM tblkp"));
                                    
                                    foreach ($k2 as $judul) {
                                        similar_text($k1,$judul,$persen);
                                    }
                                    
                                    $persen=round($persen, 2);
                                    if ($persen>40){$ket="TERDETEKSI PLAGIASI"; $warna="#fc3804";} else {$ket="TIDAK TERDETEKSI PLAGIASI"; $warna="#33b823";}
                            ?> 
                            <!--dan terakhir kita tutup form dan tabel yang telah dibuat -->
                            <tr><td colspan=2 align=center><font size="3"> kemiripan kalimat = <?=$persen?> % <br> <span style="color:<?=$warna?>">
                            <?=$ket?></span></font></td></tr>
                            <?php } ?>
                            <!-- form status-->
                            <div class="form-group">
                                <label for="status">Status Laporan</label>
                                <select class="form-control" name="status" id="status" required="">
                                    <?php 
                                     if($status==1)
                                        {
                                         $ceka="selected";
                                         $cekb="";   
                                        }
                                        else
                                        {
                                         $ceka="";
                                         $cekb="selected";   
                                        }
                                    ?>
                                    <option value="">Pilih Status</option>
                                    <option value="1" <?php echo "$ceka"?> >Diterima</option>
                                    <option value="2" <?php echo "$cekb"?> >Ditolak</option>
                                </select>
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary" name="Cek Plagiasi"><i class="fa fa-check"></i>Cek Plagiasi</button>
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

                            <div>                                    
                                <textarea name="kal" placeholder="data bimbingan..." style="width: 20%; height: 40px;"><?php echo "";?></textarea>
                            </div>
                                
                            <div class="box-footer">
                                <button type="submit" name="simpan" class="btn btn-primary"><i class="fa fa-check"></i> Simpan Status</button>
                                <a class="btn btn-primary" href="homepage.php?p=persetujuan_kptolak"><i class="fa fa-mail-reply"></i> Batal</a>
                            </div>
                        <div class="box box-info">
                        </div>
                    </form>
                    <?php
                        $x0 = trim ($_POST['id']);
                        $x1 = trim ($_POST['nim']);
                        $x2 = trim ($_POST['nama']);
                        $x3 = trim ($_POST['jl']);
                        $x4 = trim ($_POST['judul']);
                        $x5 = 0;
                        $x6 = trim ($_POST['pembimbing1']);
                            
                        if (isset($_POST[simpan])) {
                            {
                                $q = mysql_query("UPDATE pengajuan set nim='$x1',nama_lengkap='$x2',judul='$x4',jenis_laporan='$x3',status_dkn='$x5',pembimbing1='$x6' WHERE id_pengajuan='$x0'");
                                    if($q){
                                    echo "<script language='javascript'>alert('Data Berhasil Diubah');document.location='homepage.php?p=persetujuan_kptolak';</script>";
                                    }
                                    else{
                                    echo "<script language='javascript'>alert('Data Gagal Diubah');document.location='homepage.php?p=persetujuan_kptolak';</script>"; 
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