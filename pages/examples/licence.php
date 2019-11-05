<?php
    $idnum=$_GET['idnum'];
    $amount=$_GET['amount'];
    require('../../conn.php');
    $sql="SELECT TAX FROM BUSINESS WHERE ACCOUNT='$idnum'";
    $results=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($results);
    if ($amount>=$row[0]) {
      # code...
      include('free.php');
    }else{
      echo '<script type="text/javascript">';
      echo 'alert("Cannot generate Permit: Insufficient Payments");';
      echo 'window.location="/Revenue/pages/examples/payments.php";';
      echo '</script>';
    }
?>
