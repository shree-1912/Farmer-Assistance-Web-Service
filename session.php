<?php
   include('conn.php');
   session_start();
   
   $user_check = $_SESSION['id'];
   
   $ses_sql = mysqli_query($conn,"SELECT name FROM register WHERE id = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['name'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
      die();
   }
?>