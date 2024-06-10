<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>Admin</title>
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
<div class="cart-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-main table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Username</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    
                                    <th>Images</th>
                                    <th>Quantity</th>
                                    <th>Address</th>
                                    <th>Total</th>
                                    
                                    
                                    
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            <tbody>

<?php


require 'conn.php';

$a = 0;
 $r = mysqli_query($conn, "SELECT * FROM confirmed");
 $ro = mysqli_num_rows($r);
 

     for($i=1;$i<=1000;$i++){
         $query = "SELECT id, name, username, product, prize, img, quantity, address, total FROM confirmed WHERE (id='$i')";
         $result = $conn->query($query);
         
         
         if ($result->num_rows > 0) {
         // output data of each row
         while($row = $result->fetch_assoc()) { 
             $u = $row['username'];
             $a = $a + $row['prize'];
             $b = $row['name'];
             $c = $row['id'];
             
             
     echo "<form action='upload.php' method='post'>
                 <tr>
                 <td class='price-pr'>
                      ".$row['id']." 
                     </td>
                     <td class='price-pr'>
                      ".$row['name']." 
                     </td>
                     <td class='price-pr'>
                      ".$row['username']." 
                     </td>
                     <td class='price-pr'>
                      ".$row['product']." 
                     </td>
                     <td class='price-pr'>
                     ₹ ".$row['prize']." 
                     </td>
                     
                 
                     <td class='thumbnail-img'>
                         <a href='#'>
                     <img class='img-fluid' src='image/".$row['img']."' />
                 </a>
                     
                     <td class='price-pr'>
                      ".$row['quantity']." 
                     </td>


                     <td class='price-pr'>
                     ".$row['address']." 
                     </td>
                     <td class='price-pr'>
                     ₹ ".$row['total']." 
                     </td>
                    
                     
                     
                     
                     <td class='remove-pr'>
                     <button class='btn btn-danger' type='submit' name = '".$b."'>X</button>
                     </td>
                 </tr>
                 
             </tbody>
             ";
             if(isset($_POST[$b])){
     
     
                 $quer = "DELETE FROM upload WHERE (name ='$u' )";
                 mysqli_query($conn, $quer);
                header("Location:upload.php");

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


</body>
</html>