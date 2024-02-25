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
    <title>NGO Details | <?=$_SESSION['uname']?></title>
  </head>

  <body>
    <?php include '../common/navbar.php' ?>
    <?php include '../common/message.php' ?>

    <div class="container my-5">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header text-bg-primary">
              <h3 class="text-center">NGO Details Form</h3>
            </div>
            <div class="card-body">

              <form action="../common/detailActions.php" method="post" enctype="multipart/form-data">

                <div class="card">
                  <div class="card-body row">
                    <div class="col-md-6">
                      <input type="hidden" name="uid" id="uid" value="<?=$_SESSION['uid']?>">

                      <label for="uname" class="form-label">Name:</label>
                        <input type="text" name="uname" id="uname" class="form-control" value="<?=$_SESSION['uname']?>" readonly>
                    </div>
                    
                    <div class="col-md-6">
                      <label for="mem_count" class="form-label">Number of members:</label>
                        <input type="text" name="mem_count" id="mem_count" class="form-control" placeholder="NGO Members" >
                    </div>

                    <div class="col-md-12 my-2">
                      <label for="loc" class="form-label">Location: </label>
                        <input type="text" name="loc" id="loc" class="form-control" placeholder="Location as text . . .">
                    </div>
                
                    <div class="col-md-12 my-2">
                      <label for="mission" class="form-label">Mission of the NGO: </label>
                        <textarea name="mission" id="mission" class="form-control" row="2" style="resize: none;" placeholder="Mission/Vision of your NGO in brief . . ."></textarea>
                    </div>
                  </div>
                </div>

                <div class="card-body text-center">
                  <a href="../ngo/ngo.php" class="btn btn-secondary mx-5">Skip</a>
                  <button type="button" class="btn btn-primary mx-5" data-bs-toggle="modal" data-bs-target="#submitForm">Submit</button>
                </div>

                <!-- Submit Form Modal -->
                <div class="modal fade" id="submitForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Submit your Details</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        Confirm submission of your Details.<br>
                        Click on <strong>'Yes, Submit'</strong> to submit the Application Form.
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success" name="submitNgo">Yes, Submit</button>
                      </div>
                    </div>
                  </div>
                </div>

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>