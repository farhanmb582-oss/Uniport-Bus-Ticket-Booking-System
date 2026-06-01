<?php

session_start();

if(!isset($_SESSION['user'])){

header("Location: login.php");
exit();

}

?>

<!DOCTYPE html>
<html>

<head>

<title>Dashboard</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<?php include 'includes/navbar.php'; ?>

<div class="hero">

    <h1>📊 Admin Dashboard</h1>

    <p>
        Manage buses, routes and bookings.
    </p>

</div>

<div class="container">

    <div class="card">

        Dashboard Content

    </div>

</div>

</body>
</html>