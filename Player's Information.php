<?php
include("DB\PlayerInfo.php");
// session_start();
echo "<br>";
print_r($_SESSION);
echo "<br>";
echo $_SESSION['user_id'];
echo $_SESSION['email'];
session_destroy();
if (!isset($_SESSION['email'])) {
  // User is not logged in, handle accordingly (e.g., redirect to login page)
  header("Location: login.html");
  exit();
}
// print_r($row); // Print the $singleData array
$dob = $row['dob'];
$currentDate = new DateTime();
$birthDate = new DateTime($dob);
$age = $birthDate->diff($currentDate)->y;
?>
<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <meta name="viewport" content="with=device-width, initial-scale=1.0">
  <title>Sports Website Design</title>
  <link rel="stylesheet" href="style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,300;0,500;0,700;1,200;1,300;1,400;1,600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">
</head>

<body>

  <section class="player-information">
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
          <li>
            <a href="Login.html">LOGOUT</a>
          </li>
        </ul>
      </div>
    </nav>
    <div class="player-info">
      <img src="Updated/neymar-png-44965.png">
      <div class="info">
        <label>Player Name:</label>
        <span><?php echo $row['Name'] ?></span>
      </div>
      <div class="player-details">
        <div class="info">
          <label>Age:</label>
          <span><?php echo $age ?></span>
        </div>
        <div class="info">
          <label>Nationality:</label>
          <span>Brazil</span>
        </div>
        <div class="info">
          <label>Team:</label>
          <span>FC Barcelona</span>
        </div>
        <div class="info">
          <label>Position:</label>
          <span>Attacker</span>
        </div>
        <div class="info">
          <label>From:</label>
          <span>Brazil</span>
        </div>
        <div class="info">
          <label>Height:</label>
          <span>1.75m</span>
        </div>
        <div class="info">
          <label>Weight:</label>
          <span>68KG</span>
        </div>
        <div class="info">
          <label>Disability:</label>
          <span>None</span>
        </div>
      </div>
    </div>
  </section>
  <section class="footer">
    <h4>ABOUT US</h4>
    <p>Producing Oppurtunities for those with talent,determination,<br> and where you can play globally.This is a great Oppurtunity.</p>
  </section>
</body>

</html>