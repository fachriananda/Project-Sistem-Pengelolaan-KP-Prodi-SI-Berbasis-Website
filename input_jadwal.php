<section class="content-header">      
    <h1>Mari Input Jadwal Bimbingan </h1>
    <ol class="breadcrumb">
        <li><a href="homepage.php?p=dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Mari Input Jadwal Bimbingan</li>
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
                                <label for="nidn">NIDN</label>
                                <input type="text" class="form-control" name="nidn" id="nidn" placeholder="" value="<?php echo $_SESSION['nidn_do'] ?>" readonly>
                            </div>
                            <!-- form nama lengkap-->
                            <div class="form-group">
                                <label for="nama">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama" placeholder="" value="<?php echo $_SESSION['nama_do'] ?>" readonly>
                            </div>
                            <!-- form semester-->
                            <div class="form-group">
                                <label>Semester</label>
                                <div class="radio" name="semester" required>
                                    <p><label><input type="radio" name="semester" value="ganjil" required>Ganjil</label></p>
                                    <p><label><input type="radio" name="semester" value="genap" required>Genap</label></p>
                                </div>
                            </div>
                            <!-- form tahun ajaran-->
                            <div class="form-group">
                                <label for="ajaran">Tahun Ajaran</label>
                                <select class="form-control" name="thn" id="thn" required>
                                    <option value="">Pilih Tahun Ajaran</option>
                            
                                    <option value="2021/2022">2021/2022</option>
                                    <option value="2022/2023">2022/2023</option>
                                    <option value="2023/2024">2023/2024</option>
                                    <option value="2024/2026">2024/2025</option>
                                </select>
                                </div>
                            <!-- form ajaran1-->
                            <div class="form-group">
                                <label for="ajaran">Hari ke-1</label>
                                <select class="form-control" name="hari1" id="ajaran" required>
                                    <option value="">Pilih Hari Pertama</option>
                                    <option value="Senin">Senin</option>
                                    <option value="Selasa">Selasa</option>
                                    <option value="Rabu">Rabu</option>
                                    <option value="Kamis">Kamis</option>
                                    <option value="Jumat">Jumat</option>
                                </select>
                            </div>
                                <div class="form-group">
                                <label>Jam ke-1</label>
                                <textarea class="form-control" name="jam1" rows="3" placeholder="*Gunakan Sistem 24 jam" required></textarea>
                                <p class="help-block"></p>
                                </div>

                            <div class="form-group">
                            <label for="ajaran">Hari ke-2</label>
                                <select class="form-control" name="hari2" id="ajaran" required>
                                    <option value="">Pilih Hari Kedua</option>
                                    <option value="Senin">Senin</option>
                                    <option value="Selasa">Selasa</option>
                                    <option value="Rabu">Rabu</option>
                                    <option value="Kamis">Kamis</option>
                                    <option value="Jumat">Jumat</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Jam ke-2</label>
                                <textarea class="form-control" name="jam2" rows="3" placeholder="*Gunakan Sistem 24 jam" required></textarea>
                                <p class="help-block"></p>
                            </div>
                            <div class="form-group">
                            <label for="ajaran">Hari ke-3</label>
                                <select class="form-control" name="hari3" id="ajaran">
                                    <option value="">Pilih Hari Ketiga</option>
                                    <option value="Senin">Senin</option>
                                    <option value="Selasa">Selasa</option>
                                    <option value="Rabu">Rabu</option>
                                    <option value="Kamis">Kamis</option>
                                    <option value="Jumat">Jumat</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Jam ke-3</label>
                                <textarea class="form-control" name="jam3" rows="3" placeholder="*Gunakan Sistem 24 jam"></textarea>
                                <p class="help-block"></p>
                            </div>
                    </div>
                        <!-- /.box-body -->                        
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                        </div>
                    </form>
                    <?php
                        $nidn           = trim ($_POST['nidn']);
                        $semester       = trim ($_POST['semester']);
                        $tahunajaran    = trim ($_POST['thn']);
                        $hari1          = trim ($_POST['hari1']);
                        $jam1           = trim ($_POST['jam1']);
                        $hari2          = trim ($_POST['hari2']);
                        $jam2           = trim ($_POST['jam2']);
                        $hari3          = trim ($_POST['hari3']);
                        $jam3           = trim ($_POST['jam3']);
                        $tgls           = date('Y-m-d');

                        if (isset($_POST[simpan])) {
                            
                                $q = mysql_query("INSERT INTO jadwal(nidn,semester,thn_ajaran,hari_1,jam_1,hari_2,jam_2,hari_3,jam_3,tgl_input) VALUES ('$nidn','$semester','$tahunajaran','$hari1','$jam1','$hari2','$jam2','$hari3','$jam3','$tgls')");
                                
                                if ($q){
                                    echo "<script language='javascript'>alert('Jadwal Berhasil Dibuat');document.location='homepage.php?p=riwayat_jadwal';</script>";
                                } 
                                else {
                                    echo "<script language='javascript'>alert('Jadwal Gagal Dibuat');document.location='homepage.php?p=input_jadwal';</script>";
                                }
                            }
                    ?>
                </div>
            </div>
        </div>
    </div>
<!-- /.row (main row) -->
</section>    