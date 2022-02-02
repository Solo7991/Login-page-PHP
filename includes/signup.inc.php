<?php

  if (isset($_POST["submit"])) {
     
    $name = $_POST["fullname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $repeat = $_POST["repeatpwd"];   

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputSignup($name, $email, $password, $repeat) !== false) {
      header("location: ../signup.php?error=emptyinput");
      exit();
    }
    if (invalidEmail($email) !== false) {
      header("location: ../signup.php?error=invalidemail");
      exit();
    }
    if (pwdMatch($password, $repeat) !== false) {
      header("location: ../signup.php?error=passwordsdontmatch");
      exit();
    }
    if (emailExists($conn, $email) !== false) {
      header("location: ../signup.php?error=emailtaken");
      exit();
    }

    createUser($conn, $name, $email, $password);
  }
  else {
    header("location: ../signup.php");
  }