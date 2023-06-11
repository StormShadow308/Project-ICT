<?php
//include("database_conn.php");
require 'database_conn.php';
$conn = connectDatabase();


$query = "SELECT Name, email,dob FROM Person where email='wakeelfahmed@gmail.com'";
$result = mysqli_query($conn, $query);
$row = $result->fetch_assoc();

echo $row['Name'];
echo $row['email'];



?>
