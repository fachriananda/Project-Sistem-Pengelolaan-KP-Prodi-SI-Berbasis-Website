<section class="content-header">      
    <h1> Data KP Semester Genap 2021/2022 </h1>
    <ol class="breadcrumb">
        <li><a href="homepage.php?p=dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data KP Semester Genap 2021/2022</li>
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
                    $sql =  "SELECT  * FROM pengajuan WHERE jenis_laporan='kp' AND semester='genap'  AND status='1' AND program_studi= '$prodi' order by id_pengajuan DESC ";
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
                            <th>Status Kaprodi</th>
                            <th>Status Dekan</th>                            
                            <th>Dosen Pembimbing</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>                                                             
                    <tbody>
                <!-- form tahun ajaran-->
                <!-- <form role="form" method="POST" action="" enctype="">
                    <div class="form-group">                        
                        <label for="ajara">DATA SEMESTER</label>
                        <select class="form-control" name="thn" id="thn" required>
                                <option value="">Pilih Semester</option>
                                <option value="2018/2019">SEMESTER GASAL  2018/2019</option>
                                <option value="2018/2019">SEMESTER GENAP  2018/2019</option>
                                <option value="2019/2020">SEMESTER GASAL  2019/2020</option>
                                <option value="2019/2020">SEMESTER GENAP  2019/2020</option>        
                                <option value="2020/2021">SEMESTER GASAL  2020/2021</option>
                                <option value="2020/2021">SEMESTER GENAP  2020/2021</option>
                                <option value="2021/2022">SEMESTER GASAL  2021/2022</option>
                                <option value="2021/2022">SEMESTER GENAP  2021/2022</option>
                                <option value="2022/2023">SEMESTER GASAL  2022/2023</option>
                                <option value="2022/2023">SEMESTER GENAP  2022/2023</option>
                                <option value="2023/2024">SEMESTER GASAL  2023/2024</option>
                                <option value="2023/2024">SEMESTER GENAP  2023/2024</option>
                        </select>                    
                    </div>                                        
                </form> -->

                <label for="ajara">DATA SEMESTER</label>
                <ul class="sidebar-menu" data-widget="tree">
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-check-square"></i>
                        <span>DATA SEMESTER</span>
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="homepage.php?p=ganjil18"><i class="fa fa-circle-">SEMESTER GASAL 2018/2019</i> </a></li>                        
                        <li><a href="homepage.php?p=genap18"><i class="fa fa-circle-">SEMESTER GENAP 2018/2019</i> </a></li>
                        <li><a href="homepage.php?p=ganjil19"><i class="fa fa-circle-">SEMESTER GASAL 2019/2020</i> </a></li>                        
                        <li><a href="homepage.php?p=genap19"><i class="fa fa-circle-">SEMESTER GENAP 2019/2020</i> </a></li>
                        <li><a href="homepage.php?p=ganjil20"><i class="fa fa-circle-">SEMESTER GASAL 2020/2021</i> </a></li>                        
                        <li><a href="homepage.php?p=genap20"><i class="fa fa-circle-">SEMESTER GENAP 2020/2021</i> </a></li> 
                        <li><a href="homepage.php?p=ganjil21"><i class="fa fa-circle-">SEMESTER GASAL 2021/2022</i> </a></li>                        
                        <li><a href="homepage.php?p=genap21"><i class="fa fa-circle-">SEMESTER GENAP 2021/2022</i> </a></li>                       
                    </ul> 
                </li>
            </ul><br>
            <a class="btn btn-primary" href="homepage.php?p=persetujuan_kpterima"><i class="fa fa-mail-reply"></i>Kembali</a> <br><br><br>
            <!-- Filter per semester -->                         
                                  
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
                            <td>
                            <?php
                                if ($data["thn_ajaran"]=="2021/2022"){
                                    echo "2021/2022";
                                }
                                else{
                                    echo "2021/2022";
                                }
                            ?>
                            </td>
                            <!-- <td><?php echo $data ['thn_ajaran']; ?></td> -->
                                                        
                            <?php
								$arSt = array(
                                    "0" => "<span class='label label-warning'>Dalam proses</span>",
                                    "1" => "<span class='label label-success'>Diterima</span>",
                                    "2" => "<span class='label label-danger'>Ditolak</span>",
                                    "3" => "<span class='label label-primary'><i class='fa fa-check'></i></span>"
                                );
                                    $st = $data['status'];
                                    $status = $arSt[$st];
                                    $statusexport = $data['status_export'];
                                    $statusex = $arSt[$statusexport];
                            ?>
                            <td><?php echo $status ?><br><?php echo $statusex ?></td>

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
                                    if ($s[nama_lengkap]==$data[pembimbing1]){
                                        echo "<option value='$s[nama_lengkap]' <selected>$s[nama_lengkap]</option>";
                                        }
                                }
                            ?>
                            </td>
                             
                            <td>
                                <a href='homepage.php?p=edit_distribusi&ubah=<?php echo $data[id_pengajuan] ?>' >
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
               
                <!-- <form role="form" method="POST" enctype="multipart/form-data">
                    <button type="submit" class="btn btn-success" name="simpan">Send</button>

                <?php

                        if (isset($_POST[simpan])) {
                            
                                $q = mysql_query("UPDATE pengajuan SET status_kirim='1' WHERE status='1' ");
                                
                                if ($q){
                                    echo "<script language='javascript'>alert('Distribusi KP Berhasil Disetujui');document.location='homepage.php?p=persetujuan_kpterima';</script>";
                                } 
                                else {
                                    echo "<script language='javascript'>alert('Distribusi KP Gagal Disetujui');document.location='homepage.php?p=setujui_jadwal';</script>";
                                }
                            }
                    ?>                     
                          
                </form> -->                 
                <br>
                <a href="modular/export_ganjil.php">                   
                    <button type="submit" class="btn btn-success" name="export">export</button>
                </a>
                <br><br>
               <!--  <div class="box-footer">   -->
                <form role="form" method="POST" action="" enctype="multipart/form-data">      
                    <button type="submit" name="expor" class="btn btn-success"><i class="fa fa-check"></i>Approve</button>
                    <button type="submit" name="btl" class="btn btn-success">Batal</button>
                </form>
                <!-- </div> -->                
                 <br>
                 <br>
                 <?php
                    $sql_komen =  "SELECT * FROM komentar ";
                    $result_komen = mysql_query($sql_komen);
                    $no_urut_komen = 1;

                    while ($data = mysql_fetch_array($result_komen)) {

                ?>
<table> 
<tr>
    <td><?php echo $data["komentar"] ?></td>
    <td>
        <a href='homepage.php?p=hapus_komen&hapus=<?php echo $data[id_komentar]; ?>' >
        <button id='btn_create' name="hapus" class='btn btn-xs btn-danger' data-toggle='tooltip' data-container='body' title='Hapus'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></button></a>
    </td>      
</tr>
</table>
<?php $no_urut_komen++;
} 
 ?>
      <br>
    <br>                          
            </div>
        </div>
    </div>
<!-- /.row (main row) -->
</section>  

<?php
                        if (isset($_POST["expor"])) {
                            {
                                $q = mysql_query("UPDATE pengajuan set status_export ='3'");
                                if($q){
                                    echo "<script language='javascript'>alert('Berhasil Approve');document.location='homepage.php?p=ganjil18';</script>";
                                    }
                                else{
                                    echo "<script language='javascript'>alert('Gagal Approve');document.location='homepage.php?p=ganjil18';</script>"; 
                                    }
                            }
                        }
                        if (isset($_POST["btl"])) {
                            {
                                $q = mysql_query("UPDATE pengajuan set status_export =''");
                                if($q){
                                    echo "<script language='javascript'>document.location='homepage.php?p=ganjil18';</script>";
                                    }
                                else{
                                    echo "<script language='javascript'>alert('Gagal Approve');document.location='homepage.php?p=ganjil18';</script>"; 
                                    }
                            }
                        }
