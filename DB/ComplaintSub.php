<?php
require 'database_conn.php';
session_start();
print_r($_POST);
$CompaintType = $_POST['complaintType'];
$complaintDetails = $_POST['complaintDetails'];
$email = $_SESSION['email'];

echo "CompaintType<br>" .$CompaintType;
echo "CompaintDetails<br>";

$conn = connectDatabase();

if (!$conn)
    die("connection failed" . mysqli_connect_error());
else
    echo "Connection Sucessful";
echo "<br>";
$sql = "INSERT INTO Complain (complainant , Complain_Type	, Complain_Details) VALUES ('$email','$CompaintType', '$complaintDetails')";

if (mysqli_query($conn, $sql)) {
    echo "Person Sucessfully inserted<br>";
} else {
    echo "Error inserting";
    echo "<br>" . mysqli_error($conn);
}

header("Location: ../Player Front Page.php");


$conn->close();
?>
<!-- <!DOCTYPE html>
<html>
<head>
    <title>Alert Example</title>
    <script>
        alert("<?php echo 'This is an alert message!'; ?>");
    </script>
</head>
<body>
    <!-- Your HTML content here -->
</body>
</html> -->