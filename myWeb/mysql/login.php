<?php require_once('include/connection.php');?>
<?php
	session_start();
    




	$name=$_POST["username"];
	$_SESSION["customer"] = $name;
	$password=sha1($_POST["password"]);
	$s="select * from usertable where name = '{$name}' && password='{$password}'";
	$s1="select * from usertable where email = '{$name}' && password='{$password}'";
	$result=mysqli_query($con,$s);
	$result1=mysqli_query($con,$s1);
	$num=mysqli_num_rows($result);
	$num1=mysqli_num_rows($result1);
	
	if($num==1){
		echo $password;
		header('location:home.php');
	}
	else if($num1==1){
		header('location:home.php');
	}
	else{
		header('location:errorlogin.php');
		
	}
 ?>
