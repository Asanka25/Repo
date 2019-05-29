<?php 
	require_once('include/connection.php');
	session_start();
	echo "1234564564646465";
	
	$name=$_POST["username"];
	$_SESSION["employee"] = $name;
	$password=sha1($_POST["password"]);
	$s="select * from employeetable where name = '$name' && password='$password'";
	$s1="select * from employeetable where email = '$name' && password='$password'";
	$result=mysqli_query($con,$s);
	$result1=mysqli_query($con,$s1);
	$num=mysqli_num_rows($result);
	$num1=mysqli_num_rows($result1);
	echo $password;
	if($num==1){
		header('location:homee.php');
	}
	else if($num1==1){
		header('location:homee.php');
	}
	else{
		header('location:errore3.php');
		
	}
 ?>
