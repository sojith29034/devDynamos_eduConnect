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
                        <div class="card-header d-flex">
                            <h3 class="col-md-2">My Classes</h3>
                            <div class="col-md-2"><a href="scheduleClass.php" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Schedule Class</a></div>
                        </div>
                        <div class="card-body">
                        <?php
                        if (isset($_SESSION['uname'])) {
                            $name = mysqli_real_escape_string($conn, $_SESSION['uname']);
                            $query = "SELECT * FROM classschedule WHERE name='$name'";
                            $result = mysqli_query($conn, $query);

                            if(mysqli_num_rows($result)>0){
                                $class = mysqli_fetch_array($result);
                                foreach ($result as $class) { 
                        ?>
                            <div class="card my-3">
                                <div class="card-body row">
                                    <div class="col-md-6">
                                        <p><span class="fw-bold">Topic: </span><?=$class['meetTopic']?></p>
                                        <p class="text-truncate"><span class="fw-bold">Details: </span><?=$class['meetDetails']?></p>
                                    </div>
                                    <div class="col-md-6">
                                        <p><span class="fw-bold">Date: </span><?=$class['meetDate']?></p>
                                        <p ><span class="fw-bold">Time: </span><?=$class['meetTime']?></p>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <a href="<?=$class['meetLink']?>" target="_blank" class="btn btn-outline-primary">Google Meet Link</a> (<?=$class['meetLink']?>)
                                </div>
                            </div>
                        <?php
                                }
                            }
                            else{
                                echo "No classes have been scheduled yet. <a href='./scheduleClass.php' class='btn-primary'>Schedule your class now</a>";
                            }
                        }
                        ?>
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