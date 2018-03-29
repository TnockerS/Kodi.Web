<?php

require_once 'config.php';
$link = mysqli_connect($_DB['host'], $_DB['user'], $_DB['pass'], $_DB['db']);
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
 mysqli_set_charset($link, "utf8");