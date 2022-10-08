<section class="content-header">
    <h1> Data Bimbingan Kerja Praktek
        <!-- <a href="homepage.php?p=tambah"
            id='btn_add_new_data' class="btn btn-sm btn-success" title="Add Data">
                <i class="fa fa-plus-circle"></i> Add Data
        </a> -->
    </h1>
    <br>
    <a href="?p=eksport" style=""><button type="button" class="btn btn-primary">Eksport Data</button></a>
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
                            <th>No</th>
                            <th>NIM</th>
                            <th>Nama Mahasiswa</th>
                            <th>Program Studi</th>
                            <th>Dosbing</th>
                            <th>Semester Mulai KP</th>
                            <th>Semester Selesai KP</th>
                            <th>Aktivitas</th>
                            <th>Status KP</th>
                            <th>Status Bimbingan</th>
                            <th>Uraian</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($data = mysql_fetch_array($result)) {
                        ?>
                            <tr>
                                <td align="center"></td>
                                <td><?php echo $data['nim']; ?></td>
                                <td><?php echo $data['nama_lengkap']; ?></td>
                                <td><?php echo $data['program_studi']; ?></td>
                                <td><?php echo $data['dosen_pembimbing']; ?></td>
                                <td><?php echo $data['semester_mulai_kp']; ?></td>
                                <td><?php echo $data['semester_selesai_kp']; ?></td>
                                <td><?php echo $data['aktivitas']; ?></td>
                                <td><?php echo $data['status_kp']; ?></td>
                                <td><?php echo strtoupper($data['status']); ?></td>
                                <!-- <td>
                                    <?php
                                    // if($data["status"] == 'New'){
                                    //     echo "<span class='label label-warning'>New</span>";
                                    // } 
                                    // elseif($data["status"] == 'ACC'){
                                    //     echo "<span class='label label-success'>ACC</span>";
                                    // }
                                    // elseif($data["status"] == 'Revisi'){
                                    //     echo "<span class='label label-danger'>Revisi</span>";
                                    // } 
                                    // elseif($data["status"] == 'Selesai'){
                                    //     echo "<span class='label label-success'>Selesai</span>";
                                    // }
                                    ?>
                                </td> -->
                                <td><?php echo $data['uraian']; ?></td>
                            </tr>
                        <?php
                            $no_urut++;
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
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
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <!-- /.row (main row) -->
</section>