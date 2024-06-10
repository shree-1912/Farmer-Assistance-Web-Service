<?php

require 'conn.php';


if(isset($_POST['submit'])){
    $votp = $_POST['otp'];
    $npass = $_POST['npass'];


    $result = mysqli_query($conn,"SELECT * FROM otp WHERE otp='" . $_POST["otp"] . "'");
    $row  = mysqli_fetch_array($result);
    if(is_array($row)) {
        $vnumber = $row['number'];
        $password_encrypted = password_hash($npass, PASSWORD_BCRYPT);
        
    if(($votp == $row['otp']) && ($npass !== '')){
            
        $upv = "UPDATE register
        SET password = '$password_encrypted' 
        WHERE number = '$vnumber'";

        mysqli_query($conn, $upv);

        $dlt = "DELETE FROM otp WHERE number = '$vnumber'";
        mysqli_query($conn, $dlt);
    }
      
        header ('location:login.php');
    }else{
        echo "<style>
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
          <strong>Invalid OTP! Please try again.
        </div>";
    }
   
    } 


?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset</title>
</head>
<body>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="register.css">
<!------ Include the above in your HEAD tag ---------->

<form action="reset.php" method='post'>

<div class="container register">
                <div class="row">
                    <div class="col-md-3 register-left">
                        <img src="https://www.pngkit.com/png/full/25-255150_png-vector-vegetable-vegetables-png-icons.png" width='150px' height='80px' alt=""/>
                        <h3>Verify Otp</h3>
                        <p>Please reset  your password </p>
                       
                    </div>
                    <div class="col-md-9 register-right">
                        <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                            
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-heading">Enter OTP received on your phone number.</h3>
                                <div class="row register-form">
                                    <div class="col-md-6">
                                        
                                        
                                        <div class="form-group">
                                            <input type="number" class="form-control" placeholder="Enter OTP here *"  name='otp'/>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" placeholder="Enter new password here. *"  name='npass'/>
                                        </div>
                                        
                                        
                                        <div>
                                        </div>
                                       
                                        
                                    </div>
                                    <div class="col-md-6">
                                        
                                        
                                       
                                        
                                        <input type="submit" class="btnRegister"  value="Verify" name='submit'/>
                                        
                                    </div>
                                    <a href="index.php">Home</a>
                                </div>
                                
                            </div>
                            
                        </div>
                        
                    </div>
                    
                </div>
                
            </div>
            
            </form>
</body>
</html>