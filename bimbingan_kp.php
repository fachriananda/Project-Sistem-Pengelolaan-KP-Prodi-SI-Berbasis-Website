<?php include '../config/koneksi.php'; ?>


<section class="content-header">
    <h1> Data Bimbingan Kerja Praktek
        <!-- <a href="homepage.php?p=tambah"
            id='btn_add_new_data' class="btn btn-sm btn-success" title="Add Data">
                <i class="fa fa-plus-circle"></i> Add Data
        </a> -->
    </h1>
    <ol class="breadcrumb">
        <li><a href="homepage.php?p=dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data Bimbingan Kerja Praktek</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- quick email widget -->
    <div class="box box-info">
        <div class="box-header">
            <div class="row-fluid" style="overflow:auto">
                <!-- <div class="col-md-8"> -->
                <!-- <a href="homepage.php?p=add_bimbingan_kp"
            id='btn_add_new_data' class="btn btn-sm btn-success" title="Add Data">
                <i class="fa fa-plus-circle"></i> Tambah</a> -->
                <!-- <a href="homepage.php?p=add_admin" id="btn_create" class='btn btn-success'><span class='glyphicon glyphicon-plus'></span> Tambah </a> -->
                <!-- </div><br/><br/><br/> -->

                <?php
                $sql =  "SELECT * FROM bimbingankp";
                $result = mysql_query($sql);
                $no_urut = 1;
                ?>

                <table id="tabelkp" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIM</th>
                            <th>Nama Mahasiswa</th>
                            <th>Program Studi</th>
                            <th>Dosbing</th>
                            <th>Tanggal Input</th>
                            <th>Semester Mulai KP</th>
                            <th>Semester Selesai KP</th>
                            <th>Aktivitas</th>
                            <th>Jenis Laporan</th>
                            <th>File</th>
                            <th>Status KP</th>
                            <th>Status Bimbingan</th>
                            <th>Tanggal Koreksi</th>
                            <th>Uraian</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($data = mysql_fetch_array($result)) {
                        ?>
                            <tr>
                                <td></td>
                                <td><?php echo $data['nim']; ?></td>
                                <td><?php echo $data['nama_lengkap']; ?></td>
                                <td><?php echo $data['program_studi']; ?></td>
                                <td><?php echo $data['dosen_pembimbing']; ?></td>
                                <td><?php echo strftime('%d %B %Y', $data['tgl_input']); ?></td>
                                <td><?php echo $data['semester_mulai_kp']; ?></td>
                                <td><?php echo $data['semester_selesai_kp']; ?></td>
                                <td><?php echo $data['aktivitas']; ?></td>
                                <td><?php echo $data['jenis_laporan']; ?></td>
                                <td><?php echo $data['file']; ?></td>
                                <td><?php echo $data['status_kp']; ?></td>
                                <td><?php echo $data['status']; ?></td>
                                <td><?php echo strftime('%d %B %Y', $data['tgl_koreksi']); ?></td>
                                <td><?php echo $data['uraian']; ?></td>
                                <td>
                                    <a href='homepage.php?p=edit_bimbingan_kp&ubah=<?php echo $data['id_bimbingan'] ?>'>
                                        <button id='btn_create' class='btn btn-xs btn-primary' data-toggle='tooltip' data-container='body' title='Ubah'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></button></a>

                                    <a href='homepage.php?p=hapus_bimbingan_kp&hapus=<?php echo $data['id_bimbingan'] ?>' onclick="return confirm('Yakin ingin menghapus data?')">
                                        <button id='btn_create' class='btn btn-xs btn-danger' data-toggle='tooltip' data-container='body' title='Hapus'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></button></a>
                                </td>
                            </tr>
                        <?php
                            $no_urut++;
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tfoot>
                </table>

            </div>
        </div>
    </div>
    <!-- /.row (main row) -->
</section>