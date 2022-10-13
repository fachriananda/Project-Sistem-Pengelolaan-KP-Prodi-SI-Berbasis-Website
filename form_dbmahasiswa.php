<section class="content-header">      
    <h1> Import Data Mahasiswa </h1>
    <ol class="breadcrumb">
        <li><a href="homepage.php?p=dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Import Data Mahasiswa</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- quick email widget -->
    <div class="box box-info">            
        <div class="box-header">
            <div class="row-fluid">
                <div class="col-md-8">
                    <form method="POST" action="" enctype="multipart/form-data">
                        <div class="box-body">
                            <!-- form download-->    
                            <a href="Format.xlsx" class="btn btn-default"><i class="glyphicon glyphicon-download"></i> Download Format </a>
                            <br><br>
                            <!-- form preview -->
                            <input type="file" name="file" class="pull-left">
                            <button type="submit" name="preview" class="btn btn-primary">
                                <span class="glyphicon glyphicon-eye-open"></span> Preview
                            </button>
                        </div>
                    </form>
                    <!-- Buat Preview Data -->
                    <?php
                    // Jika user telah mengklik tombol Preview
                    if(isset($_POST['preview'])){
                        //$ip = ; // Ambil IP Address dari User
                        $nama_file_baru = 'data.xlsx';

                        // Cek apakah terdapat file data.xlsx pada folder tmp
                        if(is_file("tmp/$nama_file_baru")) // Jika file tersebut ada
                            unlink("tmp/$nama_file_baru"); // Hapus file tersebut

                        $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION); // Ambil ekstensi filenya apa
                        $tmp_file = $_FILES['file']['tmp_name'];

                        // Cek apakah file yang diupload adalah file Excel 2007 (.xlsx)
                        if($ext == "xlsx"){
                            // Upload file yang dipilih ke folder tmp
                            // dan rename file tersebut menjadi data{ip_address}.xlsx
                            // {ip_address} diganti jadi ip address user yang ada di variabel $ip
                            // Contoh nama file setelah di rename : data127.0.0.1.xlsx
                            move_uploaded_file($tmp_file, "tmp/$nama_file_baru");

                            // Load librari PHPExcel nya
                            require_once 'PHPExcel/PHPExcel.php';

                            $excelreader = new PHPExcel_Reader_Excel2007();
                            $loadexcel = $excelreader->load("tmp/$nama_file_baru"); // Load file yang tadi diupload ke folder tmp
                            $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);

                            // Buat sebuah tag form untuk proses import data ke database
                            echo "<form method='post' action='modular/import.php'>";

                            // Buat sebuah div untuk alert validasi kosong
                            echo "<div class='alert alert-danger' id='zero'>
                            Semua data belum diisi, Ada <span id='jumlah_zero'></span> data yang belum diisi.
                            </div>";

                            echo "<table class='table table-bordered'>
                            <tr>
                                <th colspan='20' class='text-center'>Preview Data</th>
                            </tr>
                            <tr>
                                <th>NIS</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Telepon</th>
                                <th>Alamat</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Telepon</th>
                                <th>Alamat</th>
                            </tr>";

                            $numrow = 1;
                            $kosong = 0;
                            foreach($sheet as $row){ // Lakukan perulangan dari data yang ada di excel
                                // Ambil data pada excel sesuai Kolom
                                $nis = $row['A']; // Ambil data NIS
                                $nama = $row['B']; // Ambil data nama
                                $jenis_kelamin = $row['C']; // Ambil data jenis kelamin
                                $telp = $row['D']; // Ambil data telepon
                                $alamat = $row['E']; // Ambil data alamat
                                $prodi = $row['F']; // Ambil data nama
                                $fakultas = $row['G']; // Ambil data jenis kelamin
                                $kelamin = $row['H']; // Ambil data telepon
                                $ket = $row['I']; // Ambil data alamat

                                // Cek jika semua data tidak diisi
                                if($nis == "" && $nama == "" && $jenis_kelamin == "" && $telp == "" && $alamat == ""
                                    && $prodi == "" && $fakultas == "" && $kelamin == "" && $ket == "")
                                    continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)

                                // Cek $numrow apakah lebih dari 1
                                // Artinya karena baris pertama adalah nama-nama kolom
                                // Jadi dilewat saja, tidak usah diimport
                                if($numrow > 1){
                                    // Validasi apakah semua data telah diisi
                                    $nis_td = ( ! empty($nis))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
                                    $nama_td = ( ! empty($nama))? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
                                    $jk_td = ( ! empty($jenis_kelamin))? "" : " style='background: #E07171;'"; // Jika Jenis Kelamin kosong, beri warna merah
                                    $telp_td = ( ! empty($telp))? "" : " style='background: #E07171;'"; // Jika Telepon kosong, beri warna merah
                                    $alamat_td = ( ! empty($alamat))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
                                    $prodi_td = ( ! empty($prodi))? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
                                    $fak_td = ( ! empty($fakultas))? "" : " style='background: #E07171;'"; // Jika Jenis Kelamin kosong, beri warna merah
                                    $kelamin_td = ( ! empty($kelamin))? "" : " style='background: #E07171;'"; // Jika Telepon kosong, beri warna merah
                                    $ket_td = ( ! empty($ket))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah

                                    // Jika salah satu data ada yang kosong
                                    if($nis == "" or $nama == "" or $jenis_kelamin == "" or $telp == "" or $alamat == "" 
                                        or $prodi == "" or $fakultas == "" or $kelamin == "" or $ket == ""){
                                        $kosong++; // Tambah 1 variabel $kosong
                                    }

                                    echo "<tr>";
                                    echo "<td".$nis_td.">".$nis."</td>";
                                    echo "<td".$nama_td.">".$nama."</td>";
                                    echo "<td".$jk_td.">".$jenis_kelamin."</td>";
                                    echo "<td".$telp_td.">".$telp."</td>";
                                    echo "<td".$alamat_td.">".$alamat."</td>";
                                    echo "<td".$prodi_td.">".$prodi."</td>";
                                    echo "<td".$fak_td.">".$fakultas."</td>";
                                    echo "<td".$kelamin_td.">".$kelamin."</td>";
                                    echo "<td".$ket_td.">".$ket."</td>";
                                    echo "</tr>";
                                }

                                $numrow++; // Tambah 1 setiap kali looping
                            }

                            echo "</table>";

                            // Cek apakah variabel kosong lebih dari 1
                            // Jika lebih dari 1, berarti ada data yang masih kosong
                            if($kosong > 1){
                            ?>
                                <script>
                                $(document).ready(function(){
                                    // Ubah isi dari tag span dengan id jumlah_kosong dengan isi dari variabel kosong
                                    $("#jumlah_zero").html('<?php echo $kosong; ?>');

                                    $("#zero").show(); // Munculkan alert validasi kosong
                                });
                                </script>
                            <?php
                            }else{

                                // Buat sebuah tombol untuk mengimport data ke database
                                echo "<button type='submit' name='import' class='btn btn-primary'><span class='glyphicon glyphicon-upload'></span> Import</button>";
                            }

                            echo "</form>";
                        }else{ // Jika file yang diupload bukan File Excel 2007 (.xlsx)
                            // Munculkan pesan validasi
                            echo "<div class='alert alert-danger'>
                            Hanya File Excel 2007 (.xlsx) yang diperbolehkan
                            </div>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
<!-- /.row (main row) -->
</section> 