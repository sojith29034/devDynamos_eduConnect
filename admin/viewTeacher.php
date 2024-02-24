<?php
require '../common/connect.php';

session_start();

require '../common/links.php';
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Teacher Details | <?=$_GET['uname']?></title>
  </head>

  <body>
    <?php include '../common/navbar.php' ?>
    <?php include '../common/message.php' ?>

    <div class="container my-5">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header text-bg-info">
              <h3 class="text-center">Teacher Details | <?=$_GET['uname']?></h3>
            </div>
            <div class="card-body">

              <form action="../common/detailActions.php" method="post" enctype="multipart/form-data">

                <?php
                    if (isset($_GET['uname'])) {
                        $uname = mysqli_real_escape_string($conn, $_GET['uname']);
                        $query = "SELECT * FROM teachers WHERE uname='$uname'";
                        $result = mysqli_query($conn, $query);

                        if(mysqli_num_rows($result)>0){
                            $teacher = mysqli_fetch_array($result);
                ?>
                <div class="card">
                  <div class="card-body row">
                    <div class="col-md-6">
                      <label class="form-label">Name:</label>
                        <p class="form-control"><?=$teacher['uname']?></p>
                    </div>
                    
                    <div class="col-md-6">
                      <label class="form-label">Sex:</label>
                        <p class="form-control"><?=$teacher['sex']?></p>
                    </div>
                    
                    <div class="col-md-12">
                      <label class="form-label">Subjects:</label>
                        <p class="form-control"><?=$teacher['subject']?></p>
                    </div>
                    
                    <div class="col-md-12 my-2">
                      <label class="form-label">Past Experience: </label>
                        <p class="form-control"><?=$teacher['past']?></p>
                    </div>

                    <div class="col-md-12 my-2">
                      <label class="form-label">Qualifications: </label>
                        <p class="form-control"><?=$teacher['qualifications']?></p>
                    </div>

                    <div class="col-md-12">
                      <label for="qualFile" class="form-label">Degree(s)/Certificates (cumulative in .pdf format)</label>
                        <iframe src="<?=$teacher['qualFile']?>" class="form-control" width="100%" height="600px"></iframe>
                    </div>
                  </div>
                </div>

                <?php
                        }
                        else{
                            echo "Error occured! Try again.";
                        }
                    }
                ?>
              </form>

            </div>

            <div class="card-footer text-center">
                <?php if ($teacher['status'] == 'Approved'): ?>
                    <h2 class="text-success">This teacher application has been approveed.</h2>
                <?php elseif ($teacher['status'] == 'Rejected'): ?>
                    <h2 class="text-danger">This teacher application has been rejected.</h2>
                <?php elseif ($teacher['status'] == 'Pending'): ?>
                    <form action="../common/formActions.php" method="POST">
                        
                        <button type="button" class="btn btn-danger mx-5" data-bs-toggle="modal" data-bs-target="#rejectModal"><i class="fas fa-times"></i> Reject</button>
                        <button type="button" class="btn btn-success mx-5" data-bs-toggle="modal" data-bs-target="#approveModal"><i class="fas fa-check"></i> Approve</button>

                        
                        <!-- Reject Application Form Modal -->
                        <div class="modal fade" id="rejectModal" tabindex="-1" aria-labelledby="rejectLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="rejectLabel">Reject teacher Application</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to reject <?=$teacher['uname']?>'s application?
                                    </div>
                                    <div class="modal-footer d-flex justify-content-center">
                                        <button type="button" class="btn btn-secondary mx-5" data-bs-dismiss="modal">Cancel</button>
                                        <a href="#" class="btn btn-danger mx-5" onclick="submitForm('R')">Reject</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Approve Application Form Modal -->
                        <div class="modal fade" id="approveModal" tabindex="-1" aria-labelledby="approveLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="approveLabel">Approve teacher Application</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to approve <?=$teacher['uname']?>'s application?
                                    </div>
                                    <div class="modal-footer d-flex justify-content-center">
                                        <button type="button" class="btn btn-secondary mx-5" data-bs-dismiss="modal">Cancel</button>
                                        <a href="#" class="btn btn-success mx-5" onclick="submitForm('A')">Approve</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>

    
    <script>
        function submitForm(status) {
            const url = `../common/detailActions.php?uname=<?=$teacher['uname']?>&status=${status}`;
            window.location.href = url;
        }
    </script>
  </body>
</html>
