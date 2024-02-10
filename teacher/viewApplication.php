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
        <a class="btn btn-dark text-end mb-4" href="../teacher/teacher.php"><i class="fas fa-chevron-left"></i> Go back</a>
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
                    <h3 class="text-center"><?=$post['actName']?> (<?=$post['actID']?>)</h3>
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
                    <?php if ($post['status'] == 'accepted' || $post['status'] == 'Accepted'): ?>
                        <h2 class="text-success">This post application has been accepted.</h2>
                    <?php elseif ($post['status'] == 'rejected' || $post['status'] == 'Rejected'): ?>
                        <h2 class="text-danger">This post application has been rejected.</h2>
                    <?php elseif ($post['status'] == 'pending' || $post['status'] == 'Pending'): ?>
                        <form action="../common/formActions.php" method="POST">

                            <input type="hidden" id="hiddenComments" name="hiddenComments" value="">
                            
                            <button type="button" class="btn btn-danger mx-5" data-bs-toggle="modal" data-bs-target="#rejectModal"><i class="fas fa-times"></i> Reject</button>
                            <button type="button" class="btn btn-success mx-5" data-bs-toggle="modal" data-bs-target="#acceptModal"><i class="fas fa-check"></i> Accept</button>

                            
                            <!-- Reject Application Form Modal -->
                            <div class="modal fade" id="rejectModal" tabindex="-1" aria-labelledby="rejectLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="rejectLabel">Reject post Application</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to reject <?=$post['name']?>'s application?
                                            <textarea class="form-control bg-warning-subtle my-2" name="comments" id="comments" row="2" 
                                                    style="resize: none;" placeholder="Administrator comments for post . . ."></textarea>
                                        </div>
                                        <div class="modal-footer d-flex justify-content-center">
                                            <button type="button" class="btn btn-secondary mx-5" data-bs-dismiss="modal">Cancel</button>
                                            <a href="#" class="btn btn-danger mx-5" onclick="submitForm('R')">Reject</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Accept Application Form Modal -->
                            <div class="modal fade" id="acceptModal" tabindex="-1" aria-labelledby="acceptLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="acceptLabel">Accept post Application</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to accept <?=$post['name']?>'s application?
                                        </div>
                                        <div class="modal-footer d-flex justify-content-center">
                                            <button type="button" class="btn btn-secondary mx-5" data-bs-dismiss="modal">Cancel</button>
                                            <a href="#" class="btn btn-success mx-5" onclick="submitForm('A')">Accept</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    <?php endif; ?>
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
            const url = `../common/formActions.php?name=<?=$post['name']?>&attempts=<?=$post['attempts']?>&status=${status}&comments=${comments}`;
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