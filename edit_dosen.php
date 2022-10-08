<?php include '../config/koneksi.php'; ?>

<?php 
    $ID =$_GET['ubah'];
    $sql = mysql_query("SELECT * FROM dosen WHERE nidn = '$ID'");
    $data=mysql_fetch_array($sql);

    $nidn=$data['nidn'];
    $nama=$data['nama_lengkap'];
    $kelamin=$data['jenis_kelamin'];
    $email=$data['email'];
    $foto=$data['foto'];
    $jf=$data['jabatan_fungsional'];
    $js=$data['jabatan_struktural'];
    $level=$data['level'];
    $username=$data['username'];
    $passlama=$data['password'];
?>

<section class="content-header">      
    <h1> Edit Dosen</h1>
    <ol class="breadcrumb">
        <li><a href="homepage.php?p=dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Dosen</li>
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
                                <label>NIDN</label>
                                <input type="text" class="form-control" id="nidn" placeholder="0601067503" name="nidn" value="<?php echo "$nidn";?>" readonly>
                            </div>
                            <!-- form nama lengkap-->
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama" placeholder="masukkan nama" name="nama" value="<?php echo "$nama";?>" required>
                            </div>
                            <!-- form jenis kelamin-->
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <select class="form-control" name="jenis_kelamin">
                                    <option selected>Pilih Jenis Kelamin</option>
                                    <option value="L">Laki-laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
                            <!-- form email-->
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" id="email" placeholder="masukkan email" name="email" value="<?php echo "$email";?>" required>
                            </div>
                            <!-- form jabatan fungsional-->
                            <div class="form-group">
                                <label>Jabatan Fungsional</label>
                                <input type="text" class="form-control" id="jf" placeholder="masukkan jabatan fungsional" name="jf" value="<?php echo "$jf";?>" required>
                            </div>
                            <!-- form jabatan struktural-->
                            <div class="form-group">
                                <label>Jabatan Struktural</label>
                                <input type="text" class="form-control" id="js" placeholder="masukkan jabatan struktural" name="js" value="<?php echo "$js";?>" required>
                            </div>
                            <!-- form username-->
                            <div class="form-group">
                                <label>Username</label> 
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-user"></i>
                                    </div>
                                    <input type="text" class="form-control" placeholder="username" id="username" name="username" value="<?php echo "$username";?>" required>
                                </div>
                            </div>
                            <!-- form password-->
                            <div class="form-group">
                                <label>password</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-key"></i>
                                    </div>
                                    <input type="password" class="form-control" placeholder="password" id="password" name="password" >
                                </div>
                                <div class="form-group">
                                    <label for="repass" class="control-label">Konfirmasi Password</label>
                                    <input class="form-control" id="repass" name="repass" type="password" placeholder="Konfirmasi password">
                                </div>
                            </div>
                            <!-- form level-->
                            <div class="form-group">
                                <label>Level</label>
                                <select class="form-control" name="level" required>
                                    <option selected>Pilih Level</option>
                                    <option value="d">Dekan</option>
                                    <option value="k">Kaprodi</option>
                                    <option value="do">Dosen</option>
                                </select>
                            </div>
                            <!-- form foto-->
                            <div class="form-group">
                                <label>Foto</label>
                                <div><?php echo "<img src='foto/$data[foto]' width='100' height='120'>" ?></div>
                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                    <div class="input-append">
                                        <div class="uneditable-input">
                                            <span class="fileupload-preview"></span>
                                        </div>
                                        <span class="btn btn-default btn-file">
                                            <span class="fileupload-exists">Change</span>
                                            <span class="fileupload-new">Select file</span>
                                            <input type="file" name="fupload" />
                                        </span>
                                        <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
                                    </div>
                                </div>
                                <p class="help-block">Ukuran gambar jangan lebih dari 1 mb</p>
                            </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" name="simpan" class="btn btn-primary"><i class="fa fa-check"></i> simpan</button>
                        <a class="btn btn-primary" href="homepage.php?p=data_dosen"><i class="fa fa-mail-reply"></i> batal </a>
                    </div>
                    </form>
                    <?php
                        $x1 = trim ($_POST['nidn']);
                        $x2 = trim ($_POST['nama']);
                        $x3 = trim ($_POST['jenis_kelamin']);
                        $x4 = trim ($_POST['email']);
                        $x5 = trim ($_POST['jf']);
                        $x6 = trim ($_POST['js']);
                        $x7 = trim ($_POST['level']);
                        $x8 = trim ($_POST['username']);
                        $lokasi_file    = $_FILES['fupload']['tmp_name'];
                        $nama_file      = $_FILES['fupload']['name'];
                        $pass = $_POST['password'];
                        $repass = $_POST['repass'];
                        if($pass==NULL)
                        {
                            $password=$passlama;
                            $flag="Password Tetap";
                        }
                        else if($pass==$repass)
                        {
                            $password = md5($pass);
                            $flag ="Password Diganti";
                        }
                        else{
                            $password=$passlama;
                            echo "<script language='javascript'>alert('password konfirmasi berbeda');document.location='homepage.php?p=data_dosen';</script>"; 
                        }
                            
                        if (isset($_POST[simpan])) {
                                
                            if(!empty($lokasi_file))
                            {
                                    move_uploaded_file($lokasi_file,"foto/$nama_file");
                                    $q = mysql_query("UPDATE dosen set nidn='$x1',nama_lengkap='$x2',jenis_kelamin='$x3',email='$x4',jabatan_fungsional='$x5',jabatan_struktural='$x6',foto='$nama_file',username='$x8',password='$password',level='$x7' WHERE nidn='$ID' ");
                                    if($q){
                                    echo "<script language='javascript'>alert('Data Berhasil Diubah');document.location='homepage.php?p=data_dosen';</script>";
                                    }
                                    else{
                                    echo "<script language='javascript'>alert('Data Gagal Diubah');document.location='homepage.php?p=data_dosen';</script>"; 
                                    }
                            }
                            else
                            {
                                $q = mysql_query("UPDATE dosen set nidn='$x1',nama_lengkap='$x2',jenis_kelamin='$x3',email='$x4',jabatan_fungsional='$x5',jabatan_struktural='$x6',username='$x8',password='$password',level='$x7' WHERE nidn='$ID' ");
                                    if($q){
                                    echo "<script language='javascript'>alert('Data Berhasil Diubah');document.location='homepage.php?p=data_dosen';</script>";
                                    }
                                    else{
                                    echo "<script language='javascript'>alert('Data Gagal Diubah');document.location='homepage.php?p=data_dosen';</script>"; 
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