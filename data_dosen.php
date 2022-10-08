<section class="content-header">      
    <h1> Data Dosen </h1>
    <ol class="breadcrumb">
        <li><a href="homepage.php?p=dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data Dosen</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- quick email widget -->
    <div class="box box-info">            
        <div class="box-header">
            <div class="row-fluid" style="overflow:auto">
                <div class="col-md-8">
                <a href="homepage.php?p=add_dosen" id="btn_create" class='btn btn-success'><span class='glyphicon glyphicon-edit'></span> Tambah </a>
                </div> <br/><br/><br/>

                <?php
                    $sql =  "SELECT * FROM dosen";
                    $result = mysql_query($sql);
                    $no_urut = 1;
                ?>
                
                <table id="myTable" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>NIDN</th>
                            <th>Nama Lengkap</th>
                            <th>Jenis Kelamin</th>
                            <th>Email</th>
                            <th>Jabatan Fungsional</th>
                            <th>Jabatan Struktural</th>
                            <th>Foto</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Level</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while ($data = mysql_fetch_array($result)) {
                        ?>    
                        <tr>
                            <td align="center"><?php echo $no_urut; ?>.</td>
                            <td><?php echo $data ['nidn']; ?></td>
                            <td><?php echo $data ['nama_lengkap']; ?></td>
                            <td>
                            <?php
								if ($data["jenis_kelamin"]=="L"){
								    echo "Laki-laki";
								}
								else{
								    echo "Perempuan";
								}
							?>
                            </td>	
                            <td><?php echo $data ['email']; ?></td>
                            <td><?php echo $data ['jabatan_fungsional']; ?></td>
                            <td><?php echo $data ['jabatan_struktural']; ?></td>
                            <td>
                                <img src="foto/<?php echo $data['foto']; ?>"style='width:80px; height:80px;'/>
                            </td>
                            <td><?php echo $data ['username']; ?></td>
                            <td><?php echo $data ['password']; ?></td>
                            <td>
                            <?php
								if ($data["level"]=="d"){
								    echo "Dekan";
                                }
                                else if ($data["level"]=="do"){
								    echo "Dosen";
                                }
                                else {
								    echo "Kaprodi";
                                }
							?>
                            </td>
                            <td>
                                <a href='homepage.php?p=edit_dosen&ubah=<?php echo $data[nidn] ?>' >
                                <button id='btn_create' class='btn btn-xs btn-primary' data-toggle='tooltip' data-container='body' title='Ubah'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></button></a>
                                
                                <a href='homepage.php?p=hapus_dosen&hapus=<?php echo $data[nidn] ?>' >
                                <button id='btn_create' class='btn btn-xs btn-danger' data-toggle='tooltip' data-container='body' title='Hapus'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></button></a>
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