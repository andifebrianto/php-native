<?php include 'config.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Caturwati Library</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">  

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

</head>

<body>

    <?php include 'validasi.php'; ?>

    <!-- Topbar Start -->
    
    <?php include 'body-header-admin.php'; ?>
    
 
     <!-- Admin Start -->  
      <!-- Admin Start -->  
    <div class="container-fluid col-lg-6 mb-3">
        <div class="container py-4 col-8 mb-3">
            <div class="section-title col-md-12 mb-0">
                  <div class="col-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left text-uppercase text-center font-weight-bold">Admin</h2>
                        <a href="create.php" class="badge badge-primary text-uppercase font-weight-bold p-2 mr-2">Tambah Buku</a>
                        <a href="create-kate.php" class="badge badge-primary text-uppercase font-weight-bold p-2 mr-2">Tambah Kategori</a>
                        <a href="act-logout.php" class="badge badge-primary text-uppercase font-weight-bold p-2 mr-2 mb-3 text-right">LOGOUT</a>
                        <?php 
                            if($tb = mysqli_query($link, "SELECT SUM(jumlah) FROM databuku")){
                                $totalBuku = mysqli_fetch_row($tb);
                            }
                        ?>
                        <label>TOTAL BUKU : <?= $totalBuku[0]; ?></label>
                    </div>
                    </div>
     		</div>
                    </div>
                </div>
                   
<div class="container-fluid col-lg-12 mb-2">
        <div class="container py-0 col-12 mb-3">
            <div class="section-title col-md-12">
                  <div class="col-12">
                    <div class="page-header clearfix">
                    </div>
                    <?php
                    // Include config file
                    // require_once "config.php";
                    $no = 0;

                    // Attempt select query execution

                    if(isset($_GET['cari'])){
                        $cari = $_GET['cari'];
                        $sql = "SELECT * FROM databuku WHERE judul LIKE '%".$cari."%' OR nama LIKE '%".$cari."%' OR penerbit LIKE '%".$cari."%' OR tahun LIKE '%".$cari."%' OR kategori LIKE '%".$cari."%' ORDER BY judul ASC";     
                    } else {

                    
                    $sql = "SELECT * FROM databuku ORDER BY id DESC";

                }
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0) {
                            echo "<table class='table table-bordered table-striped text-center text-uppercase '>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th><center>No.</center></th>" ;
                                        echo "<th>Kategori</th>";
                                        echo "<th>Judul</th>";
                                        echo "<th>Penulis</th>";
                                        echo "<th>Penerbit</th>";
                                        echo "<th>Tahun</th>";
                                        echo "<th>Jumlah</th>";
                                        echo "<th>Pengaturan</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    $no++;
                                    echo "<tr>";
                                        echo "<td>$no</td>";
                                        echo "<td>" . $row['kategori'] . "</td>";
                                        echo "<td>" . $row['judul'] . "</td>";
                                        echo "<td>" . $row['nama'] . "</td>";
                                        echo "<td>" . $row['penerbit'] . "</td>";
                                        echo "<td>" . $row['tahun'] . "</td>";
                                        echo "<td>" . $row['jumlah'] . "</td>";
                                        echo "<td>";
                                        echo "<a href='update.php?id=". $row['id'] ."'title='Update Record' data-toggle='tooltip'> Update </a>"; ?>
                                        
                                        <a href="delete.php?id=<?= $row["id"]; ?>" onclick="return confirm('Data Buku akan dihapus??');">Delete</a>
                                        
                                        <?php echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";
                            echo "</table>";
                           
                            // Free result set
                            mysqli_free_result($result);
                        } 
                        else{
                            echo "<p class='lead'><em>Data Buku Tidak Ditemukan!</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                    }

                    // Close connection
                    // mysqli_close($link);
                    ?>
                </div>
            </div>
            
            </div>
        </div>
    </div>
           
        <!-- Admin End -->
   
  <?php include 'footer.php'; ?>
  
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>