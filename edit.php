<?php

include 'connect.php';

$id = $_GET['id'];

$sql = "SELECT * FROM bookings WHERE booking_id='$id'";
$result = mysqli_query($conn,$sql);

$row = mysqli_fetch_assoc($result);

if(isset($_POST['update'])){

    $seat = $_POST['seat'];
    $status = $_POST['status'];

    $update = "UPDATE bookings
               SET seat_number='$seat',
                   booking_status='$status'
               WHERE booking_id='$id'";

    mysqli_query($conn,$update);

    header("Location: history.php");
    exit();
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Booking</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<?php include 'includes/navbar.php'; ?>

<div class="hero">
    <h1>Edit Booking</h1>
</div>

<div class="container">

<div class="card">

<form method="POST">

<select name="seat" required>

<option value="A1">A1</option>
<option value="A2">A2</option>
<option value="A3">A3</option>
<option value="A4">A4</option>

<option value="B1">B1</option>
<option value="B2">B2</option>
<option value="B3">B3</option>
<option value="B4">B4</option>

<option value="C1">C1</option>
<option value="C2">C2</option>
<option value="C3">C3</option>
<option value="C4">C4</option>

</select>

<select name="status">

<option value="Booked">Booked</option>

<option value="Cancelled">Cancelled</option>

</select>

<button type="submit" name="update">
Update Booking
</button>

</form>

</div>

</div>

</body>
</html>