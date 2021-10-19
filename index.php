<?php
include_once("p2pclass.php");

if (!empty($_POST)) {

	$obj = new Transaction;
	$adduser = $obj->Adduser($_POST['user']);
	echo $_POST['user']." You have been registered Successfully, kindly proceed to perform Transactions!";

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
		<div class="col-md-6">
			<h5 class="alert alert-primary">WELCOME, KINDLY ENTER YOUR USERNAME TO REGISTER AND STARTS PERFORMING BANKING TRANSACTIONS</h5>
		</div>
		
	</div>

	<div class="row justify-content-center">

		<div class="col-5">
			<a href="bank.php"> <button type="button" class="btn-success"> Perform Transactions </button> </a>

	<form class="form-group" action="" method="post">

<div><label> Username </label></div> <div><input type="text" name="user" class="form-control-lg" required></div> <br>

<button type="submit" class="btn btn-info">Submit</button>

  </form>
</div>
</div>
</div>
	
</body>
</html>