<?php
// Initialize the session
ob_start();
session_start();
$session = $_SESSION["name"];
$usern = $_SESSION["username"];
if(!isset($_SESSION["id"])){
    header('location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>Checkout</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <!-- Start Main Top -->
    <div class="main-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
					
                    <div class="right-phone-box">
                        <p>Call US :- <a href="#"> +11 70838 98610</a></p>
                    </div>
                    <div class="our-link">
                        <ul>
                            <li><a href="welcome.php"><i class="fa fa-user s_color"></i> My Account</a></li>
                           
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
					<div class="login-box">
						
							<a href="logout.php" style='color:white;'>Log Out</a>
						
					</div>
                    <div class="text-slid-box">
                        <div id="offer-box" class="carouselTicker">
                            <ul class="offer-box">
                            <li>
                                    <i class="fab fa-opencart"></i> Welcome to mandai
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> Enjoy vegetable shopping
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> Freshh vegetables
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> Low prize
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> Available home delivery
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> Delivery within 24 hours
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Main Top -->

    <!-- Start Main Top -->
    <header class="main-header" style='position:initial;'>
        <!-- Start Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
            <div class="container">
                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                    <a class="navbar-brand" href="welcome.php"><img src="logo.png" class="logo" alt="" style='height:150px; width:150px'></a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                        <li class="nav-item"><a class="nav-link" href="welcome.php">Home</a></li>
                    
                    </ul>
                </div>
                <!-- /.navbar-collapse -->


            </div>
            
        </nav>
        <!-- End Navigation -->
    </header>
    <!-- End Main Top -->

    <!-- Start Top Search -->
    <div class="top-search">
        <div class="container">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                <input type="text" class="form-control" placeholder="Search">
                <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
            </div>
        </div>
    </div>
    <!-- End Top Search -->

    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Cart</h2>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Cart  -->
    <div class="cart-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-main table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Images</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    
                                    
                                </tr>
                            </thead>
                            <tbody>
<?php
               require 'conn.php';
               $a = 0;
               $b = 'o';
               $e = 0;
               $s = 'o';
               $p = 'o';
               $c = 'o';
               $d = 'o';
               $img = 'o';
                $r = mysqli_query($conn, "SELECT * FROM cart");
                $ro = mysqli_num_rows($r);
                if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                        }

                    for($i=1;$i<=1000;$i++){
                        $query = "SELECT id, product, prize, img, quantity FROM cart WHERE (id='$i' && name='$session' && username='$usern')";
                        $result = $conn->query($query);
                        
                        
                        if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) { 
                           
                            $b = $row['product'];
                            $p = $row['prize'];
                            $c = $row['id'];
                            $d = $row['quantity'];
                            $a = $a + $d * $row['prize'];
                          
                            $img = $row['img'];
                            
                    echo "<form action='checkout.php' method='post'>
                                <tr>
                                    <td class='thumbnail-img'>
                                        <a href='#'>
									<img class='img-fluid' src='image/".$row['img']."' />
								</a>
                                    </td>
                                    <td class='name-pr'>
                                        <h3 name = '".$b."'>
                                        ".$b."
								</h3>
                                    </td>
                                    <td class='price-pr'>
                                    ₹ ".$row['prize']." 
                                    </td>
                                    <td class='name-pr'><h3 name = '".$d."'>
                                    ".$d."
                            </h3></td>
                                    
                                    
                                </tr>
                                
                            </tbody>
                            ";
                            
                           $e = $d*$p+$e;
                           if(isset($_POST['check'])){
                            $address = trim($_POST['address']);

                            if($address !== ''){
                                $que = "INSERT INTO confirmed(name, username, product, prize, img, quantity,  address)
                                SELECT name, username, product, prize, img, quantity, '$address'
                                FROM cart
                                WHERE (name = '$session' && username='$usern') ";
                             
                            
                            
                            mysqli_query($conn, $que);
                            
                            $dl = "DELETE FROM cart WHERE(name = '$session' && username='$usern')";
                            mysqli_query($conn, $dl);
                        
                           
                            header('location:welcome.php');
                        }else{
                            echo"<style>
                            .alert {
                              padding: 20px;
                              background-color: #f44336;
                              color: white;
                            }
                            
                            .closebtn {
                              margin-left: 15px;
                              color: white;
                              font-weight: bold;
                              float: right;
                              font-size: 22px;
                              line-height: 20px;
                              cursor: pointer;
                              transition: 0.3s;
                            }
                            
                            .closebtn:hover {
                              color: black;
                            }
                            </style>
                            </head>
                            <body>
                            
                           
                            <div class='alert'>
                              <span class='closebtn' onclick='this.parentElement.style.display='none';'>&times;</span> 
                              <strong>Please enter Valid Address
                              .
                            </div>";
                        }
                        
                            
                        }
    
                        }

                        
     
                    } 
                    // $conn->close();
                }
                

                
?>
                        </table>
                          
            </div>
             </form>

            
                    </div>
                </div>
            </div>
            
            <div class="row my-5">
                <div class="col-lg-6 col-sm-6">
                    
                </div>
                <div class="col-lg-6 col-sm-6">
                    
                </div>
            </div>

            <div class="row my-5">
                
                <div class="col-lg-4 col-sm-12">
                    <div class="order-box">
                        <h3>Order summary</h3>
                        <div class="d-flex">
                            <h4>Sub Total</h4>

                            <div class="ml-auto font-weight-bold"><?php echo $e;?></div>
                        </div>
                        
                        
                        <div class="d-flex">
                            <h4>Delivery Charges</h4>

                            <div class="ml-auto font-weight-bold"><?php 
                            if($e < 170 ){echo  20;} else{echo ('Free Delivery');}?> </div>
                        </div>
                        
                        <hr>
                        <div class="d-flex gr-total">
                            <h5>Grand Total</h5>
                            <div class="ml-auto h5"><?php 
                            if($e < 170 ){echo ($e) + 20;} else{echo ($e);}?> </div>
                        </div>
                        <hr> </div>
                </div>
                <form action="final.php" method='post'>
                <div class="col-lg-8 col-sm-12">
                <label for="address">Enter address:</label>
                <input type="text" name = 'address'>
                </div>
                <div class="col-12 d-flex shopping-box"><button type='submit' name='check' class="ml-auto btn btn-success" style='position:right;'>Checkout</button> </div> </form>
            </div>
<?php


ob_end_flush();

?>
        </div>
    </div>
    <!-- End Cart -->

    <!-- Start Instagram Feed  -->
    <div class="instagram-box">
        <div class="main-instagram owl-carousel owl-theme">
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-01.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-02.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-03.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-04.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-05.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-06.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-07.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-08.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-09.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-05.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Instagram Feed  -->


        <!-- Start Footer  -->
        <footer>
        <div class="footer-main">
            <div class="container">
				<div class="row">
					<div class="col-lg-4 col-md-12 col-sm-12">
						<div class="footer-top-box">
							
						</div>
					</div>
					<div class="col-lg-4 col-md-12 col-sm-12">
						<div class="footer-top-box">
							
							
						</div>
					</div>
					<div class="col-lg-4 col-md-12 col-sm-12">
						<div class="footer-top-box">
							<h3>Social Media</h3>
							<p>Follow us on</p>
							<ul>
                                <li><a href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-google-plus" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-pinterest-p" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-whatsapp" aria-hidden="true"></i></a></li>
                            </ul>
						</div>
					</div>
				</div>
				<hr>
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                       
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-link-contact">
                            <h4>Contact Us</h4>
                            <ul>
                                <li>
                                    <p><i class="fas fa-map-marker-alt"></i>Address: At.Post-Tulshi, <br>Tal. Madha, Dist. Solapur<br> 413302</p>
                                </li>
                                <li>
                                    <p><i class="fas fa-phone-square"></i>Phone: <a href="tel:+1-888705770">+91 70838 98610</a></p>
                                </li>
                                <li>
                                    <p><i class="fas fa-envelope"></i>Email: <a href="mailto:contactinfo@gmail.com">pratikm057@gmail.com</a></p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer  -->

    <!-- Start copyright  -->
    <div class="footer-copyright">
        <p class="footer-company">All Rights Reserved. &copy; 2021 <a href="welcome.php">Mandai</a> Design By :
            <a href="http://techpratik.in/">Pratik G. Mali</a></p>
    </div>
    <!-- End copyright  -->

    <a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

    <!-- ALL JS FILES -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
    <script src="js/jquery.superslides.min.js"></script>
    <script src="js/bootstrap-select.js"></script>
    <script src="js/inewsticker.js"></script>
    <script src="js/bootsnav.js."></script>
    <script src="js/images-loded.min.js"></script>
    <script src="js/isotope.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/baguetteBox.min.js"></script>
    <script src="js/form-validator.min.js"></script>
    <script src="js/contact-form-script.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>