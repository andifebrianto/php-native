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
 
     <!-- Admin Start -->  
    <div class="container-fluid col-lg-6 mb-3">
        <div class="container py-5 col-8 mb-3">
            <div class="section-title col-md-12">
                  <div class="col-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left text-center" >Login</h2>
                            <div class="input-group mb-3" style="width: 100%;">
                                <form action="act-login.php?op=in" method="post">
                                    <div><input type="text" name="username" class="form-control form-control-lg mb-3" placeholder="Username" required></div>
                                    <div><input type="password" name="password" class="form-control form-control-lg mb-3" placeholder="Password" required></div>
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary font-weight-bold mb-3 ">Login</button>
                                    </div>
                                </form>
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