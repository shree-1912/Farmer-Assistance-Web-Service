<?php

if(isset($_POST['submit'])){
        $adminid = trim($_POST['adminId']);
        $adminpass = trim($_POST['adminPass']);


        if($adminid !== '7083898610' && $adminpass !== 'mymandai1502'){

            echo 'Wrong Password';
            

        }else{
            header ('location:admin.php');
        }
    }





?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>
<body>
<form action="adminlogin.php" method='post'>
<div style='border:2px solid black; margin:10px; padding: 10px; width:400px'>
<br>
    <lable>Admin Id</lable>
    <input type="text" name = 'adminId'>
    <br><br>
    <lable>Admin Password</lable>
    <input type="password" name = 'adminPass'>
    <br>
    <button type='submit' name='submit' style='color:white; background-color:pink;'>Log In</button>
    </div>
</form>
</body>
</html>