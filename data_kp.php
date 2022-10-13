<?php include '../config/koneksi.php'; ?>


<section class="content-header">      
    <h1> Data Kerja Praktek </h1>
    <ol class="breadcrumb">
        <li><a href="homepage.php?p=dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data Kerja Praktek</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- quick email widget -->
    <div class="box box-info">            
        <div class="box-header">
            <div class="row-fluid" style="overflow:auto">
                <div class="col-md-8">
                    <a href="homepage.php?p=add_kp" id="btn_create" class='btn btn-success'><span class='glyphicon glyphicon-plus'></span> Tambah </a>
                </div> <br/><br/><br/>

                <?php
                    $sql =  "SELECT * FROM tblkp";
                    $result = mysql_query($sql);
                    $no_urut=1;
                ?>

                <table id="myTable" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>NIM</th>
                            <th>Nama Lengkap</th>
                            <th>Judul Laporan</th>
                            <th>Dosen Pembimbing</th>
                            <th>Program Studi</th>
                            <th>Semester</th>
                            <th>Tahun Ajaran</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while($data = mysql_fetch_array($result)) {
                        ?>    
                        <tr>
                            <td align="center"><?php echo $no_urut; ?>.</td>
                            <td><?php echo $data ['NIM']; ?></td>
                            <td><?php echo $data ['nama']; ?></td>
                            <td><?php echo $data ['judul']; ?></td>	
                            <td><?php echo $data ['pembimbing_1']; ?></td>
                            <td>
                            <?php
                                $qsp = mysql_query("SELECT * FROM prodi");
                                while ($s=mysql_fetch_array($qsp)) {
                                    if ($s[pnama]==$data[program_studi]){
                                        echo "<option value='$s[pnama]' <selected>$s[pnama]</option>";
                                    }
                                }
                            ?>
                            </td>	
                            <td>
                            <?php
								if ($data["semester"]=="ganjil"){
								    echo "Ganjil";
                                }
                                else {
								    echo "Genap";
                                }
							?>
                            </td>	
                            <td><?php echo $data ['tahun_ajaran']; ?></td>
                            <td>
                                <a href='homepage.php?p=edit_kp&ubah=<?php echo $data[NIM] ?>' >
                                <button id='btn_create' class='btn btn-xs btn-primary' data-toggle='tooltip' data-container='body' title='Ubah'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></button></a>
                                
                                <a href='homepage.php?p=hapus_kp&hapus=<?php echo $data[NIM] ?>' onclick='checkDelete()'>
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