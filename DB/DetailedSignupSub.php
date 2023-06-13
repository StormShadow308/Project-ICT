<?php
session_start();
require 'database_conn.php';
print_r($_POST);
$email = $_SESSION['email'];
$Height = $_POST['height'];
$Weight = $_POST['weight'];
$Team = $_POST['team'];
$Nationality = $_POST['nationality'];
$Address = $_POST['hometown'];
$Disability = $_POST['disability'];

echo "<br>";
echo "<br>";

$conn = connectDatabase();

if (!$conn)
    die("connection failed" . mysqli_connect_error());
else
    echo "Connection Sucessful";
echo "<br>";

$sql = "UPDATE person 
        SET Height = '$Height', Weight = '$Weight', Nationality = '$Nationality', 
            Team = '$Team', Address = '$Address', Disability = '$Disability' 
        WHERE email = '$email'";

if (mysqli_query($conn, $sql)) {
    echo "Person Sucessfully inserted<br>";
} else {
    echo "Person Error inserting";
    echo "<br>" . mysqli_error($conn);
}

header("Location: ../Player Front Page.php");


$conn->close();
