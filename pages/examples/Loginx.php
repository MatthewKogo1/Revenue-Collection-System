<?php
session_start();
  include('connect.php');

   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $mail = mysqli_real_escape_string($conn,$_POST['mail']);
      $mypassword = mysqli_real_escape_string($conn,$_POST['Password']);     
      $sql = "SELECT * FROM USER WHERE EMAIL = '$mail'";
      $result = mysqli_query($conn,$sql);
      


      if (mysqli_num_rows($result)>0) {
         while ($row=mysqli_fetch_array($result)) {
           if ($row[7]=='0') {
             # code...
             if (password_verify($mypassword,$row[5])) {
                if (!empty( $_SESSION['pass'])) {
                  session_destroy();
                }
                
                $rand=rand();
                $_SESSION['pass']=$rand;
                $_SESSION['user']=$mail;
                $_SESSION['idnum']=$row[3];
                $_SESSION['phone']=$row[2];
                $_SESSION['name']=$row[1];
                $_SESSION['ID']=$row[0];
                $_SESSION['domain']=$row[6];
                $welcome='Welcome ';

                echo '<script type="text/javascript">';
                echo 'alert("'.$welcome.$row[1].'");';
                echo 'window.location="/Revenue/index.php";';
                echo '</script>';

               
                          

              }else{
                echo '<script type="text/javascript">';
                echo 'alert("Invalid Password");';
                echo 'window.location="/Revenue/pages/examples/login.html";';
                echo '</script>';
            }
           }else{
                echo '<script type="text/javascript">';
                echo 'alert("Your Account has been Suspended");';
                echo 'window.location="/Revenue/pages/examples/login.html";';
                echo '</script>';
           }
          }
         
     }else{
        echo '<script type="text/javascript">';
        echo 'alert("User does not exist");';
        echo 'window.location="/Revenue/pages/examples/login.html";';
        echo '</script>';
   }
 }
?>
