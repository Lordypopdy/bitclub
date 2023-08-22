<?php 
session_start();
require('serverConn/conn.php');

if(isset($_POST['submit'])){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $amount = mysqli_real_escape_string($conn, $_POST['amount']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);

    $email = $_SESSION['email'];
    $select = "SELECT * FROM user_balance WHERE email='{$email}'";
    if(mysqli_num_rows(mysqli_query($conn, $select))){
        $row = mysqli_fetch_assoc(mysqli_query($conn, $select));
        if($row['acc_balance'] > 0){
            $insert = "INSERT INTO shared_record(email, name, amount, reciever_address)
            VALUES('{$email}', '{$name}', '{$amount}', '{$address}')";
            if(mysqli_query($conn, $insert)){
                header('Location: share.php?success= Transaction successfull!');
            exit();
            }else{
                header('Location: share.php?danger= Transaction failed!');
        exit();        
            }
        }else{
            header('Location: share.php?danger= Insufficient fund!');
            exit();
        }
    }else{
        header('Location: share.php?danger= An error has occured!');
        exit();
    }
}else{
    header('Location: share.php');
    exit();
}

?>