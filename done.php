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
	

<div class="cart-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-main table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Username</th>
                                    <th>Name</th>
                                    
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
					   $query = "SELECT * FROM confirmed WHERE (id='$i')";
					   $result = $conn->query($query);
					   
					   
					   if ($result->num_rows > 0) {
					   // output data of each row
					   while($row = $result->fetch_assoc()) { 
						   $a = $a + $row['prize'];
						   $b = $row['name'];
						   $u = $row['username'];
						   $c = $row['id'];
						   
						   
				   echo "<form action='done.php' method='post'>
							   <tr>
								
								   <td class='price-pr'>
								   ".$row['username']." 
								   </td>
								   <td class='price-pr'>
								   ".$row['name']." 
								   </td>
								   
								   
								   <td class='remove-pr'>
								   <button class='btn btn-danger' type='submit' name = '".$u."'>X</button>
								   </td>
							   </tr>
							   
						   </tbody>
						   ";
						   if(isset($_POST[$u])){
				   
				   
							   $quer = "DELETE FROM confirmed WHERE (username ='$u' )";
							   mysqli_query($conn, $quer);
							  header("Location:done.php");
		   
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
