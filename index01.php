<section class="content-header">      
    <h1>Surat Balasan Dari Instasi </h1>
    <ol class="breadcrumb">
        <li><a href="homepage.php?p=dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Surat Balasan Dari Instasi</li>
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
                    $sql =  "SELECT  * FROM pengajuan2 ";
                    $result = mysql_query($sql);
                    $no_urut = 1;
                ?>
                
                <table id="myTable" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>NIM</th>
                            <th>Nama Lengkap</th>
                            <th>Jenis Kegiatan</th>
                            <th>file Untuk Prodi dari Instasi</th>
                            <th>Tanggal Input</th>
                            <th>Download</th>
                          
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
                <!-- Filter per semester -->
              
                <!-- Filter per semester -->
                                 
                        <?php
                            while ($data = mysql_fetch_array($result)) {
                        ?>                       

                        <tr>
                            <td align="center"><?php echo $no_urut; ?>.</td>
                            <td><?php echo $data ['nim']; ?></td>
                            <td><?php echo $data ['nama_lengkap']; ?></td>
                            <td><?php echo $data ['jenis_laporan']; ?></td>
                            </td>
                            <td>
                            <?php echo $data ['file3']; ?>
                            </td>	
                            <td><?php echo $data ['tgl_input']; ?></td>

                                <td><?php echo " <a href='../mahasiswa/file/$data[file3]'>";?>
                                <button id='btn_create' class='btn btn-xs btn-primary' data-toggle='tooltip' data-container='body' title='Download File'><span class='glyphicon glyphicon-download-alt' aria-hidden='true'></span></button></a>                               
                              </td>                        
                             
                    
                             
                                                                         
                               
                        </tr>
                        <?php
                            $no_urut++;
                        }
                        ?>  
                    </tbody>
                </table>
                    
             
               
               <!--  <div class="box-footer">   -->
                <form role="form" method="POST" action="" enctype="multipart/form-data">      
                
                </form>
                <!-- </div> -->                
                 <br>
                 <br>
                 <?php
                   

                ?>

<?php

 ?>
      <br>
    <br>                          
            </div>
        </div>
    </div>
<!-- /.row (main row) -->
</section>  

