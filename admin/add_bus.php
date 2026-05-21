<?php
include '../connect.php';

if(isset($_POST['add'])){

$name=$_POST['name'];
$capacity=$_POST['capacity'];
$type=$_POST['type'];

$sql="INSERT INTO Bus(bus_name,capacity,type)
VALUES('$name','$capacity','$type')";

mysqli_query($conn,$sql);

echo "Bus Added";
}
?>

<form method="POST">

<input type="text" name="name" placeholder="Bus Name">

<input type="number" name="capacity" placeholder="Capacity">

<input type="text" name="type" placeholder="AC/Non-AC">

<button name="add">Add Bus</button>

</form>