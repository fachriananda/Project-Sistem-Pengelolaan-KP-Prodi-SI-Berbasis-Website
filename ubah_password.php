<?php include '../config/koneksi.php'; ?>
<?php
    session_start();
    $ID = $_SESSION['username'];
    $passlama= $_SESSION['password'];
    $sql = mysql_query("SELECT * FROM admin WHERE username ='$ID'");
    $data=mysql_fetch_array($sql);
    $foto=$data['foto'];
?>

<section class="content-header">      
    <h1> Ubah Password</h1>
    <ol class="breadcrumb">
        <li><a href="homepage.php?p=dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Ubah Password</li>
    </ol>
</section>

<section class="content">
    <!-- quick email widget -->
    <div class="box box-info">            
        <div class="box-header">
            <div class="row-fluid">
                <div class="col-md-8">
                    <!-- form start -->
                    <form method="post" role="form">
                        <div class="box-body">
                            <!-- form password-->
                            <div class="form-group">
                                <label>Password Baru</label> 
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-key"></i>
                                    </div>
                                    <input type="password" class="form-control" placeholder="password" id="password" name="password" value="" >
                                </div>
                                <div class="form-group">
                                    <label for="repass" class="control-label">Konfirmasi Password</label>
                                    <input class="form-control" id="repass" name="repass" type="password" placeholder="Konfirmasi password">
                                </div>
                            </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" name="simpan" class="btn btn-primary"><i class="fa fa-check"></i> simpan</button>
                        <a class="btn btn-primary" href="homepage.php?p=dashboard"><i class="fa fa-mail-reply"></i> batal
                        </a>
                    </div>
                    </form>
                    <?php
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
                            echo "<script language='javascript'>alert('password konfirmasi berbeda');document.location='homepage.php?p=ubah_password';</script>"; 
                        }
                        if (isset($_POST[simpan])) {
                            $q = mysql_query("UPDATE admin SET password='$password' WHERE username = '$ID' ");
                            if($q){
                                echo "<script language='javascript'>alert('Data Berhasil Diubah');document.location='homepage.php?p=dashboard';</script>";
                            }
                            else{
                            echo "<script language='javascript'>alert('Data Gagal Diubah');document.location='homepage.php?p=ubah_password';</script>"; 
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
<!-- /.row (main row) -->
</section>    