
<?php
if ($_GET['mode']=='kirim'){
            
            $i = $_GET['kid'];
            mysql_query("UPDATE jadwal SET statuskirim='1' WHERE id_jadwal = '$i'");
            echo "<script language='javascript'>alert('Jadwal Berhasil Dikirim');document.location='homepage.php?p=riwayat_jadwal';</script>";
            
        }  
?>

<section class="content-header">      
    <h1> Riwayat Jadwal
        <!-- <a href="homepage.php?p=tambah"
            id='btn_add_new_data' class="btn btn-sm btn-success" title="Add Data">
                <i class="fa fa-plus-circle"></i> Add Data
        </a> -->
    </h1>
    <ol class="breadcrumb">
        <li><a href="homepage.php?p=dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Riwayat Jadwal</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- quick email widget -->
    <div class="box box-info">            
        <div class="box-header">
            <div class="row-fluid" style="overflow:auto">
                <div class="col-md-8">
                
                </div>

                <?php
                    $sql =  mysql_query("SELECT * FROM jadwal WHERE nidn='$nidn'");
                    $no_urut=1;
                ?>

                <table id="myTable" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>NIDN</th>
                            <th>Semester</th>
                            <th>Tahun Ajaran</th>
                            <th>Jadwal</th>
                            <th>Tanggal Input</th>
                            <th>Status Kaprodi</th>
                        
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while ($data = mysql_fetch_array($sql)) {
                                $hari_3=$data['hari_3'];
                                $jam_3=$data['jam_3'];
                        ?>    
                        <tr>
                            <td align="center"><?php echo $no_urut; ?></td>
                            <td><?php echo $data ['nidn']; ?></td>
                            <td><?php echo $data ['semester']; ?></td>
                            <td><?php echo $data ['thn_ajaran']; ?></td>
                            <td><?php echo $data ['hari_1']; ?>  <?php echo ":" ;?> <?php echo $data ['jam_1']; ?><?php echo "</br>" ; ?>
                            <?php echo $data ['hari_2']; ?>  <?php echo ":" ;?> <?php echo $data ['jam_2']; ?>
                            <?php echo "</br>" ; ?>
                            <?php 
                                if(!empty($data['hari_3']) AND !empty($data['jam_3'])) {
                                    
                                    echo "$hari_3 : $jam_3"; 

                                }
                                else
                                {
                                    echo"";
                                }
                                
                                ?>
                            </td>
                            <?php $jtgl = tgl_indo($data['tgl_input']);?>
                            <td><?php echo $jtgl ?></td>
                           
                            <?php
								$arSt = array(
                                    "0" => "<span class='label label-warning'>Dalam Proses</span>",
                                    "1" => "<span class='label label-success'>Disetujui</span>",
                                    "2" => "<span class='label label-danger'>Tidak Disetujui</span>"
                                );
                                    $st = $data['status'];
                                    $status = $arSt[$st];

                                $arSt1 = array(
                                    "0" => "<span class='label label-warning'>Dalam Proses</span>",
                                    "1" => "<span class='label label-success'>Disetujui</span>",
                                    "2" => "<span class='label label-danger'>Tidak Disetujui</span>"
                                );
                                
                            ?>

                            <td><?php echo $status ?></td>
                          
                            <td>
                                <?php
                                if ($data['statuskirim']=='0') {
                                    echo "<a href='homepage.php?p=edit_jadwal&ubah=$data[id_jadwal]' >
                                <button id='btn_create' class='btn btn-primary' data-toggle='tooltip' data-container='body' title='Ubah'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></button></a><br/><br/>

                                <a href='homepage.php?p=hapus_jadwal&hapus=$data[id_jadwal]' ><button id='btn_create' class='btn btn-danger' data-toggle='tooltip' data-container='body' title='Hapus'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></button></a><br/><br/>

                                <a href='homepage.php?p=riwayat_jadwal&mode=kirim&kid=$data[id_jadwal]' id='btn_create' class='btn btn-success' data-toggle='tooltip' data-continer='body' title='Klik Untuk Mengirim Jadwal (pastikan jadwal sudah benar)'><span class='fa fa-square' aria-hidedden='true'></span>
                                 </a>";



                                }
                                elseif ($data['statuskirim']=='1') {
                                    echo"
                                    <a href='#' id='btn_create' class='btn btn-success' data-toggle='tooltip' data-continer='body' title='Jadwal Sudah Dikirim'><span class='glyphicon glyphicon-ok' aria-hidedden='true'></span>
                                </a>

                                    ";
                                }

                                
                                ?>

                                 
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