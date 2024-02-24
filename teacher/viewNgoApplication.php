<?php
require '../common/connect.php';

session_start();

require '../common/links.php';

if(isset($_SESSION['uid']))
{
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NGO Activity | <?=$_GET['actID']?></title>
  </head>
  <body>
    <div class="container mt-3 mb-5">
        <a class="btn btn-dark text-end mb-4" href="../teacher/ngoApplication.php"><i class="fas fa-chevron-left"></i> Go back</a>
        <div class="row">
            <div class="col-12">
            <?php
            if (isset($_GET['actID'])) {
                $actID = mysqli_real_escape_string($conn, $_GET['actID']);
                $query = "SELECT * FROM teacherhunt WHERE actID='$actID'";
                $result = mysqli_query($conn, $query);

                if(mysqli_num_rows($result)>0){
                    $post = mysqli_fetch_array($result);
            ?>
            <div class="card">
                <div class="card-header text-bg-primary">
                    <h3 class="text-center"><?=$post['actName']?> (<span id="actID"><?=$post['actID']?></span>)</h3>
                </div>
                <div class="card-body">
                    <div class="card text-start">
                        <div class="card-body">
                            <div class="row align-middle">
                                <div class="col-lg-6">
                                    <label class="form-label">Name of host NGO:</label>
                                    <p class="form-control"><?=$post['name']?></p>
                                </div>
                                <div class="col-lg-6">
                                    <label class="form-label">Activity Name:</label>
                                    <p class="form-control"><?=$post['actName']?></p>
                                </div>
                            </div>
                            <div class="row align-middle">
                                <div class="col-lg-6">
                                    <label class="form-label">Activity Date:</label>
                                    <p class="form-control"><?=$post['actDate']?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <label class="form-label">Location:</label>
                                    <p class="form-control"><?=$post['actLoc']?></p>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">More Information:</div>
                                <div class="card-body">
                                    <div class="row align-middle">
                                        <div class="col-lg-6">
                                            <label class="form-label">Group Info:</label>
                                            <p class="form-control"><?=$post['ageGroup']?></p>
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="form-label">Maximum Capacity:</label>
                                            <p class="form-control"><?=$post['capacity']?></p>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Responsibilities:</label>
                                        <p class="form-control"><?=$post['responsibilities']?></p>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Minimum Experience required:</label>
                                        <p class="form-control"><?=$post['exp']?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="card-footer text-center">
                    <?php 
                        $tname=$post['name'];
                        $check = "SELECT * FROM huntstatus WHERE tname='$tname' AND actID='$actID'";
                        $runCheck = mysqli_query($conn, $check);

                        if(mysqli_num_rows($runCheck)<=0){
                    ?>
                        <form action="../common/postActions.php" method="POST">

                            <h5 class="my-3">Interested to be a part of this? Click the button below to choose and connect accordingly!</h5>
                            <button type="button" class="btn btn-success mx-5" data-bs-toggle="modal" data-bs-target="#onlineModal">Online Class</button>
                            <button type="button" class="btn btn-success mx-5" data-bs-toggle="modal" data-bs-target="#offlineModal">Offline Class</button>

                            
                            <!-- Online Class Modal -->
                            <div class="modal fade" id="onlineModal" tabindex="-1" aria-labelledby="onlineLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="onlineLabel">Online Class</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to opt to conduct online classes for <label><?=$post['name']?></label> ?
                                            <textarea class="form-control bg-dark-subtle my-2" name="comments" id="comments" row="2" 
                                                    style="resize: none;" placeholder="Talk to <?=$post['name']?>"></textarea>
                                        </div>
                                        <div class="modal-footer d-flex justify-content-center">
                                            <button type="button" class="btn btn-secondary mx-5" data-bs-dismiss="modal">Cancel</button>
                                            <a href="#" class="btn btn-success mx-5" onclick="submitForm('on')">Yes, Confirm</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Offline Class Modal -->
                            <div class="modal fade" id="offlineModal" tabindex="-1" aria-labelledby="offlineLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="offlineLabel">Offline Class</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to opt to conduct offline classes for <label><?=$post['name']?></label> ?
                                            <textarea class="form-control bg-dark-subtle my-2" name="comments" id="comments" row="2" 
                                                    style="resize: none;" placeholder="Talk to <?=$post['name']?>"></textarea>
                                        </div>
                                        <div class="modal-footer d-flex justify-content-center">
                                            <button type="button" class="btn btn-secondary mx-5" data-bs-dismiss="modal">Cancel</button>
                                            <a href="#" class="btn btn-success mx-5" onclick="submitForm('off')">Yes, Confirm</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    <?php 
                        } else{ 
                            $procedure = mysqli_fetch_assoc($runCheck);
                            if($procedure['status'] == "online"){
                    ?>
                        <a href="#" class="btn btn-primary mt-3">Schedule Online Class</a>
                    <?php 
                            } elseif($procedure['status'] == "offline"){
                    ?>
                        <a href="#" class="btn btn-primary mt-3">Schedule Offline Class</a>
                    <?php
                            }
                        } 
                    ?>
                </div>
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


    
    <script>
        function submitForm(status) {
            const comments = document.getElementById('comments').value;
            const actID = document.getElementById('actID').value;
            const url = `../common/postActions.php?name=<?=$post['name']?>&status=${status}&comments=${comments}&actID=<?=$actID?>`;
            window.location.href = url;
        }
    </script>
  </body>
</html>


<?php
}
else{
    header("Location:../login.php");
    exit();
}
?>