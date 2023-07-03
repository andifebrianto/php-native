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
    
    <?php include 'body-header.php'; ?>
 
     <!-- Admin Start -->  
    <div class="container-fluid col-lg-6 mb-3">
        <div class="container py-5 col-8 mb-3">
            <div class="section-title col-md-12">
                  <div class="col-12">
                    <div class="page-header clearfix">
                        <h5>Tambah Kategori</h5>
                        <form action="act-create-kategori.php" method="get">
                            <input type="text" placeholder="Masukkan kategori baru" name="kategori_k" class="form-control form-control-lg mb-3" required>
                            <button type="submit" class="btn btn-primary font-weight-bold mb-3 ">Tambah</button>
                        </form>
                        <a href="admin.php" class="btn btn-primary font-weight-bold mb-3 ">Kembali</a>
                    </div>
                    <?php 
                    // Include config file
                    require_once "config.php";
                    $no = 0;
                    $sql = "SELECT * FROM kategori_kel ORDER BY kategori_k ASC";

                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>No.</th>";
                                        echo "<th>Kategori</th>";
                                        echo "<th>Pengaturan</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    $no++;
                                    echo "<tr>";
                                        echo "<td>$no</td>";
                                        echo "<td>" . $row['kategori_k'] . "</td>";
                                        echo "<td>";
                                        echo "<a href='delete-kate.php?id=". $row['id'] ."' title='Delete Record' data-toggle='tooltip'> Delete </a>";
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";
                            echo "</table>";
                           
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                    }

                     ?>
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