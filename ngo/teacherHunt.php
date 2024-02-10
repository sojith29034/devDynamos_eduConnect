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
    <title>Teacher Hunt Post</title>
  </head>
  <body>
    <div class="container my-5">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header text-bg-primary">
              <h3 class="text-center">Teacher Hunt Post</h3>
            </div>
            <div class="card-body">
                <form action="../common/postActions.php" method="post" enctype="multipart/form-data">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="fw-light fst-italic">Details of NGO Activity: </h5>
                        </div>

                        <div class="card-body row">
                            <div class="col-md-4">
                                <input type="hidden" name="name" id="name" value="<?=$_SESSION['uname']?>">

                                <label for="actName" class="form-label">Activity Name: </label>
                                    <input type="text" name="actName" id="actName" class="form-control" placeholder="Eg: Mohalla Classes" autofocus>
                            </div>
                            <div class="col-md-4">
                                <label for="actID" class="form-label">Activity Number: </label>
                                    <input type="text" name="actID" id="actID" class="form-control" placeholder="Eg: MH/99/9999/99">
                            </div>
                            <div class="col-md-4">
                                <label for="actDate" class="form-label">Date of the Activity: </label>
                                    <input type="text" name="actDate" id="actDate" class="form-control" placeholder="Eg: 1st January, 2024">
                            </div>
                            <div class="col-md-12 my-4">
                                <label for="actLoc" class="form-label">Venue of Activity: </label>
                                    <textarea name="actLoc" id="actLoc" class="form-control" row="1" style="resize: none;" placeholder="Eg: Raigad Zilla Parishad Prathmik School"></textarea>
                            </div>
                            <div class="col-md-6">
                                <label for="group" class="form-label">Age group of Learner: </label>
                                    <input type="text" name="group" id="group" class="form-control" placeholder="Eg: 12 - 16 year olds">
                            </div>
                            <div class="col-md-6">
                                <label for="capacity" class="form-label">Number of Learners: </label>
                                    <input type="text" name="capacity" id="capacity" class="form-control" placeholder="Eg: 15 boys and 12 girls" autofocus>
                            </div>
                        </div>
                    </div>


                    <div class="card mt-3">
                        <div class="card-header">
                          <h5 class="fw-light fst-italic">Requirement Details of Teacher: </h5>
                        </div>

                        <div class="card-body row">
                          <div class="col-md-12">
                            <label for="responsibilities" class="form-label">Responsibilities and Duties: </label>
                              <textarea name="responsibilities" id="responsibilities" class="form-control" row="2" style="resize: none;" 
                                placeholder="Mention the responsibilities of the teachers"></textarea>
                          </div>
                              <div class="col-md-12 my-3">
                                <label for="exp" class="form-label">Experience required: </label>
                                <textarea name="exp" id="exp" class="form-control" row="2" style="resize: none;" 
                                    placeholder="Mention the required experience of the teachers"></textarea>
                          </div>
                        </div>
                    </div>

                    <div class="card-body text-center mt-3">
                        <button type="button" class="btn btn-secondary mx-5" data-bs-toggle="modal" data-bs-target="#cancelForm">Cancel</button>
                        <button type="button" class="btn btn-primary mx-5" data-bs-toggle="modal" data-bs-target="#submitForm">Submit</button>
                    </div>


                    <!-- Submit Form Modal -->
                    <div class="modal fade" id="submitForm" tabindex="-1" aria-labelledby="postFormLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="postFormLabel">Post Application</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Confirm posting. Are you sure you want to post?<br>
                                    Click on <strong>'Yes, Finish'</strong> to post.
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-success" name="submit">Yes, Finish</button>
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



    <!-- Cancel Form Submission Modal -->
    <div class="modal fade" id="cancelForm" tabindex="-1" aria-labelledby="postFormLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="postFormLabel">Cancel Posting</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            Your post has not yet been public. Are you sure you want to leave?<br>
            Click on <strong>'Close'</strong> to continue filling the Posting Form.
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <a href="./ngo.php" class="btn btn-danger">Cancel Submission</a>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>


<?php
}
else{
    header("Location:../index.php");
    exit();
}
?>