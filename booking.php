<?php

include("connect.php");

if(isset($_POST['name'])){

$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$seat = $_POST['seat'];

$sql1 = "INSERT INTO passengers(full_name,phone,email)
VALUES('$name','$phone','$email')";

$result1 = mysqli_query($conn,$sql1);

if($result1){

$passenger_id = mysqli_insert_id($conn);

$sql2 = "INSERT INTO bookings
(passenger_id,schedule_id,seat_number,total_fare,payment_status,booking_status)

VALUES

('$passenger_id',1,'$seat',750,'Paid','Booked')";

$result2 = mysqli_query($conn,$sql2);

}
}
?>

<!DOCTYPE html>
<html>

<head>

<title>Booking Success</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<?php include 'includes/navbar.php'; ?>

<div class="container">

<?php

if(isset($result2) && $result2){

echo "<h1>✅ Ticket Booked Successfully</h1>";

}
else{

echo "<h1>❌ Booking Failed</h1>";

}

?>

<br><br>

<a href="history.php">
<button>View Booking History</button>
</a>

<br><br>

<a href="index.php">
<button>Book Another Ticket</button>
</a>

</div>

</body>

</html>