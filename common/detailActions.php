<?php
require '../common/connect.php';

session_start();

if(isset($_SESSION['uid']))
{
?>

<!---------------------------------- Add teacher details ----------------------------------->
<?php
if (isset($_POST['submitTeacher'])) {
    $uid = mysqli_real_escape_string($conn, $_POST['uid']);
    $uname = mysqli_real_escape_string($conn, $_POST['uname']);
    $sex = mysqli_real_escape_string($conn, $_POST['sex']);
    $qualifications = mysqli_real_escape_string($conn, $_POST['qualifications']);
    $qualFile = $_FILES['qualFile'];
    $subject = mysqli_real_escape_string($conn, $_POST['subject']);
    $past = mysqli_real_escape_string($conn, $_POST['past']);

    $allowedFileTypes = ['application/pdf'];

    if (!empty($qualFile['tmp_name'])) {
        $qualFileMimeType = mime_content_type($qualFile['tmp_name']);

        if (in_array($qualFileMimeType, $allowedFileTypes)) {
            $qualFile_upload = '../assets/qualifications/' . $qualFile['name'];
            move_uploaded_file($qualFile['tmp_name'], $qualFile_upload);

            $query = "INSERT INTO `teachers` ( `uid`, `uname`, `sex`, `qualifications`, `qualFile`, `subject`, `past`) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";

            $stmt = mysqli_prepare($conn, $query);
            mysqli_stmt_bind_param($stmt, "sssssss", $uid, $uname, $sex, $qualifications, $qualFile_upload, $subject, $past);

            if (mysqli_stmt_execute($stmt)) {
                $_SESSION['successMessage']="Details added Successfully!";
                header("Location:../teacher/teacher.php");
            } else {
                echo "Error: " . mysqli_stmt_error($stmt);
            }
        }else {
            echo "Invalid file type. Please upload files inn PDF format.";
        }
    }else {
        $_SESSION['dangerMessage'] = "Error: Qualification file not found.";
        header("Location: " . $_SERVER['HTTP_REFERER']);
    }
}
?>
<!-----------------X---------------- Add teacher details ----------------X------------------>

<?php
}
else{
    header("Location:../index.php");
    exit();
}
?>