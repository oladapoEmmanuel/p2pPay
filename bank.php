
<?php
include_once("p2pclass.php");

//var_dump($_POST);

if (empty($_POST["username"]) || empty($_POST["amount"])) {
	//echo "Kindly enter your username and amount to deposit.";
 
}else{
	$username = $_POST['username'];
	$amount = $_POST['amount'];

	$obj = new Transaction;
	$deposit = $obj->Deposit($amount, $username);
	
	//echo $deposit;
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

		<div class="row">
			<div class="col-md-2">
				<a href="index.php"> <input type="button" name="add_user" value="ADD USERS" class="btn btn-primary"> </a>
				
			</div>

			<div class="col-md-2">
				<a href="#"> <input type="button" name="dep" id="deposit" value="DEPOSIT MONEY" class="btn btn-success"> </a>
				
			</div>

			<div class="col-md-2">
				<a href="send.php"> <input type="button" name="send" value="SEND MONEY" class="btn btn-danger"> </a>
				
			</div>

			<div class="col-md-3">
				<a href="balance.php"> <input type="button" name="balance" value="CHECK BALANCE" class="btn btn-primary"> </a>
				
			</div>

			<div class="col-md-3">
				<a href="transfer.php"> <input type="button" name="transfer" value="TRANSFER MONEY" class="btn btn-secondary"> </a>
				
			</div>
		</div>

	<div class="row justify-content-center">

		<div class="col-5">
<br>
	<form class="form-group" action="" method="post">

		<h2>DEPOSIT FUNDS</h2>
		<p> Kindly enter the username and amount to deposit </p>

<div><label> USERNAME </label></div> <div><input type="text" name="username" class="form-control-lg" required></div> <br>
<div><label> AMOUNT </label></div> <div><input type="number" step="any" name="amount" class="form-control-lg" required></div> <br>

<button type="submit" #deposit class="btn btn-info">CLICK TO DEPOSIT</button><br>
<?php if (isset($deposit)) {
	echo " Dear ".$_POST['username']. ",". " ". "$". $_POST['amount']. " ". $deposit;
} ?>

  </form>
</div>
</div>
</div>
	
</body>
</html>