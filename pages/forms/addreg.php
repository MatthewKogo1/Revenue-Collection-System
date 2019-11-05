<?php

 require('../../conn.php');

$name = mysqli_real_escape_string($conn, $_REQUEST['name']);
$desc = mysqli_real_escape_string($conn, $_REQUEST['desc']);
$rates = mysqli_real_escape_string($conn, $_REQUEST['rates']);



$sql = "INSERT INTO REGION (REGION,MORE,RATES)
VALUES ('$name','$desc','$rates')";



if ($conn->query($sql) === TRUE) {
	echo '<script type="text/javascript">';
	echo 'alert("Successfully Added");';
	echo 'window.location="/Revenue/pages/examples/viewregion.php";';
	echo '</script>';
}else{
	echo '<script type="text/javascript">';
	echo 'alert("Unsuccessful Querry");';
	echo 'window.location="/Revenue/pages/forms/addregion.php";';
	echo '</script>';
}
		

$conn->close();
?>




