<?php
$searchData = $_POST["search"];

$conn = new mysqli("localhost", "root", "", "myweb");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$name =  $_SESSION['loginUser'];
$sql2 = "select * from usertable where name = '$name' or email = '$name' ";

$result2 = $conn->query($sql2);

$row2 = $result2->fetch_assoc() ;
$profileName =  $row2["name"];


$sql = "SELECT id, name, email, mnum, Job, Pay, location, details FROM post 
        where name like '%$searchData%' or 
        email like '%$searchData%' or
        mnum like '%$searchData%' or
        Job like '%$searchData%' or
        pay like '%$searchData%' or
        location like '%$searchData%' or
        details like '%$searchData%'";
$result = $conn->query($sql);

$conn->close();
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
        <a class="" href="http://localhost/Tutorial/myWeb/mysql/home.php">Home</a>
        <a class="active" href="http://localhost/Tutorial/myWeb/postfeed.php">PostFeed</a>
        <a class="#contact" href="http://localhost/Tutorial/myWeb/ContactFrom_v15/index.php">Contact</a>
        <a href="about.php">About</a>
        <a onclick="confirmLogout();"> <img src="logoutIcon.png" title="logout" width="30px" height="30px" alt=""></a>
    </div>
    </div>
</div>
    <div class="searchContainer">
        <form action="postSearch.php" method="POST">
            <input type="text" placeholder="Search..." name="search">
            <button type="submit"><img src="searchIcon.png" alt="" srcset=""></button>
        </form>
    </div>
    
    
    <div class="container">
        <div id="idOnePost" class="onePost">
            <?php
                if ($result->num_rows > 0) {
            // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<img src='userIconPosts.png' width='30px' height='30px' alt='Ishara'>"."       "
                        ."<span class='usernameClass'>" .$row["name"] .'</span>'."<br> <br>"
                        ."Email : ". $row["email"]."<br>"
                        ."Phone Number : ". $row["mnum"]."<br>" 
                        ."Job : ".$row["Job"]."<br>"
                        ."Payment : ".$row["Pay"]."<br>"
                        ."Location : ".$row["location"]."<br>"
                        ."Job Details : ".$row["details"]."<br><br>"
                        ."<button  class='btnJobApply' onclick='func();'>Apply For The Job</button>". "<br><br> <hr>";
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
                location.replace("http://localhost/Tutorial/myWeb/logout.php");
            }
        }
   </script>
</body>
</html>
