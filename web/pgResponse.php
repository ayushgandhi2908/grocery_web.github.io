
<?php
ini_set('display_errors', 0);
session_start();
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");
include("partials/dbconnect.php");

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
			echo "Payment is succesfull enjoy !!!";
					if(isset($_SESSION['login'])){

			$fullid = $_POST['ORDERID'];
			$txn_amt = $_POST['TXNAMOUNT'];
			$bank_name = $_POST['BANKNAME'];
			$Status = $_POST['STATUS'];
			$gateway = $_POST['GATEWAYNAME'];
			$txn_date = $_POST['TXNDATE'];
		
			$explode = explode("M", $fullid);
			$order_id = $explode[0];
			$mobile = $explode[1];
			
			$sql1 = "SELECT * FROM login where mobile = '$mobile'";
			$result1 = mysqli_query($conn, $sql1);
			while($row = mysqli_fetch_assoc($result1)){
				$address = $row['address'];
				$cust_name = $row['fname']." ".$row['lname'];
			}

			$sql = "SELECT * FROM cart where mobile = '$mobile'";
			$result = mysqli_query($conn, $sql);
			
			while($rows =  $result -> fetch_assoc()){

			$name = $rows['name'];
			$quantity = $rows['quantity'];
			$price = $rows['total_price'];

			$sql = "INSERT INTO `orders` (`order_id`, `prod_name`, `price`, `quantity`, `cust_name`, `cust_mobile`, `cust_address`, `order_time`, `status`, `bank_name`, `gateway`, `txn_amt`, `txn_status`) 
			VALUES ('$order_id', '$name', '$price', '$quantity', '$cust_name', '$mobile', '$address', current_timestamp(), 'pending', '$bank_name', '$gateway', '$txn_amt', '$Status')";
			$result = mysqli_query($conn, $sql);

			}


			$sql = "DELETE FROM cart where mobile='$mobile'";
			$result = mysqli_query($conn, $sql);

	}

	elseif(!isset($_SESSION['login'])){
	
			$fullid = $_POST['ORDERID'];
			$txn_amt = $_POST['TXNAMOUNT'];
			$bank_name = $_POST['BANKNAME'];
			$Status = $_POST['STATUS'];
			$gateway = $_POST['GATEWAYNAME'];
			$txn_date = $_POST['TXNDATE'];
		
			$explode = explode("M", $fullid);
			$order_id = $explode[0];
			$mobile = $explode[1];
			
			$sql1 = "SELECT * FROM login where mobile = '$mobile'";
			$result1 = mysqli_query($conn, $sql1);
			while($row = mysqli_fetch_assoc($result1)){
				$address = $row['address'];
				$cust_name = $row['fname']." ".$row['lname'];
			}

			$sql = "SELECT * FROM cart where mobile = '$mobile'";
			$result = mysqli_query($conn, $sql);
			
			while($rows = $result -> fetch_assoc()){

			$name = $rows['name'];
			$quantity = $rows['quantity'];
			$price = $rows['total_price'];

			$sql = "INSERT INTO `orders` (`order_id`, `prod_name`, `price`, `quantity`, `cust_name`, `cust_mobile`, `cust_address`, `order_time`, `status`, `bank_name`, `gateway`, `txn_amt`, `txn_status`) 
			VALUES ('$order_id', '$name', '$price', '$quantity', '$cust_name', '$mobile', '$address', current_timestamp(), 'pending', '$bank_name', '$gateway', '$txn_amt', '$Status')";
			$result = mysqli_query($conn, $sql);

		
			}

			$sql2 = "DELETE FROM cart where mobile='$mobile'";
			$result2 = mysqli_query($conn, $sql2);
	}


}

	else {
		echo "<b>Transaction status is failure</b>" . "<br/>";
	}




	if (isset($_POST) && count($_POST)>0)
		{
			echo '
			
			Success

			';
		
	}
	
}

else {
	echo "<b>Checksum mismatched.</b>";
	//Process transaction as suspicious.
}

?>

