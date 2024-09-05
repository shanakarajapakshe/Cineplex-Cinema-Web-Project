<?php
@include './db.php';
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Cineplex Cinema | Movies</title>
<link href="css/index.css" rel="stylesheet">
<link href="css/movieslide.css" rel="stylesheet">
	
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
</form>
</div>

			<ul>
				<li><a href="index.php">HOME</a></li>
				<li><a href="movies.php">MOVIE</a></li>
				<li><a href="aboutus.php">ABOUT US</a></li>
				<li><a href="promo.php">PROMO</a></li>
				
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


 <?php 

// $sql = "SELECT * FROM addmovies";
// $result = $conn->query($sql);
// if ($result->num_rows > 0) {
//     while($row = $result->fetch_assoc()) {

//         $name = $row["moviename"];
//         $price = $row["price"];
//         $image = $row["image"];
//         $date = $row["date"];
//         $time = $row["time"];

//         echo'                <li>
//         <div class="movie">
//             <div class="movie-cards">
//                 <a href="index.php">
//                     <img src="img/'.$image.'" alt="Movie 2" width="150">
//                     <h3>'.$name.'</h3>
//                 </a><br>
//                 <p>NOW SCREENING</p>
//                 <a href="ticket.html" class="buy-tickets-button">Buy Tickets</a>

//             </div>
//         </div>
//     </li>';
//     }
// }
// ?>

<div class="movies-container">

            <?php
                            $sql = "SELECT * FROM  movietable";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {

                                    echo '<div class="movie-box">';
                                    echo '<img src="/cineplex/img/'.$row['movieImg'].'" alt=" "width="550" >';
                                    echo '<div class="movie-info ">';
                                    echo '<h3>'. $row['movieTitle'] .'</h3>';
                                    echo '<a href="booking.php?id='.$row['movieID'].'"><i class="fas fa-ticket-alt"></i> Book a seat</a>';
                                    echo '</div>';
                                    echo '</div>';


                                }}

                        ?>
        </div>


        </div>

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
</body>
</html>

