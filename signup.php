<?php
  include_once 'header.php';
?>

    <section class="form">
      <form action="includes/signup.inc.php" method="post" class="flex-column">
        <h2>Fill This</h2>
        <input type="text" name="fullname" placeholder="Mike Lee">
        <input type="email" name="email" placeholder="mikelee@you.org">
        <input type="password" name="password" placeholder="Password...">
        <input type="password" name="repeatpwd" placeholder="Repeat password...">
        <button type="submit" name="submit">Sign Up</button>

        <?php
      if (isset($_GET["error"])) {

        if ($_GET["error"] == "emptyinput") {
          echo "<h2>Fill all fields!</h2>";
        }
        else if ($_GET["error"] == "invalidemail") {
          echo "<h2>Incorrect email format!</h2>";
        }
        else if ($_GET["error"] == "passwordsdontmatch") {
          echo "<h2>Passwords do not match!</h2>";
        }
        else if ($_GET["error"] == "stmtfailed") {
          echo "<h2>Something went wrong!</h2>";
        }
        else if ($_GET["error"] == "emailtaken") {
          echo "<h2>Email already in use!</h2>";
        }
        else if ($_GET["error"] == "none") {
          echo "<h2>You registered!</h2>";
        } 
      }
      
     ?>
      </form>

    </section> 


<?php
  include_once 'footer.php';
?>