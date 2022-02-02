<?php

  $server = "localhost";
  $user = "root";
  $pwd = "";
  $dbname = "actors";

  $conn = mysqli_connect($server,$user,$pwd,$dbname);

  if (!$conn) {
    die("Connection failed! " .mysqli_connect_error());
  }