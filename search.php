<?php

include 'connect.php';

?>

<!DOCTYPE html>
<html>

<head>

<title>Search Bus</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<?php include 'includes/navbar.php'; ?>

<div class="hero">

    <h1>🔍 Search Buses</h1>

    <p>
        Find available buses by route and date.
    </p>

</div>

<div class="container">

    <div class="card">

        <h2>Search Bus</h2>

        <form>
            ...
        </form>

    </div>

</div>

<?php

if(isset($_POST['search'])){

$source = $_POST['source'];
$destination = $_POST['destination'];

$sql = "SELECT

routes.source_city,
routes.destination_city,
buses.bus_name,
buses.bus_type,
schedules.departure_time,
schedules.arrival_time,
schedules.fare

FROM schedules

INNER JOIN routes
ON schedules.route_id = routes.route_id

INNER JOIN buses
ON schedules.bus_id = buses.bus_id

WHERE routes.source_city='$source'
AND routes.destination_city='$destination'";

$result = mysqli_query($conn,$sql);

?>

<table>

<tr>

<th>Bus</th>
<th>Type</th>
<th>From</th>
<th>To</th>
<th>Departure</th>
<th>Arrival</th>
<th>Fare</th>

</tr>

<?php

while($row=mysqli_fetch_assoc($result)){

?>

<tr>

<td><?php echo $row['bus_name']; ?></td>

<td><?php echo $row['bus_type']; ?></td>

<td><?php echo $row['source_city']; ?></td>

<td><?php echo $row['destination_city']; ?></td>

<td><?php echo $row['departure_time']; ?></td>

<td><?php echo $row['arrival_time']; ?></td>

<td><?php echo $row['fare']; ?></td>

</tr>

<?php
}
?>

</table>

<?php
}
?>

</body>
</html>