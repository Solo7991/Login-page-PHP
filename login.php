<?php
  include_once 'header.php';
?>
    <section class="form">
      <form action="includes/login.inc.php" method="post" class="flex-column">
        <h2>Log In</h2>
        <input type="email" name="uid" placeholder="mikelee@you.org">
        <input type="password" name="password" placeholder="Password...">
        <button type="submit" name="submit">Log in</button>

      <?php 
        if (isset($_GET["error"])) {

          if ($_GET["error"] == "emptyinput") {
            echo "<h2>Fill all fields!</h2>";
          }
          else if ($_GET["error"] == "wronglogin") {
            echo "<h2>Incorrect login information!</h2>";
          }
        
        }
       ?>

      </form>

    </section> 
<?php
  include_once 'footer.php';
?>