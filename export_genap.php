<?php
    include '../../config/koneksi.php';

    // Fungsi header dengan mengirimkan raw data excel
    header("Content-type: application/vnd-ms-excel");
     
    // Mendefinisikan nama file ekspor "hasil-export.xls"
    header("Content-Disposition: attachment; filename=distribusi_kp_genap18.xls");
     
    
                $sql = "SELECT  * FROM pengajuan WHERE jenis_laporan='kp'AND semester='genap'AND status='1' order by id_pengajuan DESC ";
                    $result = mysql_query($sql);
                    $no_urut = 1;
                ?>                

               <!--  <?php
                    // $sql =  "SELECT  * FROM pengajuan WHERE jenis_laporan='kp'AND semester='ganjil'AND status='1' AND program_studi= '$prodi' order by id_pengajuan DESC ";
                    //$result = mysql_query($sql);
                    //$no_urut = 1;
                ?> -->


                <table id="myTable" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>NIM</th>
                            <th>Nama Lengkap</th>
                            <th>Judul Laporan</th>
                            <th>Semester</th>
                            <th>Tahun Ajaran</th>
                            <th>Status Kaprodi</th>
                            <th>Status Dekan</th>                            
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

                            <?php
                                $arSt = array(
                                    "0" => "<span class='label label-warning'>Dalam proses</span>",
                                    "1" => "<span class='label label-success'>Diterima</span>",
                                    "2" => "<span class='label label-danger'>Ditolak</span>"
                                );
                                    $st = $data['status_dkn'];
                                    $statusdkn = $arSt[$st];
                            ?>
                            <td><?php echo $statusdkn ?></td>
                            
                            <td>
                            <?php
                                $qsp = mysql_query("SELECT * FROM dosen");
                                while ($s=mysql_fetch_array($qsp)) {
                                    if ($s['nama_lengkap']==$data['pembimbing1']){
                                        echo "<option value='$s[nama_lengkap]' <selected>$s[nama_lengkap]</option>";
                                        }
                                }
                            ?>
                            </td>
                             
                            <td>
                                <a href='homepage.php?p=edit_distribusi&ubah=<?php echo $data['id_pengajuan'] ?>' >
                                <button id='btn_create' class='btn btn-xs btn-primary' data-toggle='tooltip' data-container='body' title='Ubah Distribusi'><span class='glyphicon glyphicon-check' aria-hidden='true'></span></button>
                                </a><br><br>
                                
                            </td>                                                     
                               
                        </tr>
                        <?php
                            $no_urut++;
                        }
                        ?>  
                    </tbody>
                </table>