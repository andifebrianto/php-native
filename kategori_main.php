<?php 
if (!isset($_GET["kat"])) {
    header("location: category.php");
    exit();
} ?>

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
    <?php include 'body-header.php'; ?>
    
<div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-2 py-lg-0 px-lg-5">
            <a href="index.php" class="navbar-brand d-block d-lg-none">
                <h1 class="m-0 display-4 text-uppercase text-primary">Caturwati<span class="text-white font-weight-normal">Library</span></h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-0 px-lg-3" id="navbarCollapse">
                <div class="navbar-nav mr-auto py-0">
                    <a href="index.php" class="nav-item nav-link ">Beranda</a>
                    <a href="category.php" class="nav-item nav-link active">Kategori</a>
                    <a href="contact.php" class="nav-item nav-link">Tentang</a>
                </div>
            <div class="" style="width: 100%; max-width: 300px;"> 
            <form action="searching.php" method="get">  
            <div class="input-group-append"> 
            <input name="cari" type="text" class="form-control border-0" placeholder="Masukkan Kata Kunci">
            <button type="submit" value="cari" class="input-group-text bg-primary text-dark border-0 px-3"><i
            class="fa fa-search"></i></button>
                    </form></div>
                </div>
            </div>
        </nav>
    </div>
 <!-- Featured News Slider Start -->
    <div class="container-fluid py-4 px-sm-2 px-md-5"
        <div class="container">
            <div class="section-title">
                <h4 class="m-0 text-uppercase font-weight-bold"><a href="kategori_main.php?kat=<?= $_GET["kat"]; ?>">Kategori <?= $_GET["kat"]; ?></a></h4>
            </div>
            
            </div>
        </div>
    </div>
    <!-- Featured News Slider End -->

     <!-- Alfabet start --> 
     <div class="container-fluid py-1 px-sm-1 px-md-1">
        <div class="container">
            <div class="section-title">

                <?php $abjad = ["A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z"];

                    foreach ($abjad as $a) :?>

                <form  class="text-uppercase font-weight-semi-bold p-0 mr-0"action="kategori_main.php" method="get"><input type="submit" value="<?= $a; ?>" name="huruf"button style="background-color:#FFCC00; border-color:#FFCC00;"><input type="hidden" name="kat" value="<?= $_GET["kat"]; ?>"></form>

                    <?php endforeach; ?>

       <!-- <form  class="text-uppercase font-weight-semi-bold p-0 mr-0"action="kategori_tari.php" method="get"><input type="submit" value="B" name="huruf"button style="background-color:#FFCC00; border-color:#FFCC00;"></form> -->
      


            </div>
        </div>
    </div>        
    <!-- Table Start -->
    <div class="container-fluid py-1 px-sm-1 px-md-5"
        <div class="container">
            <div class="section-title">

                    <?php
                    // Include config file
                        // require_once "config.php";
                        $no = 0;
                        $kate = $_GET["kat"];

                     if(isset($_GET['huruf'])){
                    $huruf = $_GET['huruf'];
                    
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM databuku WHERE judul LIKE '".$huruf."%' AND kategori LIKE '".$kate."' ORDER BY judul ASC";
} else {
    $sql = "SELECT * FROM databuku WHERE kategori LIKE '".$kate."' ORDER BY judul ASC";
}
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>No.</th>";
                                        // echo "<th>Kategori</th>";
                                        echo "<th>Judul Buku</th>";
                                        echo "<th>Nama Penulis</th>";
                                        echo "<th>Penerbit</th>";
                                        echo "<th>Tahun</th>";
                                        echo "<th>Jumlah Buku</th>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                $no++;
                                    echo "<tr>";
                                        echo "<td>$no</td>";
                                        // echo "<td>" . $row['kategori'] . "</td>";
                                        echo "<td>" . $row['judul'] . "</td>";
                                        echo "<td>" . $row['nama'] . "</td>";
                                        echo "<td>" . $row['penerbit'] . "</td>";
                                        echo "<td>" . $row['tahun'] . "</td>";
                                        echo "<td>" . $row['jumlah'] . "</td>";
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


                    // Close connection
                    // mysqli_close($link);
                    ?>
                </div>


            </div>
        </div>
    </div>    

    <!-- Table Start -->

    <!-- Table End -->
   
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