<?php include '../config/koneksi.php'; ?>


<section class="content-header">      
    <h1> Data Program Studi </h1>
    <ol class="breadcrumb">
        <li><a href="homepage.php?p=dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data Program Studi</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- quick email widget -->
    <div class="box box-info">            
        <div class="box-header">
            <div class="row-fluid" style="overflow:auto">
                <div class="col-md-8">
                <a href="homepage.php?p=add_prodi" id="btn_create" class='btn btn-success'><span class='glyphicon glyphicon-plus'></span> Tambah </a>
                </div><br/><br/><br/>

                <?php
                    $sql =  "SELECT * FROM prodi";
                    $result = mysql_query($sql);
                    $no_urut=1;
                ?>

                <table id="myTable" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Kode Program Studi</th>
                            <th>Nama Program Studi</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while ($data = mysql_fetch_array($result)) {
                        ?>    
                        <tr>
                            <td><?php echo $data ['id_prodi']; ?></td>
                            <td><?php echo $data ['prodi']; ?></td>
                            <td>
                                <a href='homepage.php?p=edit_prodi&ubah=<?php echo $data[id_prodi] ?>' >
                                <button id='btn_create' class='btn btn-xs btn-primary' data-toggle='tooltip' data-container='body' title='Ubah'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></button></a>
                                
                                <a href='homepage.php?p=hapus_prodi&hapus=<?php echo $data[id_prodi] ?>' >
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