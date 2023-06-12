<?php
// Start session
session_start();

// Check if user is logged in
// if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true){
    // Unset all session variables
    // $_SESSION = array();

    // Destroy the session
    print_r($_SESSION);
    // session_unset();
    // session_destroy();
    $_SESSION['email'] = "";
    $_SESSION['password'] = "";
    $_SESSION['loggedIn'] = false;

    echo "destroyed<br>";
    print_r($_SESSION);
    // Redirect to the login page or any other desired page
    header("Location: login.php");
    // exit();

?>
