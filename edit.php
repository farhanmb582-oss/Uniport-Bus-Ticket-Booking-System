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

<input
type="text"
name="seat"
value="<?php echo $row['seat_number']; ?>"
required>

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