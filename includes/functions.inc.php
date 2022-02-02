<?php

  function emptyInputSignup($name, $email, $password, $repeat) {
    
    $result;
    if (empty($name) || empty($email) || empty($password)
      || empty($repeat)) {
      
      $result = true;
    } 
    else {
      $result = false;
    }
    return $result;
  }

  
  function invalidEmail($email) {
    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $result = true;
    }
    else {
      $result = false;
    }
    return $result;
  } 


  function pwdMatch($password, $repeat) {
    $result;
    if ($password !== $repeat) {
      $result = true;
    }
    else {
      $result = false;
    }
    return $result;
  } 


  function emailExists($conn, $email) {
    $sql = "SELECT * FROM models WHERE email = ?;";
    $stmt = mysqli_stmt_init($conn); // prepared statement

    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("location: ../signup.php?error=stmtfailed");
      exit();
    } 

    mysqli_stmt_bind_param($stmt, "s", $email);   
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt); 

    if ($row = mysqli_fetch_assoc($resultData)) {
      return $row;
    }
    else {
      $result = false;
      return $result; 
    }   

    mysqli_stmt_close($stmt);
  } 


  function createUser($conn, $name, $email, $password) {
    $sql = "INSERT INTO models (fullname, email, password) VALUES (?, ?, ?);";
    $stmt = mysqli_stmt_init($conn); // prepared statement

    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("location: ../signup.php?error=stmtfailed");
    } 

    $hashedPwd = password_hash($password, PASSWORD_DEFAULT); // make pwd gibberish

    mysqli_stmt_bind_param($stmt, "sss", $name, $email, $hashedPwd);   
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
 
    header("location: ../signup.php?error=none");
    exit();

  }

  function emptyInputLogin($email, $password) {
    
    $result;
    if (empty($email) || empty($password)) {
      $result = true;
    } 
    else {
      $result = false; 
    }
    return $result;

  }

  function loginUser($conn, $email, $password) {
     $emailExits = emailExists($conn, $email);

     if ($emailExists === false) {
       header("location: ../login.php?error=wronglogin");
       exit();
     }

     $pwdHashed = $emailExists["password"];
     $checkPwd = password_verify($password, $pwdHashed);

     if ($checkPwd === false) {
       header("location: ../login.php?error=wronglogin");
       exit();
     }
     else if ($checkPwd === true) {
       session_start();
       $_SESSION["uid"] = $emailExists["id"]; 
       $_SESSION["uname"] = $emailExists["fullname"];
       header("location: ../index.php");
       exit();
     }
  }