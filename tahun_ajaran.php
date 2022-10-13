<?php include '../config/koneksi.php'; ?>


<section class="content-header">      
    <h1> Data Tahun Ajaran </h1>
    <ol class="breadcrumb">
        <li><a href="homepage.php?p=dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data Tahun Ajaran</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- quick email widget -->
    <div class="box box-info">            
        <div class="box-header">
            <div class="row-fluid" style="overflow:auto">
                <div class="col-md-8">
                    <form method="POST" enctype="multipart/form-data">
                        <div class="box-body">
                            <!-- form tahun ajaran-->
                            <div class="form-group" style="display: inline-block;">
                                <label>Tahun Ajaran</label>
                                <input type="text" class="form-control" id="tahunajaran" placeholder="SEMESTER GANJIL 2017/2018" name="tahunajaran" required>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer" style="display: inline-block;">
                                <button type="submit" name="tambah" class="btn btn-primary"><i class="fa fa-check"></i> tambah</button>
                            </div>
                        </div>
                    </form>
                </div><br/><br/><br/>

                <?php
                    $sql =  "SELECT * FROM tahunajaran";
                    $result = mysql_query($sql);
                    $no_urut=1;
                ?>

                <table id="tbltahunajaran" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Tahun Ajaran</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while ($data = mysql_fetch_array($result)) {
                        ?>    
                        <tr>
                            <td><?php echo $data ['tahunajaran']; ?></td>
                            <td>
                                <a href='homepage.php?p=ubah_tahun_ajaran&ubah=<?php echo $data['id']; ?>' >
                                <button id='btn_create' class='btn btn-xs btn-primary' data-toggle='tooltip' data-container='body' title='Ubah'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></button></a>
                                
                                <a href='homepage.php?p=hapus_tahun_ajaran&hapus=<?php echo $data['id'] ?>' onclick="return confirm('Yakin ingin menghapus data?')">
                                <button id='btn_create' class='btn btn-xs btn-danger' data-toggle='tooltip' data-container='body' title='Hapus'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></button></a>
                            </td>		     
                        </tr>
                        <?php
                            $no_urut++;
                            }
                        ?>  
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>
<!-- /.row (main row) -->
</section>    

<?php
    $tahunajaran = trim(strtoupper($_POST['tahunajaran']));
    $tambah = $_POST["tambah"];
    
    if(isset($tambah)){
        $query = mysql_query("INSERT INTO tahunajaran (id,tahunajaran) VALUES ('','$tahunajaran')");
        if($query){
            echo "<script language='javascript'>document.location='homepage.php?p=tahun_ajaran';</script>";
        }
        else {
            echo "<script language='javascript'>alert('Data Gagal Ditambahkan');document.location='homepage.php?p=add_tahun_ajaran';</script>";
        }
    }
?>