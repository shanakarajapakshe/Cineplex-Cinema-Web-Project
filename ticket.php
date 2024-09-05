<?php
    @include './db.php'; 
$bookedSeats = array();

if (isset($_GET["movieid"])) {
  $movieid = $_GET["movieid"];

}


$selectQuery = "SELECT seatNumber FROM seating WHERE movieid = $movieid";
$result = mysqli_query($conn, $selectQuery);
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $seats = explode(",", $row['seatNumber']);
        foreach ($seats as $seat) {
            $bookedSeats[] = trim($seat);
        }
    }
}

if (isset($_POST['submit'])) {
        $selectedSeats = $_POST['seatNumber'];
        $seatString = implode(",", $selectedSeats);


        $insertQuery = "INSERT INTO seating (seatNumber,movieid) VALUES (?,?)";
        $stmt = mysqli_prepare($conn, $insertQuery);
        mysqli_stmt_bind_param($stmt, "si", $seatString,$movieid);
        
        if (mysqli_stmt_execute($stmt)) {
          header('Location: /cineplex/ticket.php?movieid='.$movieid.' ');
        } else {
            echo "Error booking seats: " . mysqli_error($conn);
        }
        
        
        

    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ticket Booking</title>
  <link href="css/seatbook.css" rel="stylesheet">
  <style>
    .seat {
      display: inline-block;
      width: 40px;
      height: 40px;
      border: 1px solid #ccc;
      margin: 5px;
      text-align: center;
      line-height: 40px;
    }
    .booked {
      background-color: red !important;
      color: white;
      cursor: not-allowed;
    }
    .selected {
      background-color: green;
      color: white;
    }
  </style>
</head>
<body>
  <form action="" method="POST" id="bookingForm">
  <section id="header">
  <nav class="navbar">
	<div class="navdiv">
			<div style="position:absolute; top:35px; left:750px;">
				 
		 		 <button type="submit" id="search-btn">Search</button> 
				</div>
		<div style="position:absolute; top:10px; left:400px;">
		<input type="text" id="search-input" name="q" placeholder="Search movies..."></div>
		
			<div class="logo"><a href="index.html"><img src= "img/logo@300x.png" width="170" height="40" alt="logo"></a>
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
	
	
	
	
	<br>
  <section>
  <div class="container">
    <h2><strong>Cineplex Cinema Seat Booking</strong></h2>
    <div class="screen">Screen</div>
        <div class="all-seats" id="allSeats">
              <?php
            
              for ($i = 'A'; $i <= 'E'; $i++) {
                  echo '<div class="row">';
                  for ($j = 1; $j <= 9; $j++) {
                      $seatNumber = $i . $j;
                      $class = in_array($seatNumber, $bookedSeats) ? ' booked' : ''; 
                      echo '<div class="seat' . $class . '" id="'.$seatNumber.'">'; 
                      echo $seatNumber;
                      echo '<input type="checkbox" name="seatNumber[]" value="' . $seatNumber . '">';
                      echo '</div>';
                  }
                  echo '</div>';
              }
              ?>
            </div>
          </div>
          <input type="submit" name="submit" value="BOOK">
        </div>
      </div>
    </div>
  </form>

  <script>
   
    window.onload = function() {
      var bookedSeats = <?php echo json_encode($bookedSeats); ?>;
      bookedSeats.forEach(function(seat) {
        var seatElement = document.getElementById(seat);
        if (seatElement) {
          seatElement.classList.add('booked');
          var checkbox = seatElement.querySelector('input[type="checkbox"]');
          if (checkbox) {
            checkbox.disabled = true;
          }
        }
      });
    };
  </script>
    </div>
  </section>          
</body>
</html>