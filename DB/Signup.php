<?php
require 'database_conn.php';
$username = $_POST['username'];
$email = $_POST['email'];
$dob = $_POST['dob'];
$password = $_POST['password'];

print_r($_POST);
echo "<br>";
echo "<br>";

$conn = connectDatabase();

if (!$conn)
    die("connection failed" . mysqli_connect_error());
else
    echo "Connection Sucessful";
echo "<br>";
$sql = "INSERT INTO person (name, dob, email) VALUES ('$username', '$dob', '$email')";
$sqlaccount = "INSERT INTO account_login (email, password) VALUES ('$email', '$password')";
$sqlpayment = "INSERT INTO Payment (Transaction_Name, Member_email, Amount, DOP, time) VALUES ('Membership Fee','$email', '1500', CURDATE(), CURTIME())";
$sqlType = "INSERT INTO Player (PlayerEmail	, Member_Renewal_Date) VALUES ('$email', DATE_ADD(CURDATE(), INTERVAL 6 MONTH))";

if (mysqli_query($conn, $sql)) {
    echo "Person Sucessfully inserted<br>";
} else {
    echo "Error inserting";
    echo "<br>" . mysqli_error($conn);
}

if (mysqli_query($conn, $sqlaccount)) {
    echo "Accountlogin Sucessfully inserted<br>";
    //header("Location: ../Login.html");
} else {
    echo "Error inserting";
    echo "<br>" . mysqli_error($conn);
}

if (mysqli_query($conn, $sqlpayment)) {
    echo "Payment Sucessfully inserted<br>";
} else {
    echo "Error inserting";
    echo "<br>" . mysqli_error($conn);
}
header("Location: ../SucessupSignup.html");

if (mysqli_query($conn, $sqlType)) {
    echo "<br>PlayerTYPE Sucessfully inserted<br>";
    //header("Location: ../Login.html");
} else {
    echo "Error inserting";
    echo "<br>" . mysqli_error($conn);
}
$conn->close();