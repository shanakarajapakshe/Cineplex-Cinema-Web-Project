<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Cineplex Cinema | About US</title>
<link href="css/index.css" rel="stylesheet">

	
</head>
<body>
<section id="header">
  <nav class="navbar">
		<div class="navdiv">
        <div style class="logo"><a href="index.html"><img src= "img/logo@300x.png" width="170" height="40" alt="logo"></a>
			  </div>
              <div style="margin-left:250px;">
    <form  method="GET" action="movies.php">
    <input style="color:black; width:250px;margin-left:-150px;" type="text" name="movieTitle" placeholder="Search Movie" required>
    <input style="color:black; width:120px; margin-left:10px;" type="submit" value="Search">

			</div>
			<ul>
				<li><a href="index.php">HOME</a></li>
				<li><a href="movies.php">MOVIE</a></li>
				<li><a href="aboutus.php">ABOUT US</a></li>
				<li><a href="promo.php">PROMO</a></li>
				<!-- <li><a href="ticket.php"><font color="#FF0004"> BUY TICKETS</font></a></li> -->
				<li><a href="login.php">LOG IN</a></li>
			</ul>
		</div>
  </nav>
</section>

<?php
if($_SERVER["REQUEST_METHOD"] && isset($_GET['movieTitle'])){

    $m=$_GET['movieTitle'];
    $sql="SELECT* FROM movietable WHERE movieTitle LIKE'%$m%'";
    $result=mysqli_query($conn,$sql);
    if(!$result){die("error".mysqli_error($conn));}

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $movieID = $row['movieID'];
        $movieImg = $row['movieImg'];
    
        echo '<div class="box" width="250px" height="250px">';
        echo '<img src="/cineplex/img/'.$row['movieImg'].'" alt=" "width="300px" >';
        echo '<div class="movie-info ">';
        echo '<h3>'. $row['movieTitle'] .'</h3>';
        echo '<a href="booking.php?id='.$row['movieID'].'"><i class="fas fa-ticket-alt"></i> Book a seat</a>';
        echo '</div>';
        echo '</div>';
}
else{echo"error";}
}
?>

<br>
    <div class="container">
        <section id="about" class="section">
            <h2>About Us</h2>
            <h4>Cineplex Cinema is your ultimate destination for entertainment. We offer the latest blockbusters, 
				timeless classics, and thrilling experiences that keep you coming back for more. With state-of-the-art 
				facilities and unparalleled customer service, we strive to make every visit to our cinemas unforgettable.</h4>
        </section></div><br>
	
<div class="container">
        <section id="vision" class="section">
            <h2>Our Vision</h2>
            <h4>At Cineplex Cinema, our vision is to redefine the moviegoing experience. We aim to create a dynamic environment where cinema enthusiasts of all ages can come together to celebrate the magic of storytelling on the big screen. We aspire to be the premier destination for entertainment, innovation, and community engagement.</h4>
        </section></div><br>
	
<div class="container">
        <section id="mission" class="section">
            <h2>Our Mission</h2>
            <h4>Our mission at Cineplex Cinema is simple: to entertain, inspire, and connect. We are committed to delivering exceptional cinematic experiences that captivate audiences and ignite imaginations. Through our dedication to quality, creativity, and excellence, we strive to enrich the lives of our guests and contribute positively to the communities we serve.</h4>
        </section>
    </div>

    <!-- <div class="container">
    <section id="contact" class="section">
        <h2>Contact Us</h2>
        <h4>If you have any questions or inquiries, feel free to reach out to us via email or phone. We're here to assist you!</h4>
        <div class="contact-info">
            <h4>Email: info@cineplexcinemas.com</h4>
            <h4>Phone: +123456789</h4>
            <h4>Locations:</h4>
            <ul>
                <li>Main Location: 123 Main Street, City, Country</li>
                <li>Second Location: 456 Second Avenue, Town, Country</li>
            </ul>
        </div> -->
    </section>
</div>
</body>

<footer>
        <div class="footer-container">
            <div class="footer-section">
                <h4>About Us</h4>
                <p>Cineplex Cinemas is a premier cinema chain offering the latest movies and exceptional viewing experiences.</p>
            </div>
            <div class="footer-section">
                <h4>Quick Links</h4>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="movies.php">Movies</a></li>
                    <li><a href="aboutus.php">Locations</a></li>
                    <li><a href="promo.php">Promotions</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h4>Contact Us</h4>
                <p>Email: info@cineplexcinemas.com</p>
                <p>Phone: +123456789</p>
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
            <p>&copy; 2024 cineplex Cinemas. All Rights Reserved.</p>
        </div>
    </footer>
</html>
