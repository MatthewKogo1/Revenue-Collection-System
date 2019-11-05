<?php
require('../../conn.php');

if (isset($_POST['busstype'])) {
	# code...
	$one = mysqli_real_escape_string($conn, $_REQUEST['one']);
	$two = mysqli_real_escape_string($conn, $_REQUEST['two']);

	$sql = "INSERT INTO BUSSTYPE (BUSSTYPE,RATES)
	VALUES ('$one','$two')";
		
	if ($conn->query($sql) === TRUE) {
		echo '<script type="text/javascript">';
	    echo 'alert("Successful");';
	    echo 'window.location="/Revenue/pages/forms/add.php";';
	    echo '</script>';
		# code...
	}
	
}elseif (isset($_POST['area'])) {
	# code...
	$one = mysqli_real_escape_string($conn, $_REQUEST['one']);
	$two = mysqli_real_escape_string($conn, $_REQUEST['two']);

	$sql = "INSERT INTO AREA (AREA,RATES)
	VALUES ('$one','$two')";
		
	if ($conn->query($sql) === TRUE) {
		echo '<script type="text/javascript">';
	    echo 'alert("Successful");';
	    echo 'window.location="/Revenue/pages/forms/add.php";';
	    echo '</script>';
		# code...
	}

}elseif (isset($_POST['emp'])) {
	# code...
	$one = mysqli_real_escape_string($conn, $_REQUEST['one']);
	$two = mysqli_real_escape_string($conn, $_REQUEST['two']);

	$sql = "INSERT INTO NOEMP (NOEMP,RATES)
	VALUES ('$one','$two')";
		
	if ($conn->query($sql) === TRUE) {
		echo '<script type="text/javascript">';
	    echo 'alert("Successful");';
	    echo 'window.location="/Revenue/pages/forms/add.php";';
	    echo '</script>';
		# code...
	}

}else{
	echo "Invalid";
}


$conn->close();
?>