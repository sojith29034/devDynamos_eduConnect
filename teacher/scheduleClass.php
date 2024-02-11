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
    <title>Schedule Class</title>
</head>
<body>
    <div class="container my-5">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header text-bg-primary">
              <h3 class="text-center">Lecture Details</h3>
            </div>
            <div class="card-body">
                <form action="../common/lectureActions.php" method="post" enctype="multipart/form-data">
                    <div class="card">
                        <div class="card-body row">
                            <div class="col-md-4">
                                <input type="hidden" name="name" id="name" value="<?=$_SESSION['uname']?>">
                                <input type="hidden" name="userLink" id="userLink" value="<?=$_SESSION['userLink']?>">

                                <label for="meetDate" class="form-label">Class Date: </label>
                                    <input type="text" name="meetDate" id="meetDate" class="form-control" placeholder="Eg: 1st January, 2024" autofocus>
                            </div>
                            <div class="col-md-4">
                                <label for="meetTime" class="form-label">Class Time: </label>
                                    <input type="text" name="meetTime" id="meetTime" class="form-control" placeholder="Eg: 4:30 PM (IST)">
                            </div>
                            <div class="col-md-4">
                                <label for="meetDuration" class="form-label">Class Duration: </label>
                                    <input type="text" name="meetDuration" id="meetDuration" class="form-control" placeholder="Eg: 90 mins">
                            </div>
                            <div class="col-md-6 my-4">
                                <label for="meetTopic" class="form-label">Topic of discussion: </label>
                                    <input type="text" name="meetTopic" id="meetTopic" class="form-control" placeholder="Eg: Mathematics" autofocus>
                            </div>
                            <div class="col-md-6 my-4">
                                <label for="meetLink" class="form-label">Class Link: </label> <a target="_blank" href="https://meet.google.com/" class="btn btn-sm btn-primary">Schedule now</a>
                                    <input type="text" name="meetLink" id="meetLink" class="form-control" placeholder="Eg: https://meet.google.com/abc-def-ghi">
                            </div>
                            <div class="col-md-12">
                                <label for="meetDetails" class="form-label">Class Details: </label>
                                    <textarea name="meetDetails" id="meetDetails" class="form-control" row="1" style="resize: none;" placeholder="Eg: Algebra - Quadratic equations, etc . . ."></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="card-body text-center mt-3">
                        <button type="button" class="btn btn-secondary mx-5" data-bs-toggle="modal" data-bs-target="#cancelForm">Cancel</button>
                        <button type="button" class="btn btn-primary mx-5" data-bs-toggle="modal" data-bs-target="#submitForm">Schedule</button>
                    </div>


                    <!-- Submit Form Modal -->
                    <div class="modal fade" id="submitForm" tabindex="-1" aria-labelledby="postFormLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="postFormLabel">Schedule Lecture</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Are you sure you want to schedule this lecture?<br>
                                    Click on <strong>'Yes, Schedule'</strong> to proceed.
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-success" name="schedule">Yes, Schedule</button>
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
            <h1 class="modal-title fs-5" id="postFormLabel">Cancel Schedule</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            Are you sure you want to leave?<br>
            Click on <strong>'Close'</strong> to continue.
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <a href="./teacher.php" class="btn btn-danger">Cancel</a>
        </div>
        </div>
    </div>
    </div>
</body>
</html>


