<!DOCTYPE html>
<html>

<?php
session_start();
if ($_SESSION['loggedIn'] === true) {
  // echo "<br>loggedIn === true  Session is active";
  header("Location: Player Front Page.php");
} else {
  // echo "<br>Loggedin false  Session is not active";
}
?>

<head>
  <meta name="viewport" content="with=device-width, initial-scale=1.0">
  <title>Sports Website Design</title>
  <link rel="stylesheet" href="style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,300;0,500;0,700;1,200;1,300;1,400;1,600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">

  <script>
    function showError() {
      if (window.location.href.indexOf("?error=1") > -1) {
        alert("Invalid email or password. Please try again.");
        history.replaceState(null, "", window.location.href.split("?")[0]);
      }
      return true;
    }
  </script>
</head>

<body>
  <section class="Secheader">
    <nav>
      <a href="index.html"><img src="Updated/Barcelona-Logo.png"></a>
      <div class="nav-links">
        <i class="fa fa-times"></i>
        <ul>
          <li>
            <a href="index.html">HOME</a>
          </li>
          <li>
            <a href="about .html.html">ABOUT</a>
          </li>
          <li>
            <a href="course .html.html">TEAMS</a>
          </li>
          <li>
            <a href="blog.html.html">BLOG</a>
          </li>
          <li>
            <a href="contact .html.html">CONTACT</a>
          </li>
        </ul>
      </div>
    </nav>
    <div class="Login-id">
      <form action="DB/Login.php" method="POST" onsubmit="return showError()">
        <h2>Login</h2>
        <br>
        <input type="email" id="email" name="email" placeholder="Email" required>
        <input type="password" id="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
        <p>Don't have an account? <a href="Signup.html">Sign up</a></p>
      </form>
    </div>
  </section>
</body>

</html>