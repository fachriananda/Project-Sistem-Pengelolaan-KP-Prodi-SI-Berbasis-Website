<section class="content-header">      
    <h1> Jadwal Dosen Pembimbing </h1>
    <ol class="breadcrumb">
        <li><a href="homepage.php?p=dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Jadwal Dosen Pembimbing</li>
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
                    $sql =  mysql_query("SELECT * FROM jadwal WHERE status='1' AND status1='0' ORDER BY id_jadwal DESC");
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
                            <th>Status Dekan</th>
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
                                    "2" => "<span class='label label-danger'>Tidak Disetujui</span>"
                                );
                                    $st = $data['status'];
                                    $status = $arSt[$st];

                            $arSt1 = array(
                                    "0" => "<span class='label label-warning'>Dalam Proses</span>",
                                    "1" => "<span class='label label-success'>Disetujui</span>",
                                    "2" => "<span class='label label-danger'>Tidak Disetujui</span>"
                                );
                                    $st1 = $data['status1'];
                                    $status1 = $arSt1[$st1];
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
                            <td><?php echo "$tgl_input" ?></td>
                            <td><?php echo "$status" ?></td> 
                            <td><?php echo "$status1" ?></td>            
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