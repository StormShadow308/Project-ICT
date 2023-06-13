<?php
require 'database_conn.php';
echo "<br><br>";
$email = $_POST['email'];
$password = $_POST['password'];
$AccountType = $_POST['Account_type'];

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
    $query = "SELECT Nationality FROM Person where email='" . $_SESSION['email'] . "'";
    $result = mysqli_query($conn, $query);
    $row = $result->fetch_assoc();

    if ($row['Nationality'] === "") {
        // Nationality is set
        echo "The nationality is not set.";
        header("Location: ../Detail Signup.html");
        exit();

    } else {
        echo "The nationality is: " . $row['Nationality'];
    }
    if($AccountType === "Player")
    header("Location: ../Player Front Page.php");
    else
    header("Location: ../Coach View.php");
    exit();
} else {
    // Login failed
    if (isset($_GET['error']) && $_GET['error'] == 1) {
        // Error parameter already present, redirect to login page with error
        header("Location: ../Login.php?error=1");
        echo "Going to login";
    } else {
        // No error parameter or different error, redirect to login page with error
        header("Location: ../Login.php?error=2");
        echo "Going to login";
    }
    exit();
}

$conn->close();
