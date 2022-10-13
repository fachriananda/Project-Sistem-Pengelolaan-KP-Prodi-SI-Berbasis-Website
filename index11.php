<?php include '../config/koneksi.php'; ?>
<section class="content-header">      
<h1> Seminar KP</h1>
<ol class="breadcrumb">
    <li><a href="homepage.php?p=dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Seminar KP</li>
</ol>
</section>

<!-- Main content -->
<section class="content">
<!-- quick email widget -->
<div class="box box-info">            
    <div class="box-header">
        <div class="row-fluid" style="overflow:auto">
            <div class="col-md-8">
            <a href="homepage.php?p=index06" id="btn_create" class='btn btn-success'><span class='glyphicon glyphicon-plus'></span> Tambah </a>
            </div><br/><br/><br/>
          

            <?php
                $sql =  "SELECT * FROM seminar";
                $result = mysql_query($sql);
                $no_urut=1;
            ?>

            <table id="myTable" class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>nama mhs</th>
                  
                        <th>nama dosen pembimbing</th>
                        <th>nama dosen penguji</th>
                        <th>Kontak Dosen Penguji</th>


                        <th>Tahun/Bulan/Tanggal</th>
                        <th>masuk</th>

                        <th>selesai</th>
                       <th>tempat</th>
                        <th>status</th>
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
                        
                        <td><?php echo $data ['pembimbing1']; ?></td>
                        <td><?php echo $data ['penguji1']; ?></td>
                        <td><?php echo $data ['k_penguji1']; ?></td>

                        <td><?php echo $data ['tanggal']; ?></td>
                        <td><?php echo $data ['jam']; ?></td>
                        <td><?php echo $data ['jam01']; ?></td>
                        <td><?php echo $data ['tempat']; ?></td>
                        <?php
                                $arSt = array(
                                    "0" => "<span class='label label-danger'>Sedang Sidang</span>",
                                    "1" => "<span class='label label-warning'>Belum Sidang</span>",
                                    "2" => "<span class='label label-success'>Selesai Sidang</span>"

                            
                                );
                                $st = $data['status'];
                                $status = $arSt[$st];
                                ?>
                                <td><?php echo $status ?></td>
                
                        <td>
                            <a href='homepage.php?p=index12&ubah=<?php echo $data[id] ?>' >
                            <button id='btn_create' class='btn btn-xs btn-primary' data-toggle='tooltip' data-container='body' title='Ubah'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></button></a>
                            
                            <a href='homepage.php?p=index13&hapus=<?php echo $data[id] ?>' >
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