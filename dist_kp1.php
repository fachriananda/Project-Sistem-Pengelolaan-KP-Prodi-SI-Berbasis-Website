<section class="content-header">      
    <h1> Jumlah Distribusi KP </h1>
    <ol class="breadcrumb">
        <li><a href="homepage.php?p=dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Jumlah Distribusi KP</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- quick email widget -->
    <div class="box box-info">            
        <div class="box-header">
            <div class="row-fluid" style="overflow:auto">
                <div class="col-md-8"></div>

                <h4>Jumlah Distribusi KP</h4>
                </div><br/><br/><br/>

                <?php
                    $sql =  "SELECT  * FROM pengajuan WHERE jenis_laporan='kp'AND status='1' ";
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
                            
                            <th>Status</th>
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
                            <td><?php echo $data ['tanggal']; ?></td>
                            <td>
                            <?php
                                $qsp = mysql_query("SELECT * FROM dosen");
                                while ($s=mysql_fetch_array($qsp)) {
                                    if ($s[nama_lengkap]==$data[pembimbing1]){
                                        echo "<option value='$s[nama_lengkap]' <selected>$s[nama_lengkap]</option>";
                                        }
                                }
                            ?>
                            </td>
                             <td><?php echo $status ?></td>
                            <td>
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
                
            </div>
        </div>
    </div>
<!-- /.row (main row) -->
</section>    