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
                    <a href="category.php" class="nav-item nav-link ">Kategori</a>
                    <a href="contact.php" class="nav-item nav-link active">Tentang</a>
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
    <!-- Contact Start -->
    <div class="container-fluid py-3 pt-0 mb-3">
        <div class="container col-lg-6 pt-3">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title mb-0">
                        <h4 class="m-0 text-uppercase text-center font-weight-bold">Tentang Kami</h4>
                    </div>
                    <div class="bg-white border border-top-0 p-4 mb-3">
                        <div class="mb-4">
                            <h5 class="text-uppercase font-weight-bold">Caturwati Library</h5>
                            <p class="mb-4">Caturwati Library merupakan perpustakaan yang dikekola secara pribadi oleh Prof. DR. Endang Caturwati, S.ST, M.S.</p>
							<div class="mb-3">
                                <div class="d-flex align-items-center mb-2">
                                    <i class="fa fa-map-marker-alt text-primary mr-2"></i>
                                    <h5 class="font-weight-bold mb-0">Alamat</h5>
                                </div>
                                <p class="m-0"></i>Jln. Indrajaya II, Blok B, No. 36 <br>Bandung - Jawa Barat</br> </p>
                            </div>
                            <div class="mb-3">
                                <div class="d-flex align-items-center mb-2">
                                    <i class="fa fa-envelope-open text-primary mr-2"></i>
                                    <h5 class="font-weight-bold mb-0">Email</h5>
                                </div>
                                <p class="m-0">Caturwati@gmail.com</p>
                            </div>
                            <div class="mb-3">
                                <div class="d-flex align-items-center mb-2">
                                    <i class="fa fa-phone-alt text-primary mr-2"></i>
                                    <h5 class="font-weight-bold mb-0">Telepon</h5>
                                </div>
                                <p class="m-0">0812-345-678</p>
                            </div>
                        </div>
                    
                    </div>
                </div>
              
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->

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