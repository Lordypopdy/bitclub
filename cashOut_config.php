<?php
session_start();
require("serverConn/conn.php");
if(isset($_POST['submit'])){
    $amount = mysqli_real_escape_string($conn, $_POST['amount']);
    $addres = mysqli_real_escape_string($conn, $_POST['type']);
    $bank_name = mysqli_real_escape_string($conn, $_POST['bank_name']);
    $acc_number = mysqli_real_escape_string($conn, $_POST['acc_number']);
    $email = $_SESSION['email'];
    if($addres == 'Trading profits.'){
        if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM user_balance WHERE email='{$email}'"))){
            $row_1 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM user_balance WHERE email='{$email}'"));
            if($row_1['acc_balance'] > $amount){
             if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM user_identity WHERE email='{$email}'"))){
                $row_2 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM user_identity WHERE email='{$email}'"));
                if($row_2['verified'] == "VERIFIED"){
                    if($deduct = $row_1['acc_balance'] - $amount){
                        $update_1 = "UPDATE user_balance SET acc_balance='$deduct' WHERE email='$email'";
                        if(!mysqli_query($conn, $update_1)){
                            header("Location: cashOut.php?danger= Fail to proccess transaction please try again!");
                            exit();
                        }else{
                            $status2_select = "UPDATE status_2 SET pending= pending + 1";
                            $query_1 = mysqli_query($conn, $status2_select);
                            if(!$query_1){
                                header('Location: cashOut.php?danger= An error have occured!');
                                exit();           
                            }else{
                                $insert_1 = "INSERT INTO withdrawal_logs(amount, email, method, status, type, bank_name, Account_numb)
                                VALUES('{$amount}', '{$email}', '{$bank_name}', 'PENDING...', '{$bank_name}', '{$bank_name}', '{$acc_number}')";
                                if(!mysqli_query($conn, $insert_1)){
                                    header("Location: cashOut.php?danger= Fail to proccess transaction please try again!");
                                    exit();
                                }else{
                                    header("Location: cashOut.php?success= Withdrawal request has been sent successfuly!!");
                                exit();
                                }
                            }
                        }
                    }else{
                    header("Location: cashOut.php?danger= Transaction error!");
                    exit();
                    }
                }else{
                    header("Location: cashOut.php?danger= This account is unverified kindly verify this account before any transaction will be aproved!");
                    exit();
                }
             }else{
                header("Location: cashOut.php?danger=Error accessing user Identity please try later!");
             }
            }else{
                header("Location: cashOut.php?low_balance= Trading balance is too low for transaction type!");
            exit();    
            }
        }else{
            header("Location: cashOut.php?danger= An error has occured!");
            exit();
        }
    }else{
        if($addres == 'Referral earnings.'){
            if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM user_balance WHERE email='{$email}'"))){
                $row_1 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM user_balance WHERE email='{$email}'"));
                if($row_1['referral_balance'] > $amount){
                    if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM user_identity WHERE email='{$email}'"))){
                        $row_2 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM user_identity WHERE email='{$email}'"));
                        if($row_2['verified'] == "VERIFIED"){
                            if($deduct_1 = $row_1['referral_balance'] - $amount ){
                                $update_1 = "UPDATE user_balance SET referral_balance='$deduct_1' WHERE email='$email'";
                                if(!mysqli_query($conn, $update_1)){
                                    header("Location: cashOut.php?danger= Fail to proccess transaction please try again!");
                                    exit();
                                }else{
                                    $status2_select = "UPDATE status_2 SET pending= pending + 1";
                                    $query_1 = mysqli_query($conn, $status2_select);
                                    if(!$query_1){
                                        header('Location: cashOut.php?danger= An error have occured!');
                                        exit();           
                                    }else{
                                        $insert_1 = "INSERT INTO withdrawal_logs(amount, email, method, status, type, bank_name, Account_numb)
                                        VALUES('{$amount}', '{$email}', '{$bank_name}', 'PENDING...', '{$bank_name}', '{$bank_name}', '{$acc_number}')";
                                        if(!mysqli_query($conn, $insert_1)){
                                            header("Location: cashOut.php?danger= Fail to proccess transaction please try again!");
                                            exit();
                                        }else{
                                            header("Location: cashOut.php?success= Withdrawal request has been sent successfuly!");
                                        exit();
                                        }
                                    }
                                }
                            }else{
                            header("Location: cashOut.php?danger= Transaction error!");
                            exit();
                            } 
                        } else{
                            header("Location: cashOut.php?danger= This account is unverified kindly verify this account before any transaction will be aproved!");
                             exit();
                        }
                    }else{
                        header("Location: cashOut.php?danger=Error accessing user Identity please try later!");
                        exit(); 
                    }
                }else{
                    header("Location: cashOut.php?low_balance= Referral balance is too low for this transation type!");
                exit();    
                }
            }else{
                header("Location: cashOut.php?danger= An error has occured!");
                exit();
            }
        }else{
            header("Location: cashOut.php?danger= Insuficient fund!");
            exit();
        }
    }
}else{
    header('Location: cashOut.php');
    exit();
}
/*$insert = "INSERT INTO withdrawal_logs(amount, email, method, status, type, bank_name, Account_numb)
VALUES('{$amount}', '{$email}', '{$bank_name}', 'PENDING...', '{$addres}', '{$bank_name}', '{$acc_number}')"; */










/*if($deduct = $row['acc_balance'] - $amount){
    $update_1 = "UPDATE user_balance SET acc_balance='$deduct' WHERE email='$email'";
    if(!mysqli_query($conn, $update_1)){
        header("Location: cashOut.php?danger= Fail to proccess transaction please try again!");
        exit();
    }else{
        $status2_select = "UPDATE status_2 SET pending= pending + 1";
        $query_1 = mysqli_query($conn, $status2_select);
        if(!$query_1){
            header('Location: cashOut.php?danger= An error have occured!');
            exit();           
        }else{
            $insert_1 = "INSERT INTO withdrawal_logs(amount, email, method, status, type, bank_name, Account_numb)
            VALUES('{$amount}', '{$email}', '{$bank_name}', 'PENDING...', '{$bank_name}', '{$bank_name}', '{$acc_number}')";
            if(!mysqli_query($conn, $insert_1)){
                header("Location: cashOut.php?danger= Fail to proccess transaction please try again!");
                exit();
            }else{
                header("Location: cashOut.php?success= Withdrawal can take up 12hrs before aproval!");
            exit();
            }
        }
    }
}else{
header("Location: cashOut.php?danger= Transaction error!");
exit();
}*/

?>