<?php include '../config/koneksi.php'; ?>

<?php 
    $id =$_GET['ubah'];
    $sql = mysql_query("SELECT * FROM tahunajaran WHERE id = '$id'");
    $data=mysql_fetch_array($sql);

    $tahunajaran = $data['tahunajaran'];
?>

<section class="content-header">      
    <h1> Edit Tahun Ajaran</h1>
    <ol class="breadcrumb">
        <li><a href="homepage.php?p=dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Tahun Ajaran</li>
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
                                <label>Tahun Ajaran</label>
                                <input type="text" class="form-control" id="tahunajaran" name="tahunajaran" value="<?php echo $tahunajaran;?>">
                                <input type="hidden" class="form-control" name="id" value="<?php echo $id;?>" readonly>
                            </div>
                            <div class="box-footer">
                                <button type="submit" name="ubah" class="btn btn-primary"><i class="fa fa-check"></i> simpan</button>
                            <a class="btn btn-primary" href="homepage.php?p=tahun_ajaran"><i class="fa fa-mail-reply"></i> batal </a>
                        </div>
                    </form>
                    <?php
                        $id = $_POST["id"];
                        $tahunajaran = trim($_POST['tahunajaran']);
                        $ubah = $_POST["ubah"];

                        if (isset($ubah)) {
                                
                            $query = mysql_query("UPDATE tahunajaran set tahunajaran = '$tahunajaran' WHERE id = '$id' ");
                            if($query){
                                echo "<script language='javascript'>alert('Data Berhasil Diubah');document.location='homepage.php?p=tahun_ajaran';</script>";
                            }
                            else{
                                echo "<script language='javascript'>alert('Data Gagal Diubah');document.location='homepage.php?p=tahub_ajaran';</script>";
                            }

                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
<!-- /.row (main row) -->
</section> 