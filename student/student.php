<?php
require '../common/connect.php';

session_start();

require '../common/links.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student | <?=$_SESSION['uname']?></title>
</head>
<body>
  <img src="https://source.unsplash.com/300x300/?motivation-quotes" alt="Today's Motivation" class="bg">
  <?php include '../common/navbar.php' ?>
  <?php include '../student/studentNav.php' ?>

  <?php include '../common/message.php' ?>
</body>

<style>
  img.bg{
    height: 100%;
    width: 100%;
    object-fit: cover;
    position: fixed;
    z-index: -1;
    opacity: 0.9;
  }
</style>
</html>