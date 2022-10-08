<?php
include '../../config/koneksi.php';
include '../../config/fungsi.php';
include '../../config/fungsi_indotgl.php';

	// Fungsi header dengan mengirimkan raw data excel
	header("Content-type: application/vnd-ms-excel");
	 
	// Mendefinisikan nama file ekspor "hasil-export.xls"
	header("Content-Disposition: attachment; filename=Laporan_jadwal_bimbingan.xls");
	 
	
                $sql = " SELECT * FROM jadwal WHERE status='1' ORDER BY id_jadwal DESC";
                    $result = mysql_query($sql);
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
                 
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while ($data = mysql_fetch_array($result)) {

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
                            </td>
                            <td><?php echo "$jtgl" ?></td>
                            <td><?php echo "$status" ?></td> 
                         
                        </tr>
                        <?php
                            $no_urut++;
                        }
                        ?>  
                    </tbody>
                </table>