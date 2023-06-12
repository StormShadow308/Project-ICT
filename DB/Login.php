<?php
require 'database_conn.php';
echo "<br><br>";
$email = $_POST['email'];
$password = $_POST['password'];
print_r($_POST);
echo "<br>";

$conn = connectDatabase();
// session_destroy();

$stmt = $conn->prepare("SELECT * FROM account_login WHERE email = ? AND password = ?");
$stmt->bind_param("ss", $email, $password);
$stmt->execute();
$result = $stmt->get_result();

$stmt->close();
if ($result->num_rows == 1) {
    session_start();
    // Login successful
    // Redirect to the specific page
    $_SESSION['email'] = $email;
    $_SESSION['password'] = $password;
    $_SESSION['loggedIn'] = true;
    echo $_SESSION['email'];

    echo "<br>Going to Dashboard<br>";
    echo $_SESSION['email'];
    if (session_status() === PHP_SESSION_ACTIVE) {
        echo "<br>Session is active";
    } else {
        echo "<br>Session is not active";
    }
    header("Location: ../Player Front Page.php");
    exit();
} else {
    // Login failed
    if (isset($_GET['error']) && $_GET['error'] == 1) {
        // Error parameter already present, redirect to login page with error
        // header("Location: ../Login.php?error=1");
        echo "Going to login";
    } else {
        // No error parameter or different error, redirect to login page with error
        // header("Location: ../Login.php?error=2");
        echo "Going to login";
    }
    exit();
}

$conn->close();
