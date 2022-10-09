<?php
$nama_dosen = $_SESSION['nama_do'];
$query = mysql_query("SELECT DISTINCT nama_lengkap FROM bimbingankp WHERE dosen_pembimbing = '$nama_dosen'");

?>
<section class="content-header">
    <h1>My Dashboard </h1>
    <ol class="breadcrumb">
        <li><a href="homepage.php?p=dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">My Dashboard</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="container">
        <div class="row">
            <div class="col">
                <h3>Pilih Mahasiswa : </h3>
                <form class="form-inline" action="modular/pdf.php" method="GET">
                    <div class="form-group">
                        <select name="nama" class="form-control">
                            <?php while ($data = mysql_fetch_assoc($query)) : ?>
                                <a href="modular/pdf.php?nama=" <?= $data['nama_lengkap']; ?>>
                                    <option value="<?= $data['nama_lengkap']; ?>"><?= $data['nama_lengkap']; ?></option>
                                </a>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <button name="eksport" type="submit" class="btn btn-default">Eksport</button>
                </form>
            </div>
        </div>
    </div>
</section>