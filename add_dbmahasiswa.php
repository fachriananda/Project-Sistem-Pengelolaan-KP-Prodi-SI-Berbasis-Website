<?php include '../config/koneksi.php'; ?>

<section class="content-header">      
    <h1> Form Import Data Mahasiswa</h1>
    <ol class="breadcrumb">
        <li><a href="homepage.php?p=dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Form Import Data Mahasiswa</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- quick email widget -->
    <div class="box box-info">            
        <div class="box-header">
            <div class="row-fluid">
                <div class="col-md-8">
                    <!-- Buat sebuah tag form dan arahkan action nya ke file ini lagi -->
                    <form method="post" action="" enctype="multipart/form-data">
                        <a href="Format.xlsx" class="btn btn-default">
                            <span class="glyphicon glyphicon-download"></span>
                            Download Format
                        </a><br><br>

                        <!--
                        -- Buat sebuah input type file
                        -- class pull-left berfungsi agar file input berada di sebelah kiri
                        -->
                        <input type="file" name="file" class="pull-left">

                        <button type="submit" name="preview" class="btn btn-success btn-sm">
                            <span class="glyphicon glyphicon-eye-open"></span> Preview
                        </button>
                    </form><br/>
                    <!-- Buat Preview Data -->
                    <?php
                    // Jika user telah mengklik tombol Preview
                    if(isset($_POST['preview'])){
                        //$ip = ; // Ambil IP Address dari User
                        $nama_file_baru = 'data.xlsx';

                        // Cek apakah terdapat file data.xlsx pada folder tmp
                        if(is_file('tmp/'.$nama_file_baru)) // Jika file tersebut ada
                            unlink('tmp/'.$nama_file_baru); // Hapus file tersebut

                        $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION); // Ambil ekstensi filenya apa
                        $tmp_file = $_FILES['file']['tmp_name'];

                        // Cek apakah file yang diupload adalah file Excel 2007 (.xlsx)
                        if($ext == "xlsx"){
                            // Upload file yang dipilih ke folder tmp
                            // dan rename file tersebut menjadi data{ip_address}.xlsx
                            // {ip_address} diganti jadi ip address user yang ada di variabel $ip
                            // Contoh nama file setelah di rename : data127.0.0.1.xlsx
                            move_uploaded_file($tmp_file, 'tmp/'.$nama_file_baru);

                            // Load librari PHPExcel nya
                            require_once 'PHPExcel/PHPExcel.php';

                            $excelreader = new PHPExcel_Reader_Excel2007();
                            $loadexcel = $excelreader->load('tmp/'.$nama_file_baru); // Load file yang tadi diupload ke folder tmp
                            $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);

                            // Buat sebuah tag form untuk proses import data ke database
                            echo "<form method='post' action='import.php'>";

                            // Buat sebuah div untuk alert validasi kosong
                            echo "<div class='alert alert-danger' id='kosong'>
                            Semua data belum diisi, Ada <span id='jumlah_kosong'>
                            </span> data yang belum diisi.
                            </div>";
                            
                            echo "<table class='table table-bordered'>
                            <tr>
                                <th colspan='30' class='text-center'>Preview Data</th>
                            </tr>
                            <tr>
                                <th>NIM</th>
                                <th>Nama Lengkap</th>
                                <th>Jenis Kelamin</th>
                                <th>Email</th>
                                <th>Program Studi</th>
                                <th>Foto</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Level<th>
                            </tr>";

                            $numrow = 1;
                            $kosong = 0;
                            foreach($sheet as $row){ // Lakukan perulangan dari data yang ada di excel
                                // Ambil data pada excel sesuai Kolom
                                $nim = $row['A']; // Ambil data NIM
                                $nama_lengkap = $row['B']; // Ambil data nama lengkap
                                $jenis_kelamin = $row['C']; // Ambil data jenis kelamin
                                $email = $row['D']; // Ambil data email
                                $program_studi = $row['E']; // Ambil data prodi
                                $foto = $row['F']; // Ambil data prodi
                                $username = $row['G']; // Ambil data prodi
                                $password = $row['H']; // Ambil data prodi
                                $level = $row['I']; // Ambil data prodi

                                // Cek jika semua data tidak diisi
                                if($nim == "" && $nama_lengkap == "" && $jenis_kelamin == ""
                                && $email == "" && $program_studi == "" && $foto == "" && $username = ""
                                && $password == "" && $level == "")
                                    continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)

                                // Cek $numrow apakah lebih dari 1
                                // Artinya karena baris pertama adalah nama-nama kolom
                                // Jadi dilewat saja, tidak usah diimport
                                if($numrow > 1){
                                    // Validasi apakah semua data telah diisi
                                    $nim_td = ( ! empty($nim))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
                                    $nama_td = ( ! empty($nama_lengkap))? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
                                    $jk_td = ( ! empty($jenis_kelamin))? "" : " style='background: #E07171;'"; // Jika Jenis Kelamin kosong, beri warna merah
                                    $email_td = ( ! empty($email))? "" : " style='background: #E07171;'"; // Jika Telepon kosong, beri warna merah
                                    $prodi_td = ( ! empty($program_studi))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
                                    $foto_td = ( ! empty($foto))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
                                    $username_td = ( ! empty($username))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
                                    $password_td = ( ! empty($password))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
                                    $level_td = ( ! empty($level))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah

                                    // Jika salah satu data ada yang kosong
                                    if($nim == "" && $nama_lengkap == "" && $jenis_kelamin == ""
                                    && $email == "" && $program_studi == "" && $foto == "" && $username = ""
                                    && $password == "" && $level== ""){
                                        $kosong++; // Tambah 1 variabel $kosong
                                    }

                                    echo "<tr>";
                                    echo "<td".$nim_td.">".$nim."</td>";
                                    echo "<td".$nama_td.">".$nama_lengkap."</td>";
                                    echo "<td".$jk_td.">".$jenis_kelamin."</td>";
                                    echo "<td".$email_td.">".$email."</td>";
                                    echo "<td".$prodi_td.">".$program_studi."</td>";
                                    echo "<td".$foto_td.">".$foto."</td>";
                                    echo "<td".$username_td.">".$username."</td>";
                                    echo "<td".$password_td.">".$password."</td>";
                                    echo "<td".$level_td.">".$level."</td>";
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
                                    $("#jumlah_kosong").html('<?php echo $kosong; ?>');

                                    $("#kosong").show(); // Munculkan alert validasi kosong
                                });
                                </script>
                            <?php
                            }else{ // Jika semua data sudah diisi
                                echo "<hr>";

                                // Buat sebuah tombol untuk mengimport data ke database
                                echo "<button type='submit' name='import' class='btn btn-primary'><span class='glyphicon glyphicon-upload'></span> Import </button>";
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