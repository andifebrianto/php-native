<!-- Footer Start -->
<div class="container-fluid bg-dark pt-5 px-sm-3 px-md-5 mt-5">
        <div class="row py-2">
            <div class="col-lg-3 col-md-6 mb-5">
                <div class="mb-3">
                    <div class="mb-2">
                        </div>
                    </div>
                <div class="mb-3">

                    <div class="mb-2">
                        </div>
                    </div>
                <div class="">
                    <div class="mb-2">

                        </div>                
                    </div>
                </div> 
            <div class="col-lg-3 col-md-6 mb-5">
                <h5 class="mb-4 text-white text-uppercase font-weight-bold text-center">Caturwati Library</h5>
                <p class="font-weight-medium text-center"><i class="fa fa-map-marker-alt mr-2"></i>Jln. Indrajaya II, Blok B, No. 36 <br>Bandung - Jawa Barat</br> </p>
                <p class="font-weight-medium text-center"><i class="fa fa-phone-alt mr-2"></i>0812-345-678</p>
                <p class="font-weight-medium text-center"><i class="fa fa-envelope mr-2"></i>caturwati@gmail.com</p>
                 <div class="col card-header text-center">
                    <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="#"><i class="fab fa-instagram"></i></a>
                   
                </div>
            </div>
               
            <div class="col-lg-4 col-md-6 mb-5">
                <h5 class="mb-4 text-white text-uppercase font-weight-bold text-center">Categories</h5>
                <div class="m-n1">
                     <div class="col card-header text-center">
                         
                    <?php 
                        //include 'config.php';
                        $sql = "SELECT kategori_k FROM kategori_kel ORDER BY kategori_k ASC";
                        $result = mysqli_query($link, $sql);

                        while ($row = mysqli_fetch_assoc($result)) : ?>   
                    <a href="kategori_main.php?kat=<?= $row["kategori_k"]; ?>" class="btn btn-sm btn-secondary m-1"><?= $row["kategori_k"]; ?></a>

                        <?php endwhile; ?>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer End -->
    <div class="container-fluid py-4 px-sm-3 px-md-5" style="background: #111111;">
        <p class="m-0 text-center"><a href="#">Caturwati Library</a> &copy; 2022 All Rights Reserved.</a></p>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary btn-square back-to-top"><i class="fa fa-arrow-up"></i></a>