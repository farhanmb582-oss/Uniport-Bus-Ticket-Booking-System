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

<div class="hero">

    <h1>📝 Create Account</h1>

    <p>
        Register and start booking bus tickets online.
    </p>

</div>

<div class="container">

    <div class="card">

        <h2>Register</h2>

        <form>
            ...
        </form>

    </div>

</div>

</body>
</html>