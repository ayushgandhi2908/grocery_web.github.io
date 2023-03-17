<?php
 ini_set('display_errors', 0); ini_set('display_startup_errors', 0); error_reporting(-1);
session_start();
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

// following files need to be included
require_once("./lib/config_paytm1.php");
require_once("./lib/encdec_paytm1.php");
include("partials/_dbconnect.php");

$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";

$paramList = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application�s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.


if($isValidChecksum == "TRUE") {
	// echo "<b>Checksum matched and following are the transaction details:</b>" . "<br/>";
	if ($_POST["STATUS"] == "TXN_SUCCESS") {


        if(isset($_SESSION['login'])){
        $ORD = $_POST['ORDERID'];
        $txn_amt = $_POST['TXNAMOUNT'];
        $bank_name = $_POST['BANKNAME'];
		$Status = $_POST['STATUS'];
		$gateway = $_POST['GATEWAYNAME'];
		$txn_date = $_POST['TXNDATE'];

        $Explode = explode("USER",$ORD);
        $order_id = $Explode[0];
        $email = $Explode[1];

        $query = mysqli_query($conn, "SELECT * FROM users where email='$email'");
        $fetch = mysqli_fetch_assoc($query);
        $cust_id = $fetch['cust_id'];

        $sql="SELECT * from user_carts where user_email = '$email'";
        $result = mysqli_query($conn, $sql);

        while($row = $result->fetch_assoc()){
            $name = $row['user_name'];
            $email = $row['user_email'];
            $mobile = $row['user_mobile'];
            $food_name = $row['food_name'];
            $food_quantity = $row['food_quantity'];
            $delivery_change = $row['delivery_charge'];
            $food_image = $row['food_img'];
            $food_price = $row['food_price'];
            $food_id = $row['food_id'];
            $food_category = $row['food_category'];
            $address = $row['address'];
            $total = $row['total'];

            $query2 = "INSERT INTO `admin_orders` (`order_id`, `txn_amt`, `bank_name`, `Status`, `gateway`, `txn_date`, `user_name`, `user_email`, `user_mobile`, `user_address`, `user_cust_id`, `food_name`, `food_no_of_plates`, `payment_type`, `order_status`, `food_id`, `food_image`, `dboy`)
             VALUES ('$order_id', '$total', '$bank_name', '$Status', '$gateway', current_timestamp(), '$name', '$email', '$mobile', '$address', '$cust_id', '$food_name', '$food_quantity', 'Online Payment', 'pending', '$food_id', '$food_image', '')";
			$query_run = mysqli_query($conn, $query2);
            if($query_run){
                echo '		<div class="container" style="margin-left:350px;margin-top:10px;background-color:#CFD1E8; width:450px; padding:20px 70px; border-radius:30px; font-family:sans-serif">
                <h1 style="color:black; margin-left:50px">Payment Successfull</h1>
                <img src="/food planet/website/web_img/done.png" style="margin-left:150px" width="100px" height="100px"><br>
                <b style="margin-left:0px">Dear '.$name.' Transaction of '.$txn_amt.' rs is success Thank You for purchasing '.$food_name. '</b><br>
                <a href="index.php">Back</a>
                </div>';

            }
            
            $sql = "DELETE FROM user_carts WHERE user_email='$email'";
            $result = mysqli_query($conn, $sql);
        }

        }else if(!isset($_SESSION['login'])){

            
            // echo '<h2><a href="your_cart.php">Something went wrong at bank server please try again</a></h2>';
            
            $no_login = true;

            $ORD = $_POST['ORDERID'];
            $txn_amt = $_POST['TXNAMOUNT'];
            $bank_name = $_POST['BANKNAME'];
            $Status = $_POST['STATUS'];
            $gateway = $_POST['GATEWAYNAME'];
            $txn_date = $_POST['TXNDATE'];
    
            $Explode = explode("USER",$ORD);
            $order_id = $Explode[0];
            $email = $Explode[1];
    
            $query = mysqli_query($conn, "SELECT * FROM users where email='$email'");
            $fetch = mysqli_fetch_assoc($query);
            $cust_id = $fetch['cust_id'];
    
            $sql="SELECT * from user_carts where user_email = '$email'";
            $result = mysqli_query($conn, $sql);
    
            while($row = $result->fetch_assoc()){
                $name = $row['user_name'];
                $email = $row['user_email'];
                $mobile = $row['user_mobile'];
                $food_name = $row['food_name'];
                $food_quantity = $row['food_quantity'];
                $delivery_change = $row['delivery_charge'];
                $food_image = $row['food_img'];
                $food_price = $row['food_price'];
                $food_id = $row['food_id'];
                $food_category = $row['food_category'];
                $address = $row['address'];
                $total = $row['total'];
    
                $query2 = "INSERT INTO `admin_orders` (`order_id`, `txn_amt`, `bank_name`, `Status`, `gateway`, `txn_date`, `user_name`, `user_email`, `user_mobile`, `user_address`, `user_cust_id`, `food_name`, `food_no_of_plates`, `payment_type`, `order_status`, `food_id`, `food_image`, `dboy`)
                 VALUES ('$order_id', '$total', '$bank_name', '$Status', '$gateway', current_timestamp(), '$name', '$email', '$mobile', '$address', '$cust_id', '$food_name', '$food_quantity', 'Online Payment', 'pending', '$food_id', '$food_image', '')";
                $query_run = mysqli_query($conn, $query2);
                if($query_run){

                    echo '		<div class="container" style="margin-left:350px;margin-top:10px;background-color:#CFD1E8; width:450px; padding:20px 70px; border-radius:30px; font-family:sans-serif">
                    <h1 style="color:black; margin-left:50px">Payment Successfull</h1>
                    <img src="/food planet/website/web_img/done.png" style="margin-left:150px" width="100px" height="100px"><br>
                    <b style="margin-left:0px">Dear '.$name.' Transaction of '.$txn_amt.' rs is success Thank You for purchasing '.$food_name. '</b><br>
                    <a href="index.php">Back</a>
                    </div>';


                }
                                    
                $sql = "DELETE FROM user_carts WHERE user_email='$email'";
                $result = mysqli_query($conn, $sql);
            }
    
            }
        

		
       
		//Process your transaction here as success transaction.
		//Verify amount & order id received from Payment gateway with your application's order id and amount.
	}
	else {
		echo "<b>Transaction status is failure</b>" . "<br/>";
	}

	if (isset($_POST) && count($_POST)>0 )
	{ 
		// foreach($_POST as $paramName => $paramValue) {
		// 		echo "<br/>" . $paramName . " = " . $paramValue;
		// }
	}
	

}
else {
	echo "<b>Checksum mismatched.</b>";
	//Process transaction as suspicious.
}

?>





