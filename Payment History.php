<?php
session_start();
print_r($_SESSION);

if ($_SESSION['loggedIn'] === true) {
  echo "<br>loggedIn === true  Session is active";
} else {
  echo "<br>Loggedin false  Session is not active";
  header("Location: Login.php");
}
// if (!isset($_SESSION['email'])) {
// if ($_SESSION['loggedin'] == false) {
//   // User is not logged in, handle accordingly (e.g., redirect to login page)
//   // header("Location: login.php");
//   echo "NO session";
//   // exit();
// }
// else{
//   echo "Logged IN";
//   // session_start();
//   // echo "<br>";
//   // echo "<br>";
//   // echo $_SESSION['user_id'];
// // echo $_SESSION['email'];
// // session_destroy();

// }
include("DB\PlayerPaymentHistory.php");
echo "<br>";
print_r($row); // Print the $singleData array

?>
<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <title>Payment History</title>
  <meta name="viewport" content="with=device-width, initial-scale=1.0">
  <title>Sports Website Design</title>
  <link rel="stylesheet" href="style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,300;0,500;0,700;1,200;1,300;1,400;1,600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">
</head>

<body>
  <section class="Payment-History">
    <nav>
      <a href="index.html"><img src="Updated/Barcelona-Logo.png"></a>
      <div class="nav-links">
        <i class="fa fa-times"></i>
        <ul>
          <li>
            <a href="index.html">HOME</a>
          </li>
          <li>
            <a href="about.html">ABOUT</a>
          </li>
          <li>
            <a href="course.html">TEAMS</a>
          </li>
          <li>
            <a href="blog.html">BLOG</a>
          </li>
          <li>
            <a href="contact.html">CONTACT</a>
          </li>
          <li>
            <a href="Login.html">LOGOUT</a>
          </li>
        </ul>
      </div>
    </nav>
    <div class="Naruto">
      <h1 class="page-title">Payment History</h1>
      <div class="search-bar">
        <label for="yearInput">Search by Year:</label>
        <input type="text" id="yearInput" onkeyup="searchByYear()" placeholder="Enter year...">
      </div>
      <br>
      <table id="paymentTable" class="payment-table">
        <thead>
          <tr>
            <th>Transaction ID</th>
            <th>Transaction Name</th>
            <th>Amount</th>
            <th>Date</th>
            <th>Time</th>
            <th>Notes</th>
        </thead>
        <tbody>
            <?php foreach ($row as $data): ?>
                <tr>
                    <td><?php echo $data['DOP']; ?></td>
                    <td><?php echo $data['Transaction_name']; ?></td>
                    <td><?php echo $data['Amount']; ?></td>
                    <td><?php echo $data['DOP']; ?></td>
                    <td><?php echo $data['Time']; ?></td>
                    <td><?php echo $data['Transaction_Notes']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </section>
</body>
<style>
</style>
<script>
  function searchByYear() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("yearInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("paymentTable");
    tr = table.getElementsByTagName("tr");

    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[0];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }
    }
  }
</script>

</html>