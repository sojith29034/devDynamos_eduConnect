<?php
require 'connect.php';

session_start();
?>


<?php
if(isset($_POST['userID']) && isset($_POST['pwd'])){
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data, ENT_QUOTES);
        return $data;
    }

    $uid = validate($_POST["userID"]);
    $pwd = validate($_POST["pwd"]);

    if(empty($uid)){
        header("Location:../index.php?error=User ID Required.");
        exit();
    }
    else if(empty($pwd)){
        header("Location:../index.php?error=Password Required.");
        exit();
    }
    else{
        $sql = "SELECT * FROM login WHERE uid='$uid' AND pw='$pwd'";

        $result = mysqli_query($conn,$sql);

        if(mysqli_num_rows($result)==1){
            $row = mysqli_fetch_assoc($result);

            if($row['role']=='Teacher' && $row['uid']==$uid && $row['pw']==$pwd){
                $_SESSION['uname']=$row['uname'];
                $_SESSION['uid']=$row['uid'];
                $userLink=$row['userLink'];
                $_SESSION['userLink']=$userLink;
                $_SESSION['loginMessage']="Logged in Successfully";
                header("Location:../teacher/teacher.php");
                exit();
            }
            else if($row['role']=='Student' && $row['uid']==$uid && $row['pw']==$pwd){
                $_SESSION['uname']=$row['uname'];
                $_SESSION['uid']=$row['uid'];
                $_SESSION['loginMessage']="Logged in Successfully";
                header("Location:../student/student.php");
                exit();
            }
            else if($row['role']=='NGO' && $row['uid']==$uid && $row['pw']==$pwd){
                $_SESSION['uname']=$row['uname'];
                $_SESSION['uid']=$row['uid'];
                $_SESSION['loginMessage']="Logged in Successfully";
                header("Location:../ngo/ngo.php");
                exit();
            }
            else{
                header("Location:../index.php?error=Incorrect User ID or Password.");
                exit();
            }
        }
        else{
            header("Location:../index.php?error=Incorrect User ID or Password.");
            exit();
        }
    }
}
else{
    header("Location:../index.php");
    exit();
}
?>