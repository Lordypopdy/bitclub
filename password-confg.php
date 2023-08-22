<?php
session_start();
include("serverConn/conn.php");
if(isset($_POST["password"])){
    function validate($data){
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $old = validate(md5($_POST['old']));
    $new = validate(md5($_POST['new']));
    $comfirm = validate(md5($_POST['comfirm']));
    $email = $_SESSION['email'];
   if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM login WHERE email='{$email}'"))){
    $row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM login WHERE email='{$email}'"));
    if($row['password'] == $old){
        if($new !== $comfirm){
            header("Location: password.php?bootstrap= Incorrect comfirm password!");
            exit();
        }else{
            if(mysqli_query($conn, "UPDATE login SET password='{$comfirm}'")){
                header("Location: password.php?success= Password has been changed successfuly!");
                exit();
            }else{
                header("Location: password.php?bootstrap= Incorrect comfirm password!");
                exit();
            }
        }
    }else{
        header("Location: password.php?bootstrap= Incorrect old password!");
        exit();
    }
   }else{
    header("Location: password.php?bootstrap= An error has occured please try later!");
    exit();
   }
}else{
    header("Location: password.php");
    exit();
}

?>