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
    <title><?=$_GET['meetTopic']?> | <?=$_GET['name']?></title>
</head>
<body>
  <?php include '../common/navbar.php' ?>
  <?php require './studentNav.php' ?>

  <?php include '../common/message.php' ?>


  <div class="container-fluid row">
    <?php
    if (isset($_GET['name']) && isset($_GET['meetTopic'])) {
        $name = mysqli_real_escape_string($conn, $_GET['name']);
        $meetTopic = mysqli_real_escape_string($conn, $_GET['meetTopic']);
        $query = "SELECT * FROM classschedule WHERE name='$name' AND meetTopic='$meetTopic'";
        $result = mysqli_query($conn, $query);

        if(mysqli_num_rows($result)>0){
            $class = mysqli_fetch_array($result);
    ?>
    <div class="col-md-8 p-4">
      <a class="btn btn-dark text-end" href="../student/classroom.php"><i class="fas fa-chevron-left"></i> Go back</a>

      <div class="card-body m-5">
        <h2><?=$class['meetTopic']?></h2>
        <p class="card-text"><?=$class['meetDetails']?></p>
        <p class="card-text"><label>Scheduled Date: </label> <?=$class['meetDate']?></p><br>
        <p class="card-text"><label>Scheduled Time: </label> <?=$class['meetTime']?></p><br>
        <p class="card-text"><label>Duration: </label> <?=$class['meetDuration']?></p><br>
      </div>
    </div>
    <div class="col-md-4 p-3">
      <div class="card">
        <img class="w-75 mx-auto py-3 rounded" alt="hero" src="https://source.unsplash.com/300x300/?<?=$class['meetTopic']?>">

        <div class="card-body">
          <h2><?=$class['meetTopic']?></h2>
          <h5 class="text-secondary"><?=$class['name']?></h5>
          <div class="row">
            <a href="<?=$class['meetLink']?>" class="btn btn-primary my-3">Join Meeting</a>
            <a href="<?=$class['userLink']?>" class="btn btn-outline-primary my-3">View Classroom</a>
          </div>
        </div>
      </div>
    </div>
    <?php
        }
        else{
            echo "Error! Class not found.";
        }
    }
    ?>
  </div>
</body>
</html>