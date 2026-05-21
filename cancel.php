<?php
include 'connect.php';

if(isset($_POST['cancel'])){

$id = $_POST['booking_id'];

$sql = "DELETE FROM Booking
WHERE booking_id='$id'";

mysqli_query($conn,$sql);

echo "Ticket Cancelled";
}
?>

<form method="POST">

<input type="number" name="booking_id"
placeholder="Booking ID">

<button name="cancel">Cancel Ticket</button>

</form>