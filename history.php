<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'connect.php';

$sql = "SELECT * FROM bookings";
$result = mysqli_query($conn,$sql);

?>

<!DOCTYPE html>
<html>

<head>

<title>Booking History</title>

<link rel="stylesheet" href="style.css?v=20">

</head>

<body>

<?php include 'includes/navbar.php'; ?>

<div class="hero">
    <h1>📜 Booking History</h1>
    <p>View and manage all booked tickets</p>
</div>

<div class="container">

<table>

<tr>

<th>ID</th>
<th>Passenger ID</th>
<th>Schedule ID</th>
<th>Seat</th>
<th>Fare</th>
<th>Payment</th>
<th>Status</th>
<th>Action</th>

</tr>

<?php

while($row=mysqli_fetch_assoc($result)){

?>

<tr>

<td><?php echo $row['booking_id']; ?></td>

<td><?php echo $row['passenger_id']; ?></td>

<td><?php echo $row['schedule_id']; ?></td>

<td><?php echo $row['seat_number']; ?></td>

<td><?php echo $row['total_fare']; ?></td>

<td><?php echo $row['payment_status']; ?></td>

<td><?php echo $row['booking_status']; ?></td>

<td>

<form action="cancel.php" method="POST">

<input
type="hidden"
name="booking_id"
value="<?php echo $row['booking_id']; ?>">

<button
type="submit"
name="cancel">

Cancel

</button>

</form>

</td>

</tr>

<?php
}
?>

</table>

</div>

<footer>
    <p>Uniport Bus Ticket Booking System © 2026</p>
</footer>

</body>
</html>