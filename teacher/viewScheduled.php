<?php
require '../common/connect.php';

session_start();

require '../common/links.php';

if(isset($_SESSION['uid']))
{
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classrooms | <?=$_SESSION['uname']?></title>
</head>
<body>
    <?php include '../common/navbar.php' ?>

    <div class="container my-5">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header text-bg-primary">
                        <h3>My Classroom Details</h3>
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
</body>
</html>

<?php
}
else{
    header("Location:../login.php");
    exit();
}
?>