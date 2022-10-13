<section class="content-header">      
    <h1> Jadwal Disetujui </h1>
    <ol class="breadcrumb">
        <li><a href="homepage.php?p=dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Jadwal Distujui </li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- quick email widget -->
    <div class="box box-info">            
        <div class="box-header">
            <div class="row-fluid" style="overflow:auto">
                <div class="col-md-8"></div>

                <?php
                    $sql =  mysql_query("SELECT * FROM jadwal WHERE status='1' ORDER BY id_jadwal DESC");
                    $no_urut = 1;
                ?>
                
                <table id="myTable" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>NIDN</th>
                            <th>Nama Dosen</th>
                            <th>Semester</th>
                            <th>Tahun Ajaran</th>
                            <th>Jadwal</th>
                            <th>Tanggal Input</th>
                            <th>Status Kaprodi</th>
                        
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while ($data = mysql_fetch_array($sql)) {
                            $nama = getValue("nama_lengkap","dosen","nidn='$data[nidn]'");
                            $jtgl = tgl_indo($data['tgl_input']);
                            $arSt = array(
                                    "0" => "<span class='label label-warning'>Dalam Proses</span>",
                                    "1" => "<span class='label label-success'>Disetujui</span>",
                                    "2" => "<span class='label label-danger'>Tidak Disetujui</span>",
                                    "3" => "<span class='label label-primary'><i class='fa fa-check'></i></span>"
                                );
                                    $st = $data['status'];
                                    $status = $arSt[$st];
                                    $statusexport = $data['status_judulexpor'];
                                    $statusex = $arSt[$statusexport];

                      
                        ?>    
                        <tr>
                            <td align="center"><?php echo $no_urut; ?></td>
                            <td><?php echo $data ['nidn']; ?></td>
                            <td><?php echo "$nama" ?></td>
                            <td><?php echo $data ['semester']; ?></td> 
                            <td><?php echo $data ['thn_ajaran']; ?></td>
                            <td><?php echo $data ['hari_1']; ?>  <?php echo ":" ;?> <?php echo $data ['jam_1']; ?><?php echo "</br>" ; ?>
                                <?php echo $data ['hari_2']; ?>  <?php echo ":" ;?> <?php echo $data ['jam_2']; ?>
                            </td>
                            <td><?php echo "$jtgl" ?></td>
                            <td><?php echo "$status" ?><br><?php echo $statusex ?></td>
                        
                            <td>        
                                <a href='homepage.php?p=hapus_jadwal&hapus=<?php echo $data[id_jadwal] ?>' >
                                <button id='btn_create' class='btn btn-xs btn-danger' data-toggle='tooltip' data-container='body' title='Hapus'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></button></a>
                            </td>           
                        </tr>
                        <?php
                            $no_urut++;
                        }
                        ?>  
                    </tbody>
                </table>

                 <form role="form" method="POST" enctype="multipart/form-data">                      
                    <button type="submit" class="btn btn-success" name="simpan">Share</button>
                 </form>                                
                 <!-- <a href="modular/export_jadwal.php">                   
                    <button type="submit" class="btn btn-success" name="export">export</button>
                </a> -->
                <br>
                <a href="modular/export_jadwal.php">                   
                    <button type="submit" class="btn btn-success" name="export">export</button>
                </a>
                <br>
                <br>
                <!-- <div class="box-footer -->  
                <form role="form" method="POST" action="">                                 
                    <button type="submit" name="expor" class="btn btn-success"><i class="fa fa-check"></i>Approve</button>
                    <button type="submit" name="btl" class="btn btn-success">Batal</button>
                </form>
                <!-- </div>  -->
            </div>
        </div>
    </div>
<!-- /.row (main row) -->
</section>    

<?php
                        if (isset($_POST["expor"])) {
                            {
                                $q = mysql_query("UPDATE jadwal set status_judulexpor ='3'");
                                if($q){
                                    echo "<script language='javascript'>alert('Berhasil Approve');document.location='homepage.php?p=jadwal_disetujui';</script>";
                                    }
                                else{
                                    echo "<script language='javascript'>alert('Gagal Approve');document.location='homepage.php?p=jadwal_disetujui';</script>"; 
                                    }
                            }
                        }
                        if (isset($_POST["btl"])) {
                            {
                                $q = mysql_query("UPDATE jadwal set status_judulexpor =''");
                                if($q){
                                    echo "<script language='javascript'>document.location='homepage.php?p=jadwal_disetujui';</script>";
                                    }
                                else{
                                    echo "<script language='javascript'>alert('Gagal Approve');document.location='homepage.php?p=jadwal_disetujui';</script>"; 
                                    }
                            }
                        }
