<?php
require 'database_conn.php';
echo "<br><br>";
$email = $_POST['email'];
$password = $_POST['password'];
print_r($_POST);
echo "<br>";

$conn = connectDatabase();
session_destroy();
session_start();

$stmt = $conn->prepare("SELECT * FROM account_login WHERE email = ? AND password = ?");
$stmt->bind_param("ss", $email, $password);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 1) {
    // Login successful
    // Redirect to the specific page
    $_SESSION['email'] = $email;
    echo $_SESSION['user_id'];
    header("Location: ../Player Front Page.html");
    echo $_SESSION['user_id'];
    exit();
} else {
    // Login failed
    if (isset($_GET['error']) && $_GET['error'] == 1) {
        // Error parameter already present, redirect to login page with error
        header("Location: ../Login.html?error=1");
    } else {
        // No error parameter or different error, redirect to login page with error
        header("Location: ../Login.html?error=2");
    }
    exit();
}

$stmt->close();
$conn->close();

?>