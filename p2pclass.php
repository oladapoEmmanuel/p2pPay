


<?php

/*************** PROGRAM: BASIC BANKING APPLICATION USING PHP/MSQL/CSS/HTML **************/
/*************** AUTHOR: OLADAPO EMMANUEL ***********************************************/
/*************** EMAIL: OLADAPOEMMANUEL2017@GMAIL.COM  *********************************/


# Class definition for the program

class Transaction{
	//member variable
	public $username;
	public $amount;
	public $userid;
	public $dbcon;

	// member methods

	function __construct(){
		// create object of mysqli class
		$this->dbcon = new Mysqli("localhost", "root", "", "peerpayment");

		if ($this->dbcon->connect_error) {
			die("connection failed:".$this->dbcon->connect_error);

		}
	}

	// creating the function to Add users
	  function Adduser($username){
		// query to insert user into database

		$sql = "INSERT INTO user SET username = '$username'";

		$qres = $this->dbcon->query($sql);
		if ($this->dbcon->error) {
			$result = "<div class='alert alert-danger'> System Connection Error!</div>".$this->dbcon->error;

		}else{
			$result = " Registration successful, Proceed to deposit.";
			$result = $this->dbcon->insert_id;
		}
		return $result;
	}


	// function/method to Deposit money 

	function Deposit($amount, $username){
		// query to deposit
		$sql = "UPDATE user SET credit = ('$amount' + credit) WHERE username = '$username'";
		$qres = $this->dbcon->query($sql);

        if($this->dbcon->affected_rows == 1){
			$sql2 = "UPDATE user SET balance = credit WHERE username = '$username'";
			$addqres = $this->dbcon->query($sql2);
			if ($this->dbcon->error) {
				$result = "System error!".$this->dbcon->error;
			}else{
			$result = "Deposit Successfully into your account!";
			
		}

		return $result;
	
	}
	
	}

    
    // function/method to send money to another user

	function Send($sender, $receiver, $amount){
		// query to send money to another user
		$sql = "UPDATE user SET debit = $amount, balance = (balance - $amount) WHERE username='$sender'";
		$qres = $this->dbcon->query($sql);


		if($this->dbcon->affected_rows == 1){
			$sql2 = "UPDATE user SET credit = (credit + $amount), balance = (credit-debit) WHERE username='$receiver'";
			$addqres = $this->dbcon->query($sql2);
			if ($this->dbcon->error) {
				$result = "System error!".$this->dbcon->error;
			}else{
			$result = "has been sent Successfully";
			
			//redirect to bank page
			//header("Location: bank.php");
			//exit;
		}

		return $result;
	
	}
}

// function/method to transfer money out of the to another bank user
	function Transfer($sender, $amount){
		// query to send money to another user
		$sql = "UPDATE user SET debit = $amount, balance = (balance - $amount), transfer = $amount WHERE username='$sender'";
		$qres = $this->dbcon->query($sql);

		if($this->dbcon->affected_rows == 1){
			$result = "Transfered Successfully!";
			}else{
					$result = "System error!".$this->dbcon->error;
			
		}

		return $result;
	
	}


	// function/method to check Balance

	function Balance($username){
		// query to check balance
		$sql = "SELECT * FROM user WHERE username='$username' LIMIT 1";
		//UPDATE user SET current_balance = (deposit + current_balance) WHERE username='user A'
		$qres = $this->dbcon->query($sql);
		//var_dump($qres);

		if ($qres->num_rows == 1) {
			$row = $qres->fetch_assoc();
			//var_dump($row);

		}else{
			$row = $this->dbcon->error;

		}

		return $row;
	
	}

}

?>