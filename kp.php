<?php include '../config/koneksi.php'; ?>

<section class="content-header">
    <h1> Pengajuan Kerja Praktek </h1>
    <ol class="breadcrumb">
        <li><a href="homepage.php?p=dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Pengajuan Kerja Praktek</li>
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
                $sql =  "SELECT  * FROM pengajuan WHERE jenis_laporan='kp' ";
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
                            <th>Dosen Pembimbing</th>
                            <th>Pesan</th>
                            <th>Status</th>
                            <th>Tanggal Pengajuan</th>
                            <th>Surat Permohonan KP Untuk Mahasiswa</th>
                        
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($data = mysql_fetch_array($result)) {
                        ?>
                            <tr>
                                <td align="center"><?php echo $no_urut; ?>.</td>
                                <td><?php echo $data['nim']; ?></td>
                                <td><?php echo $data['nama_lengkap']; ?></td>
                                <td><?php echo $data['judul']; ?></td>
                                </td>
                                <td>
                                    <?php
                                    if ($data["semester"] == "ganjil") {
                                        echo "Ganjil";
                                    } else {
                                        echo "Genap";
                                    }
                                    ?>
                                </td>
                                <td><?php echo $data['thn_ajaran']; ?></td>
                                <td><?php echo $data['file']; ?></td>
                                <td>
                                    <?php
                                    if ($data["jenis_laporan"] == "kp") {
                                        echo "Kerja Praktek";
                                    } else {
                                        echo "Skripsi";
                                    }
                                    ?>
                                </td>
                                <td><?php echo $data ['pembimbing1']; ?></td>
                                <td><?php echo $data ['Komentar']; ?></td>
                                <?php
                                $arSt = array(
                                    "0" => "<span class='label label-warning'>Dalam proses</span>",
                                    "1" => "<span class='label label-success'>Diterima</span>",
                                    "2" => "<span class='label label-danger'>Ditolak</span>"
                                );
                                $st = $data['status'];
                                $status = $arSt[$st];
                                ?>
                                <td><?php echo $status ?></td>
                                <td><?php echo $data['tanggal']; ?></td>
                                <td><?php echo $data['file2']; ?></td>
                              
                                <td>                                    
                                    <a href='homepage.php?p=pengajuan_kp&pengajuan=<?php echo $data["id_pengajuan"] ?>'>
                                    <button id='btn_create' class='btn btn-xs btn-primary' data-toggle='tooltip' data-container='body' title='Pengecekkan & Distribusi'><span class='glyphicon glyphicon-check' aria-hidden='true'></span></button></a><br><br>

                                   
                                <?php echo " <a href='../mahasiswa/file/$data[file]'>";?>
                                <button id='btn_create' class='btn btn-xs btn-primary' data-toggle='tooltip' data-container='body' title='Download File'><span class='glyphicon glyphicon-download-alt' aria-hidden='true'></span></button></a>                               
                              
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