<?php
    session_start();
    require 'conn.php';
    $message="";
    if(count($_POST)>0) {


        
        $n = $_POST['number'];
        $en ='';


        $ram = mysqli_query($conn,"SELECT * FROM register WHERE number='$n' and verify = 'yes'");
        $ra  = mysqli_fetch_array($ram);
        if(is_array($ra)) {
            
        $en = $ra['number'];
       
        $pnumber = $_POST['number'];
        $ppnumber = '+91'.strval($pnumber);

        if($n == $en){

        $otp = mt_rand(100000,999999);
        $otpquery = "INSERT INTO otp (otp, number) VALUES ('$otp', '$pnumber')";
        $otpfire = mysqli_query($conn, $otpquery);

      

       
        require_once 'vendor/autoload.php';
        $MessageBird = new \MessageBird\Client('V6KIrAHmah48Fg8fWPccJO1RP');
          $Message = new \MessageBird\Objects\Message();
          $Message->originator = 'TestMessage';
          $Message->recipients = array($ppnumber);
          $Message->body = 'OTP to reset your password is '.($otp).' Please do not share your OTP with anyone';
        
          $MessageBird->messages->create($Message);

          header('location:reset.php');

        }else{
            echo 'Please enter valid number.';
        }
    }
        
        }
        
    
    

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
</head>
<body>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="register.css">
<!------ Include the above in your HEAD tag ---------->

<form action="forgot.php" method='post'>

<div class="container register">
                <div class="row">
                    <div class="col-md-3 register-left">
                        <img src="https://www.pngkit.com/png/full/25-255150_png-vector-vegetable-vegetables-png-icons.png" width='150px' height='80px' alt=""/>
                        <h3>Reset Your Password</h3>
                        <p></p>
                       
                    </div>
                    <div class="col-md-9 register-right">
                       
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-heading">Reset</h3>
                                <div class="row register-form">
                                    <div class="col-md-6">
                                        
                                        
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Number *"  name='number'/>
                                            <p style='color:red;'>Please do not add +91 or 0 with number</p>
                                        </div>
                                       
                                        
                                        <div>
                                        </div>
                                       
                                        
                                    </div>
                                    <div class="col-md-6">
                                        
                                        
                                       
                                        
                                        <input type="submit" class="btnRegister"  value="Get OTP" name='submit'/>
                                        
                                    </div>
                                    <div><p>New user? <a  href="register.php" role="tab"  aria-selected="true">REGISTER </a>here</p></div>
                                    
                                    
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