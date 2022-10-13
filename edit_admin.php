<?php include '../config/koneksi.php'; ?>

<?php 
    $ID =$_GET['ubah'];
    $sql = mysql_query("SELECT * FROM admin WHERE username = '$ID'");
    $data=mysql_fetch_array($sql);

    $nama=$data['nama_lengkap'];
    $kelamin=$data['jenis_kelamin'];
    $email=$data['email'];
    $foto=$data['foto'];
    $level=$data['level'];
    $username=$data['username'];
    $passlama=$data['password'];
?>

<section class="content-header">      
    <h1> Edit Admin</h1>
    <ol class="breadcrumb">
        <li><a href="homepage.php?p=dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Admin</li>
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
                            <!-- form nama lengkap-->
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama" placeholder="masukkan nama" name="nama" value="<?php echo "$nama";?>" required>
                            </div>
                            <!-- form email-->
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" id="email" placeholder="masukkan email" name="email" value="<?php echo "$email";?>" required>
                            </div>
                            <!-- form jenis kelamin-->
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <div class="radio" name="jenis_kelamin" required>
                                    <p><label><input type="radio" name="jenis_kelamin" value="L" <?php if($kelamin=='L'){echo 'checked';}?>>Laki-laki</label></p>
                                    <p><label><input type="radio" name="jenis_kelamin" value="P" <?php if($kelamin=='P'){echo 'checked';}?>>Perempuan</label></p>
                                </div>
                            </div>
                            <!-- form username-->
                            <div class="form-group">
                                <label>Username</label> 
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-user"></i>
                                    </div>
                                    <input type="text" class="form-control" placeholder="username" id="username" name="username" value="<?php echo "$username";?>" readonly>
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
                                <p class="help-block">*Ukuran gambar jangan lebih dari 100kb</p>
                            </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" name="simpan" class="btn btn-primary"><i class="fa fa-check"></i> simpan</button>
                        <a class="btn btn-primary" href="homepage.php?p=data_admin"><i class="fa fa-mail-reply"></i> batal </a>
                    </div>
                    </form>
                    <?php
                        $x1 = trim ($_POST['nama']);
                        $x2 = trim ($_POST['email']);
                        $x3 = trim ($_POST['jenis_kelamin']);
                        $x4 = trim ($_POST['username']);
                        $lokasi_file    = $_FILES['fupload']['tmp_name'];
                        $nama_file      = $_FILES['fupload']['name'];
                        $ukuran_file    = $_FILES['fupload']['size'];
                        $pass = $_POST['password'];
                        $repass = $_POST['repass'];
                        $size = 100000;
                        if($pass==NULL)
                        {
                            $password=$passlama;
                            $flag="Password Tetap";
                        }
                        else if($pass==$repass)
                        {
                            $password = password_hash($pass, PASSWORD_DEFAULT);;
                            $flag ="Password Diganti";
                        }
                        else{
                            $password=$passlama;
                            echo "<script language='javascript'>alert('password konfirmasi berbeda');document.location='homepage.php?p=data_admin';</script>"; 
                        }
                            
                        if (isset($_POST[simpan])) {
                            
                            if(!empty($lokasi_file))
                            {
                                move_uploaded_file($lokasi_file,"foto/$nama_file");
                                if($ukuran_file > $size)
                                {
                                    echo "<strong>Gagal upload! <br>Ukuran Maksimal 100kb, saat ini ukuran file ".$ukuran_file."</strong>";
                                    exit();
                                }
                                $q = mysql_query("UPDATE admin set nama_lengkap='$x1',email='$x2',jenis_kelamin='$x3',username='$x4',password='$password',foto='$nama_file',level='a' WHERE username='$ID' ");
                                if($q)
                                    {
                                        echo "<script language='javascript'>alert('Data Berhasil Diubah');document.location='homepage.php?p=data_admin';</script>";
                                    }
                                else
                                    {
                                        echo "<script language='javascript'>alert('Data Gagal Diubah');document.location='homepage.php?p=data_admin';</script>"; 
                                    }
                            }
                            else
                            {
                                $q = mysql_query("UPDATE admin set nama_lengkap='$x1',email='$x2',jenis_kelamin='$x3',username='$x4',password='$password',level='a' WHERE username='$ID' ");
                                    if($q)
                                        {
                                            echo "<script language='javascript'>alert('Data Berhasil Diubah');document.location='homepage.php?p=data_admin';</script>";
                                        }
                                    else
                                        {
                                            echo "<script language='javascript'>alert('Data Gagal Diubah');document.location='homepage.php?p=data_admin';</script>"; 
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