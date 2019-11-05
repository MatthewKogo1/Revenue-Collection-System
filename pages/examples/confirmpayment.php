<?php
$account=$_GET['account'];
$amount=$_GET['amount'];

require('../../conn.php');

$approve="UPDATE BUSINESS SET STAGE=4,STATUS=1 WHERE ACCOUNT='$account'";

$querry="SELECT * FROM TBLPAYMENTS WHERE account='$account' AND amount>='$amount'";

$confirm=mysqli_query($conn,$querry);
$row=mysqli_fetch_array($confirm);



if (mysqli_num_rows($confirm)>=1) {
	if (mysqli_query($conn,$approve)) {?>

		<script type="text/javascript">
		parent.alert("Successfull Payment!");
		window.location="/Revenue/pages/examples/payments.php";
		//window.top.location.reload();
		</script>

	<?php
	}else{
		echo "Wrong Querry";
	}
?>

<?php
}else{
?>
<script type="text/javascript">
parent.alert("Payment not received!");
window.location="/Revenue/pages/examples/payments.php";
//window.top.location.reload();
</script>
<?php	
}


?>










