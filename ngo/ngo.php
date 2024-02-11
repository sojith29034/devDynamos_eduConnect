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
    <title>NGO | <?=$_SESSION['uname']?></title>
</head>
<body>
    <?php include '../common/navbar.php' ?>
    <?php include '../common/message.php' ?>

    <div class="container">
        <div class="card mt-5">
            <div class="card-header"><h3>Hunt Teachers?</h3></div>
            <div class="card-body">
                <p>Post teaching opportunities and connect with passionate educators. Build a brighter future together.</p>
                <a href="./teacherHunt.php" class="btn btn-primary">Hunt now</a>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="card mt-5">
            <div class="card-body">
                <?php include '../html/map.php' ?>
            </div>
        </div>
    </div>
</body>
</html>