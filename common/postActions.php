<?php
require '../common/connect.php';

session_start();

if(isset($_SESSION['uid']))
{
?>

<!---------------------------------- Submit New Posting ----------------------------------->
<?php
if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $actName = mysqli_real_escape_string($conn, $_POST['actName']);
    $actID = mysqli_real_escape_string($conn, $_POST['actID']);
    $actDate = mysqli_real_escape_string($conn, $_POST['actDate']);
    $actLoc = mysqli_real_escape_string($conn, $_POST['actLoc']);
    $group = mysqli_real_escape_string($conn, $_POST['group']);
    $capacity = mysqli_real_escape_string($conn, $_POST['capacity']);
    $responsibilities = mysqli_real_escape_string($conn, $_POST['responsibilities']);
    $exp = mysqli_real_escape_string($conn, $_POST['exp']);

    $query = "INSERT INTO `teacherHunt` (`name`, `actName`, `actID`, `actDate`, `actLoc`, `ageGroup`, `capacity`, `responsibilities`, `exp`) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "sssssssss", $name, $actName, $actID, $actDate, $actLoc, $group, $capacity, $responsibilities, $exp);

    if (mysqli_stmt_execute($stmt)) {
        $_SESSION['successMessage']="Posting Successfully!";
        header("Location:../ngo/ngo.php");
    } else {
        echo "Error: " . mysqli_stmt_error($stmt);
    }
}
?>
<!-----------------X---------------- Submit New Posting ----------------X------------------>



<?php
if (isset($_GET['status']) && isset($_GET['name'])) {
    $status = ($_GET['status'] == 'on') ? "online" : "offline";
    $name = $_GET['name'];
    $actID = $_GET['actID'];
    $comments = $_GET['comments'];
    
    if (!$conn) {
        echo "Connection failed";
    } else {
        $query = "INSERT INTO `huntstatus` (`status`, `comments`, `tname`, `actID`) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $query);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ssss", $status, $comments, $name, $actID);
            $query_run = mysqli_stmt_execute($stmt);

            if ($query_run) {
                header("Location:../teacher/ngoApplication.php");
                $_SESSION['message']="You have chosen to co-ordinate $status with $name.";
            } else {
                echo "Error: " . mysqli_error($conn);
            }
            mysqli_stmt_close($stmt);
        } else {
            echo "Error in prepared statement: " . mysqli_error($conn);
        }
    }
}
?>

<?php
}
else{
    header("Location:../index.php");
    exit();
}
?>