<?php
	include '../../config/koneksi.php';

	// Fungsi header dengan mengirimkan raw data excel
	header("Content-type: application/vnd-ms-excel");
	 
	// Mendefinisikan nama file ekspor "hasil-export.xls"
	header("Content-Disposition: attachment; filename=bimbingankp.xls");
	 
	$sql =  "SELECT * FROM bimbingankp";
    $result = mysql_query($sql);
    $no_urut = 1;
    ?>

    <table id="myTable" class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th>No.</th>
                <th>NIM</th>
                <th>Nama Mahasiswa</th>
                <th>Program Studi</th>
                <th>Dosbing</th>
                <th>Tanggal Input</th>
                <th>Aktivitas</th>
                <th>Jenis Laporan</th>
                <th>File</th>
                <th>Status</th>
                <th>Tanggal Koreksi</th>
                <th>Uraian</th>
                <!-- <th>Opsi</th> -->
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
                    <td><?php echo $data['program_studi']; ?></td>
                    <td><?php echo $data['dosen_pembimbing']; ?></td>
                    <td><?php echo $data['tgl_input']; ?></td>
                    <td><?php echo $data['aktivitas']; ?></td>
                    <td><?php echo $data['jenis_laporan']; ?></td>
                    <td><?php echo $data['file']; ?></td>

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
                    <td><?php echo $status ?></td>

                    <td><?php echo $data['tgl_koreksi']; ?></td>
                    <td><?php echo $data['uraian']; ?></td>
                    <!-- <td>
                        <a href='homepage.php?p=view_data_kp&view=<?php //echo $data['id_bimbingan'] ?>'>
                            <button id='btn_create' class='btn btn-xs btn-primary' data-toggle='tooltip' data-container='body' title='Lihat Data'><span class='glyphicon glyphicon-eye-open' aria-hidden='true'></span></button></a>
                    </td> -->
                </tr>
            <?php
                $no_urut++;
            }
            ?>
        </tbody>
    </table>