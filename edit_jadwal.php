<?php 
$ID =$_GET['ubah'];
$sql = mysql_query("SELECT * FROM jadwal WHERE id_jadwal = '$ID'");
$data=mysql_fetch_array($sql);

$semester       = $data['semester'];
$tahunajaran    = $data['thn_ajaran'];
$hari1          = $data['hari_1'];
$jam1           = $data['jam_1'];
$hari2          = $data['hari_2'];
$jam2           = $data['jam_2'];
$hari3          = $data['hari_3'];
$jam3           = $data['jam_3'];

if($semester=="ganjil")
{
    $cek1="checked";
    $cek2="";
}
elseif($semester=="genap")
{
    $cek1="";
    $cek2="checked";
}


?>

<section class="content-header">      
    <h1>Edit Jadwal Bimbingan </h1>
    <ol class="breadcrumb">
        <li><a href="homepage.php?p=dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Jadwal Bimbingan</li>
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
                                    <p><label><input type="radio" name="semester" value="ganjil" 
                                        <?php echo "$cek1";?> required>Ganjil</label></p>
                                    <p><label><input type="radio" name="semester" value="genap" 
                                        <?php echo "$cek2";?> required>Genap</label></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nama">Tahun Ajaran</label>
                                <input type="text" class="form-control" id="nama" name="thn" placeholder="" value="<?php echo $data[thn_ajaran] ?>" readonly>
                            </div>
                            <!-- form ajaran1-->
                            <div class="form-group">
                                <label for="ajaran">Hari ke-1</label>
                                <select class="form-control" name="hari1" id="ajaran" required>
                                    <?php 

                                        $pilihan = array("Senin","Selasa","Rabu","Kamis","Jumat");
                                        foreach ($pilihan as $day) {
                                            if ($hari1==$day) {
                                                $daysel="selected";
                                            }
                                            else
                                            {
                                                $daysel="";
                                            }

                                            echo"<option value='$day'$daysel>$day</option>";
                                        }


                                    ?>
                                </select>
                                </div>

                                <div class="form-group">
                                <label>Jam ke-1</label>
                                <textarea class="form-control" name="jam1" rows="3" placeholder="*Gunakan Sistem 24 jam" required> <?php echo "$jam1";?> </textarea>
                                <p class="help-block"></p>
                                </div>

                                <div class="form-group">
                                <label for="ajaran">Hari ke-2</label>
                                <select class="form-control" name="hari2" id="ajaran" required>
                                    <?php 

                                        $pilihan = array("Senin","Selasa","Rabu","Kamis","Jumat");
                                        foreach ($pilihan as $day) {
                                            if ($hari2==$day) {
                                                $daysel="selected";
                                            }
                                            else
                                            {
                                                $daysel="";
                                            }

                                            echo"<option value='$day'$daysel>$day</option>";
                                        }


                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Jam ke-2</label>
                                <textarea class="form-control" name="jam2" rows="3" placeholder="*Gunakan Sistem 24 jam" required> <?php echo "$jam2";?></textarea>
                                <p class="help-block"></p>
                            </div>
                            
                            <div class="form-group">
                            <label for="ajaran">Hari ke-3</label>
                                <select class="form-control" name="hari3" id="ajaran">
                                    <?php 

                                        $pilihan = array("Senin","Selasa","Rabu","Kamis","Jumat");
                                        foreach ($pilihan as $day) {
                                            if ($hari3==$day) {
                                                $daysel="selected";
                                            }
                                            else
                                            {
                                                $daysel="";
                                            }

                                            echo"<option value='$day'$daysel>$day</option>";
                                        }


                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Jam ke-3</label>
                                <textarea class="form-control" name="jam3" rows="3" placeholder="*Gunakan Sistem 24 jam"><?php echo "$jam3";?></textarea>
                                <p class="help-block"></p>
                            </div>
                    </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>

                            <a class="btn btn-primary" href="homepage.php?p=riwayat_jadwal"><i class="fa fa-mail-reply"></i> batal </a>
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
                            
                                $q = mysql_query("UPDATE jadwal set nidn='$nidn',semester='$semester',thn_ajaran='$tahunajaran',hari_1='$hari1',jam_1='$jam1',hari_2='$hari2',jam_2='$jam2',hari_3='$hari3',jam_3='$jam3',tgl_input='$tgls' WHERE id_jadwal='$ID' ");
                                
                                if ($q){
                                    echo "<script language='javascript'>alert('Jadwal Berhasil Diubah');document.location='homepage.php?p=riwayat_jadwal';</script>";
                                } 
                                else {
                                    echo "<script language='javascript'>alert('Jadwal Gagal Diubah');document.location='homepage.php?p=input_jadwal';</script>";
                                }
                            }
                    ?>
                    
                </div>
            </div>
        </div>
    </div>
<!-- /.row (main row) -->
</section> 