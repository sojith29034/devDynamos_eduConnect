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
        <div class="row mt-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-header"><h3>My Classroom</h3></div>
                    <div class="card-body">
                        <a href="scheduleClass.php" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Schedule Class</a>
                        <a href="scheduleClass.php" class="btn btn-primary">View Scheduled Classes</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row mt-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-header"><h3>NGO Applications</h3></div>
                    <div class="card-body overflow-x-auto">
                        <table class="table table-striped table-responsive">
                            <thead class="my-2">
                                <tr class="text-center">
                                    <th>Sr. No.</th>
                                    <th>Name of NGO</th>
                                    <th>Activity ID</th>
                                    <th>Activity Name</th>
                                    <th>Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * FROM teacherhunt";
                                $query_run = mysqli_query($conn, $query);

                                $i = 1;
                                if (mysqli_num_rows($query_run) > 0) {
                                    foreach ($query_run as $post) {
                                ?>

                                <tr class="text-center">
                                    <td><?=$i?></td>
                                    <td><?=$post['name']?></td>
                                    <td><?=$post['actID']?></td>
                                    <td><?=$post['actName']?></td>
                                    <td><?=$post['actDate']?></td>
                                    <td>
                                        <a href="./viewApplication.php?actID=<?=$post['actID']?>" class="btn btn-primary"><i class="far fa-eye"> </i> View</a>
                                    </td>
                                </tr>
                                <?php
                                        $i++;
                                    }
                                } else {
                                    echo "<div class='alert alert-warning' role='alert'>
                                        No Applications Submitted.
                                        </div>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

