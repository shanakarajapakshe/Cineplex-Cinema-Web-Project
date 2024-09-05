

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Cineplex Cinema | Login</title>
<link href="css/loginstyle.css" rel="stylesheet">

</head>
<body>
<section id="header">
  <nav class="navbar">
	<div class="navdiv">
    <div style class="logo"><a href="index.html"><img src= "img/logo@300x.png" width="170" height="40" alt="logo"></a>
			  </div>
              <!-- <div style="margin-left:250px;">
    <form  method="GET" action="movies.php">
    <input style="color:black; width:250px;margin-left:-150px;" type="text" name="movieTitle" placeholder="Search Movie" required>
    <input style="color:black; width:120px; margin-left:10px;" type="submit" value="Search">
</div> -->
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
	

<section id="login">	
	<div id="login-box">
        <h2>Login</h2>
		<p>Returning users please enter your login details to proceed to book your tickets online. (Users registered before July 10th 2020 has to re-register due to new system change). New users can sign up and proceed with booking tickets</p>
        <form id="login-form" method="post">
            <input type="text" name="email" placeholder="email" required>
            <input type="password" name="password" placeholder="password" required>
			<p><a href="#">Forgot Password? </a></p>
            <input type="submit" value="Login">
			<p>Don't you have account yet? <b> <a href="register.php"> CREATE NEW </a></b></p>
        </form>
    </div>
</section>
	
	
	
	<footer>
	        <div class="footer-container">
            <div class="footer-section">
                <h4>About Us</h4>
                <h5>Cineplex Cinemas is a premier cinema chain offering the latest movies and exceptional viewing experiences.</h5>
            </div>
            <div class="footer-section">
                <h4>Quick Links</h4>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="movies.php">Movies</a></li>
                    <li><a href="locations.html">Locations</a></li>
                    <li><a href="promo.html">Promotions</a></li>
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
    session_start();
   
if($_SERVER["REQUEST_METHOD"] == "POST") {
   
      
    $email = ($_POST['email']);
    $password = ($_POST['password']);
      
    $sql = "SELECT * FROM register WHERE email = '$email' and pass = '$password'";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        
        echo "Error: " . mysqli_error($conn);
    } else {
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

        if ($row) {
            $email = $row['email'];
            $type = $row['uname'];
            $name = $row['fname'];

            $_SESSION['name'] = $name;
            $_SESSION['email'] = $email;
            $_SESSION['uname'] = $type;

            if ($type == "User") {
                header("location: /cineplex/index.php");
            } 
            elseif($type == "Admin") {
                header("location: /cineplex/adminpanel.php");
            }
            elseif($type == "Staff") {
                header("location: staffpanel.php");
            }
        } else {
            echo '<script>alert("Your Login Name or Password is invalid")</script>';
        }
}
}
?>