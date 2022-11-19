<?php include("layouts/header.php") ?>

<?php include("layouts/navigationadmin.php") ?>

        <!-- start banner Area -->
        <!-- <section class="banner-area" id="home">	
            <div class="container">
                <div class="row fullscreen d-flex align-items-center justify-content-start">
                    <div class="banner-content col-lg-7">
                        <h6 class="text-white text-uppercase">Now you can feel the Energy</h6>
                        <h1>
                            Start your day with <br>
                            a black Coffee				
                        </h1>
                        <a href="#" class="primary-btn text-uppercase">Buy Now</a>
                    </div>											
                </div>
            </div>
        </section> -->
        <!-- End banner Area -->	

        
        <!-- Start menu Area -->
        <section class="menu-area section-gap" id="coffee">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="menu-content pb-60 col-lg-10">
                        <div class="title text-center">
                            <h1 class="mb-10">What kind of Coffee we serve for you</h1>
                            <p>Who are in extremely love with eco friendly system.</p>
                        </div>
                    </div>
                </div>						
                <div class="row">
                <?php 
                    include 'DBConnection/DBConnection.php';
                    $dbconnection = new DBConnection();
                    $dbconnection->select("products","*");
                    $result = $dbconnection->sql;
                ?>
                <?php while ($rows = mysqli_fetch_assoc($result)) { ?>
                    <div class="col-lg-4">
                        <div class="single-menu">
                            <div class="title-div justify-content-between d-flex">
                                <h4><?php echo $rows["product_name"] ?></h4>
                                <p class="price float-right">
                                    <?php echo "P ".$rows["price"] ?>
                                </p>
                            </div>
                            <p>
                                <?php echo $rows["product_description"] ?>
                                <br>
                                <?php echo "Size : ".$rows["size"] ?>
                            </p>								
                        </div>
                    </div>
                    <?php } ?>												
                </div>
            </div>	
        </section>
        <!-- End menu Area -->
        

        <!-- start footer Area -->		
        <!-- End footer Area -->	

<?php include("layouts/script.php") ?>