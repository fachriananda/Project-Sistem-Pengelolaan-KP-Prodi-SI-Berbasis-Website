<section class="content-header">      
    <h1> Jumlah Mahasiswa Bimbingan
        <!-- <a href="homepage.php?p=tambah"
            id='btn_add_new_data' class="btn btn-sm btn-success" title="Add Data">
                <i class="fa fa-plus-circle"></i> Add Data
        </a> -->
    </h1>
    <ol class="breadcrumb">
        <li><a href="homepage.php?p=jumlah_mhs"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Jumlah Mahasiswa Bimbingan</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- quick email widget -->
    <div class="box box-info">            
        <div class="box-header">
            <div class="row-fluid" style="overflow:auto">
                <div class="col-md-8">
                <h4>Jumlah Bimbingan Mahasiswa</h4>
                </div><br/><br/><br/>

                <?php
                    $sql =  "SELECT * FROM pengajuan WHERE pembimbing1='$nama_do' ";
                    $result = mysql_query($sql);
                    $no_urut=1;
                ?>

                <table id="myTable" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>NIM</th>
                            <th>Nama Mahasiswa</th>
                            <th>Judul</th>
                            <th>Program Studi</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while ($data = mysql_fetch_array($result)) {
                        ?>    
                        <tr>
                            <td align="center"><?php echo $no_urut; ?>.</td>
                            <td><?php echo $data ['nim']; ?></td>
                            <td><?php echo $data ['nama_lengkap']; ?></td>
                            <td><?php echo $data ['judul']; ?></td>
                            <td><?php echo $data ['program_studi']; ?></td>
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