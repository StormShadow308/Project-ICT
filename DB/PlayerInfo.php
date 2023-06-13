<?php
//include("database_conn.php");
require 'database_conn.php';
// session_start();
$conn = connectDatabase();
if(isset($_SESSION['email'])) {

$query = "SELECT * FROM Person where email='" . $_SESSION['email'] . "'";
$result = mysqli_query($conn, $query);
$row = $result->fetch_assoc();

// echo $row['Name'];
// echo $row['email'];

}
mysqli_close($conn);

?>
