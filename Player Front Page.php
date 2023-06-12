
<!DOCTYPE html>
<?php if (!isset($_SESSION['email'])) {
    // User is not logged in, handle accordingly (e.g., redirect to login page)
    header("Location: login.html");
    exit();
  }?>
<html>
<head>
  <meta name="viewport" content="with=device-width, initial-scale=1.0">
  <title>Sports Website Design</title>
  <link rel="stylesheet" href="style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,300;0,500;0,700;1,200;1,300;1,400;1,600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">
</head>
<body>
  <section class="FourthHeader">
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
  <div class="Player">
    <div class="Clicky">
    <div class="Selection">
        <img src="Updated/Fourth.jpeg">
        <div class="Magic">
            <a href="Player's Information.php">My Information</a>
        </div>
    </div>
        <div class="MyChoice">
            <img src="Updated/Fifth.jpeg">
            <div class="Magic">
                <a href="#">Event Registration</a>
            </div>
        </div>
        <div class="Selection">
            <img src="Updated/Player Link.jpg">
            <div class="Magic">
                <a href="#">Schedule</a>
            </div>
        </div>
    </div>
    <br>
    <div class="Clicky">
        <div class="Selection">
            <img src="Updated/about.jpg">
            <div class="Magic">
                <a href="#">Payment History</a>
            </div>
        </div>
            <div class="MyChoice">
                <img src="Updated/banner2.jpg">
                <div class="Magic">
                    <a href="#">Complain</a>
                </div>
            </div>
            <div class="Selection">
                <img src="Updated/Sixth.jpeg">
                <div class="Magic">
                    <a href="#">Team</a>
                </div>
            </div>
        </div>
    </div>
 </section>
</body>
</html>