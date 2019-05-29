 <?php require_once('include/connection.php');



	$name=$_POST['name'];
	$email=$_POST['email'];
	$mnum=$_POST['mnum'];
	$job=$_POST['job'];
	$pay=$_POST['pay'];
	$location=$_POST['location'];
	$details=$_POST['details'];
	$date=date("Y-m-d");
	$save="insert into post(name,email,mobile,job,pay,location,details,date) values ('{$name}','{$email}','{$mnum}','{$job}','{$pay}','{$location}','{$details}','{$date}')";
	mysqli_query($con,$save);
	header('location:postsuccess.php');
	 
    
	
 ?>
