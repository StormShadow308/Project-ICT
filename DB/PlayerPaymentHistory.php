<?php
//include("database_conn.php");
require 'database_conn.php';
// session_start();
$conn = connectDatabase();
if(isset($_SESSION['email'])) {

    $query = "SELECT DOP, Transaction_ID, Transaction_name, Transaction_Notes,Time,Amount FROM Payment where member_email='" . $_SESSION['email'] . "'";

$result = $conn->query($query);

$row= mysqli_fetch_all($result, MYSQLI_ASSOC);

// echo $row['Name'];
// echo $row['email'];

}
mysqli_close($conn);

?>
