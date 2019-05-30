<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="assets/css/post.css">
</head>
<body>
  <div class="header">
  <div class="header-right">
    <a class="active" href="http://localhost/myWeb/mysql/home.php">Home</a>
    <a href="http://localhost/myWeb/postfeed.php">PostFeed</a>
    <a class="#contact" href="http://localhost/myWeb/ContactFrom_v15/index.html">Contact</a>
    <a href="#about">About</a>
    <a onclick="confirmLogout();"> <img src="logoutIcon.png" title="logout" width="30px" height="30px" alt=""></a>
</div>
</div>

<div class="container"> 
  <form id="contact" action="mysql/posts.php" method="post" >
    <h3>Post A Job</h3>
    <hr>
    <h4>Filled up the form with correct details</h4>
    <fieldset>
      <input placeholder="Your name" name="name" type="text" tabindex="1" required autofocus>
    </fieldset>
    <fieldset>
      <input placeholder="Your Email Address" name="email" type="email" tabindex="2" required>
    </fieldset>
    <fieldset>
      <input placeholder="Your Phone Number" minlength="10" name="mnum" type="tel" tabindex="3" required>
    </fieldset>
    <fieldset>
      <input placeholder="What is the job?" name="job" type="text" tabindex="4" required>
    </fieldset>
    <fieldset>
      <input placeholder="How much you will pay?" name="pay" type="text" tabindex="4" required>
    </fieldset>
    <fieldset>
      <input placeholder="Your Location" type="text" name="location" tabindex="4" required>
    </fieldset>
    <fieldset>
      <textarea placeholder="Type Job Details" minlength="50" name="details" tabindex="5" required></textarea>
    </fieldset>
    <fieldset>
      <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
    </fieldset>
  </form>
</div>

<script>
  function confirmLogout() {
      if (confirm("Do you want to  Logout!")) {
          location.replace("http://localhost/myWeb/logout.php");
      } else {
          location.replace("http://localhost/myWeb/postfeed.php");;
      }
  }
</script>

</body>
</html>
