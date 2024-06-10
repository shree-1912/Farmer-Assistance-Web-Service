

<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>Upload</title>
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
	


</div>
<div class="cart-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-main table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Images</th>
                                    <th>Name</th>

                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    
                                    <th>Address</th>
                                    
                                    
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            <tbody>

<?php
              require 'conn.php';
			  $a = 0;
			  $b = 'o';
			   $r = mysqli_query($conn, "SELECT * FROM confirmed");
			   $ro = mysqli_num_rows($r);
			   if ($conn->connect_error) {
					   die("Connection failed: " . $conn->connect_error);
					   }

				   for($i=1;$i<=1000;$i++){
					   $query = "SELECT id, name, product, prize, img, quantity, address, date FROM confirmed WHERE (id='$i')";
					   $result = $conn->query($query);
					   
					   
					   if ($result->num_rows > 0) {
					   // output data of each row
					   while($row = $result->fetch_assoc()) { 
						   $a = $a + $row['prize'];
						   $b = $row['name'];
						   $c = $row['id'];
						   $tt = $row['product'];
						   
						   
				   echo "<form action='del1.php' method='post'>
							   <tr>
								   <td class='thumbnail-img'>
									   <a href='#'>
								   <img class='img-fluid' src='image/".$row['img']."' />
							   </a>
								   </td>
								   <td class='name-pr'>
									   <h3 name = '".$b."p'>
									   ".$b."
							   </h3>
								   </td>
								   </td>
								   <td class='name-pr'>
									   <h3 >
									   ".$row['product']."
							   </h3>
								   </td>
								   <td class='price-pr'>
								   ₹ ".$row['prize']." 
								   </td>
								   <td class='price-pr'>
								    ".$row['quantity']." 
								   </td>
								   <td class='price-pr'>
								   ₹ ".$row['quantity']*$row['prize']." 
								   </td>
								   <td class='price-pr'>
								   ".$row['address']." 
								   </td>
								   
								   
								   <td class='remove-pr'>
								   <button class='btn btn-danger' type='submit' name = '".$b."'>Done</button>
								   </td>
							   </tr>
							   
						   </tbody>
						   ";
						   if(isset($_POST[$b])){
				   
				   
							   $quer = "DELETE FROM confirmed WHERE (product ='$tt' )";
							   mysqli_query($conn, $quer);
							  header("Location:del.php");
		   
						   }
						}
					}
				}
			

?>
 </table>
                          
						  </div>
						  </div>
                </div>
            </div>

<a href="del.php">Del</a>

            

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
