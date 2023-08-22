<?php
session_start();
require("serverConn/conn.php");

if(isset($_POST['gold'])){
    $amount_1= mysqli_real_escape_string($conn, $_POST['amount']);
    $email = $_SESSION['email'];
   if($amount_1 == 30000){
    $select_1 = "SELECT * FROM user_balance WHERE email='{$email}'";
    if(mysqli_num_rows(mysqli_query($conn, $select_1))){
        $row_1 = mysqli_fetch_assoc(mysqli_query($conn, $select_1));
        if($row_1['acc_balance'] >= 30000){
            $deduct_1 = $row_1['acc_balance'];
            if(filter_var($deduct_1, FILTER_VALIDATE_INT)){
                $update_1 = "UPDATE user_balance SET acc_balance='{$deduct_1}' WHERE email = '{$email}'";
                if(mysqli_query($conn, $update_1)){
                    $timer_gold = date(date("y-m-d", strtotime(date("y-m-d", strtotime(date("y-m-d"))) . " - 1 day")));
                    $insert_1 = "INSERT INTO plans_logs(plan_type, timer, email, amount, duration, status)
                    VALUES('GOLD PARK', '$timer_gold', '{$email}', '{$amount_1}', 'For 4 month(s)', 'Active')";
                    if(mysqli_query($conn, $insert_1)){
                        if(mysqli_query($conn, "UPDATE signup SET active_plan='GOLD PARK' WHERE email='{$email}'")){
                           if(mysqli_query($conn, "UPDATE active_plan SET active_plan=active_plan+1")){
                             header("Location: plans.php?success= You have successfully activate GOLD PARK!");
                           } 
                        }else{
                            header("Location: plans.php?danger= Unable to update signup table!");
                        }
                    }else{
                        header("Location: plans.php?danger= Purchase error!");
                    die();
                    }
                }else{
                    header("Location: plans.php?danger= An error has occured!");
                    die();
                }
            }else{
                header("Location: plans.php?danger= An error has occured!");
                die();
            }
        }else{
            header("Location: plans.php?low_balance= Your balance is too low for GOLD PARK activation!");
            exit();
        }
    }else{
        header("Location: plans.php?danger= An error has occured!");
        die();
    }
   }else{
       header("Location: plans.php?danger= Invalid input!");
       exit();
   }
}elseif(isset($_POST['premium'])){
    $email = $_SESSION['email'];
    $amount_2 = mysqli_real_escape_string($conn, $_POST['amount']);
    $select_2 = "SELECT * FROM user_balance WHERE email='{$email}'";
    if($amount_2 == 15000){
        $select_2 = "SELECT * FROM user_balance WHERE email='{$email}'";
        if(mysqli_num_rows(mysqli_query($conn, $select_2))){
            $row_2 = mysqli_fetch_assoc(mysqli_query($conn, $select_2));
            if($row_2['acc_balance'] >= 15000){
                $deduct_2 = $row_2['acc_balance'];
                if(filter_var($deduct_2, FILTER_VALIDATE_INT)){
                    $update_2 = "UPDATE user_balance SET acc_balance='{$deduct_2}' WHERE email = '{$email}'";
                    if(mysqli_query($conn, $update_2)){
                        $timer_premium = date(date("y-m-d", strtotime(date("y-m-d", strtotime(date("y-m-d"))) . " - 1 day")));
                        $insert_2 = "INSERT INTO plans_logs(plan_type, timer, email, amount, duration, status)
                        VALUES('PREMIUM PARK', '{$timer_premium}', '{$email}', '{$amount_2}', 'For 3 month(s)', 'Active')";
                        if(mysqli_query($conn, $insert_2)){
                            if(mysqli_query($conn, "UPDATE signup SET active_plan='PREMIUM PARK' WHERE email='{$email}'")){
                                if(mysqli_query($conn, "UPDATE active_plan SET active_plan=active_plan+1")){
                                    header("Location: plans.php?success= You have successfully activate PREMIUM PARK!");
                                  } 
                            }else{
                                header("Location: plans.php?danger= Unable to update signup table!"); 
                            }
                        }else{
                            header("Location: plans.php?danger= Purchase error!");
                        die();
                        }
                    }else{
                        header("Location: plans.php?danger= An error has occured!");
                        die();
                    }
                }else{
                    header("Location: plans.php?danger= An error has occured!");
                    die();
                }
            }else{
                header("Location: plans.php?low_balance= Your balance is too low for PREMIUM PARK! activation!");
                exit();
            }
        }else{
            header("Location: plans.php?danger= An error has occured!");
            die();
        }
       }else{
           header("Location: plans.php?danger= Invalid input!");
           exit();
       }
}elseif(isset($_POST['starter'])){
    $email = $_SESSION['email'];
    $amount_3 = mysqli_real_escape_string($conn, $_POST['amount']);
    $select_3 = "SELECT * FROM user_balance WHERE email='{$email}'";
    if($amount_3 == 5000){
        $select_3 = "SELECT * FROM user_balance WHERE email='{$email}'";
        if(mysqli_num_rows(mysqli_query($conn, $select_3))){
            $row_3 = mysqli_fetch_assoc(mysqli_query($conn, $select_3));
            if($row_3['acc_balance'] >= 5000){
                $deduct_3 = $row_3['acc_balance'];
                if(filter_var($deduct_3, FILTER_VALIDATE_INT)){
                    $update_3 = "UPDATE user_balance SET acc_balance='{$deduct_3}' WHERE email = '{$email}'";
                    if(mysqli_query($conn, $update_3)){
                        $timer_starter = date(date("y-m-d", strtotime(date("y-m-d", strtotime(date("y-m-d"))) . " - 1 day")));
                        $insert_3 = "INSERT INTO plans_logs(plan_type, timer, email, amount, duration, status)
                        VALUES('STARTER PARK','{$timer_starter}', '{$email}', '{$amount_3}', 'For 2 month(s)', 'Active')";
                        if(mysqli_query($conn, $insert_3)){
                            if(mysqli_query($conn, "UPDATE signup SET active_plan='STARTER PARK' WHERE email='{$email}'")){
                                if(mysqli_query($conn, "UPDATE active_plan SET active_plan=active_plan+1")){
                                    header("Location: plans.php?success= You have successfully activate STARTER PARK!");
                                  }
                            }else{
                                header("Location: plans.php?danger= Unable to update signup table!");
                            }
                        }else{
                            header("Location: plans.php?danger= Purchase error!");
                        die();
                        }
                    }else{
                        header("Location: plans.php?danger= An error has occured!");
                        die();
                    }
                }else{
                    header("Location: plans.php?danger= An error has occured!");
                    die();
                }
            }else{
                header("Location: plans.php?low_balance= Your balance is too low for STARTER PARK activation!");
                exit();
            }
        }else{
            header("Location: plans.php?danger= An error has occured!");
            die();
        }
       }else{
           header("Location: plans.php?danger= Invalid input!");
           exit();
       }
}elseif(isset($_POST['diamond'])){
    $email = $_SESSION['email'];
    $amount_4 = mysqli_real_escape_string($conn, $_POST['amount']);
    $select_4 = "SELECT * FROM user_balance WHERE email='{$email}'";
    if($amount_4 == 54000){
        $select_4 = "SELECT * FROM user_balance WHERE email='{$email}'";
        if(mysqli_num_rows(mysqli_query($conn, $select_4))){
            $row_4 = mysqli_fetch_assoc(mysqli_query($conn, $select_4));
            if($row_4['acc_balance'] >= 54000){
                $deduct_4 = $row_4['acc_balance'];
                if(filter_var($deduct_4, FILTER_VALIDATE_INT)){
                    $update_4 = "UPDATE user_balance SET acc_balance='{$deduct_4}' WHERE email = '{$email}'";
                    if(mysqli_query($conn, $update_4)){
                        $timer_diamond = date(date("y-m-d", strtotime(date("y-m-d", strtotime(date("y-m-d"))) . " - 1 day")));
                        $insert_4 = "INSERT INTO plans_logs(plan_type, timer, email, amount, duration, status)
                        VALUES('DIAMOND PARK', '{$timer_diamond}', '{$email}', '{$amount_4}', 'For 5 month(s)', 'Active')";
                        if(mysqli_query($conn, $insert_4)){
                            if(mysqli_query($conn, "UPDATE signup SET active_plan='DIAMOND PARK' WHERE email='{$email}'")){
                            if(mysqli_query($conn, "UPDATE active_plan SET active_plan=active_plan+1")){
                                header("Location: plans.php?success= You have successfully activate DIAMOND PARK!");
                                }
                            }
                        }else{
                            header("Location: plans.php?danger= Purchase error!");
                        die();
                        }
                    }else{
                        header("Location: plans.php?danger= An error has occured!");
                        die();
                    }
                }else{
                    header("Location: plans.php?danger= An error has occured!");
                    die();
                }
            }else{
                header("Location: plans.php?low_balance= Your balance is too low for DIAMOND PARK activation!");
                exit();
            }
        }else{
            header("Location: plans.php?danger= An error has occured!");
            die();
        }
       }else{
           header("Location: plans.php?danger= Invalid input!");
           exit();
       }
}elseif(isset($_POST['silver'])){
    $email = $_SESSION['email'];
    $amount_5 = mysqli_real_escape_string($conn, $_POST['amount']);
    $select_5 = "SELECT * FROM user_balance WHERE email='{$email}'";
    if($amount_5 == 74000){
        $select_5 = "SELECT * FROM user_balance WHERE email='{$email}'";
        if(mysqli_num_rows(mysqli_query($conn, $select_5))){
            $row_5 = mysqli_fetch_assoc(mysqli_query($conn, $select_5));
            if($row_5['acc_balance'] >= 74000){
                $deduct_5 = $row_5['acc_balance'];
                if(filter_var($deduct_5, FILTER_VALIDATE_INT)){
                    $update_5 = "UPDATE user_balance SET acc_balance='{$deduct_5}' WHERE email = '{$email}'";
                    if(mysqli_query($conn, $update_5)){
                        $timer_silver = date(date("y-m-d", strtotime(date("y-m-d", strtotime(date("y-m-d"))) . " - 1 day")));
                        $insert_5 = "INSERT INTO plans_logs(plan_type, timer, email, amount, duration, status)
                        VALUES('SILVER PARK', '{$timer_silver}', '{$email}', '{$amount_5}', 'For 7 month(s)', 'Active')";
                        if(mysqli_query($conn, $insert_5)){
                            if(mysqli_query($conn, "UPDATE signup SET active_plan='SILVER PARK' WHERE email='{$email}'")){
                            if(mysqli_query($conn, "UPDATE active_plan SET active_plan=active_plan+1")){
                                header("Location: plans.php?success= You have successfully activate SILVER PARK!");
                                }
                            }
                        }else{
                            header("Location: plans.php?danger= Activation error!");
                        die();
                        }
                    }else{
                        header("Location: plans.php?danger= An error has occured!");
                        die();
                    }
                }else{
                    header("Location: plans.php?danger= An error has occured!");
                    die();
                }
            }else{
                header("Location: plans.php?low_balance= Your balance is too low for SILVER PARK activation!");
                exit();
            }
        }else{
            header("Location: plans.php?danger= An error has occured!");
            die();
        }
       }else{
           header("Location: plans.php?danger= Invalid input!");
           exit();
       }
}elseif(isset($_POST['platinum'])){
    $email = $_SESSION['email'];
    $amount_6 = mysqli_real_escape_string($conn, $_POST['amount']);
    $select_6 = "SELECT * FROM user_balance WHERE email='{$email}'";
    if($amount_6 == 122000){
        $select_6 = "SELECT * FROM user_balance WHERE email='{$email}'";
        if(mysqli_num_rows(mysqli_query($conn, $select_6))){
            $row_6 = mysqli_fetch_assoc(mysqli_query($conn, $select_6));
            if($row_6['acc_balance'] >= 122000){
                $deduct_6 = $row_6['acc_balance'];
                if(filter_var($deduct_6, FILTER_VALIDATE_INT)){
                    $update_6 = "UPDATE user_balance SET acc_balance='{$deduct_6}' WHERE email = '{$email}'";
                    if(mysqli_query($conn, $update_6)){
                        $timer_platinum = date(date("y-m-d", strtotime(date("y-m-d", strtotime(date("y-m-d"))) . " - 1 day")));
                        $insert_6 = "INSERT INTO plans_logs(plan_type, timer, email, amount, duration, status)
                        VALUES('PLATINUM PARK', '{$timer_platinum}', '{$email}', '{$amount_6}', 'For 10 month(s)', 'Active')";
                        if(mysqli_query($conn, $insert_6)){
                            if(mysqli_query($conn, "UPDATE signup SET active_plan='PLATINUM PARK' WHERE email='{$email}'")){
                            if(mysqli_query($conn, "UPDATE active_plan SET active_plan=active_plan+1")){
                                header("Location: plans.php?success= You have successfully activate PLATINUM PARK!");
                                }
                            }
                        }else{
                            header("Location: plans.php?danger= Activation error!");
                        die();
                        }
                    }else{
                        header("Location: plans.php?danger= An error has occured!");
                        die();
                    }
                }else{
                    header("Location: plans.php?danger= An error has occured!");
                    die();
                }
            }else{
                header("Location: plans.php?danger= Account balance is too low for this transation type!");
                exit();
            }
        }else{
            header("Location: plans.php?danger= An error has occured!");
            die();
        }
       }else{
           header("Location: plans.php?danger= Invalid input!");
           exit();
       }
}elseif(isset($_POST['master'])){
    $email = $_SESSION['email'];
    $amount_7 = mysqli_real_escape_string($conn, $_POST['amount']);
    $select_7 = "SELECT * FROM user_balance WHERE email='{$email}'";
    if($amount_7 == 185000){
        $select_7 = "SELECT * FROM user_balance WHERE email='{$email}'";
        if(mysqli_num_rows(mysqli_query($conn, $select_7))){
            $row_7 = mysqli_fetch_assoc(mysqli_query($conn, $select_7));
            if($row_7['acc_balance'] >= 185000){
                $deduct_7 = $row_7['acc_balance'];
                if(filter_var($deduct_7, FILTER_VALIDATE_INT)){
                    $update_7 = "UPDATE user_balance SET acc_balance='{$deduct_7}' WHERE email = '{$email}'";
                    if(mysqli_query($conn, $update_7)){
                        $timer_master = date(date("y-m-d", strtotime(date("y-m-d", strtotime(date("y-m-d"))) . " - 1 day")));
                        $insert_7 = "INSERT INTO plans_logs(plan_type, timer, email, amount, duration, status)
                        VALUES('MASTER PARK', '{$timer_master}', '{$email}', '{$amount_7}', 'For 9 month(s)', 'Active')";
                        if(mysqli_query($conn, $insert_7)){
                            if(mysqli_query($conn, "UPDATE signup SET active_plan='MASTER PARK' WHERE email='{$email}'")){
                            if(mysqli_query($conn, "UPDATE active_plan SET active_plan=active_plan+1")){
                                header("Location: plans.php?success= You have successfully activate MASTER PARK!");
                                }
                            }
                        }else{
                            header("Location: plans.php?danger= Activation error!");
                        die();
                        }
                    }else{
                        header("Location: plans.php?danger= An error has occured!");
                        die();
                    }
                }else{
                    header("Location: plans.php?danger= An error has occured!");
                    die();
                }
            }else{
                header("Location: plans.php?low_balance= Your balance is too low for MASTER PARK! activation!");
                exit();
            }
        }else{
            header("Location: plans.php?danger= An error has occured!");
            die();
        }
       }else{
           header("Location: plans.php?danger= Invalid input!");
           exit();
       }
}elseif(isset($_POST['supper'])){
    $email = $_SESSION['email'];
    $amount_8 = mysqli_real_escape_string($conn, $_POST['amount']);
    $select_8 = "SELECT * FROM user_balance WHERE email='{$email}'";
    if($amount_8 == 225000){
        $select_8 = "SELECT * FROM user_balance WHERE email='{$email}'";
        if(mysqli_num_rows(mysqli_query($conn, $select_8))){
            $row_8 = mysqli_fetch_assoc(mysqli_query($conn, $select_8));
            if($row_8['acc_balance'] >= 225000){
                $deduct_8 = $row_8['acc_balance'];
                if(filter_var($deduct_8, FILTER_VALIDATE_INT)){
                    $update_8 = "UPDATE user_balance SET acc_balance='{$deduct_8}' WHERE email = '{$email}'";
                    if(mysqli_query($conn, $update_8)){
                        $timer_supper = date(date("y-m-d", strtotime(date("y-m-d", strtotime(date("y-m-d"))) . " - 1 day")));
                        $insert_8 = "INSERT INTO plans_logs(plan_type, timer, email, amount, duration, status)
                        VALUES('SUPPER PARK', '{$timer_supper}', '{$email}', '{$amount_8}', 'For 12 month(s)', 'Active')";
                        if(mysqli_query($conn, $insert_8)){
                            if(mysqli_query($conn, "UPDATE signup SET active_plan='SUPPER PARK' WHERE email='{$email}'")){
                            if(mysqli_query($conn, "UPDATE active_plan SET active_plan=active_plan+1")){
                                header("Location: plans.php?success= You have successfully activate SUPPER PARK!");
                                }
                            }
                        }else{
                            header("Location: plans.php?danger= Activation error!");
                        die();
                        }
                    }else{
                        header("Location: plans.php?danger= An error has occured!");
                        die();
                    }
                }else{
                    header("Location: plans.php?danger= An error has occured!");
                    die();
                }
            }else{
                header("Location: plans.php?low_balance= Your balance is too low for SUPPER PARK! activation!");
                exit();
            }
        }else{
            header("Location: plans.php?danger= An error has occured!");
            die();
        }
       }else{
           header("Location: plans.php?danger= Invalid input!");
           exit();
       }
}elseif(isset($_POST['update'])){
    function validate($data){
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return($data);
    }
    $plan_name = validate($_POST['plan_name']);
    $item_to_change = validate($_POST['old']);
    $set = validate($_POST['new']);
    if($plan_name && $item_to_change && $set){
        $update_9 = "UPDATE plans SET $item_to_change ='{$set}' WHERE plan_name='{$plan_name}'";
        if(mysqli_query($conn, $update_9)){
            header("Location: admin-plans.php?success= Plan activation was successful.");
            exit();
        }else{
            header("Location: admin-plans.php?danger= Fail to update plan");
            exit();
        }
    }else{
        header("Location: admin-plans.php?danger= An error has occured!");
        exit();
    }
}else{
    header('Location: plans.php');
    exit();
}

?>