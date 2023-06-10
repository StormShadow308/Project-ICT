<?php
require 'database_conn.php';
$dob = $_POST['dob'];

print_r($_POST);
echo "<br>";
echo "<br>";

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
echo "<br>";
echo "dateofbirth: " . $dob;
echo "<br>";


print_r($_POST);
$conn = connectDatabase();

if(!$conn)
die("connection failed" .mysqli_connect_error());
else
echo "Connection Sucessful";
echo "<br>";
$sql = "INSERT INTO person (name, dob, email) VALUES ('$username', '$dob', '$email')";
$sqlaccount = "INSERT INTO 'account login' (email, password) VALUES ('$email', '$password')";

if(mysqli_query($conn, $sql)){
echo "Sucessfully inserted";}
else{
echo "Error inserting";
echo "<br>". mysqli_error($conn);}

if(mysqli_query($conn, $sqlaccount)){
    echo "Sucessfully inserted";}
    else{
    echo "Error inserting";
    echo "<br>". mysqli_error($conn);}
    ?>
?>

