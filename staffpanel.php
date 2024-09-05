<?php 
    @include './db.php'; 
    ?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cinema Theater Staff Dashboard</title>
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>
    <header class="header">
        <h1 class="header__title">Cineplex Cinema Staff Dashboard</h1><br>
        <a href="index.php" class="button">Home</a>
    </header>

    <main class="main-content">
        <section id="booking" class="section">
            <h2 class="section__title">Booking Details</h2>
        <div>    
        <table id="bookingTable">


            <thead>
                <tr>
                    <th>Booking ID</th>
                    <th>Movie Name</th>
                    <th>Teater</th>
                    <th>Booking Type</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Phone Number</th>
                </tr>

            </thead>
            <tbody><tr>
            <?php 

$selectQuery = "SELECT * FROM bookingtable ";
$result = mysqli_query($conn, $selectQuery);
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $bookingID  = $row["bookingID"];
        $movieName = $row["movieName"];
        $bookingTheatre = $row["bookingTheatre"];
        $bookingType = $row["bookingType"];
        $bookingDate = $row["bookingDate"];
        $bookingTime = $row["bookingTime"];
        $bookingFName = $row["bookingFName"];
        $bookingLName = $row["bookingLName"];
        $bookingPNumber = $row["bookingPNumber"];

        echo             '<tr><td>'.$bookingID.'</td>
        <td>'.$movieName.'</td>
        <td>'.$bookingTheatre.'</td>
        <td>'.$bookingType.'</td>
        <td>'.$bookingDate.'</td>
        <td>'.$bookingTime.'</td>
        <td>'.$bookingFName.'</td>
        <td>'.$bookingLName.'</td>
        <td>'.$bookingPNumber.'</td><tr>';
    }
}
        
        ?></tr>
            </tbody>
        </table>
    
    </div>
    <!-- <script src="css/managebooking.js"></script> -->
    </div>
    
        </section>

    

    <footer class="footer">
        <p class="footer__text">&copy; 2024 cineplex Cinemas. All Rights Reserved.</p>
    </footer>

  
</body>
</html>
