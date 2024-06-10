<?php
require_once 'vendor/autoload.php';
require 'conn.php';

if(isset($_POST['submit'])){
    $name = trim($_POST['name']);
    $username = trim($_POST['username']);
    $number = trim($_POST['number']);
    $password = $_POST['password'];
    $city = $_POST['city'];
    
    $conpass = $_POST['conpass'];
    $uu = '';

    $sql = "SELECT username FROM register";
    $resu = $conn->query($sql);

if ($resu->num_rows > 0) {
  // output data of each row
  while($row = $resu->fetch_assoc()) {
    $uu = $row['username'];
    }
  }
  if($uu == $username){
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
      <strong>Username already exist.
    </div>";
  }
  else{
    if($password == $conpass){
      $password_encrypted = password_hash($password, PASSWORD_BCRYPT);

      
        if($name !=='' && $number !=='' && ($password !== '') && ($username !== '')){

          
            
            $query = "INSERT INTO register(name, username, number, password, city)VALUES('$name', '$username', '$number', '$password_encrypted', '$city')";

            $trig = mysqli_query($conn, $query);
            $pnumber = $_POST['number'];
            $ppnumber = '+91'.strval($pnumber);
   
            $otp = mt_rand(100000,999999);
            $otpquery = "INSERT INTO otp (otp, number) VALUES ('$otp', '$pnumber')";
            $otpfire = mysqli_query($conn, $otpquery);

          

           
            require_once 'vendor/autoload.php';
            $MessageBird = new \MessageBird\Client('V6KIrAHmah48Fg8fWPccJO1RP');
              $Message = new \MessageBird\Objects\Message();
              $Message->originator = 'TestMessage';
              $Message->recipients = array($ppnumber);
              $Message->body = 'OTP to validate your number is '.($otp).' Please do not share your OTP with anyone';
            
              $MessageBird->messages->create($Message);

  
            
            
        
        header('location:verify.php');
                }
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
          <strong>Something Wrong! Please try again.
        </div>";
        }
    }
    if($password !== $conpass){
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
          <strong>Password and Confirm Password missmatch.
        </div>";
    }

    if($name == ''){
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
          <strong>Please enter Valid Name.
        </div>";
    }elseif($number == ''){
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
          <strong>Please enter Valid Number.
        </div>";
    }elseif($password == ''){
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
          <strong>Please enter Valid Password.
        </div>";
    }elseif($conpass == ''){
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
          <strong>Please enter Valid Confirm Password.
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
    <title>Register</title>
</head>
<body>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="register.css">
<!------ Include the above in your HEAD tag ---------->

<form action="register.php" method='post'>

<div class="container register">
                <div class="row">
                    <div class="col-md-3 register-left">
                        <img src="https://www.pngkit.com/png/full/25-255150_png-vector-vegetable-vegetables-png-icons.png" width='150px' height='80px' alt=""/>
                        <h3>Welcome</h3>
                        <p>Please register to start your Mandai Account</p>
                       
                    </div>
                    <div class="col-md-9 register-right">
                        
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-heading">Register</h3>
                                <div class="row register-form">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Name *" name='name' require/>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Username *" name='username' require/>
                                        </div>
                                        
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Number *"  name='number' require/>
                                            <h6 style='color:red;'>Please do not add +91 or 0 with number</h5>
                                        </div>
                                        <div class="form-group">
                                        <label for="cars">Select Your City</label>

                                                    <select  id="cars" name='city'>

                                                      <option value="Pandharpur">Pandharpur</option>
                                                      
                                                    </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control"  placeholder="Password *" name='password' require />
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control"  placeholder="Confirm Password *" name='conpass' require />
                                        </div>
                                        <div>
                                        </div>
                                       
                                        
                                    </div>
                                    <div class="col-md-6">
                                        
                                        
                                       
                                        
                                        <input type="submit" class="btnRegister"  value="Register" name='submit'/>
                                    </div>
                                    
                                <p>Already user? <a href="login.php" role="tab"  aria-selected="true">LOGIN </a>here</p> <br>
                            
                            
                                   
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>

            </div>
            </form>
</body>
</html>