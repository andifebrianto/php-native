<?php 
 session_start();
  if (!isset($_SESSION['username'])) {
    echo '<script language="javascript">
    alert ("Anda belum login...");
    window.location="master.php";
    </script>';
    exit();
  }
  if ($_SESSION['hak_akses']!="admin") {
    echo '<script language="javascript">
    alert ("Anda bukan admin...");
    window.location="master.php";
    </script>';
    exit();
  }       
?>