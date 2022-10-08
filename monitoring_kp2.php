
    <section class="content-header">
    <h1> Data Bimbingan Kerja Praktek
        <!-- <a href="homepage.php?p=tambah"
            id='btn_add_new_data' class="btn btn-sm btn-success" title="Add Data">
                <i class="fa fa-plus-circle"></i> Add Data
        </a> -->
    </h1>
    <ol class="breadcrumb">
        <li><a href="homepage.php?p=dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Kerja Praktek</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- quick email widget -->
    <div class="box box-info">
        <div class="box-header">
            <div class="row-fluid" style="overflow:auto">

                <?php
                $sql =  "SELECT * FROM bimbingankp";
                $result = mysql_query($sql);
                $no_urut = 1;
                ?>

                <table id="tabelexport" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>NIM</th>
                            <th>Nama Mahasiswa</th>
                            <th>Program Studi</th>
                            <th>Dosbing</th>
                            <th>Semester Mulai KP</th>
                            <th>Semester Selesai KP</th>
                            <th>Aktivitas</th>
                            <th>Status</th>
                            <th>Uraian</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($data = mysql_fetch_array($result)) {
                        ?>
                            <tr>
                                <td><?php echo $data['nim']; ?></td>
                                <td><?php echo $data['nama_lengkap']; ?></td>
                                <td><?php echo $data['program_studi']; ?></td>
                                <td><?php echo $data['dosen_pembimbing']; ?></td>
                                <td><?php echo $data['semester_mulai_kp']; ?></td>
                                <td><?php echo $data['semester_selesai_kp']; ?></td>
                                <td><?php echo $data['aktivitas']; ?></td>

                                <?php
                                $arSt = array(
                                    "New" => "<span class='label label-warning'>New</span>",
                                    "ACC" => "<span class='label label-success'>ACC</span>",
                                    "Revisi" => "<span class='label label-danger'>Revisi</span>",
                                    "Selesai" => "<span class='label label-success'>Selesai</span>"
                                );
                                $st = $data['status'];
                                $status = $arSt[$st];
                                ?>
                                <td><?php echo $status; ?></td>
                                <td><?php echo $data['uraian']; ?></td>
                                <td>
                                    <a href='homepage.php?p=view_data_kp&view=<?php echo $data['id_bimbingan'] ?>'>
                                        <button id='btn_create' class='btn btn-xs btn-primary' data-toggle='tooltip' data-container='body' title='Lihat Data'><span class='glyphicon glyphicon-eye-open' aria-hidden='true'></span></button></a>
                                </td>
                            </tr>
                        <?php
                            $no_urut++;
                        }
                        ?>
                    </tbody>
                    <!-- <tfoot>
                        <tr>
                            <th>NIM</th>
                            <th>Nama Mahasiswa</th>
                            <th>Program Studi</th>
                            <th>Dosbing</th>
                            <th>Semester Mulai KP</th>
                            <th>Semester Selesai KP</th>
                            <th>Aktivitas</th>
                            <th>Status</th>
                        </tr>
                    </tfoot> -->
                </table>
            </div>
        </div>
    </div>
    <!-- /.row (main row) -->
</section>
 