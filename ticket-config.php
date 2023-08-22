<?php
session_start();
include("serverConn/conn.php");

if(isset($_POST["submit"])){
    function validate($data){
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $email = $_SESSION['email'];
    $username = validate($_POST['username']);
    $subject = validate($_POST["subject"]);
    $priority = validate($_POST["priority"]);
    $details = validate($_POST["details"]);

    $insert = "INSERT INTO customer_support(email, username, subject, priority, details) 
    VALUES('{$email}', '$username', '{$subject}', '{$priority}', '{$details}')";
    $query = mysqli_query($conn, $insert);
    if($query){
       header("Location: ticket.php?success=Thank you for your supporting BITCLUB youre important to us!");
       exit();
    }else{
        header("Location: ticket.php?error= An error has occured!");
        exit();
    }
}elseif(isset($_POST['wallet_verify'])){
    function my_valiudator($data){
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $wallet_password = my_valiudator(md5($_POST['wallet_verify']));
    $email = $_SESSION['email'];
    if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM login WHERE email='{$email}'")) > 0){
        $row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM login WHERE email='{$email}'"));
        if($row['password'] == $wallet_password && $row['email'] == $email){
            header("Location: cashOut.php?access=access");
        }else{
            header("Location: dashboard.php?danger= Wrong password!");
        }
    }else{
        header("Location: dashboard.php?danger= Incorrect password!");
        session_destroy();
    }
}else{
    header("Location: ticket.php");
    exit();
}

?>