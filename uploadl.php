<?php
    session_start();
    require 'conn.php';
    $message="";
    if(count($_POST)>0) {
       
        $result = mysqli_query($conn,"SELECT * FROM register WHERE number='" . $_POST["number"] . "' and password = '". $_POST["password"]."'");
        $row  = mysqli_fetch_array($result);
        if(is_array($row)) {
            
        $_SESSION["id"] = $row['id'];
        $_SESSION["name"] = $row['name'];
        } else {
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
           <strong>Please enter Valid Number & Password.
         </div>";
        }
    }
    if(isset($_SESSION["id"])) {
    header("Location:welcome.php");
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
</head>
<body>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="register.css">
<!------ Include the above in your HEAD tag ---------->

<form action="login.php" method='post'>

<div class="container register">
                <div class="row">
                    <div class="col-md-3 register-left">
                        <img src="https://www.pngkit.com/png/full/25-255150_png-vector-vegetable-vegetables-png-icons.png" width='150px' height='80px' alt=""/>
                        <h3>Welcome</h3>
                        <p>Please login to  your Mandai Account</p>
                       
                    </div>
                    <div class="col-md-9 register-right">
                        <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="login.php" role="tab" aria-controls="home" aria-selected="true">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="register.php" role="tab" aria-controls="profile" aria-selected="false">Register</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-heading">Log In</h3>
                                <div class="row register-form">
                                    <div class="col-md-6">
                                        
                                        
                                        <div class="form-group">
                                            <input type="number" class="form-control" placeholder="Number *"  name='number'/>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control"  placeholder="Password *" name='password'  />
                                        </div>
                                        
                                        <div>
                                        </div>
                                       
                                        
                                    </div>
                                    <div class="col-md-6">
                                        
                                        
                                       
                                        
                                        <input type="submit" class="btnRegister"  value="Login" name='submit'/>
                                        
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