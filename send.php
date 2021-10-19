
<?php
include_once("p2pclass.php");

//var_dump($_POST);
if (!empty($_POST)) {
	
	$sender = $_POST['sender'];
	$receiver = $_POST["receiver"];
	$amount = $_POST['amount'];

	$obj = new Transaction;
	$validate = $obj->Balance($_POST['sender']);

	if ($validate['balance'] < $_POST['amount']) {
	die ("You dont have sufficient funds to perfrom this transaction!");

}else{
	$deposit = $obj->Send($sender, $receiver, $amount);
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
	<link href="bootstrap.min.css" rel="stylesheet">
</head>
<body>

	<div class="container">

	<div class="row justify-content-center">


		<div class="col-6">
<br>
	<form class="form-group" action="" method="post">

		<h3>SEND FUNDS TO ANOTHER USER</h3>
		<p> Kindly enter the username and amount to deposit </p>

<div><label> SENDER USERNAME </label></div> <div><input type="text" name="sender" class="form-control-lg" required></div> <br>

<div><label> RECEIVER USERNAME </label></div> <div><input type="text" name="receiver" class="form-control-lg" required></div> <br>

<div><label> AMOUNT </label></div> <div><input type="number" step="any" name="amount" class="form-control-lg" required></div> <br>

<button type="submit" class="btn btn-info">CLICK TO DEPOSIT</button><br>

<?php 

if (isset($deposit)) {
	echo "$".$_POST['amount']. " ". $deposit. " to ". $_POST['receiver'];
} ?>

  </form>
				

</div>


		<div class="col-md-6">
				<a href="balance.php"> <input type="button" name="balance" value="CHECK BALANCE" class="btn btn-primary"> </a>

				<a href="bank.php"> <input type="button" name="balance" value="BACK TO TRANSACTION" class="btn btn-success"> </a>
			</div>

</div>
</div>
	
</body>
</html>