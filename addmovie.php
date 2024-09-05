<?php
@include './db.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel/Add Movies</title>
    <link rel="stylesheet" href="css/addmovie.css">
    <style>
        .movies-container {
        display: grid;
        grid-column-gap: 10px;
        grid-template-columns: auto auto auto auto auto auto;
        padding: 10px 0;
        
    }
    
        </style>
</head>

<body>
<header>
        <h1>Cineplex Cinema - Add Movies</h1>
        <div>

        <a href="adminpanel.php" class="button">Admin Panel</a>
</div>
    </header>

    <div class="container">
        <h2>Add Movie</h2>
        <form action="" method="POST" enctype="multipart/form-data">
        <input placeholder="Title" type="text" name="movieTitle" required>
                        <input placeholder="Genre" type="text" name="movieGenre" required>
                        <input placeholder="Duration" type="number" name="movieDuration" required>
                        <input placeholder="Release Date" type="date" name="movieRelDate" required>
                        <input placeholder="Director" type="text" name="movieDirector" required>
                        <input placeholder="Actors" type="text" name="movieActors" required>
                        <input type="file" name="image" accept="/img/*">
            <input type="submit" name="submit" value="Add Film">
</div>
<div>
 
</body>

</html>
<?php
        if(isset($_POST['submit'])){

    
            $movieTitle =$_POST["movieTitle"];
            $movieGenre =$_POST["movieGenre"];
            $movieDuration=$_POST["movieDuration"];
            $movieRelDate=$_POST["movieRelDate"];
            $movieDirector=$_POST["movieDirector"];
            $movieActors=$_POST["movieActors"];
                
    $imagename = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"];
    $folder = "./img/";
    
    move_uploaded_file($tempname, $folder . $imagename);
     $insert_query = "INSERT INTO movietable (  movieImg, movieTitle, movieGenre, movieDuration, movieRelDate, movieDirector, movieActors)
     VALUES ('$imagename','$movieTitle','$movieGenre',$movieDuration,'$movieRelDate','$movieDirector','$movieActors')";
                            $query = mysqli_query($conn,$insert_query);

                            if ($query) {
                                echo '<script>alert("Movie Inserted Successfully")</script>';
                            } else {
                                echo '<script>alert("Error: '.mysqli_error($conn).'")</script>';
                            }
                 
                          }
                        ?>
                        </form>

<div class="movies-container">

<?php
                $sql = "SELECT * FROM  movietable";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {

                        echo '<div class="movie-box">';
                        echo '<img src="/cineplex/img/'.$row['movieImg'].'" alt=" "width="250" >';
                        echo '<div class="movie-info ">';
                        echo '<h3 >'. $row['movieTitle'] .'</h3>';
                        echo '</div>';
                        echo '</div>';


                    }}

            ?>
</div>
<div>
<footer class="footer">
        <p class="footer__text">&copy; 2024 cineplex Cinemas. All Rights Reserved.</p>
    </footer>
</div>
<?php 

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $name = $_POST["name"];
//     $price = $_POST["price"];
    // $imagename = $_FILES["image"]["name"];
    // $tempname = $_FILES["image"]["tmp_name"];
    // $folder = "./img/";

    // move_uploaded_file($tempname, $folder . $imagename);
    // $imagepath = "http://localhost/cineplex/img/$imagename";

    
//     $date = mysqli_real_escape_string($conn, $_POST["date"]);
//     $time = mysqli_real_escape_string($conn, $_POST["time"]);

 

//     $sql = "INSERT INTO addmovies(moviename, price, date, time) VALUES ('$name', $price, '$date', '$time')";
//     $query = mysqli_query($conn, $sql);

//     if ($query) {
//         echo '<script>alert("Movie Inserted Successfully")</script>';
//     } else {
//         echo '<script>alert("Something went Wrong")</script>';
//     }
// }?>


<?php
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $name = $_POST["name"];
//     $price = $_POST["price"];
//     $date = mysqli_real_escape_string($conn, $_POST["date"]);
//     $time = mysqli_real_escape_string($conn, $_POST["time"]);

//     $imagename = $_FILES["image"]["name"];
//     $tempname = $_FILES["image"]["tmp_name"];
//     $folder = "./img/";
    
//     move_uploaded_file($tempname, $folder . $imagename);

//     $sql = "INSERT INTO addmovies(movieID, moviename, price, image, date, time) VALUES ('$name', $price, '$imagename','$date', '$time')";
//     $query = mysqli_query($conn, $sql);


//     if ($query) {
//         echo '<script>alert("Movie Inserted Successfully")</script>';
//     } else {
//         // Directly outputting SQL error to understand the issue
//         echo '<script>alert("Error: '.mysqli_error($conn).'")</script>';
//     }
// }
?>

