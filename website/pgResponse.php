
<?php
session_start();
// header("Pragma: no-cache");
// header("Cache-Control: no-cache");
// header("Expires: 0");

// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");
include("partials/_dbconnect.php");

$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";

$paramList = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application�s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.


if($isValidChecksum == "TRUE") {
	echo "<b>Checksum matched and following are the transaction details:</b>" . "<br/>";
	if ($_POST["STATUS"] == "TXN_SUCCESS") {
		
		//Process your transaction here as success transaction.
		//Verify amount & order id received from Payment gateway with your application's order id and amount.
			
		if(isset($_SESSION['login'])){

			$order_id = $_POST['ORDERID'];
			$txn_amt = $_POST['TXNAMOUNT'];
			$bank_name = $_POST['BANKNAME'];
			$Status = $_POST['STATUS'];
			$gateway = $_POST['GATEWAYNAME'];
			$txn_date = $_POST['TXNDATE'];
			$user_name= $_SESSION['user_name'];
			$user_email = $_SESSION['user_email'];
			$user_mobile =$_SESSION['user_mobile'];
			$user_address =$_SESSION['user_address'];
			$user_user_id = $_SESSION['user_id_number'];
			$cust_id = $_SESSION['customer_id'];

			$array = array("F", "U", "Q");
			$explode_user = str_replace($array, $array[0], $order_id); //I replace all in orderid char to arrays 0 index
			$explode_user2 = explode($array[0], $explode_user);
			$o_id = $explode_user2[0];
			
			$food_id= substr($explode_user2[1], 0);
			$q = $explode_user2['3'];

			$sql = "SELECT * FROM food_details where food_id = '$food_id'";
			$result = mysqli_query($conn, $sql);
			
			while($rows = mysqli_fetch_assoc($result)){

				$food_id = $rows['food_id'];
				$food_name = $rows['name'];
				$food_img = $rows['image'];

			}

			$query = "INSERT INTO `admin_orders` (`order_id`, `txn_amt`, `bank_name`, `Status`, `gateway`, `txn_date`, `user_name`, `user_email`, `user_mobile`, `user_address`, `user_cust_id`, `food_name`, `food_no_of_plates`, `payment_type`, `order_status`, `food_id`, `food_image`) 
			VALUES ('$o_id', '$txn_amt', '$bank_name', '$Status', '$gateway', current_timestamp(), '$user_name', '$user_email', '$user_mobile', '$user_address', '$cust_id', '$food_name', '$q', 'Online Payment', 'pending', '$food_id', '$food_img')";
			$query_run = mysqli_query($conn, $query);
	}

	elseif(!isset($_SESSION['login'])){
		echo "not login";
		$order_id = $_POST['ORDERID'];
		$txn_amt = $_POST['TXNAMOUNT'];
		$bank_name = $_POST['BANKNAME'];
		$Status = $_POST['STATUS'];
		$gateway = $_POST['GATEWAYNAME'];
		$txn_date = $_POST['TXNDATE'];

		// echo $order_id;

		$array = array("F", "U", "Q");
		$explode_user = str_replace($array, $array[0], $order_id); //I replace all in orderid char to arrays 0 index
		$explode_user2 = explode($array[0], $explode_user);

		$o_id = $explode_user2[0];
		$food_id = substr($explode_user2[1], 0);
		$user_id = $explode_user2[2];
		$q = $explode_user2[3];

		
		echo $q;

		$sql = "SELECT * FROM food_details where food_id = '$food_id'";
		$result = mysqli_query($conn, $sql);
		
		while($rows = mysqli_fetch_assoc($result)){

			$food_id = $rows['food_id'];
			$food_name = $rows['name'];
			$food_img = $rows['image'];

		}

		$sql2 = "SELECT * FROM users where user_id = '$user_id'";
		$result2 = mysqli_query($conn, $sql2);
		
		while($rows2 = mysqli_fetch_assoc($result2)){

			$user_name = $rows2['name'];
			$user_email = $rows2['email'];
			$user_mobile = $rows2['mobile'];
			$cust_id = $rows2['cust_id'];
			$user_address = $rows2['address'];
		}

		$query = "INSERT INTO `admin_orders` (`order_id`, `txn_amt`, `bank_name`, `Status`, `gateway`, `txn_date`, `user_name`, `user_email`, `user_mobile`, `user_address`, `user_cust_id`, `food_name`, `food_no_of_plates`, `payment_type`, `order_status`, `food_id`, `food_image`) 
			VALUES ('$o_id', '$txn_amt', '$bank_name', '$Status', '$gateway', current_timestamp(), '$user_name', '$user_email', '$user_mobile', '$user_address', '$cust_id', '$food_name', '$q', 'Online Payment', 'pending', '$food_id', '$food_img')";
		$query_run = mysqli_query($conn, $query);

		
	}


}

	else {
		echo "<b>Transaction status is failure</b>" . "<br/>";
	}




	if (isset($_POST) && count($_POST)>0)
		{
			echo '
			
			<div class="container" style="margin-left:350px;margin-top:10px;background-color:#CFD1E8; width:450px; padding:20px 70px; border-radius:30px; font-family:sans-serif">
			<h1 style="color:black; margin-left:50px">Payment Successfull</h1>
			<img src="/food planet/website/web_img/done.png" style="margin-left:150px" width="100px" height="100px"><br>
			<b style="margin-left:0px">Dear '.$user_name.' Transaction of '.$txn_amt.' rs is success Thank You for purchasing '.$food_name. '</b><br>
			<a href="index.php">Back</a>
			</div>
			
			<b>Order ID:</b> '.$o_id.'<br>
			<b>Cust ID:</b> '.$cust_id.'<br>
			<b>Bank Name:</b> '.$bank_name.'<br>
			<b>Gateway :</b> '.$gateway.'<br>
			<b>Txn Date :</b> '.$txn_date.'<br>
			<b>Txn Ammount :</b> '.$txn_amt.'<br>

			';
		
	}
	
}

else {
	echo "<b>Checksum mismatched.</b>";
	//Process transaction as suspicious.
}

?>

