<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/index.css">
  </head>

  <body>
    <div class="container nav">
      <nav>
        <ul class="notype flex-row">
          <li><a href="premium.php">Premium</a></li>
          <li><a href="more.php">More</a></li>
          <?php
            if (isset($_SESSION["uid"])) {
              echo '<li><a href="profile.php">Profile</a></li>';
              echo '<li><a href="logout.php">Log Out</a></li>';  
            }
            else {
              echo '<li><a href="signup.php">Sign Up</a></li>';
              echo '<li><a href="login.php">Log In</a></li>'; 
            }
          ?>
        </ul>
      </nav>
    </div>

    <div class="container main">