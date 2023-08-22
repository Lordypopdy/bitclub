<?php
    session_start();
include('serverConn/conn.php');
if(isset($_POST['submit'])){
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $password = mysqli_real_escape_string($conn, md5($_POST['password']));
   $check = "SELECT * FROM login WHERE email='{$email}' AND password='{$password}'";
   $result = mysqli_query($conn, $check);
   if(mysqli_num_rows($result) === 1){
            $row = mysqli_fetch_assoc($result);
            $_SESSION['email'] = $row['email'];
            $_SESSION['id'] = $row['id'];
    if(empty($row['code'])){
        header('Location: dashboard.php');
    }else{
        header('Location: login.php?info= First verify your account and try again.');
    }
   }else{
    header('Location: login.php?danger= Incorrect email or password!');
    exit();
   }
}elseif(isset($_POST['message'])){
   $name = mysqli_real_escape_string($conn, $_POST["full_name"]);
   $email_2 = mysqli_real_escape_string($conn, $_POST['email']);
   $subject = mysqli_real_escape_string($conn, $_POST['subject']);
   $other_text = mysqli_real_escape_string($conn, $_POST['other_text']);
    if($name && $email_2 && $subject && $other_text){
        if(mysqli_query($conn, "INSERT INTO client_contact(full_name, email, subject, other)
        VALUES('{$name}', '{$email_2}', '{$subject}', '{$other_text}')")){
             header("Location: index.php?success= Thank you for contacting BITCLUB you will recieve a response in your E-mail shortly!");
             exit();
        }else{
            header("Location: index.php?danger= An error has occured contacting BITCLUB pls try later!");
            exit();
        }
    }else{
        header("Location: index.php?danger= An error has occured contacting pls try later!");
        exit();
    }
}elseif(isset($_POST['forgot-password'])){
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $question = mysqli_real_escape_string($conn, $_POST['question']);
    $answer = mysqli_real_escape_string($conn, $_POST['answer']);
    $password = mysqli_real_escape_string($conn, md5($_POST['new_password']));
    if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM signup WHERE email='{$email}'")) > 0){
        $row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM signup WHERE email='{$email}'"));
        if($row['email'] == $email){
            if($row['recover_qst'] == $question && $row['recover_answ'] == $answer){
                $update = "UPDATE login SET password='{$password}' WHERE email='{$email}'";
                if(mysqli_query($conn, $update)){
                    header("Location: login.php?info= Your password has been resset successfully kindly signin account!");
                    exit();
                }else{
                    header("Location: forgot-password.php?danger= An error has occured please try later!");
                    exit();
                }
            }else{
                header("Location: forgot-password.php?danger= Incorrect recover question or answer!");
                exit(); 
            }
        }else{
            header("Location: forgot-password.php?danger= This E-mail $email doese not exist!");
            exit();
        }
    }else{
        header("Location: forgot-password.php?danger= This E-mail $email doese not exist!");
        exit();
    }
   
}elseif(isset($_POST['forgot-question'])){
    $question = mysqli_real_escape_string($conn, $_POST['question']);
    $answer = mysqli_real_escape_string($conn, $_POST['answer']);
    $email = $_SESSION['email'];
    $insert = "UPDATE signup SET recover_qst='$question', recover_answ='{$answer}' WHERE email='$email'";
    if(mysqli_query($conn, $insert)){
        header("Location: login.php?info= Recover question has been submited successfully kindly sigin your account!");
        exit();
    }else{
        header("Location: login.php");
        exit();
    }

}else{
    header('Location: login.php');
    exit();
}

?>