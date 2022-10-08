

<section class="content-header">      
    <h1> Tambah Dosen</h1>
    <ol class="breadcrumb">
        <li><a href="homepage.php?p=dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Tambah Dosen</li>
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
                            <!-- form nidn-->
                           <div class="form-group">
                                <label>NIDN</label>
                                <input type="text" class="form-control" id="nidn" placeholder="0601067503" name="nidn" required>
                            </div>
                            <!-- form nama lengkap-->
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama" placeholder="masukkan nama" name="nama" required>
                            </div>
                            <!-- form jenis kelamin-->
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <select class="form-control" name="jenis_kelamin" required>
                                    <option selected>Pilih Jenis Kelamin</option>
                                    <option value="L">Laki-laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
                            <!-- form email-->
                            <div class="form-group">
                                <label>Email</label> 
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-envelope"></i>
                                    </div>
                                    <input type="text" class="form-control" placeholder="masukkan email" id="email" name="email" required>
                                </div>
                            </div>
                            <!-- form jabatan fungsional-->
                            <div class="form-group">
                                <label>Jabatan Fungsional</label>
                                <input type="text" class="form-control" id="jf" placeholder="masukkan jabatan fungsional" name="jf" required>
                            </div>
                            <!-- form jabatan struktural-->
                            <div class="form-group">
                                <label>Jabatan Struktural</label>
                                <input type="text" class="form-control" id="js" placeholder="masukkan jabatan struktural" name="js" required>
                            </div>
                            <!-- form username-->
                            <div class="form-group">
                                <label>Username</label>   
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-user"></i>
                                    </div>
                                    <input type="text" class="form-control" placeholder="username" id="username" name="username" required>
                                </div>
                            </div>
                            <!-- form password-->
                            <div class="form-group">
                                <label>password</label>   
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-key"></i>
                                    </div>
                                    <input type="password" class="form-control" placeholder="password" id="password" name="password" required>
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
                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                    <div class="input-append">
                                        <div class="uneditable-input">
                                            <span class="fileupload-preview"></span>
                                        </div>
                                        <span class="btn btn-default btn-file">
                                            <span class="fileupload-exists">Change</span>
                                            <span class="fileupload-new">Select file</span>
                                            <input type="file" name="fupload" required/>
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
                        </div>
                    </form>
                    <?php
                    $x1 = trim ($_POST['nidn']);
                    $x2 = trim ($_POST['nama']);
                    $x3 = trim ($_POST['jenis_kelamin']);
                    $x4 = trim ($_POST['email']);
                    $x5 = trim ($_POST['jf']);
                    $x6 = trim ($_POST['js']);
                    $x7 = trim ($_POST['username']);
                    $x8 = trim ($_POST['level']);
                    $lokasi_file    = $_FILES['fupload']['tmp_name'];
                    $nama_file      = $_FILES['fupload']['name'];
                    move_uploaded_file($lokasi_file,"foto/$nama_file");
                    $pass = md5($_POST[password]);
                        
                        if (isset($_POST[simpan])) {
                            
                        $cekSql = mysql_query("SELECT * from dosen where nidn = '$x1'");
                        if (mysql_num_rows($cekSql)>=1)
                            {
                                echo "<script language='javascript'>alert('Maaf NIDN sudah ada silahkan ganti dengan yang lain');document.location='homepage.php?p=add_dosen';</script>";
                            }
                        else 
                            {
                        $q = mysql_query("INSERT INTO dosen (nidn,nama_lengkap,jenis_kelamin,email,jabatan_fungsional,jabatan_Struktural,foto,username,password,level)
                        VALUES ('$x1','$x2','$x3','$x4','$x5','$x6','$nama_file','$x7','$pass','$x8')");
                            }
                        if($q){
                            echo "<script language='javascript'>alert('Data Berhasil Ditambahkan');document.location='homepage.php?p=data_dosen';</script>";
                        }
                        else{
                           echo "<script language='javascript'>alert('Data Gagal Ditambahkan');document.location='homepage.php?p=add_dosen';</script>"; 
                        }
                    }
                        ?>
                </div>
            </div>
        </div>
    </div>
<!-- /.row (main row) -->
</section> 