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
    <title>Administrator</title>
</head>
<body>
    <?php include '../common/navbar.php' ?>
    <?php include '../common/message.php' ?>

    <div class="container">
        <div class="row mt-3">
            <div class="col-12">
                <div class="card">
                    <?php 
                    $sql = "SELECT COUNT(*) as empty_userlinks FROM login WHERE role='Teacher' AND (userLink IS NULL OR userLink = '')";
                    $result = mysqli_query($conn, $sql);
                    if ($result):
                        $row = mysqli_fetch_assoc($result);
                        $emptyUserLinks = $row['empty_userlinks'];
                    ?>
                        <div class="card-header">
                            <h3 class="position-relative">
                                New Teachers on EduConnect <span class="badge text-bg-secondary"><?=$emptyUserLinks?></span>
                            </h3>
                        </div>
                    <?php endif; ?>
                    <div class="card-body">
                        <a href="scheduleClass.php" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Schedule Class</a>
                        <a href="viewScheduled.php" class="btn btn-primary">View Scheduled Classes</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row mt-3">
            <div class="col-12">
                <div class="card">
                    <?php 
                    $sql = "SELECT COUNT(*) as empty_userlinks FROM login WHERE role='NGO' AND (userLink IS NULL OR userLink = '')";
                    $result = mysqli_query($conn, $sql);
                    if ($result):
                        $row = mysqli_fetch_assoc($result);
                        $emptyUserLinks = $row['empty_userlinks'];
                    ?>
                        <div class="card-header">
                            <h3 class="position-relative">
                                New NGOs on EduConnect <span class="badge text-bg-secondary"><?=$emptyUserLinks?></span>
                            </h3>
                        </div>
                    <?php endif; ?>
                    <div class="card-body">
                        <a href="scheduleClass.php" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Schedule Class</a>
                        <a href="viewScheduled.php" class="btn btn-primary">View Scheduled Classes</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

