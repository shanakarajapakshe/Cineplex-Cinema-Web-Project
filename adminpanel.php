<?php 
    @include './db.php'; 

    if(isset($_POST['action'])) {
        $action = $_POST['action'];
        $bookingID = $_POST['bookingID'];

        switch($action) {
            case 'confirm':
                // Update the booking status to confirmed
                $updateQuery = "UPDATE bookingtable SET status = 'Confirmed' WHERE bookingID = $bookingID";
                if(mysqli_query($conn, $updateQuery)) {
                    echo '<script>alert("Error confirming booking!");</script>';
                } else {
                    echo '<script>alert("Booking confirmed successfully!");</script>';
                }
                break;
            case 'cancel':
                // Delete the booking from the database
                $deleteQuery = "DELETE FROM bookingtable WHERE bookingID = $bookingID";
                if(mysqli_query($conn, $deleteQuery)) {
                    echo '<script>alert("Booking canceled successfully!");</script>';
                } else {
                    echo '<script>alert("Error canceling booking!");</script>';
                }
                break;
            default:
                break;
        }
    }
?>

    
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cinema Theater Admin Dashboard</title>
    <link rel="stylesheet" href="css/admin.css">
    
</head>
<body>
    <header class="header">
        <h1 class="header__title">Cineplex Cinema Admin Dashboard</h1><br>
        <a href="index.php" class="button">Home</a>
    </header>

    <main class="main-content">
        <section id="booking" class="section">
            <h2 class="section__title">Manage Booking Details</h2>
        <div>    
        <table id="bookingTable">


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
        <th>Action</th>
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
<td>'.$bookingPNumber.'</td>

<td class="action-buttons">
<form method="post">
    <input type="hidden" name="bookingID" value="'.$bookingID.'">
    <input type="hidden" name="action" value="confirm">
    <button type="submit" class="confirm">Confirm</button>
</form>

<form method="post">
    <input type="hidden" name="bookingID" value="'.$bookingID.'">
    <input type="hidden" name="action" value="cancel">
    <button type="submit" class="cancel">Cancel</button>
</form>
</td>
        <tr>';
    }
}
        
        ?>
            </tbody>
        </table>
    
    </div>

    </div>
    
        </section>


        <section id="movies" class="section">
            <h2 class="section__title">Manage Movies</h2>
            <a href="addmovie.php" class="button">Click Here</a>
        </section>

        <section id="addstaff" class="section">
            <h2 class="section__title">Add Staff Members</h2>
            <a href="addstaff.php" class="button">Click Here</a>
        </section>
    </main>

    <footer class="footer">
        <p class="footer__text">&copy; 2024 cineplex Cinemas. All Rights Reserved.</p>
    </footer>

  
</body>
</html>
