<?php require_once('include/connection.php');

session_start();
$employee_name=$_SESSION["by"];
$customer_name=$_SESSION["tor"];


//$customer_name=$_GET['customer_name'];
echo $employee_name;
echo $customer_name;


$review=$_GET['review'];
$date=date("Y-m-d");
$save="insert into review(customer_name,employee_name,date,review) values ('{$customer_name}','{$employee_name}','{$date}','{$review}')";
mysqli_query($con,$save);
header("location:review.php?customer_name=$customer_name ");
 


?>
