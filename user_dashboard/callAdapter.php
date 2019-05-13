<?php
include_once('adapter.php');
include_once('../connection.php');
session_start();

$Card_No = $_POST['cardNumber'];
$Amonut = $_POST['amount'];
$Card_Holder_name = $_POST['nameOnCard'];
$Expire_Date = $_POST['expiryMonth']."/".$_POST['expiryYear'];
$cvv = crypt('password-to-encrypt', $_POST['cardNumber']);
$donate_date = date("Y/m/d");
$username = $_POST['username'];
$prjid =  $_POST['project_id'];
$transactioncode = '2454656767';

/* echo "<br/>Donation payment is working:<br/><br/>";
echo "Payment details <br/> Card No: $Card_No<br/> Amonut: $Amonut<br/> Card holder name: $Card_Holder_name<br/> expire date: $Expire_Date<br/> CVV: $cvv<br/><br/>"; */
$tran_id = new Omise($transactioncode);
$transaction= new Omise_adaptere($tran_id,$Amonut,$Card_Holder_name,$Expire_Date,$cvv);
clientCode($Card_No, $Amonut, $Card_Holder_name,$Expire_Date,$cvv, $transaction);

$obj = new Omise();
$myValue = &$obj->sendMessage();
//echo "<br/>Transaction status: $myValue <br/>";


if ($myValue != "404") {
    //echo "Payment transaction complate<br/>";
    //echo "Status code $myValue";

    $sql = "INSERT INTO `donate_payment`(`donate_amount`, `donate_payment_date`,`donate_payment_status`, `username_fk`, `project_id_fk`, `payment_id_fk`) VALUES ($Amonut,'$donate_date',$myValue,'$username','$prjid','1')";

      if ($connection->query($sql) === TRUE) {
      //echo "New record created successfully";
	  header( "Location:display_payment_status.php?status=success" );
	  
      } else {
          echo "Error: " . $sql . "<br>" . $connection->error;
      }
  }
else
    {
    $sql = "INSERT INTO `donate_payment`(`donate_amount`, `donate_payment_date`,`donate_payment_status`, `username_fk`, `project_id_fk`, `payment_id_fk`) VALUES ($Amonut,'$donate_date',$myValue,'$username','$prjid','1')";
      if ($connection->query($sql) === TRUE) {
		  header( "Location:display_payment_status.php?status=fail" );
      } else {
          echo "Error: " . $sql . "<br>" . $connection->error;
      }
    //echo "Payment can't process<br/>";
    //echo "Status code $myValue";
    }
$connection->close();













?>