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

<link rel="stylesheet" href="style.css">

</head>

<body>

<?php include 'includes/navbar.php'; ?>

<h1 style="text-align:center; margin-top:30px; color:white;">

Booking History

</h1>

<table>

<tr>

<th>ID</th>
<th>Passenger ID</th>
<th>Schedule ID</th>
<th>Seat</th>
<th>Fare</th>
<th>Payment</th>
<th>Status</th>

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

</tr>

<?php
}
?>

</table>

</body>
</html>