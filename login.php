<?php
    session_start();
    require 'conn.php';
    $message="";
    if(count($_POST)>0) {


        $p = $_POST['password'];
        $n = $_POST['number'];
        $en ='';


        $ram = mysqli_query($conn,"SELECT * FROM register WHERE number='$n' and verify = 'yes'");
        $ra  = mysqli_fetch_array($ram);
        if(is_array($ra)) {
            
        $en = $ra['password'];
       
        
        }
        
        

        if (password_verify($p, $en)) {
            // Success!
           
        
       
        $result = mysqli_query($conn,"SELECT * FROM register WHERE number='" . $_POST["number"] . "'");
        $row  = mysqli_fetch_array($result);
        if(is_array($row)) {
            
        $_SESSION["id"] = $row['id'];
        $_SESSION["name"] = $row['name'];
        $_SESSION["username"] = $row['username'];
        if(isset($_SESSION["id"])) {
            header("Location:welcome.php");
            }
        
        } 
    }
    else {
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
                       
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-heading">Log In</h3>
                                <div class="row register-form">
                                    <div class="col-md-6">
                                        
                                        
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Number *"  name='number'/>
                                            <p style='color:red;'>Please do not add +91 or 0 with number</p>
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
                                    <div><p>New user? <a  href="register.php" role="tab"  aria-selected="true">REGISTER </a>here</p></div>
                                    <div> <hr>
                                <p>Forgot Password? <a  href="forgot.php" role="tab"  aria-selected="true">Reset </a>here</p> 
                                    
                                </div>
                                    
                                </div>
                                
                                
                            </div>
                            
                        </div>
                        
                    </div>
                    
                </div>
                
            </div>
            
            </form>
</body>
</html>