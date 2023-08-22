<?php 
session_start();
require("serverConn/conn.php");

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $email = $_SESSION['email'];
    if(isset($_POST['grinding'])){
        $plan_type = mysqli_real_escape_string($conn, $_POST['plan_type']);
        if($plan_type == "STARTER PARK"){
            if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM plans_logs WHERE email='{$email}' AND plan_type='STARTER PARK'"))){
                $row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM plans_logs WHERE email='{$email}' AND plan_type='STARTER PARK'"));
                $end_date = date("y-m-d", strtotime(date("y-m-d", strtotime($row['reg_date'])) . " + 60 day"));
                $today_date = date("y-m-d", strtotime(date("y-m-d", strtotime(date("y-m-d")))));
                $timer = date("y-m-d", strtotime(date("y-m-d", strtotime($row['timer'] ))));
                if($today_date < $end_date){
                    if($today_date > $timer){
                        if($row['status'] == "Active"){
                           if(mysqli_query($conn, "UPDATE plans_logs SET timer='{$today_date}' WHERE email='{$email}' AND plan_type='STARTER PARK'")){
                            if(mysqli_query($conn, "UPDATE user_balance SET acc_balance= acc_balance + 100 WHERE email='{$email}'")){
                                header("Location: dashboard.php?success= Today`s grinding has been completly successfuly!");
                                exit();
                            }else{
                                header("Location: dashboard.php?empty_plan=Your plan has expired! and you kindly do not have any active plan to grind!");
                                exit();
                            }
                           }else{
                            header("Location: dashboard.php?danger=Somthing went wrong please try later");
                            exit();
                           }
                        }else{
                            header("Location: dashboard.php?empty_plan=Your plan has expired! and you kindly do not have any active plan to grind!");
                            exit();
                        }
                    }else{
                        header("Location: dashboard.php?danger= Today`s grinding has been completed!");
                        exit();
                    }
                }else{
                    if(mysqli_query($conn, "UPDATE plans_logs SET status='EXPIRED' WHERE email='{$email}' AND plan_type='STARTER PARK'")){
                        if(mysqli_query($conn, "UPDATE active_plan SET active_plan=active_plan-1 WHERE id=1")){
                            header("Location: dashboard.php?empty_plan= Plan (STARTER PAKR) has expired!!! please activate a plan to continue!");
                            exit();
                        }else{
                            header("Location: dashboard.php?danger=Unable to update EXPIRED please try later!");
                            exit();    
                        }
                    }else{
                        header("Location: dashboard.php?danger=Somthing went wrong please try later");
                        exit();
                    }
                }
            }else{
                header("Location: dashboard.php?empty_plan=This plan ($plan_type) has not been activated!");
            }
        }elseif($plan_type == "PREMIUM PARK"){
            if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM plans_logs WHERE email='{$email}' AND plan_type='PREMIUM PARK'"))){
                $row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM plans_logs WHERE email='{$email}' AND plan_type='PREMIUM PARK'"));
                $end_date = date("y-m-d", strtotime(date("y-m-d", strtotime($row['reg_date'])) . " + 90 day"));
                $today_date = date("y-m-d", strtotime(date("y-m-d", strtotime(date("y-m-d")))));
                $timer = date("y-m-d", strtotime(date("y-m-d", strtotime($row['timer'] ))));
                if($today_date < $end_date){
                    if($today_date > $timer){
                        if($row['status'] == "Active"){
                           if(mysqli_query($conn, "UPDATE plans_logs SET timer='{$today_date}' WHERE email='{$email}'AND plan_type='PREMIUM PARK' ")){
                            if(mysqli_query($conn, "UPDATE user_balance SET acc_balance= acc_balance + 200 WHERE email='{$email}'")){
                                header("Location: dashboard.php?success= Today`s grinding has been completly successfuly!");
                                exit();
                            }else{
                                header("Location: dashboard.php?empty_plan=Your plan has expired! and you kindly do not have any active plan to grind!");
                                exit();
                            }
                           }else{
                            header("Location: dashboard.php?danger=Somthing went wrong please try later");
                            exit();
                           }
                        }else{
                            header("Location: dashboard.php?empty_plan=Your plan has expired! and you kindly do not have any active plan to grind!");
                            exit();
                        }
                    }else{
                        header("Location: dashboard.php?danger= Today`s grinding has been completed!");
                        exit();
                    }
                }else{
                    if(mysqli_query($conn, "UPDATE plans_logs SET status='EXPIRED' WHERE email='{$email}' AND plan_type='PREMIUM PARK'")){
                        if(mysqli_query($conn, "UPDATE active_plan SET active_plan=active_plan-1 WHERE id=1")){
                            header("Location: dashboard.php?empty_plan= Plan (PREMIUM PAKR) has expired!!! please activate a plan to continue!");
                            exit();
                        }else{
                            header("Location: dashboard.php?danger=Unable to update EXPIRED please try later!");
                            exit();    
                        }
                    }else{
                        header("Location: dashboard.php?danger=Somthing went wrong please try later");
                        exit();
                    }
                }
            }else{
                header("Location: dashboard.php?empty_plan=This plan ($plan_type) has not been activated!");
            }
        }elseif($plan_type == "GOLD PARK"){
            if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM plans_logs WHERE email='{$email}' AND plan_type='GOLD PARK'"))){
                $row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM plans_logs WHERE email='{$email}' AND plan_type='GOLD PARK'"));
                $end_date = date("y-m-d", strtotime(date("y-m-d", strtotime($row['reg_date'])) . " + 120 day"));
                $today_date = date("y-m-d", strtotime(date("y-m-d", strtotime(date("y-m-d")))));
                $timer = date("y-m-d", strtotime(date("y-m-d", strtotime($row['timer'] ))));
                if($today_date < $end_date){
                    if($today_date > $timer){
                        if($row['status'] == "Active"){
                           if(mysqli_query($conn, "UPDATE plans_logs SET timer='{$today_date}' WHERE email='{$email}' AND plan_type='GOLD PARK'")){
                            if(mysqli_query($conn, "UPDATE user_balance SET acc_balance= acc_balance + 200 WHERE email='{$email}'")){
                                header("Location: dashboard.php?success= Today`s grinding has been completly successfuly!");
                                exit();
                            }else{
                                header("Location: dashboard.php?empty_plan=Your plan has expired! and you kindly do not have any active plan to grind!");
                                exit();
                            }
                           }else{
                            header("Location: dashboard.php?danger=Somthing went wrong please try later");
                            exit();
                           }
                        }else{
                            header("Location: dashboard.php?empty_plan=Your plan has expired! and you kindly do not have any active plan to grind!");
                            exit();
                        }
                    }else{
                        header("Location: dashboard.php?danger= Today`s grinding has been completed!");
                        exit();
                    }
                }else{
                    if(mysqli_query($conn, "UPDATE plans_logs SET status='EXPIRED' WHERE email='{$email}' AND plan_type='GOLD PARK'")){
                        header("Location: dashboard.php?empty_plan= Plan (GOLD PAKR) has expired!!! please activate a plan to continue!");
                        exit();
                    }else{
                        header("Location: dashboard.php?danger=Somthing went wrong please try later");
                        exit();
                    }
                }
            }else{
                header("Location: dashboard.php?empty_plan=This plan ($plan_type) has not been activated!");
            } 
        }elseif($plan_type == "DIAMOND PARK"){
            if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM plans_logs WHERE email='{$email}' AND plan_type='DIAMOND PARK'"))){
                $row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM plans_logs WHERE email='{$email}' AND plan_type='DIAMOND PARK'"));
                $end_date = date("y-m-d", strtotime(date("y-m-d", strtotime($row['reg_date'])) . " + 150 day"));
                $today_date = date("y-m-d", strtotime(date("y-m-d", strtotime(date("y-m-d")))));
                $timer = date("y-m-d", strtotime(date("y-m-d", strtotime($row['timer'] ))));
                if($today_date < $end_date){
                    if($today_date > $timer){
                        if($row['status'] == "Active"){
                           if(mysqli_query($conn, "UPDATE plans_logs SET timer='{$today_date}' WHERE email='{$email}'AND plan_type='DIAMOND PARK' ")){
                            if(mysqli_query($conn, "UPDATE user_balance SET acc_balance= acc_balance + 350 WHERE email='{$email}'")){
                                header("Location: dashboard.php?success= Today`s grinding has been completly successfuly!");
                                exit();
                            }else{
                                header("Location: dashboard.php?empty_plan=Your plan has expired! and you kindly do not have any active plan to grind!");
                                exit();
                            }
                           }else{
                            header("Location: dashboard.php?danger=Somthing went wrong please try later");
                            exit();
                           }
                        }else{
                            header("Location: dashboard.php?empty_plan=Your plan has expired! and you kindly do not have any active plan to grind!");
                            exit();
                        }
                    }else{
                        header("Location: dashboard.php?danger= Today`s grinding has been completed!");
                        exit();
                    }
                }else{
                    if(mysqli_query($conn, "UPDATE plans_logs SET status='EXPIRED' WHERE email='{$email}' AND plan_type='DIAMOND PARK'")){
                        if(mysqli_query($conn, "UPDATE active_plan SET active_plan=active_plan-1 WHERE id=1")){
                            header("Location: dashboard.php?empty_plan= Plan (DIAMOND PAKR) has expired!!! please activate a plan to continue!");
                            exit();
                        }else{
                            header("Location: dashboard.php?danger=Unable to update EXPIRED please try later!");
                            exit();    
                        }
                    }else{
                        header("Location: dashboard.php?danger=Somthing went wrong please try later!");
                        exit();
                    }
                }
            }else{
                header("Location: dashboard.php?empty_plan=This plan ($plan_type) has not been activated!");
            } 
        }elseif($plan_type == "SILVER PARK"){
            if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM plans_logs WHERE email='{$email}' AND plan_type='SILVER PARK'"))){
                $row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM plans_logs WHERE email='{$email}' AND plan_type='SILVER PARK'"));
                $end_date = date("y-m-d", strtotime(date("y-m-d", strtotime($row['reg_date'])) . " + 210 day"));
                $today_date = date("y-m-d", strtotime(date("y-m-d", strtotime(date("y-m-d")))));
                $timer = date("y-m-d", strtotime(date("y-m-d", strtotime($row['timer'] ))));
                if($today_date < $end_date){
                    if($today_date > $timer){
                        if($row['status'] == "Active"){
                           if(mysqli_query($conn, "UPDATE plans_logs SET timer='{$today_date}' WHERE email='{$email}' AND plan_type='SILVER PARK'")){
                            if(mysqli_query($conn, "UPDATE user_balance SET acc_balance= acc_balance + 400 WHERE email='{$email}'")){
                                header("Location: dashboard.php?success= Today`s grinding has been completly successfuly!");
                                exit();
                            }else{
                                header("Location: dashboard.php?empty_plan=Your plan has expired! and you kindly do not have any active plan to grind!");
                                exit();
                            }
                           }else{
                            header("Location: dashboard.php?danger=Somthing went wrong please try later");
                            exit();
                           }
                        }else{
                            header("Location: dashboard.php?empty_plan=Your plan has expired! and you kindly do not have any active plan to grind!");
                            exit();
                        }
                    }else{
                        header("Location: dashboard.php?danger= Today`s grinding has been completed!");
                        exit();
                    }
                }else{
                    if(mysqli_query($conn, "UPDATE plans_logs SET status='EXPIRED' WHERE email='{$email}' AND plan_type='SILVER PARK'")){
                        if(mysqli_query($conn, "UPDATE active_plan SET active_plan=active_plan-1 WHERE id=1")){
                            header("Location: dashboard.php?empty_plan= Plan (SILVER PAKR) has expired!!! please activate a plan to continue!");
                            exit();
                        }else{
                            header("Location: dashboard.php?danger=Unable to update EXPIRED please try later!");
                            exit();    
                        }
                    }else{
                        header("Location: dashboard.php?danger=Somthing went wrong please try later!");
                        exit();
                    }
                }
            }else{
                header("Location: dashboard.php?empty_plan=This plan ($plan_type) has not been activated!");
            } 
        }elseif($plan_type == "MASTER PARK"){
            if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM plans_logs WHERE email='{$email}' AND plan_type='MASTER PARK'"))){
                $row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM plans_logs WHERE email='{$email}' AND plan_type='MASTER PARK'"));
                $end_date = date("y-m-d", strtotime(date("y-m-d", strtotime($row['reg_date'])) . " + 270 day"));
                $today_date = date("y-m-d", strtotime(date("y-m-d", strtotime(date("y-m-d")))));
                $timer = date("y-m-d", strtotime(date("y-m-d", strtotime($row['timer'] ))));
                if($today_date < $end_date){
                    if($today_date > $timer){
                        if($row['status'] == "Active"){
                           if(mysqli_query($conn, "UPDATE plans_logs SET timer='{$today_date}' WHERE email='{$email}' AND plan_type='MASTER PARK'")){
                            if(mysqli_query($conn, "UPDATE user_balance SET acc_balance= acc_balance + 700 WHERE email='{$email}'")){
                                header("Location: dashboard.php?success= Today`s grinding has been completly successfuly!");
                                exit();
                            }else{
                                header("Location: dashboard.php?empty_plan=Your plan has expired! and you kindly do not have any active plan to grind!");
                                exit();
                            }
                           }else{
                            header("Location: dashboard.php?danger=Somthing went wrong please try later");
                            exit();
                           }
                        }else{
                            header("Location: dashboard.php?empty_plan=Your plan has expired! and you kindly do not have any active plan to grind!");
                            exit();
                        }
                    }else{
                        header("Location: dashboard.php?danger= Today`s grinding has been completed!");
                        exit();
                    }
                }else{
                    if(mysqli_query($conn, "UPDATE plans_logs SET status='EXPIRED' WHERE email='{$email}' AND plan_type='MASTER PARK'")){
                        if(mysqli_query($conn, "UPDATE active_plan SET active_plan=active_plan-1 WHERE id=1")){
                            header("Location: dashboard.php?empty_plan= Plan (MASTER PAKR) has expired!!! please activate a plan to continue!");
                            exit();
                        }else{
                            header("Location: dashboard.php?danger=Unable to update EXPIRED please try later!");
                            exit();    
                        }
                    }else{
                        header("Location: dashboard.php?danger=Somthing went wrong please try later!");
                        exit();
                    }
                }
            }else{
                header("Location: dashboard.php?empty_plan=This plan ($plan_type) has not been activated!");
            } 
        }elseif($plan_type == "PLATINUM PARK"){
            if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM plans_logs WHERE email='{$email}' AND plan_type='PLATINUM PARK'"))){
                $row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM plans_logs WHERE email='{$email}' AND plan_type='PLATINUM PARK'"));
                $end_date = date("y-m-d", strtotime(date("y-m-d", strtotime($row['reg_date'])) . " + 300 day"));
                $today_date = date("y-m-d", strtotime(date("y-m-d", strtotime(date("y-m-d")))));
                $timer = date("y-m-d", strtotime(date("y-m-d", strtotime($row['timer'] ))));
                if($today_date < $end_date){
                    if($today_date > $timer){
                        if($row['status'] == "Active"){
                           if(mysqli_query($conn, "UPDATE plans_logs SET timer='{$today_date}' WHERE email='{$email}' AND plan_type='PLATINUM PARK'")){
                            if(mysqli_query($conn, "UPDATE user_balance SET acc_balance= acc_balance + 800 WHERE email='{$email}'")){
                                header("Location: dashboard.php?success= Today`s grinding has been completly successfuly!");
                                exit();
                            }else{
                                header("Location: dashboard.php?empty_plan=Your plan has expired! and you kindly do not have any active plan to grind!");
                                exit();
                            }
                           }else{
                            header("Location: dashboard.php?danger=Somthing went wrong please try later");
                            exit();
                           }
                        }else{
                            header("Location: dashboard.php?empty_plan=Your plan has expired! and you kindly do not have any active plan to grind!");
                            exit();
                        }
                    }else{
                        header("Location: dashboard.php?danger= Today`s grinding has been completed!");
                        exit();
                    }
                }else{
                    if(mysqli_query($conn, "UPDATE plans_logs SET status='EXPIRED' WHERE email='{$email}' AND plan_type='PLATINUM PARK'")){
                        if(mysqli_query($conn, "UPDATE active_plan SET active_plan=active_plan-1 WHERE id=1")){
                            header("Location: dashboard.php?empty_plan= Plan (PLATINUM PAKR) has expired!!! please activate a plan to continue!");
                            exit();
                        }else{
                            header("Location: dashboard.php?danger=Unable to update EXPIRED please try later!");
                            exit();    
                        }
                    }else{
                        header("Location: dashboard.php?danger=Somthing went wrong please try later!");
                        exit();
                    }
                }
            }else{
                header("Location: dashboard.php?empty_plan=This plan ($plan_type) has not been activated!");
            } 
        }elseif($plan_type == "SUPPER PARK"){
            if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM plans_logs WHERE email='{$email}' AND plan_type='SUPPER PARK'"))){
                $row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM plans_logs WHERE email='{$email}' AND plan_type='SUPPER PARK'"));
                $end_date = date("y-m-d", strtotime(date("y-m-d", strtotime($row['reg_date'])) . " + 360 day"));
                $today_date = date("y-m-d", strtotime(date("y-m-d", strtotime(date("y-m-d")))));
                $timer = date("y-m-d", strtotime(date("y-m-d", strtotime($row['timer'] ))));
                if($today_date < $end_date){
                    if($today_date > $timer){
                        if($row['status'] == "Active"){
                           if(mysqli_query($conn, "UPDATE plans_logs SET timer='{$today_date}' WHERE email='{$email}' AND plan_type='SUPPER PARK'")){
                            if(mysqli_query($conn, "UPDATE user_balance SET acc_balance= acc_balance + 900 WHERE email='{$email}'")){
                                header("Location: dashboard.php?success= Today`s grinding has been completly successfuly!");
                                exit();
                            }else{
                                header("Location: dashboard.php?empty_plan=Your plan has expired! and you kindly do not have any active plan to grind!");
                                exit();
                            }
                           }else{
                            header("Location: dashboard.php?danger=Somthing went wrong please try later");
                            exit();
                           }
                        }else{
                            header("Location: dashboard.php?empty_plan=Your plan has expired! and you kindly do not have any active plan to grind!");
                            exit();
                        }
                    }else{
                        header("Location: dashboard.php?danger= Today`s grinding has been completed!");
                        exit();
                    }
                }else{
                    if(mysqli_query($conn, "UPDATE plans_logs SET status='EXPIRED' WHERE email='{$email}' AND plan_type='SUPPER PARK'")){
                        if(mysqli_query($conn, "UPDATE active_plan SET active_plan=active_plan-1 WHERE id=1")){
                            header("Location: dashboard.php?empty_plan= Plan (SUPPER PAKR) has expired!!! please activate a plan to continue!");
                            exit();
                        }else{
                            header("Location: dashboard.php?danger=Unable to update EXPIRED please try later!");
                            exit();    
                        }
                    }else{
                        header("Location: dashboard.php?danger=Somthing went wrong please try later!");
                        exit();
                    }
                }
            }else{
                header("Location: dashboard.php?empty_plan=This plan ($plan_type) has not been activated!");
            } 
        }else{
            echo "next";
        }
    }else{
        header("Location: dashboard.php");
    }
}else{
    header("Location: dashboard.php");
}

?>