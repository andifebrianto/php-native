<?php
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$kategori = $judul = $nama = $penerbit = $tahun = $jumlah = "";
$kategori_err = $judul_err = $nama_err = $penerbit_err = $tahun_err = $jumlah_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    //cek data dobel
    $cek_judul = $_POST['judul'];
    $sql = "SELECT judul FROM databuku WHERE judul='$cek_judul'";
    $result = mysqli_query($link, $sql);

    if (mysqli_num_rows($result)>0) {
       echo '<script language="javascript">
       alert ("Oops! Data buku sudah ada...");
       window.location="admin.php";
       </script>';
       exit();
   }

   else{
    
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
        // Prepare an insert statement
        $sql = "INSERT INTO databuku (kategori, judul, nama, penerbit, tahun, jumlah) VALUES (?, ?, ?, ?, ?, ?)";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssss", $param_kategori, $param_judul, $param_nama, $param_penerbit, $param_tahun, $param_jumlah);

            // Set parameters
            $param_kategori = $kategori;
            $param_judul = $judul;
            $param_nama = $nama;
            $param_penerbit = $penerbit;
            $param_tahun = $tahun;
            $param_jumlah = $jumlah;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                // echo '<script language="javascript">
                //    alert ("Data buku berhasil ditambahkan...");
                //    window.location="admin.php";
                //    </script>';
                header("location: admin.php");
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
                        <h2>Tambah Data Buku</h2>
                    </div>
                    <p>Silahkan isi form untuk menambahkan data buku ke dalam database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group <?php echo (!empty($kategori_err)) ? 'has-error' : ''; ?>">
                            <label>Kategori</label>
                           
                                <select id="" name="kategori" class="form-control">

                                    <!-- <option value="">Pilih Kategori</option> -->
                                    <?php
                                    // ambil data dari database
                                    require_once "config.php";
                                    $sql = "SELECT kategori_k FROM kategori_kel ORDER BY kategori_k ASC";
                                    $result = mysqli_query($link, $sql);
                                    while ($row = mysqli_fetch_array($result)) {
                                        ?>
                                        <option value="<?php echo $row['kategori_k'] ?>"><?php echo $row['kategori_k'] ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                        </div>
                        <div class="form-group <?php echo (!empty($judul_err)) ? 'has-error' : ''; ?>">
                            <label>Judul Buku</label>
                            <input type="text" name="judul" class="form-control" placeholder="Masukkan judul" value="<?php echo $judul; ?>" required>
                            <span class="help-block"><?php echo $judul_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($nama_err)) ? 'has-error' : ''; ?>">
                            <label>Nama Penulis</label><br><em>Jika 2 penulis atau lebih gunakan enter</em>
                            <textarea name="nama" class="form-control" placeholder="Masukkan nama penulis" required><?php echo $nama; ?></textarea>
                            <span class="help-block"><?php echo $nama_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($penerbit_err)) ? 'has-error' : ''; ?>">
                            <label>Penerbit</label><br><em>Jika 2 penerbit atau lebih gunakan enter</em>
                            <textarea name="penerbit" class="form-control" placeholder="Masukkan penerbit" required><?php echo $penerbit; ?></textarea>
                            <span class="help-block"><?php echo $penerbit_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($tahun_err)) ? 'has-error' : ''; ?>">
                            <label>Tahun</label>
                            <input type="text" name="tahun" class="form-control" placeholder="Masukkan tahun" required value="<?php echo $tahun; ?>">
                            <span class="help-block"><?php echo $tahun_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($jumlah_err)) ? 'has-error' : ''; ?>">
                            <label>Jumlah</label>
                            <input type="number" value="1" min="1" max="100" name="jumlah" class="form-control" value="<?php echo $jumlah; ?>">
                            <span class="help-block"><?php echo $jumlah_err;?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Simpan">
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