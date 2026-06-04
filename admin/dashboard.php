```php
<?php

include '../connect.php';

$totalBookings = mysqli_num_rows(
    mysqli_query($conn,"SELECT * FROM bookings")
);

$totalPassengers = mysqli_num_rows(
    mysqli_query($conn,"SELECT * FROM passengers")
);

$totalUsers = mysqli_num_rows(
    mysqli_query($conn,"SELECT * FROM users")
);

?>

<!DOCTYPE html>
<html>

<head>

<title>Admin Dashboard</title>

<link rel="stylesheet" href="../style.css?v=20">

</head>

<body>

<div class="hero">

<h1>🛠 Admin Dashboard</h1>

<p>Manage Uniport Bus Ticket Booking System</p>

</div>

<div class="container">

<div class="card">

<h2>Total Bookings</h2>

<br>

<h1><?php echo $totalBookings; ?></h1>

</div>

<div class="card">

<h2>Total Passengers</h2>

<br>

<h1><?php echo $totalPassengers; ?></h1>

</div>

<div class="card">

<h2>Total Registered Users</h2>

<br>

<h1><?php echo $totalUsers; ?></h1>

</div>

<div class="card">

<h2>Quick Links</h2>

<br>

<a href="../history.php" class="btn-book">
View All Bookings
</a>

<br><br>

<a href="../index.php" class="btn-book">
Go To Homepage
</a>

</div>

</div>

<footer>

<p>Uniport Admin Panel © 2026</p>

</footer>

</body>

</html>
```
