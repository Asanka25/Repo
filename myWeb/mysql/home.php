<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myweb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$name =  $_SESSION['customer'];
$sql = "select * from usertable where name = '$name' or email = '$name' ";

$result = $conn->query($sql);

$row = $result->fetch_assoc() ;
$profileName =  $row["name"];

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="home.css">
	<title>Home</title>
</head>
<body>

<div class="header">
  <div class="header-right">
    <img src="usernameIcon.png" width="35px" height="35px" alt="">
    <a id = "idProfileName"  href=""><?php echo $profileName ?></a>
    <div class="navBar">
        <a class="active" href="home.php">Home</a>
        <a href="http://localhost/myWeb/postfeed.php">PostFeed</a>
        <a class="#contact" href="http://localhost/myWeb/ContactFrom_v15/index.php">Contact</a>
        <a href="about.php">About</a>
        <a onclick="confirmLogout();"> <img src="logoutIcon.png" title="logout"  width="30px" height="30px" alt=""></a>
    </div>
    </div>
</div>
<div class="box">
	<span></span>
    <span></span>
    <span></span>
    <span></span>
	<div class="btn1">
<button type="button" onclick="window.location.href='http://localhost/myWeb/post.php'">Post A Job</button>
</div>
<div class="btn2">
<button type="button" onclick="window.location.href='http://localhost/myWeb/postfeed.php'">Show Posts</button>
	</div>
</div>
    
</div>

<script>
    function confirmLogout() {
        if (confirm("Do you want to  Logout!")) {
            location.replace("http://localhost/myWeb/logout.php");
        }
            
    }
</script>




</body>
</html>
</html>