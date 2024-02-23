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
    <title><?=$_SESSION['uname']?> | Dashboard</title>
</head>
<body>
    <?php include '../common/navbar.php' ?>
    <?php include '../common/message.php' ?>

    <!-- Main Content -->
    <?php
        $sql = "SELECT status FROM teachers WHERE uname='$_SESSION[uname]'";
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
                } elseif ($row['status'] == "Approved") {
    ?>
        <?php include '../teacher/teacherNav.php' ?>
        <?php
            $query = "SELECT userLink FROM login WHERE uname='$_SESSION[uname]'";
            $run_query = mysqli_query($conn, $query);
            $row = mysqli_fetch_assoc($run_query);
            $userLink = $row['userLink'];
            if($userLink == NULL):
        ?>
            <div class="container">
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="alert alert-success" role="alert">
                            <h4>Congratulations! You are now a verified teacher on EduConnect.</h4>
                            <h2>Add your Google Classroom Link Now:</h2>
                            <form action="../common/lectureActions.php" method="POST">
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" name="userLink" id="userLink" placeholder="Google Classroom Link..." required>
                                    </div>
                                    <div class="col-md-6">
                                        <button type="submit" name="addLink" class="btn btn-success">Add Link</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <div class="container">
            <div class="row mt-3">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header"><h3>My Classroom</h3></div>
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
                            <h3>To start teaching on EduConnect, you will have to get yourself verified by the Administrator.</h3>
                            <a href="../teacher/" class="btn btn-primary">Get Verified Now</a>
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

