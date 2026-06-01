<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'connect.php';

$message = "";

if(isset($_POST['register'])){

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

$sql = "INSERT INTO users(username,email,password)

VALUES('$username','$email','$password')";

$result = mysqli_query($conn,$sql);

if($result){

$message = "Registration Successful";

}
else{

$message = "Registration Failed";

}
}

?>

<!DOCTYPE html>
<html>

<head>

<title>Register</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<?php include 'includes/navbar.php'; ?>

<div class="container">

    <div class="card">

        <h1>Register</h1>

        <form>
            <input type="text" placeholder="Full Name">
            <input type="email" placeholder="Email">
            <input type="password" placeholder="Password">

            <button type="submit">Register</button>
        </form>

    </div>

</div>

</body>
</html>