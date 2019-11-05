<?php

include('connect.php');

$name = mysqli_real_escape_string($conn, $_REQUEST['name']);
$number = mysqli_real_escape_string($conn, $_REQUEST['number']);
$idnum = mysqli_real_escape_string($conn, $_REQUEST['idnum']);
$mail = mysqli_real_escape_string($conn, $_REQUEST['mail']);
$password = mysqli_real_escape_string($conn, $_REQUEST['password']);
$passwordc = mysqli_real_escape_string($conn, $_REQUEST['passwordc']);
$Npassword = password_hash($password,PASSWORD_DEFAULT);



$sql = "INSERT INTO USER (NAME,PHONE,IDNUM,EMAIL,PASSWORD,DOMAIN,STATUS)
VALUES ('$name','$number','$idnum','$mail','$Npassword','2','0')";

$sql1 = "SELECT PHONE,EMAIL FROM user";
$result = mysqli_query($conn,$sql1);
$row = mysqli_fetch_array($result,MYSQLI_NUM);

if ($row[0]!=$number) {
	if ($row[1]!=$mail) {
		if ($row[2]!=$idnum) {
			# code...
			if ($password==$passwordc) {
			# code...
			if ($conn->query($sql) === TRUE) {
			# code...
			echo '<script type="text/javascript">';
		    echo 'alert("Successfully Registered");';
		    echo 'window.location="/Revenue/pages/examples/login.html";';
		    echo '</script>';
		}else{
			echo '<script type="text/javascript">';
		    echo 'alert("Unsuccessful Querry");';
		    echo 'window.location="/Revenue/pages/examples/register.html";';
		    echo '</script>';
		}
		# code...
		}else{
			echo '<script type="text/javascript">';
		    echo 'alert("Passwords dont match");';
		    echo 'window.location="/Revenue/pages/examples/register.html";';
		    echo '</script>';
		}
		}else{
			echo '<script type="text/javascript">';
		    echo 'alert("ID Number already used");';
		    echo 'window.location="/Revenue/pages/examples/register.html";';
		    echo '</script>';
		}
		
	}else{
		echo '<script type="text/javascript">';
	    echo 'alert("Email already used");';
	    echo 'window.location="/Revenue/pages/examples/register.html";';
	    echo '</script>';
	}
	# code...
}else{
	echo '<script type="text/javascript">';
    echo 'alert("Phone Number already used");';
    echo 'window.location="/Revenue/pages/examples/register.html";';
    echo '</script>';
}

$conn->close();
?>




