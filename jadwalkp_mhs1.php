<?php include '../config/koneksi.php';
         $sql =  "SELECT * FROM jadwalkp_mhs";
         $result = mysql_query($sql);
          ?>
<section class="content-header">
    <h1> Jadwal KP Mahasiswa
        <!-- <a href="homepage.php?p=tambah"
            id='btn_add_new_data' class="btn btn-sm btn-success" title="Add Data">
                <i class="fa fa-plus-circle"></i> Add Data
        </a> -->
    </h1>
    <br>
    <a href="homepage.php?p=jadwalkp_mhs" id="btn_create" class='btn btn-success'><span class='glyphicon glyphicon-plus'></span> Tambah </a>
 
    <ol class="breadcrumb">
        <li><a href="homepage.php?p=dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Jadwal KP Mahasiswa</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- quick email widget -->
    <div class="box box-info">
        <div class="box-header">
            <div class="row-fluid" style="overflow:auto">

                <?php
       
                $no_urut = 1;
                ?>

<table id="myTable"" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                        <th>No.</th>
                        <th>nama mhs</th>
                  
                        <th>nim</th>
                        <th>nama dosen peembimbing</th>

                        <th>Mulai KP Tahun/Bulan/Tanggal</th>
                    

                        <th>Selesai KP Tahun/Bulan/Tanggal</th>
            
                 
                        <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($data = mysql_fetch_array($result)) {
                        ?>
                            <tr>
                            <td align="center"><?php echo $no_urut; ?>.</td>
                 
                 <td><?php echo $data ['nama_mhs']; ?></td>
                 <td><?php echo $data ['nim']; ?></td>
                 <td><?php echo $data ['pembimbing1']; ?></td>
                
                 <td><?php echo $data ['tanggal']; ?></td>
               
                 <td><?php echo $data ['tanggal1']; ?></td>
                                <!-- <td>
                                    <?php
                                    // if($data["status"] == 'New'){
                                    //     echo "<span class='label label-warning'>New</span>";
                                    // } 
                                    // elseif($data["status"] == 'ACC'){
                                    //     echo "<span class='label label-success'>ACC</span>";
                                    // }
                                    // elseif($data["status"] == 'Revisi'){
                                    //     echo "<span class='label label-danger'>Revisi</span>";
                                    // } 
                                    // elseif($data["status"] == 'Selesai'){
                                    //     echo "<span class='label label-success'>Selesai</span>";
                                    // }
                                    ?>
                                </td> -->
                
                                <td>
                            <a href='homepage.php?p=editjadwalkp&ubah=<?php echo $data[id] ?>' >
                            <button id='btn_create' class='btn btn-xs btn-primary' data-toggle='tooltip' data-container='body' title='Ubah'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></button></a>
                            
                            <a href='homepage.php?p=hapusjadwalkp&hapus=<?php echo $data[id] ?>' >
                            <button id='btn_create' class='btn btn-xs btn-danger' data-toggle='tooltip' data-container='body' title='Hapus'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></button></a>
                        </td>	
                            </tr>
                        <?php
                            $no_urut++;
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
              
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <!-- /.row (main row) -->
</section>