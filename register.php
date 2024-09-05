


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cineplex Cinema | Register</title>
<link href="css/loginstyle.css" rel="stylesheet">
    
</head>
<body>
<section id="header">
  <nav class="navbar">
	<div class="navdiv">
    <div style class="logo"><a href="index.html"><img src= "img/logo@300x.png" width="170" height="40" alt="logo"></a>
			  
              <!-- <div style="margin-left:250px;">
    <form  method="GET" action="movies.php">
    <input style="color:black; width:250px;margin-left:-150px;" type="text" name="movieTitle" placeholder="Search Movie" required>
    <input style="color:black; width:120px; margin-left:10px;" type="submit" value="Search">
</div> -->
			  </div>
			<ul>
				<li><a href="index.php">HOME</a></li>
				<li><a href="movies.php">MOVIE</a></li>
				<li><a href="aboutus.php">ABOUTUS</a></li>
				<li><a href="promo.php">PROMO</a></li>
				<!-- <li><a href="ticket.php"><font color="#FF0004"> BUY TICKETS</font></a></li> -->
				<li><a href="login.php">LOG IN</a></li>
			</ul>
		</div>
	</nav>
</section>



	<section id ="register">
    <div id="register-container">
        <h2>User Registration</h2>
        <form id="register-form" method="POST" action="register.php">
            <input type="text" name="fname" placeholder="First Name" required>
			<input type="text" name="lname" placeholder="Last Name" required>
			<input type= "text" name="gender" placeholder=" Gender" required>
            <input type="email" name="email" placeholder="Email Address" required>

            <!-- <label><input type="radio" name="uname" value="admin" required> Admin</label>
            <label><input type="radio" name="uname" value="staff" required> Staff</label> -->
            <label><input type="radio" name="uname" value="user" required> User</label>

            <!-- <select name="uname" required>
                <option value="" disabled selected>Select Role</option>
                <option value="admin">Admin</option>
                <option value="staff">Staff</option>
                <option value="user">User</option>
            </select> -->

            <!-- <input type="text" name="uname" placeholder="Username" required> -->
            <input type="password" name="pass" placeholder="Password" required>
            <input type="submit" value="Register">
        </form>
		<p>By clicking the Sign Up button, you agree to our<br>
		<a href="#">Terms and Condition</a> and <a href="#">Policy Privacy</a>
		</p>
		<p>Already have an acount? <a href="login.php">Login here</a></p>
    </div>
		</section>
	<br>
	<footer>
	        <div class="footer-container">
            <div class="footer-section">
                <h4>About Us</h4>
                <h5>Cineplex Cinemas is a premier cinema chain offering the latest movies and exceptional viewing experiences.</h5>
            </div>
            <div class="footer-section">
                <h4>Quick Links</h4>
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="movies.php">Movies</a></li>
                    <li><a href="locations.php">Locations</a></li>
                    <li><a href="promo.php">Promotions</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h4>Contact Us</h4>
                <h5>Email: info@cineplexcinemas.com
               Phone: +123456789</h5>
            </div>
            <div class="footer-section">
                <h4>Follow Us</h4>
                <ul class="social-links">
                    <li><a href="#"><i class="fab fa-facebook-f">
						<img src= "icon/facebook.png" alt="facebook" width="25"></i></a></li>
                    <li><a href="#"><i class="fab fa-twitter">
						<img src= "icon/twitter.png" alt="twitter" width="25"></i></a></li>
                    <li><a href="#"><i class="fab fa-instagram">
						<img src= "icon/insta.png" alt="instagram" width="25"></i></a></li>
					 <li><a href="#"><i class="fab fa-whatsapp">
						<img src= "icon/whatsapp.png" alt="whatsapp" width="25"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <h5>&copy; 2024 cineplex Cinemas. All Rights Reserved.</h5>
        </div>
    </footer>
</body>
</html>


<?php

    

    @include './db.php';

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $fname =$_POST['fname'];
        $lname =$_POST['lname'];
        $gender =$_POST['gender'];
        $email =$_POST['email'];
        $uname =$_POST['uname'];
        $password =$_POST['pass'];

        if(!empty($email)&& !empty($password) && !is_numeric($email))
{
  $sql = "INSERT INTO register (fname, lname, gender, email, uname, pass) VALUES ('$fname','$lname','$gender', '$email', '$uname', '$password')";

    $query = mysqli_query($conn,$sql);
if (query){
  echo "<script type='text/javascript'>alert('successfully registered');</script>";
} else {
    echo "<script type='text/javascript'>alert('enter valid informations');</script>";         
  }
}}

?>
