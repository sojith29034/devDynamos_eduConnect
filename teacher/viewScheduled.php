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
    <div class="container my-5">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header text-bg-primary">
                        <h3 class="text-center">Class Details - <?=$class['name']?></h3>
                    </div>
                    <div class="card-body">
                    <?php
                    if (isset($_SESSION['uname'])) {
                        $name = mysqli_real_escape_string($conn, $_SESSION['uname']);
                        $query = "SELECT * FROM classschedule WHERE name='$name'";
                        $result = mysqli_query($conn, $query);

                        if(mysqli_num_rows($result)>0){
                            $class = mysqli_fetch_array($result);
                    ?>
                        <div class="card">
                            
                        </div>
                    <?php
                        }
                        else{
                            echo "Error occured! Try again.";
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