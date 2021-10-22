
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Current Balance</title>
	<link rel="stylesheet" href="">
	<link href="bootstrap.min.css" rel="stylesheet">
</head>
<body>

	

	<div class="container">

	<div class="row justify-content-center">

		<div class="col-sm-5 col-md-5">

	<form class="form-group" action="" method="post">

<div><label> Username </label></div> <div><input type="text" name="user" class="form-control-lg" required></div> <br>

<button type="submit" class="btn btn-info">Submit</button>

  </form>



<table class="table table-bordered table-striped">
		<thead>
			<tr>
			<th>ACCOUNT BALANCE</th>
		</tr>
		</thead>

		<tbody>
			<?php
			include_once("p2pclass.php");
			if (!empty($_POST)) {
				
			
if (!empty($_POST['user'])) {
	$obj = new Transaction;
	$checkbal = $obj->Balance($_POST['user']);
	

            ?>
			<tr>
				<td> <?php echo "Hi ".$checkbal['username'] . ",". " your Account Balance is ". "$".$checkbal['balance']?> </td>

			</tr>
			
		</tbody>

	</table>
	<?php
}
else{
	echo "Enter Your Username";
}
}
?>


			<div class="col-sm-3 col-md-3">
				<a href="bank.php"> <input type="button" name="balance" value="BACK TO TRANSACTION" class="btn btn-success"> </a>
				
			</div>
</div>
</div>
</div>
	
</body>
</html>