<?php
require 'connect.php';

session_start();
?>



<!---------------------------------- User Register ----------------------------------->
<?php
    if(isset($_POST['register'])):
        $uname = $_POST["uname"];
        $uid = $_POST["userID"];
        $role = $_POST["role"];
        $pw = $_POST["pwd"];
        $rpw = $_POST["rpwd"];

        if(empty($uname)){
            header("Location:../register.php?error=Username Required.");
            exit();
        }
        else if(empty($uid)){
            header("Location:../register.php?error=User ID Required.");
            exit();
        }
        else if(empty($pw)){
            header("Location:../register.php?error=Password Required.");
            exit();
        }
        else if(empty($rpw)){
            header("Location:../register.php?error=Repeat Password.");
            exit();
        }
        else{
            $stmt = $conn->prepare("insert into login(uname, uid, role, pw, rpw)
            values (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss",$uname,$uid,$role,$pw,$rpw);
            $stmt->execute();
            $stmt->close();

            if($role=='Student'){
                $_SESSION['uname']=$uname;
                $_SESSION['uid']=$uid;
                $_SESSION['loginMessage']="Registration Successfully";
                header("Location:../student/student.php");
                exit();
            }
            else if($role=='Teacher'){
                $_SESSION['uname']=$uname;
                $_SESSION['uid']=$uid;
                $_SESSION['loginMessage']="Registration Successfully";
                header("Location:../teacher/");
                exit();
            }
            else if($role=='NGO'){
                $_SESSION['uname']=$uname;
                $_SESSION['uid']=$uid;
                $_SESSION['loginMessage']="Registration Successfully";
                header("Location:../ngo/");
                exit();
            }
            exit();
            $conn->close();
        }
    endif;
?>
<!-----------------X---------------- User Register ----------------X------------------>


<!---------------------------------- User Login ----------------------------------->
<?php
if(isset($_POST['login']) && isset($_POST['userID']) && isset($_POST['pwd'])){
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
                
                $details = "SELECT * FROM teachers WHERE uid='$uid'";
                $run_details = mysqli_query($conn, $details);
                if(mysqli_num_rows($run_details) == 1):
                    $teacher_row = mysqli_fetch_assoc($run_details);
                    header("Location:../teacher/teacher.php");
                else:
                    header("Location:../teacher/");
                endif;
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

                $details = "SELECT * FROM ngos WHERE uid='$uid'";
                $run_details = mysqli_query($conn, $details);
                if(mysqli_num_rows($run_details) == 1):
                    $ngo_row = mysqli_fetch_assoc($run_details);
                    header("Location:../ngo/ngo.php");
                else:
                    header("Location:../ngo/");
                endif;
                exit();
            }
            else if($row['role']=='Administrator' && $row['uid']==$uid && $row['pw']==$pwd){
                $_SESSION['uname']=$row['uname'];
                $_SESSION['uid']=$row['uid'];
                $_SESSION['loginMessage']="Logged in Successfully";
                header("Location:../admin/admin.php");
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
<!-----------------X---------------- User Login ----------------X------------------>