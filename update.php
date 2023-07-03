<?php
// Include config file
include "config.php";

// Semua kategori
$sql_kate = "SELECT * FROM kategori_kel ORDER BY kategori_k ASC";
$result_kate = mysqli_query($link, $sql_kate);
 
// Define variables and initialize with empty values
$kategori = $judul = $nama = $penerbit = $tahun = $jumlah = "";
$kategori_err = $judul_err = $nama_err = $penerbit_err = $tahun_err = $jumlah_err = "";
 
// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];
    
    // Validate kategori
    $input_kategori = trim($_POST["kategori"]);
    if(empty($input_kategori)){
        $kategori_err = "Please enter a kategori.";
    } elseif(!filter_var($input_kategori, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $kategori_err = "Please enter a valid kategori.";
    } else{
        $kategori = $input_kategori;
    }

    // Validate judul
    $input_judul = trim($_POST["judul"]);
    if(empty($input_judul)){
        $judul_err = "Please enter a judul.";
    } else{
        $judul = $input_judul;
    }

    // Validate nama
    $input_nama = trim($_POST["nama"]);
    if(empty($input_nama)){
        $nama_err = "Please enter a nama.";
    } else{
        $nama = $input_nama;
    }

    // Validate penerbit
    $input_penerbit = trim($_POST["penerbit"]);
    if(empty($input_penerbit)){
        $penerbit_err = "Please enter an penerbit.";
    } else{
        $penerbit = $input_penerbit;
    }

    // Validate tahun
    $input_tahun = trim($_POST["tahun"]);
    if(empty($input_tahun)){
        $tahun_err = "Please enter the tahun.";
    } elseif(!ctype_digit($input_tahun)){
        $tahun_err = "Please enter a positive integer value.";
    } else{
        $tahun = $input_tahun;
    }

    // Validate jumlah
    $input_jumlah = trim($_POST["jumlah"]);
    if(empty($input_jumlah)){
        $jumlah_err = "Please enter the jumlah.";
    } elseif(!ctype_digit($input_jumlah)){
        $jumlah_err = "Please enter a positive integer value.";
    } else{
        $jumlah = $input_jumlah;
    }
    
    // Check input errors before inserting in database
    if(empty($kategori_err) && empty($judul_err) && empty($nama_err) && empty($penerbit_err) && empty($tahun_err) && empty($jumlah_err)){
        // Prepare an update statement
        $sql = "UPDATE databuku SET kategori=?, judul=?, nama=?, penerbit=?, tahun=?, jumlah=? WHERE id=?";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssssi", $param_kategori, $param_judul, $param_nama, $param_penerbit, $param_tahun, $param_jumlah, $param_id);
            
            // Set parameters
            $param_kategori = $kategori;
            $param_judul = $judul;
            $param_nama = $nama;
            $param_penerbit = $penerbit;
            $param_tahun = $tahun;
            $param_jumlah = $jumlah;
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
                echo '<script language="javascript">
               alert ("Data buku berhasil diperbaharui...");
               window.location="admin.php";
               </script>';
               exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM databuku WHERE id = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            // Set parameters
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                    $kategori = $row["kategori"];
                    $judul = $row["judul"];
                    $nama = $row["nama"];
                    $penerbit = $row["penerbit"];
                    $tahun = $row["tahun"];
                    $jumlah = $row["jumlah"];
                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
        
        // Close connection
        // mysqli_close($link);
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>
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
        <div class="container py-4 col-8 mb-3">
            <div class="section-title col-md-12 mb-0">
                  <div class="col-12">
                    <div class="page-header clearfix"> 
     <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Update Buku</h2>
                    </div>
                    <p>Silahkan masukan pembaharuan yang diperlukan.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group <?php echo (!empty($kategori_err)) ? 'has-error' : ''; ?>">
                            <label>Kategori</label>
                          
                                <select id="" name="kategori" class="form-control">
                                    <!-- <option value="">Pilih Kategori</option> -->
                                    <option value="<?php echo $kategori ?>"><?php echo $kategori ?></option>
                                    <?php
                                    while ($row = mysqli_fetch_array($result_kate)) {
                                        ?>
                                        <option value="<?php echo $row['kategori_k'] ?>"><?php echo $row['kategori_k'] ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                        </div>
                        <div class="form-group <?php echo (!empty($judul_err)) ? 'has-error' : ''; ?>">
                            <label>Judul Buku</label>
                            <input type="text" name="judul" class="form-control" placeholder="Masukkan judul" value="<?php echo $judul; ?>">
                            <span class="help-block"><?php echo $judul_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($nama_err)) ? 'has-error' : ''; ?>">
                            <label>Nama Penulis</label><br><em>Jika 2 penulis atau lebih gunakan enter</em>
                            <textarea name="nama" class="form-control" placeholder="Masukkan nama penulis"><?php echo $nama; ?></textarea>
                            <span class="help-block"><?php echo $nama_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($penerbit_err)) ? 'has-error' : ''; ?>">
                            <label>Penerbit</label><br><em>Jika 2 penerbit atau lebih gunakan enter</em>
                            <textarea name="penerbit" class="form-control" placeholder="Masukkan penerbit"><?php echo $penerbit; ?></textarea>
                            <span class="help-block"><?php echo $penerbit_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($tahun_err)) ? 'has-error' : ''; ?>">
                            <label>Tahun</label>
                            <input type="text" name="tahun" class="form-control" placeholder="Masukkan tahun" value="<?php echo $tahun; ?>">
                            <span class="help-block"><?php echo $tahun_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($jumlah_err)) ? 'has-error' : ''; ?>">
                            <label>Jumlah</label>
                            <input type="text" name="jumlah" class="form-control" placeholder="Masukkan jumlah" value="<?php echo $jumlah; ?>">
                            <span class="help-block"><?php echo $jumlah_err;?></span>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Ubah Data">
                        <a href="admin.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
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