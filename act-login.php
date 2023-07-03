<?php 
session_start();
include "config.php";

$username = $_POST['username'];
$password = $_POST['password'];
$op = $_GET['op'];

if ($op=="in") {
	$sql = "SELECT * FROM multiuser WHERE username='$username' AND password='$password' ";
	$result = mysqli_query($link, $sql);
	
	if (mysqli_num_rows($result)==1) {
		$qry = mysqli_fetch_array($result);
		$_SESSION['username'] = $qry['username'];
		$_SESSION['nama'] = $qry['nama'];
		$_SESSION['hak_akses'] = $qry['hak_akses'];

		if ($qry['hak_akses']=="admin") {
			header("location:admin.php");
		}
		elseif ($qry['hak_akses']=="user") {
			header("location:index.php");
		}
	}
	else {
		?>
			<script language="JavaScript">
				alert('Username atau Password tidak sesuai. Silahkan diulang kembali!');
				document.location='master.php';
			</script>
		<?php
	}
} else if ($op=="out") {
	unset($_SESSION['username']);
	unset($_SESSION['nama']);
	unset($_SESSION['hak_akses']);
	header("location:login.php");
}

 ?>