<?php

$query = mysql_query("SELECT DISTINCT program_studi FROM bimbingankp");
$query2 = mysql_query("SELECT DISTINCT semester_mulai_kp FROM bimbingankp");

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
                <h3>Masukkan Filter : </h3>
                <form class="form-inline" action="modular/pdf.php" method="GET">
                    <div class="form-group">
                        <select name="program_studi" class="form-control">
                            <option selected value=""></option>
                            <?php while ($data = mysql_fetch_assoc($query)) : ?>
                                <option value="<?= $data['program_studi']; ?>"><?= $data['program_studi']; ?></option>
                            <?php endwhile; ?>
                        </select>
                        <select name="semester_mulai_kp" class="form-control">
                            <option selected value=""></option>
                            <?php while ($data2 = mysql_fetch_assoc($query2)) : ?>
                                <option value="<?= $data2['semester_mulai_kp']; ?>"><?= $data2['semester_mulai_kp']; ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <button name="eksport" type="submit" class="btn btn-default">Eksport</button>
                </form>
            </div>
        </div>
    </div>
</section>