<section class="content-header">      
    <h1> Persetujuan Judul Kerja Praktek Yang Ditolak </h1>
    <ol class="breadcrumb">
        <li><a href="homepage.php?p=dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Persetujuan Judul Kerja Praktek Yang Ditolak</li>
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
                    $sql =  "SELECT  * FROM pengajuan WHERE jenis_laporan='kp'";
                    $result = mysql_query($sql);
                    $no_urut = 1;
                ?>
                
                <table id="myTable" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>NIM</th>
                            <th>Nama Lengkap</th>
                            <th>Judul Laporan</th>
                            <th>Semester</th>
                            <th>Tahun Ajaran</th>
                            <th>File</th>
                            <th>Jenis Laporan</th>
                            <th>Status Kaprodi</th>
                           
                            <th>Tanggal Pengajuan</th>
                            <th>Dosen Pembimbing</th>
                            <th>Opsi</th>
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
                            </td>
                            <td>
                            <?php
								if ($data["semester"]=="ganjil"){
								    echo "Ganjil";
								}
								else{
								    echo "Genap";
								}
							?>
                            </td>	
                            <td><?php echo $data ['thn_ajaran']; ?></td>
                            <td><?php echo $data ['file']; ?></td>
                            <td>
                            <?php
								if ($data["jenis_laporan"]=="kp"){
								    echo "Kerja Praktek";
								}
								else{
								    echo "Skripsi";
								}
							?>
                            </td>

                            <?php
                                $arSt = array(
                                    "0" => "<span class='label label-warning'>Dalam proses</span>",
                                    "1" => "<span class='label label-success'>Diterima</span>",
                                    "2" => "<span class='label label-danger'>Ditolak</span>"
                                );
                                    $st = $data['status'];
                                    $statusdkn = $arSt[$st];
                            ?>
                            <td><?php echo $statusdkn ?></td>

                            <?php
								$arSt = array(
                                    "0" => "<span class='label label-warning'>Dalam proses</span>",
                                    "1" => "<span class='label label-success'>Diterima</span>",
                                    "2" => "<span class='label label-danger'>Ditolak</span>"
                                );
                           
                            ?>
                    
                            <td><?php echo $data ['tanggal']; ?></td>
                            <td><?php echo $data ['pembimbing1']; ?></td>
                            <td>
                                <a href='homepage.php?p=edit_distribusitolak&ubah=<?php echo $data[id_pengajuan] ?>' >
                                <button id='btn_create' class='btn btn-xs btn-primary' data-toggle='tooltip' data-container='body' title='Ubah Distribusi'><span class='glyphicon glyphicon-check' aria-hidden='true'></span></button>
                                </a><br><br>                            
                                                        
                                <?php echo " <a href='../kaprodi/file/$data[file]'>";?>
                                <button id='btn_create' class='btn btn-xs btn-primary' data-toggle='tooltip' data-container='body' title='Download File'><span class='glyphicon glyphicon-download-alt' aria-hidden='true'></span></button></a>
                            </td>		     
                        </tr>
                        <?php
                            $no_urut++;
                        }
                        ?>  
                    </tbody>
                </table>
                
                <?php
                    $sql_komen =  "SELECT * FROM komentar_tolak ";
                    $result_komen = mysql_query($sql_komen);
                    $no_urut_komen = 1;

                    while ($data = mysql_fetch_array($result_komen)) {

                ?>
<table> 
<tr>
    <td><?php echo $data["komentar_tolak"] ?></td>
    <td>
        <a href='homepage.php?p=hapus_komentolak&hapus=<?php echo $data[id_komentar_tolak]; ?>' >
        <button id='btn_create' name="hapus" class='btn btn-xs btn-danger' data-toggle='tooltip' data-container='body' title='Hapus'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></button></a>
    </td>      
</tr>
</table>
<?php $no_urut_komen++;
} 
 ?>

            </div>
        </div>
    </div>
<!-- /.row (main row) -->
</section>    