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

    <?php
        $sql = "SELECT status FROM ngos WHERE uname='$_SESSION[uname]'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                if($row['status']== "Pending") {
    ?>
        <div class="container">
            <div class="row mt-3">
                <div class="col-12">
                    <div class="alert alert-warning" role="alert">
                        Your application is pending! Kindly await Administrator approval.
                    </div>
                </div>
            </div>
        </div>
    <?php
                } elseif ($row['status'] == "Rejected") {
    ?>
        <div class="container">
            <div class="row mt-3">
                <div class="col-12">
                    <div class="alert alert-danger" role="alert">
                        Your application has been rejected by the Administrator. You are not considered fit to be a teacher on EduConnect.
                        <br>Thank you for your cooperation. Have a nice day.
                    </div>
                </div>
            </div>
        </div>
    <?php
                } elseif ($row['status'] == "Approved") {
    ?>
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
                <div class="card-header">
                    <h2>Search for places here . . .</h2>
                </div>
                <div class="card-body">
                    <?php include '../html/map.php' ?>
                </div>
            </div>
        </div>
    <?php
                }
            }
        } else{
    ?>
        <div class="container">
            <div class="row mt-3">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h3>To be an NGO on EduConnect, you will have to get yourself verified by the Administrator.</h3>
                            <a href="../ngo/" class="btn btn-primary">Get Verified Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
        }
    ?>
</body>
</html>