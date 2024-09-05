<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cineplex Cinema</title>
<link href="css/index.css" rel="stylesheet">

	
</head>
<body>
	    <div class="preloader">
        <div class="loader rubix-cube">
            <div class="layer layer-1"></div>
            <div class="layer layer-2"></div>
            <div class="layer layer-3 color-1"></div>
            <div class="layer layer-4"></div>
            <div class="layer layer-5"></div>
            <div class="layer layer-6"></div>
            <div class="layer layer-7"></div>
            <div class="layer layer-8"></div>
        </div>
    </div>
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

                <?php 
                // if (isset($_SESSION["uname"])) {
                //    echo '<li><a href="customer.php"> '.$_SESSION["uname"].'</a></li>';

                //     echo '<li><a href="logout.php">LOG OUT</a></li>';

                // }
                //  else {
                //    echo '<li><a href="login.php">LOG IN</a></li>';

                // }
                if (isset($_SESSION["uname"])) {
        if ($_SESSION["uname"] == "Admin") {
        
            echo '<li><a href="adminpanel.php"> '.$_SESSION["uname"].'</a></li>';
        } elseif ($_SESSION["uname"] == "User") {
          
            echo '<li><a href="customer.php"> '.$_SESSION["uname"].'</a></li>';
        } elseif ($_SESSION["uname"] == "Staff") {
           
            echo '<li><a href="staffpanel.php">'.$_SESSION["uname"].'</a></li>';
        }
        echo '<li><a href="logout.php">LOG OUT</a></li>';
    } else {
        echo '<li><a href="login.php">LOG IN</a></li>';
    }
                ?>

                
			</ul>
		</div>
  </nav>
  <div id="search-container">
        <form action="/search" method="get">
</form>
  </div>

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

</section>
<main>
	<slideshow>
	 <div class="slideshow-container">
        <div class="mySlides fade">
            <img src="img/slide1.jpg" style="width:100%" alt="slide1">
        </div>
        <div class="mySlides fade">
            <img src="img/slide 2.jpg" style="width:100%" alt="slide2">
        </div>
        <div class="mySlides fade">
            <img src="img/slide3.jpg" style="width:100%" alt="slide3">
        </div>
		 <div class="mySlides fade">
            <img src="img/slide4.jpg" style="width:100%" alt="slide4">
        </div>
    </div>
    <script src= "css/slideshow.js"></script>
    
		</slideshow>
	<movielist>
		
  <section id="home">
          
        </section>
		<center><h1 class="latest_movie"> COMING SOON</h1></center>
		<div style="position:absolute; top:940px; left:1050px;">
			
		
		</div>
		
        <div class="movie-slider-container">
        
        <div class="movie-slider">
            <div class="movie-slide">
				<div class="movie-card">
				<a href="#">
                <img src="img/coming1.jpg" alt="Movie 1" width="350">
               <h3>DESPICALBLE ME 4 
					  </h3></a>
                    <p>NOW SCREENING</p>
					   <a href="https://www.youtube.com/watch?v=qQlr9-rF32A" class="buy-tickets-button">Watch Trailer</a>
					</div>
            </div>
			
            <div class="movie-slide">
				<div class="movie-card">
				<a href="#">
                <img src="img/movie 2.jpg" alt="Movie 2" width="350">
                 <h3>LAND OF BAD</h3>
                  </a>
						<p>NOW SCREENING</p>
						<a href="https://www.youtube.com/watch?v=yTFazxfrXVw" class="buy-tickets-button">Watch Trailer</a>
            </div>
				</div>
			
			<div class="movie-slide">
				<div class="movie-card">
				<a href="#">
                <img src="img/movie 3.jpg" alt="Movie 2" width="350">
                <h3>1970 LOVE STORY (SINHALA)</h3>
                  </a>
						<p>NOW SCREENING</p>
						<a href="https://www.youtube.com/watch?v=TLQMvRYc2yQ" class="buy-tickets-button">Watch Trailer</a>
            </div>
				</div>
				
			<div class="movie-slide">
				<div class="movie-card">
				<a href="#">
                <img src="img/movie 4.jpg" alt="Movie 2" width="350">
                <h3>MANON 2024</h3>
                  </a>
						<p>NOW SCREENING</p>
						<a href="https://www.youtube.com/watch?v=bJRO0VKBsJw" class="buy-tickets-button">Watch Trailer</a>
            </div>
			</div>
			
			<div class="movie-slide">
				<div class="movie-card">
				<a href="#">
                <img src="img/movie 5.jpg" alt="Movie 2" width="350">
                <h3>DUNE 2024</h3>
                  </a>
						<p>NOW SCREENING</p>
						<a href="https://www.youtube.com/watch?v=U2Qp5pL3ovA" class="buy-tickets-button">Watch Trailer</a>
            </div>
				</div>
				
			<div class="movie-slide">
				<div class="movie-card">
				<a href="#">
                <img src="img/movie 6.jpg" alt="Movie 2" width="350">
                 <h3>KUNG FU PANDA 4</h3>
                  </a>
						<p>NOW SCREENING</p>
						<a href="https://www.youtube.com/watch?v=_inKs4eeHiI" class="buy-tickets-button">Watch Trailer</a>
            </div>
				</div>
				
			<div class="movie-slide">
				<div class="movie-card">
				<a href="#">
                <img src="img/movie 7.jpg" alt="Movie 2" width="350">
                <h3>SIREN (TAMIL)</h3>
                  </a>
						<p>NOW SCREENING</p>
						<a href="https://www.youtube.com/watch?v=ATmYzgRQphU" class="buy-tickets-button">Watch Trailer</a>
            </div>
				</div>
				
			<div class="movie-slide">
				<div class="movie-card">
				<a href="#">
                <img src="img/movie 8.jpg" alt="Movie 2" width="350">
                <h3>MADAME WEB</h3>
                  </a>
						<p>NOW SCREENING</p>
						<a href="https://www.youtube.com/watch?v=s_76M4c4LTo" class="buy-tickets-button">Watch Trailer</a>
            </div>
				
				
				</div>
			
        
        </div>
        <button class="prev" onclick="moveSlider(-1)">&#10094;</button>
        <button class="next" onclick="moveSlider(1)">&#10095;</button>
   
      <script src= "css/movielist.js"></script>
    </div>
		
  </movielist>
    </main>
	
	<promo>
		<div class="promo">
				<center><h2 class="latest_movie"> PROMOTIONS</h2></center>
			<div class="movie-slider-container">
                <center><a href="index.html">
                <img src="img/promo.png" alt="promo"  >
               </a></center>
            </div>
		</div>
		</promo>

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
                    <li><a href="aboutus.php">About Us</a></li>
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
            <h5>&copy; 2024 cineplex Cinemas. All Rights Reserved.</h5>
        </div>
    </footer>
</body>
</html>
