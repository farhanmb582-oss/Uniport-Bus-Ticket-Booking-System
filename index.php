<!DOCTYPE html>
<html>

<head>

<title>Uniport Home</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<?php include 'includes/navbar.php'; ?>

<div class="container">

<h1>Bus Ticket Booking</h1>

<form action="booking.php" method="POST">

<input type="text" name="name" placeholder="Passenger Name" required>

<input type="text" name="phone" placeholder="Phone Number" required>

<input type="email" name="email" placeholder="Email" required>

<input type="text" name="seat" placeholder="Seat Number" required>

<button type="submit">Book Ticket</button>

</form>

</div>

</body>
</html>