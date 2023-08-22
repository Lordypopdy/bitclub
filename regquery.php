<?php 
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST"){
    function validate($data){
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $fname = validate($_POST["first_name"]);
    $sname = validate($_POST["sur_name"]);
    $email = validate($_POST["email"]);
    $tel = validate($_POST["tel"]);
    $password1 = validate($_POST["password1"]);
    $password2 = validate($_POST["password2"]);

    if(empty($fname)){
        header("Location:register.php?error= First name is required!");
        exit();
    }elseif(empty($sname)){
        header("Location:register.php?error= Surname is required!");
        exit();
    }elseif(empty($email)){
        header("Location:register.php?error= Email is required!");
        exit();
    }elseif(empty($tel)){
        header("Location:register.php?error= Phone number is required!");
        exit();
    }elseif(empty($password1)){
        header("Location:register.php?error= Password is required!");
        exit();
    }elseif(empty($password2)){
        header("Location:register.php?error= Incorrect comfirm password!");
        exit();
    }elseif($password1 !== $password2){
        header("Location:register.php?error= Incorrect comfirm password!");
        exit();
    }
    else{
        header("Location: dashboard.php");
    }
}else{
    header("Location: login.php");
    exit();
}








?>