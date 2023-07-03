<?php
require_once "config.php";

$id = $_GET["id"];
$sql = "DELETE FROM databuku WHERE id = $id";

mysqli_query($link, $sql);
if (mysqli_affected_rows($link) > 0){
    // Records deleted successfully. Redirect to landing page
    echo "
    <script>
    alert('data berhasil dihapus')
    document.location.href = 'admin.php';
    </script>
    ";
    exit();
} else{
    echo "
    <script>
    alert('data gagal dihapus')
    document.location.href = 'admin.php';
    </script>
    ";
}
?>