<?php
error_reporting(0);
	switch ($_GET['p']) {
		case'';
			include 'modular/dashboard.php';
			break;
		case 'dashboard':
			include 'modular/dashboard.php';
			break;
		case 'pengajuan':
			include 'modular/pengajuan.php';
			break;

		case 'cek_kp':
			include 'modular/cek_kp.php';
			break;
		case 'cek_skripsi':
			include 'modular/cek_skripsi.php';
			break;

		case 'ubah_password':
			include 'modular/ubah_password.php';
			break;

		case 'bimbingan_kp':
			include 'modular/bimbingan_kp.php';
			break;
		case 'add_bimbingan_kp':
			include 'modular/add_bimbingan_kp.php';
			break;
		case 'view_bimbingan_kp':
			include 'modular/view_bimbingan_kp.php';
			break;

		case 'bimbingan_skripsi':
			include 'modular/bimbingan_skripsi.php';
			break;
		case 'add_bimbingan_skripsi':
			include 'modular/add_bimbingan_skripsi.php';
			break;
		case 'view_bimbingan_skripsi':
			include 'modular/view_bimbingan_skripsi.php';
			break;

		case 'tambah':
			include 'modular/tambah.php';
			break;
	}
?>