<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cineplex Cinema</title>
  
    <link rel="stylesheet" href="css/customer.css">
</head>
<body>
    <header>
        <h1>Cineplex Cinema</h1><div>
        <a href="index.php" class="button">HOME</a></div>
    </header>
    <div class="container">
        <h2>Customer Questions & Feedback</h2>
        <form id="feedbackForm" method="post">
            <label for="question">Ask a question:</label>
            <input type="text" id="question" name="question" required>
            <label for="feedback">Provide Feedback:</label>
            <textarea id="feedback" name="feedback" rows="4" required></textarea>
            <input type="submit" value="Submit">
        </form>
        <h3>Recent Feedback</h3>
        <ul id="feedbackList" class="feedback-list">

<?php
include './db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    if (isset($_POST['question']) && isset($_POST['feedback'])) {
     
        $question = htmlspecialchars($_POST['question']);
        $feedback = htmlspecialchars($_POST['feedback']);
        
    
        $sql = "INSERT INTO feedback (question, feedback) VALUES ('$question', '$feedback')";
        
       
        if (mysqli_query($conn, $sql)) {
            echo "Feedback submitted successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    } else {
        echo "Both question and feedback fields are required";
    }
}


$recentFeedbackSql = "SELECT * FROM feedback ORDER BY id DESC LIMIT 5"; 
$recentFeedbackResult = mysqli_query($conn, $recentFeedbackSql);

if (mysqli_num_rows($recentFeedbackResult) > 0) {
    while ($row = mysqli_fetch_assoc($recentFeedbackResult)) {
        echo "<li>" . $row['question'] . " - " . $row['feedback'] . "</li>";
    }
} else {
    echo "No feedback available";
}
?>
        </ul>
    </div>
    <!-- <script src="css/customer.js"></script>  -->
<footer class="footer">
        <p class="footer__text">&copy; 2024 cineplex Cinemas. All Rights Reserved.</p>
    </footer>

</body>

</html>