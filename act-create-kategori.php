<?php 
require_once "config.php";
    $sql = "INSERT INTO kategori_kel (kategori_k) VALUES ('$_GET[kategori_k]')";
    $hasil = mysqli_query($link, $sql);
    if ($hasil) {
        // code...
        header("location:create-kate.php");
    } else {
    	?>
        <script language="JavaScript">
				alert('Kesalahan. Silahkan diulang kembali!');
				document.location='create-kate.php';
			</script>
			<?php
    }
   
 ?>