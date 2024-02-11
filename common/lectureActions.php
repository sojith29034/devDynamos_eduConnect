<?php
require '../common/connect.php';

session_start();

if(isset($_SESSION['uid']))
{
?>

<!---------------------------------- Schedule New Class ----------------------------------->
<?php
if (isset($_POST['schedule'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $meetDate = mysqli_real_escape_string($conn, $_POST['meetDate']);
    $meetTime = mysqli_real_escape_string($conn, $_POST['meetTime']);
    $meetDuration = mysqli_real_escape_string($conn, $_POST['meetDuration']);
    $meetTopic = mysqli_real_escape_string($conn, $_POST['meetTopic']);
    $meetLink = mysqli_real_escape_string($conn, $_POST['meetLink']);
    $meetDetails = mysqli_real_escape_string($conn, $_POST['meetDetails']);
    $userLink = mysqli_real_escape_string($conn, $_POST['userLink']);

    $query = "INSERT INTO `classSchedule` (`name`, `meetDate`, `meetTime`, `meetDuration`, `meetTopic`, `meetLink`, `meetDetails`, `userLink`) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ssssssss", $name, $meetDate, $meetTime, $meetDuration, $meetTopic, $meetLink, $meetDetails, $userLink);

    if (mysqli_stmt_execute($stmt)) {
        $_SESSION['successMessage']="Class has been Scheduled Successfully!";
        header("Location:../teacher/teacher.php");
    } else {
        echo "Error: " . mysqli_stmt_error($stmt);
    }
}
?>
<!-----------------X---------------- Schedule New Class ----------------X------------------>



<?php
}
else{
    header("Location:../index.php");
    exit();
}
?>