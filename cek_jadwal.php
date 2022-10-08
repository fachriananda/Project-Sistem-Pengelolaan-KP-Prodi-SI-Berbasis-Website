<section class="content-header">      
    <h1> Jadwal Baru</h1>
    <ol class="breadcrumb">
        <li><a href="homepage.php?p=dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Jadwal Baru </li>
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
                    $sql =  mysql_query("SELECT * FROM jadwal WHERE status='0' AND status1='0' AND statuskirim='1' ORDER BY id_jadwal DESC");
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
                    
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while ($data = mysql_fetch_array($sql)) {
                            $hari_3=$data['hari_3'];
                            $jam_3=$data['jam_3'];
                            $nama = getValue("nama_lengkap","dosen","nidn='$data[nidn]'");
                            $jtgl = tgl_indo($data['tgl_input']);
                            $arSt = array(
                                    "0" => "<span class='label label-warning'>Dalam Proses</span>",
                                    "1" => "<span class='label label-success'>Disetujui</span>",
                                    "2" => "<span class='label label-danger'>Tidak Disetujui</span>"
                                );
                                    $st = $data['status'];
                                    $status = $arSt[$st];

                        
                        ?>    
                        <tr>
                            <td align="center"><?php echo $no_urut; ?></td>
                            <td><?php echo $data ['nidn']; ?></td>
                            <td><?php echo "$nama" ?></td>
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
                            <td><?php echo "$jtgl" ?></td>
                            <td><?php echo "$status" ?></td>  
                   
                            <td>        
                                <a href='homepage.php?p=hapus_cek&hapus=<?php echo $data[id_jadwal] ?>' >
                                <button id='btn_create' class='btn btn-xs btn-danger' data-toggle='tooltip' data-container='body' title='Hapus'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></button></a>
                            </td>           
                        </tr>
                        <?php
                            $no_urut++;
                        }
                        ?> 
                    </tbody>
                </table>
                <ul class="timeline">
                <li class="time-label">
                  <span class="bg-red">
                    *Jadwal pada halaman ini harus di setujui, agar jadwal selanjutnya bisa disetujui oleh Dekan
                  </span>
                 </li>
                </ul>
        <form role="form" method="POST" enctype="multipart/form-data">
            <button type="submit" class="btn btn-success" name="simpan">Setujui</button>
                <?php
                        if (isset($_POST[simpan])) {
                            
                                $q = mysql_query("UPDATE jadwal SET status='1' WHERE status='0' ");
                                
                                if ($q){
                                    echo "<script language='javascript'>alert('Jadwal Berhasil Disetujui');document.location='homepage.php?p=jadwal_disetujui';</script>";
                                } 
                                else {
                                    echo "<script language='javascript'>alert('Jadwal Gagal Disetujui');document.location='homepage.php?p=cek_jadwal';</script>";
                                }
                            }
                    ?>
                </form>
            </div>
        </div>
    </div>
<!-- /.row (main row) -->
</section>    