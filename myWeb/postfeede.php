<?php
session_start();
require_once('include/index.php');
// Create connection
$conn = new mysqli("localhost", "root", "", "myweb");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$name =  $_SESSION['employee'];

$sql2 = "select * from employeetable where name = '$name' or email = '$name' ";

$result2 = $conn->query($sql2);

$row2 = $result2->fetch_assoc() ;
$profileName =  $row2["name"];


//$conn->close();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="postfeedCSS.css">
    <title></title>
</head>
<body>
    <div class="header">
  <div class="header-right">
    <img src="usernameIcon.png" width="35px" height="35px" alt="">
    <a id = "idProfileName"  href=""><?php echo $profileName ?></a>
    <div class="navBar">
        <a class="" href="http://localhost/myWeb/mysql/home.php">Home</a>
        <a class="active" href="http://localhost/myWeb/postfeed.php">PostFeed</a>
        <a class="#contact" href="http://localhost/myWeb/ContactFrom_v15/index.php">Contact</a>
        <a href="about.php">About</a>
        <a onclick="confirmLogout();"> <img src="logoutIcon.png" title="logout" width="30px" height="30px" alt=""></a>
    </div>
    </div>
</div>
    <div class="searchContainer">
        <form action="postSearch.php" method="POST">
            <input type="text" placeholder="Search..." name="search" required>
            <button type="submit"><img src="searchIcon.png" alt="" srcset=""></button>
        </form>
    </div>
    <div class="verticalMenu">
        <a href="#" class="active">PostFeed</a>
        <a href="#">My Progress</a>
        <a href="#">Rating</a>
        <a href="#">Account Info</a>
        <a href="#">Link 4</a>
    </div>
    
    <div class="container">
        <div id="idOnePost" class="onePost">
            <?php

            require_once('include/connection.php');




            $sql = "SELECT  name, email, mobile, job, pay, location, details,date FROM post";
            $result_set = mysqli_query($con, $sql);
            //$row = mysqli_fetch_assoc($result_set);
            //echo $row2['name'];
            //echo $result["name"];
            //$a=10;
            if(true){
            // output data of each row
        
                    while($row = mysqli_fetch_assoc($result_set)) {
                        echo "<p align=justify>"."<img src='userIconPosts.png' width='30px' height='30px' alt='Ishara'>"
                        ."<span class='usernameClass'>" .$row["name"] .'</span>'."<br> <br>"
                        ."Email : ". $row["email"]."<br>"
                        ."Phone Number : ". $row["mobile"]."<br>" 
                        ."Job : ".$row["job"]."<br>"
                        ."Payment : ".$row["pay"]."<br>"
                        ."Location : ".$row["location"]."<br>"
                        ."Job Details : ".$row["details"]."<br>"
                        ."Posted date : ".$row["date"]."<br><br>"
                        ."<a href=\"review.php?customer_name={$row["name"]}\"  >Reviews</a>"
                        
                        ."<button  class='btnJobApply' onclick='func();'>Apply For The Job</button>"."</p> " ."<br><br><hr>";
                
                    }
                } else {
                    echo "No Job Posts Yet!";
                }
            ?>
        </div>
    </div>
    

   <script >
       function func(){
            alert("Call to Phone number of the Employer");
        }

        function confirmLogout() {
            if (confirm("Do you want to  Logout!")) {
                location.replace("http://localhost/myWeb/logout.php");
            }
        }
   </script>
</body>
</html>






