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
    <title>Classroom | <?=$_SESSION['uname']?></title>
</head>
<body>
  <?php include '../common/navbar.php' ?>
  <?php require './studentNav.php' ?>

  <?php include '../common/message.php' ?>


  <div class="container row">
    <?php
    if (isset($_SESSION['uname'])) {
        $name = mysqli_real_escape_string($conn, $_SESSION['uname']);
        $query = "SELECT * FROM classschedule";
        $result = mysqli_query($conn, $query);

        if(mysqli_num_rows($result)>0){
            $class = mysqli_fetch_array($result);
            foreach ($result as $class) { 
    ?>
      <div class="card w-25 m-3 p-3">
        <img class="rounded" alt="hero" src="https://source.unsplash.com/720x600/?<?=$class['meetTopic']?>">
        <div class="card-body">
          <h3 class="card-title"><?=$class['meetTopic']?></h3>
          <h5 class="text-secondary"><?=$class['name']?></h5>
          <p class="card-text">
            <p class="text-truncate"><?=$class['meetDetails']?></p>
          </p>
          <a href="./lecture.php?name=<?=$class['name']?>&meetTopic=<?=$class['meetTopic']?>" class="btn btn-primary">Learn Now</a>
        </div>
      </div>
    <?php
            }
        }
        else{
            echo "No classes have been scheduled yet.";
        }
    }
    ?>
  </div>
</body>
</html>