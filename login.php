```php
<?php

include 'connect.php';

$message = "";

if(isset($_POST['login'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users
            WHERE email='$email'
            AND password='$password'";

    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result) > 0){

        $message = "✅ Login Successful";

    }
    else{

        $message = "❌ Invalid Email or Password";

    }
}

?>

<!DOCTYPE html>
<html>

<head>

<title>Login</title>

<link rel="stylesheet" href="style.css?v=20">

</head>

<body>

<?php include 'includes/navbar.php'; ?>

<div class="hero">

    <h1>🔐 Login to Uniport</h1>

    <p>
        Access your account to manage bookings
        and view travel history.
    </p>

</div>

<div class="container">

    <div class="card">

        <h2>Login</h2>

        <br>

        <?php
        if($message != ""){
            echo "<h3>$message</h3><br>";
        }
        ?>

        <form method="POST">

            <input
                type="email"
                name="email"
                placeholder="Email"
                required>

            <input
                type="password"
                name="password"
                placeholder="Password"
                required>

            <button
                type="submit"
                name="login">

                Login

            </button>

        </form>

    </div>

</div>

<footer>
    <p>Uniport Bus Ticket Booking System © 2026</p>
</footer>

</body>

</html>

