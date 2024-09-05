<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cinema Theater Admin Dashboard</title>
    <link rel="stylesheet" href="css/addstaff.css">
</head>
<body>
    <header class="header">
        <h1 class="header__title">Cineplex Cinema Admin Dashboard - Add Staff Members</h1><br>
        <a href="index.php" class="button">Home</a>
    </header>

    <section id ="register">
    <div id="register-container">
        <h2>Staff Registration</h2>
        <form id="register-form" method="POST" action="addstaff.php">
            <input type="text" name="fname" placeholder="First Name" required>
			<input type="text" name="lname" placeholder="Last Name" required>
			<input type= "text" name="gender" placeholder=" Gender" required>
            <input type="email" name="email" placeholder="Email Address" required>

            <!-- <label><input type="radio" name="uname" value="admin" required> Admin</label>-->
            <label><input type="radio" name="uname" value="Staff" required> Staff</label>
            <!-- <label><input type="radio" name="uname" value="user" required> User</label> -->

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
		<p>Already have an acount? <a href="login.php">Login here</a></p>
    </div>
		</section>
        <footer class="footer">
        <p class="footer__text">&copy; 2024 cineplex Cinemas. All Rights Reserved.</p>
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
if ($query){
  echo "<script type='text/javascript'>alert('successfully registered');</script>";
} else {
    echo "<script type='text/javascript'>alert('enter valid informations');</script>";         
  }
}}

?>