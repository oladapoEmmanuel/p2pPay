
<?php
include_once("p2pclass.php");

//var_dump($_POST);

if (empty($_POST["sender"]) || empty($_POST["amount"])) {
	//echo "Kindly enter your username and amount to Transfer.";
 
}else{
	$sender = $_POST['sender'];
	$amount = $_POST['amount'];

	$obj = new Transaction;
	$validate = $obj->Balance($_POST['sender']);

	if ($validate['balance'] < $_POST['amount']) {
	$msg = "You do not have sufficient funds to transfer!";

}else{
	$transfer = $obj->Transfer($sender, $amount);
}
	
}

?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
	<link href="../css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

	<div class="container">

	<div class="row justify-content-center">

		<div class="col-md-3">
				<a href="balance.php"> <input type="button" name="balance" value="CHECK BALANCE" class="btn btn-primary"> </a>
				
			</div>


			<div class="col-md-3">
				<a href="bank.php"> <input type="button" name="balance" value="BACK TO TRANSACTION" class="btn btn-success"> </a>
				
			</div>


		<div class="col-7">
<br>
	<form class="form-group" action="" method="post">

		<h2>TRANSFER FUNDS</h2>
		<p> Kindly enter the username and amount to Transfer </p>

<div><label> SENDER USERNAME </label></div> <div><input type="text" name="sender" class="form-control-lg" required></div> <br>

<div><label> AMOUNT </label></div> <div><input type="number" step="any" name="amount" class="form-control-lg" required></div> <br>
<?php if (isset($msg)) {
	echo "Dear ". $_POST['sender'].$msg;
} ?>

<button type="submit" class="btn btn-info">CLICK TO TRANSFER MONEY</button><br>
<?php if (isset($transfer)) {
	echo "$".$_POST['amount']. " ". $transfer;
} ?>

  </form>
</div>
</div>
</div>
	
</body>
</html>