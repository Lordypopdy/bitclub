<?php
session_start();
include('serverConn/conn.php');
if($_SERVER['REQUEST_METHOD'] ==='POST'){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $comfirm_password = mysqli_real_escape_string($conn, $_POST['comfirm_password']);
    $code = mysqli_real_escape_string($conn, md5(rand()));
    $referral = mysqli_real_escape_string($conn, $_POST['referral_code']);
    function randNumb(){
        $rand_1 = mt_rand(100, 100000);
        return $rand_1;
    }
    $rand_2 = randNumb();
    if($referral){
        if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM referrals WHERE referrals_code='$referral'"))){
            $row_1 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM referrals WHERE referrals_code='$referral'"));
            $row_1_2 = $row_1['email'];
            if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM signup WHERE referral_code='$referral'"))){
                $select_1 =  mysqli_query($conn, "SELECT * FROM signup WHERE referral_code='$referral'");
                while($row_1_3 = mysqli_fetch_assoc($select_1)){
                    if($row_1_3['active_plan'] == 'STARTER PARK'){
                        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                            if(preg_match('/^[a-zA-Z0-9]{6,12}$/', $password)){
                                $password_1 = md5($password);
                                $password_2 = md5($comfirm_password);
                                if($password_1 === $password_2){
                                    $select = "SELECT * FROM signup WHERE email='{$email}'";
                                    $sql = mysqli_query($conn, $select);
                                    if(mysqli_num_rows($sql) > 0){
                                        header("Location: signUp.php?danger= This email already exist $email");
                                        exit();
                                    }else{
                                        $insert = "INSERT INTO signup(name, username, email, referral_code, password, code) VALUES('{$name}', '{$username}', 
                                        '{$email}', '$rand_2', '{$password_1}', '{$code}'
                                        )";
                                        $log = "INSERT INTO login( email, password) VALUES('{$email}', '{$password_1}')";
                                        $indetinty_url = "INSERT INTO user_identity( email, verified, identity_url) VALUES('{$email}', 'UNVERIFIED', 'img_url')";
                                        $query1 = mysqli_query($conn, $insert);
                                        $query2 = mysqli_query($conn, $log);
                                        $query3 = mysqli_query($conn, $indetinty_url);
                                        if($query1 && $query2 && $query3){
                                            $profile_dfault = "INSERT INTO user_profile(email, img_url) VALUES('{$email}', 'img_urls')";
                                            $user_details = "INSERT INTO user_details(email, name, mobile, country, city, zip_code, address) VALUES('{$email}','null', 'null', 'null', 'null', 'null', 'null')";
                                            $user_balance = "INSERT INTO user_balance(email, acc_balance, referral_code, grind_balance) VALUES('{$email}', 0, '$rand_2', 0)";
                                            $pflquery = mysqli_query($conn, $profile_dfault);
                                            $details_query2 = mysqli_query($conn, $user_details);
                                            $user_balance = mysqli_query($conn, $user_balance);
                                            if($pflquery && $details_query2 && $user_balance){
                                             if(mysqli_query($conn, "INSERT INTO referral_earnings(amount, name, email, referrals_code, user_name)
                                             VALUES(200, '{$name}', '{$email}', '$rand_2', '{$username}')")){
                                                if(mysqli_query($conn,"INSERT INTO referrals(amount, name, email, referrals_code, user_name, parent_code)
                                                VALUES(200, '{$name}', '{$email}', '{$rand_2}', '{$username}', '{$referral}')")
                                               && mysqli_query($conn, "UPDATE user_balance SET referral_balance = referral_balance + 200 WHERE referral_code= '{$referral}'")){
                                        
                                                header("Location: forgot-question.php?info= Your account has been created successfuly Kindly select your account recovery question!");
                                                $_SESSION['email'] = $email;
                                                }
                                             }
                                            }else{
                                                header('Location: signUp.php?danger= Something went wrong!');
                                            exit();    
                                            }
                                        }else{
                                            header('Location: signUp.php?danger= Something went wrong!');
                                            exit();
                                        }
                                    }
                                }else{
                                    header('Location: signUp.php?danger= Incorrect comfirm password!');
                                    exit();
                                }
                            }else{
                                header("Location: signUp.php?danger=Password must be atleast 6-12 chars and alphanumeric!");
                                exit();
                            }
                            }
                            else{
                            header("Location: signUp.php?danger= Email must be a valid email!");
                            exit();
                        }
                    }else{
                        if($row_1_3['active_plan'] == 'PREMIUM PARK'){
                            if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                                if(preg_match('/^[a-zA-Z0-9]{6,12}$/', $password)){
                                    $password_1 = md5($password);
                                    $password_2 = md5($comfirm_password);
                                    if($password_1 === $password_2){
                                        $select = "SELECT * FROM signup WHERE email='{$email}'";
                                        $sql = mysqli_query($conn, $select);
                                        if(mysqli_num_rows($sql) > 0){
                                            header("Location: signUp.php?danger= This email already exist $email");
                                            exit();
                                        }else{
                                            $insert = "INSERT INTO signup(name, username, email, referral_code, password, code) VALUES('{$name}', '{$username}', 
                                            '{$email}', '$rand_2', '{$password_1}', '{$code}'
                                            )";
                                            $log = "INSERT INTO login( email, password) VALUES('{$email}', '{$password_1}')";
                                            $indetinty_url = "INSERT INTO user_identity( email, verified, identity_url) VALUES('{$email}', 'UNVERIFIED', 'img_url')";
                                            $query1 = mysqli_query($conn, $insert);
                                            $query2 = mysqli_query($conn, $log);
                                            $query3 = mysqli_query($conn, $indetinty_url);
                                            if($query1 && $query2 && $query3){
                                                $profile_dfault = "INSERT INTO user_profile(email, img_url) VALUES('{$email}', 'img_urls')";
                                                $user_details = "INSERT INTO user_details(email, name, mobile, country, city, zip_code, address) VALUES('{$email}','null', 'null', 'null', 'null', 'null', 'null')";
                                                $user_balance = "INSERT INTO user_balance(email, acc_balance, referral_code, grind_balance) VALUES('{$email}', 0, '$rand_2', 0)";
                                                $pflquery = mysqli_query($conn, $profile_dfault);
                                                $details_query2 = mysqli_query($conn, $user_details);
                                                $user_balance = mysqli_query($conn, $user_balance);
                                                if($pflquery && $details_query2 && $user_balance){
                                                 if(mysqli_query($conn, "INSERT INTO referral_earnings(amount, name, email, referrals_code, user_name)
                                                 VALUES(200, '{$name}', '{$email}', '$rand_2', '{$username}')")){
                                                    if(mysqli_query($conn,"INSERT INTO referrals(amount, name, email, referrals_code, user_name, parent_code)
                                                    VALUES(200, '{$name}', '{$email}', '{$rand_2}', '{$username}', '{$referral}')")
                                                   && mysqli_query($conn, "UPDATE user_balance SET referral_balance = referral_balance + 220 WHERE referral_code= '{$referral}'")){
                                                    $_SESSION['email'] = $email;
                                                    header("Location: forgot-question.php?info= Your account has been created successfuly Kindly select your account recovery question!");
                                                    }
                                                 }
                                                }else{
                                                    header('Location: signUp.php?danger= Something went wrong!');
                                                exit();    
                                                }
                                            }else{
                                                header('Location: signUp.php?danger= Something went wrong!');
                                                exit();
                                            }
                                        }
                                    }else{
                                        header('Location: signUp.php?danger= Incorrect comfirm password!');
                                        exit();
                                    }
                                }else{
                                    header("Location: signUp.php?danger=Password must be atleast 6-12 chars and alphanumeric!");
                                    exit();
                                }
                                }
                                else{
                                header("Location: signUp.php?danger= Email must be a valid email!");
                                exit();
                            }
                        }else{
                            if($row_1_3['active_plan'] == 'PREMIUM PARK'){
                                if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                                    if(preg_match('/^[a-zA-Z0-9]{6,12}$/', $password)){
                                        $password_1 = md5($password);
                                        $password_2 = md5($comfirm_password);
                                        if($password_1 === $password_2){
                                            $select = "SELECT * FROM signup WHERE email='{$email}'";
                                            $sql = mysqli_query($conn, $select);
                                            if(mysqli_num_rows($sql) > 0){
                                                header("Location: signUp.php?danger= This email already exist $email");
                                                exit();
                                            }else{
                                                $insert = "INSERT INTO signup(name, username, email, referral_code, password, code) VALUES('{$name}', '{$username}', 
                                                '{$email}', '$rand_2', '{$password_1}', '{$code}'
                                                )";
                                                $log = "INSERT INTO login( email, password) VALUES('{$email}', '{$password_1}')";
                                                $indetinty_url = "INSERT INTO user_identity( email, verified, identity_url) VALUES('{$email}', 'UNVERIFIED', 'img_url')";
                                                $query1 = mysqli_query($conn, $insert);
                                                $query2 = mysqli_query($conn, $log);
                                                $query3 = mysqli_query($conn, $indetinty_url);
                                                if($query1 && $query2 && $query3){
                                                    $profile_dfault = "INSERT INTO user_profile(email, img_url) VALUES('{$email}', 'img_urls')";
                                                    $user_details = "INSERT INTO user_details(email, name, mobile, country, city, zip_code, address) VALUES('{$email}','null', 'null', 'null', 'null', 'null', 'null')";
                                                    $user_balance = "INSERT INTO user_balance(email, acc_balance, referral_code, grind_balance) VALUES('{$email}', 0, '$rand_2', 0)";
                                                    $pflquery = mysqli_query($conn, $profile_dfault);
                                                    $details_query2 = mysqli_query($conn, $user_details);
                                                    $user_balance = mysqli_query($conn, $user_balance);
                                                    if($pflquery && $details_query2 && $user_balance){
                                                    
                                                     if(mysqli_query($conn, "INSERT INTO referral_earnings(amount, name, email, referrals_code, user_name)
                                                     VALUES(200, '{$name}', '{$email}', '$rand_2', '{$username}')")){
                                                        if(mysqli_query($conn,"INSERT INTO referrals(amount, name, email, referrals_code, user_name, parent_code)
                                                        VALUES(200, '{$name}', '{$email}', '{$rand_2}', '{$username}', '{$referral}')")
                                                       && mysqli_query($conn, "UPDATE user_balance SET referral_balance = referral_balance + 220 WHERE referral_code= '{$referral}'")){
                                                        $_SESSION['email'] = $email;   
                                                        header("Location: forgot-question.php?info= Your account has been created successfuly Kindly select your account recovery question!");
                                                        }
                                                     }
                                                    }else{
                                                        header('Location: signUp.php?danger= Something went wrong!');
                                                    exit();    
                                                    }
                                                }else{
                                                    header('Location: signUp.php?danger= Something went wrong!');
                                                    exit();
                                                }
                                            }
                                        }else{
                                            header('Location: signUp.php?danger= Incorrect comfirm password!');
                                            exit();
                                        }
                                    }else{
                                        header("Location: signUp.php?danger=Password must be atleast 6-12 chars and alphanumeric!");
                                        exit();
                                    }
                                    }
                                    else{
                                    header("Location: signUp.php?danger= Email must be a valid email!");
                                    exit();
                                }
                            }else{
                                if($row_1_3['active_plan'] == 'GOLD PARK'){
                                    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                                        if(preg_match('/^[a-zA-Z0-9]{6,12}$/', $password)){
                                            $password_1 = md5($password);
                                            $password_2 = md5($comfirm_password);
                                            if($password_1 === $password_2){
                                                $select = "SELECT * FROM signup WHERE email='{$email}'";
                                                $sql = mysqli_query($conn, $select);
                                                if(mysqli_num_rows($sql) > 0){
                                                    header("Location: signUp.php?danger= This email already exist $email");
                                                    exit();
                                                }else{
                                                    $insert = "INSERT INTO signup(name, username, email, referral_code, password, code) VALUES('{$name}', '{$username}', 
                                                    '{$email}', '$rand_2', '{$password_1}', '{$code}'
                                                    )";
                                                    $log = "INSERT INTO login( email, password) VALUES('{$email}', '{$password_1}')";
                                                    $indetinty_url = "INSERT INTO user_identity( email, verified, identity_url) VALUES('{$email}', 'UNVERIFIED', 'img_url')";
                                                    $query1 = mysqli_query($conn, $insert);
                                                    $query2 = mysqli_query($conn, $log);
                                                    $query3 = mysqli_query($conn, $indetinty_url);
                                                    if($query1 && $query2 && $query3){
                                                        $profile_dfault = "INSERT INTO user_profile(email, img_url) VALUES('{$email}', 'img_urls')";
                                                        $user_details = "INSERT INTO user_details(email, name, mobile, country, city, zip_code, address) VALUES('{$email}','null', 'null', 'null', 'null', 'null', 'null')";
                                                        $user_balance = "INSERT INTO user_balance(email, acc_balance, referral_code, grind_balance) VALUES('{$email}', 0, '$rand_2', 0)";
                                                        $pflquery = mysqli_query($conn, $profile_dfault);
                                                        $details_query2 = mysqli_query($conn, $user_details);
                                                        $user_balance = mysqli_query($conn, $user_balance);
                                                        if($pflquery && $details_query2 && $user_balance){
                                                         
                                                         if(mysqli_query($conn, "INSERT INTO referral_earnings(amount, name, email, referrals_code, user_name)
                                                         VALUES(250, '{$name}', '{$email}', '$rand_2', '{$username}')")){
                                                            if(mysqli_query($conn,"INSERT INTO referrals(amount, name, email, referrals_code, user_name, parent_code)
                                                            VALUES(250, '{$name}', '{$email}', '{$rand_2}', '{$username}', '{$referral}')")
                                                           && mysqli_query($conn, "UPDATE user_balance SET referral_balance = referral_balance + 250 WHERE referral_code= '{$referral}'")){
                                                            $_SESSION['email'] = $email;
                                                            header("Location: forgot-question.php?info= Your account has been created successfuly Kindly select your account recovery question!");
                                                            }
                                                         }
                                                        }else{
                                                            header('Location: signUp.php?danger= Something went wrong!');
                                                        exit();    
                                                        }
                                                    }else{
                                                        header('Location: signUp.php?danger= Something went wrong!');
                                                        exit();
                                                    }
                                                }
                                            }else{
                                                header('Location: signUp.php?danger= Incorrect comfirm password!');
                                                exit();
                                            }
                                        }else{
                                            header("Location: signUp.php?danger=Password must be atleast 6-12 chars and alphanumeric!");
                                            exit();
                                        }
                                        }
                                        else{
                                        header("Location: signUp.php?danger= Email must be a valid email!");
                                        exit();
                                    }
                                }else{
                                    if($row_1_3['active_plan'] == 'DIAMOND PARK'){
                                        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                                            if(preg_match('/^[a-zA-Z0-9]{6,12}$/', $password)){
                                                $password_1 = md5($password);
                                                $password_2 = md5($comfirm_password);
                                                if($password_1 === $password_2){
                                                    $select = "SELECT * FROM signup WHERE email='{$email}'";
                                                    $sql = mysqli_query($conn, $select);
                                                    if(mysqli_num_rows($sql) > 0){
                                                        header("Location: signUp.php?danger= This email already exist $email");
                                                        exit();
                                                    }else{
                                                        $insert = "INSERT INTO signup(name, username, email, referral_code, password, code) VALUES('{$name}', '{$username}', 
                                                        '{$email}', '$rand_2', '{$password_1}', '{$code}'
                                                        )";
                                                        $log = "INSERT INTO login( email, password) VALUES('{$email}', '{$password_1}')";
                                                        $indetinty_url = "INSERT INTO user_identity( email, verified, identity_url) VALUES('{$email}', 'UNVERIFIED', 'img_url')";
                                                        $query1 = mysqli_query($conn, $insert);
                                                        $query2 = mysqli_query($conn, $log);
                                                        $query3 = mysqli_query($conn, $indetinty_url);
                                                        if($query1 && $query2 && $query3){
                                                            $profile_dfault = "INSERT INTO user_profile(email, img_url) VALUES('{$email}', 'img_urls')";
                                                            $user_details = "INSERT INTO user_details(email, name, mobile, country, city, zip_code, address) VALUES('{$email}','null', 'null', 'null', 'null', 'null', 'null')";
                                                            $user_balance = "INSERT INTO user_balance(email, acc_balance, referral_code, grind_balance) VALUES('{$email}', 0, '$rand_2', 0)";
                                                            $pflquery = mysqli_query($conn, $profile_dfault);
                                                            $details_query2 = mysqli_query($conn, $user_details);
                                                            $user_balance = mysqli_query($conn, $user_balance);
                                                            if($pflquery && $details_query2 && $user_balance){
                                                             if(mysqli_query($conn, "INSERT INTO referral_earnings(amount, name, email, referrals_code, user_name)
                                                             VALUES(280, '{$name}', '{$email}', '$rand_2', '{$username}')")){
                                                                if(mysqli_query($conn,"INSERT INTO referrals(amount, name, email, referrals_code, user_name, parent_code)
                                                                VALUES(280, '{$name}', '{$email}', '{$rand_2}', '{$username}', '{$referral}')")
                                                               && mysqli_query($conn, "UPDATE user_balance SET referral_balance = referral_balance + 280 WHERE referral_code= '{$referral}'")){
                                                                $_SESSION['email'] = $email;   
                                                                header("Location: forgot-question.php?info= Your account has been created successfuly Kindly select your account recovery question!");
                                                                }
                                                             }
                                                            }else{
                                                                header('Location: signUp.php?danger= Something went wrong!');
                                                            exit();    
                                                            }
                                                        }else{
                                                            header('Location: signUp.php?danger= Something went wrong!');
                                                            exit();
                                                        }
                                                    }
                                                }else{
                                                    header('Location: signUp.php?danger= Incorrect comfirm password!');
                                                    exit();
                                                }
                                            }else{
                                                header("Location: signUp.php?danger=Password must be atleast 6-12 chars and alphanumeric!");
                                                exit();
                                            }
                                            }
                                            else{
                                            header("Location: signUp.php?danger= Email must be a valid email!");
                                            exit();
                                        }
                                    }else{
                                        if($row_1_3['active_plan'] == 'SILVER PARK'){
                                            if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                                                if(preg_match('/^[a-zA-Z0-9]{6,12}$/', $password)){
                                                    $password_1 = md5($password);
                                                    $password_2 = md5($comfirm_password);
                                                    if($password_1 === $password_2){
                                                        $select = "SELECT * FROM signup WHERE email='{$email}'";
                                                        $sql = mysqli_query($conn, $select);
                                                        if(mysqli_num_rows($sql) > 0){
                                                            header("Location: signUp.php?danger= This email already exist $email");
                                                            exit();
                                                        }else{
                                                            $insert = "INSERT INTO signup(name, username, email, referral_code, password, code) VALUES('{$name}', '{$username}', 
                                                            '{$email}', '$rand_2', '{$password_1}', '{$code}'
                                                            )";
                                                            $log = "INSERT INTO login( email, password) VALUES('{$email}', '{$password_1}')";
                                                            $indetinty_url = "INSERT INTO user_identity( email, verified, identity_url) VALUES('{$email}', 'UNVERIFIED', 'img_url')";
                                                            $query1 = mysqli_query($conn, $insert);
                                                            $query2 = mysqli_query($conn, $log);
                                                            $query3 = mysqli_query($conn, $indetinty_url);
                                                            if($query1 && $query2 && $query3){
                                                                $profile_dfault = "INSERT INTO user_profile(email, img_url) VALUES('{$email}', 'img_urls')";
                                                                $user_details = "INSERT INTO user_details(email, name, mobile, country, city, zip_code, address) VALUES('{$email}','null', 'null', 'null', 'null', 'null', 'null')";
                                                                $user_balance = "INSERT INTO user_balance(email, acc_balance, referral_code, grind_balance) VALUES('{$email}', 0, '$rand_2', 0)";
                                                                $pflquery = mysqli_query($conn, $profile_dfault);
                                                                $details_query2 = mysqli_query($conn, $user_details);
                                                                $user_balance = mysqli_query($conn, $user_balance);
                                                                if($pflquery && $details_query2 && $user_balance){
                                                                 if(mysqli_query($conn, "INSERT INTO referral_earnings(amount, name, email, referrals_code, user_name)
                                                                 VALUES(300, '{$name}', '{$email}', '$rand_2', '{$username}')")){
                                                                    if(mysqli_query($conn,"INSERT INTO referrals(amount, name, email, referrals_code, user_name, parent_code)
                                                                    VALUES(300, '{$name}', '{$email}', '{$rand_2}', '{$username}', '{$referral}')")
                                                                   && mysqli_query($conn, "UPDATE user_balance SET referral_balance = referral_balance + 300 WHERE referral_code= '{$referral}'")){
                                                                    $_SESSION['email'] = $email;
                                                                    header("Location: forgot-question.php?info= Your account has been created successfuly Kindly select your account recovery question!");
                                                                    }
                                                                 }
                                                                }else{
                                                                    header('Location: signUp.php?danger= Something went wrong!');
                                                                exit();    
                                                                }
                                                            }else{
                                                                header('Location: signUp.php?danger= Something went wrong!');
                                                                exit();
                                                            }
                                                        }
                                                    }else{
                                                        header('Location: signUp.php?danger= Incorrect comfirm password!');
                                                        exit();
                                                    }
                                                }else{
                                                    header("Location: signUp.php?danger=Password must be atleast 6-12 chars and alphanumeric!");
                                                    exit();
                                                }
                                                }
                                                else{
                                                header("Location: signUp.php?danger= Email must be a valid email!");
                                                exit();
                                            }
                                        }else{
                                            if($row_1_3['active_plan'] == 'PLATINUM PARK'){
                                                if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                                                    if(preg_match('/^[a-zA-Z0-9]{6,12}$/', $password)){
                                                        $password_1 = md5($password);
                                                        $password_2 = md5($comfirm_password);
                                                        if($password_1 === $password_2){
                                                            $select = "SELECT * FROM signup WHERE email='{$email}'";
                                                            $sql = mysqli_query($conn, $select);
                                                            if(mysqli_num_rows($sql) > 0){
                                                                header("Location: signUp.php?danger= This email already exist $email");
                                                                exit();
                                                            }else{
                                                                $insert = "INSERT INTO signup(name, username, email, referral_code, password, code) VALUES('{$name}', '{$username}', 
                                                                '{$email}', '$rand_2', '{$password_1}', '{$code}'
                                                                )";
                                                                $log = "INSERT INTO login( email, password) VALUES('{$email}', '{$password_1}')";
                                                                $indetinty_url = "INSERT INTO user_identity( email, verified, identity_url) VALUES('{$email}', 'UNVERIFIED', 'img_url')";
                                                                $query1 = mysqli_query($conn, $insert);
                                                                $query2 = mysqli_query($conn, $log);
                                                                $query3 = mysqli_query($conn, $indetinty_url);
                                                                if($query1 && $query2 && $query3){
                                                                    $profile_dfault = "INSERT INTO user_profile(email, img_url) VALUES('{$email}', 'img_urls')";
                                                                    $user_details = "INSERT INTO user_details(email, name, mobile, country, city, zip_code, address) VALUES('{$email}','null', 'null', 'null', 'null', 'null', 'null')";
                                                                    $user_balance = "INSERT INTO user_balance(email, acc_balance, referral_code, grind_balance) VALUES('{$email}', 0, '$rand_2', 0)";
                                                                    $pflquery = mysqli_query($conn, $profile_dfault);
                                                                    $details_query2 = mysqli_query($conn, $user_details);
                                                                    $user_balance = mysqli_query($conn, $user_balance);
                                                                    if($pflquery && $details_query2 && $user_balance){
                                                                     if(mysqli_query($conn, "INSERT INTO referral_earnings(amount, name, email, referrals_code, user_name)
                                                                     VALUES(350, '{$name}', '{$email}', '$rand_2', '{$username}')")){
                                                                        if(mysqli_query($conn,"INSERT INTO referrals(amount, name, email, referrals_code, user_name, parent_code)
                                                                        VALUES(500, '{$name}', '{$email}', '{$rand_2}', '{$username}', '{$referral}')")
                                                                       && mysqli_query($conn, "UPDATE user_balance SET referral_balance = referral_balance + 500 WHERE referral_code= '{$referral}'")){
                                                                        $_SESSION['email'] = $email; 
                                                                        header("Location: forgot-question.php?info= Your account has been created successfuly Kindly select your account recovery question!");
                                                                        }
                                                                     }
                                                                    }else{
                                                                        header('Location: signUp.php?danger= Something went wrong!');
                                                                    exit();    
                                                                    }
                                                                }else{
                                                                    header('Location: signUp.php?danger= Something went wrong!');
                                                                    exit();
                                                                }
                                                            }
                                                        }else{
                                                            header('Location: signUp.php?danger= Incorrect comfirm password!');
                                                            exit();
                                                        }
                                                    }else{
                                                        header("Location: signUp.php?danger=Password must be atleast 6-12 chars and alphanumeric!");
                                                        exit();
                                                    }
                                                    }
                                                    else{
                                                    header("Location: signUp.php?danger= Email must be a valid email!");
                                                    exit();
                                                }
                                            }else{
                                                if($row_1_3['active_plan'] == 'MASTER PARK'){
                                                    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                                                        if(preg_match('/^[a-zA-Z0-9]{6,12}$/', $password)){
                                                            $password_1 = md5($password);
                                                            $password_2 = md5($comfirm_password);
                                                            if($password_1 === $password_2){
                                                                $select = "SELECT * FROM signup WHERE email='{$email}'";
                                                                $sql = mysqli_query($conn, $select);
                                                                if(mysqli_num_rows($sql) > 0){
                                                                    header("Location: signUp.php?danger= This email already exist $email");
                                                                    exit();
                                                                }else{
                                                                    $insert = "INSERT INTO signup(name, username, email, referral_code, password, code) VALUES('{$name}', '{$username}', 
                                                                    '{$email}', '$rand_2', '{$password_1}', '{$code}'
                                                                    )";
                                                                    $log = "INSERT INTO login( email, password) VALUES('{$email}', '{$password_1}')";
                                                                    $indetinty_url = "INSERT INTO user_identity( email, verified, identity_url) VALUES('{$email}', 'UNVERIFIED', 'img_url')";
                                                                    $query1 = mysqli_query($conn, $insert);
                                                                    $query2 = mysqli_query($conn, $log);
                                                                    $query3 = mysqli_query($conn, $indetinty_url);
                                                                    if($query1 && $query2 && $query3){
                                                                        $profile_dfault = "INSERT INTO user_profile(email, img_url) VALUES('{$email}', 'img_urls')";
                                                                        $user_details = "INSERT INTO user_details(email, name, mobile, country, city, zip_code, address) VALUES('{$email}','null', 'null', 'null', 'null', 'null', 'null')";
                                                                        $user_balance = "INSERT INTO user_balance(email, acc_balance, referral_code, grind_balance) VALUES('{$email}', 0, '$rand_2', 0)";
                                                                        $pflquery = mysqli_query($conn, $profile_dfault);
                                                                        $details_query2 = mysqli_query($conn, $user_details);
                                                                        $user_balance = mysqli_query($conn, $user_balance);
                                                                        if($pflquery && $details_query2 && $user_balance){
                                                                         if(mysqli_query($conn, "INSERT INTO referral_earnings(amount, name, email, referrals_code, user_name)
                                                                         VALUES(400, '{$name}', '{$email}', '$rand_2', '{$username}')")){
                                                                            if(mysqli_query($conn,"INSERT INTO referrals(amount, name, email, referrals_code, user_name, parent_code)
                                                                            VALUES(400, '{$name}', '{$email}', '{$rand_2}', '{$username}', '{$referral}')")
                                                                           && mysqli_query($conn, "UPDATE user_balance SET referral_balance = referral_balance + 400 WHERE referral_code= '{$referral}'")){
                                                                            $_SESSION['email'] = $email;
                                                                            header("Location: forgot-question.php?info= Your account has been created successfuly Kindly select your account recovery question!");
                                                                            }
                                                                         }
                                                                        }else{
                                                                            header('Location: signUp.php?danger= Something went wrong!');
                                                                        exit();    
                                                                        }
                                                                    }else{
                                                                        header('Location: signUp.php?danger= Something went wrong!');
                                                                        exit();
                                                                    }
                                                                }
                                                            }else{
                                                                header('Location: signUp.php?danger= Incorrect comfirm password!');
                                                                exit();
                                                            }
                                                        }else{
                                                            header("Location: signUp.php?danger=Password must be atleast 6-12 chars and alphanumeric!");
                                                            exit();
                                                        }
                                                        }
                                                        else{
                                                        header("Location: signUp.php?danger= Email must be a valid email!");
                                                        exit();
                                                    }
                                                }else{
                                                    if($row_1_3['active_plan'] == 'SUPPER PARK'){
                                                        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                                                            if(preg_match('/^[a-zA-Z0-9]{6,12}$/', $password)){
                                                                $password_1 = md5($password);
                                                                $password_2 = md5($comfirm_password);
                                                                if($password_1 === $password_2){
                                                                    $select = "SELECT * FROM signup WHERE email='{$email}'";
                                                                    $sql = mysqli_query($conn, $select);
                                                                    if(mysqli_num_rows($sql) > 0){
                                                                        header("Location: signUp.php?danger= This email already exist $email");
                                                                        exit();
                                                                    }else{
                                                                        $insert = "INSERT INTO signup(name, username, email, referral_code, password, code) VALUES('{$name}', '{$username}', 
                                                                        '{$email}', '$rand_2', '{$password_1}', '{$code}'
                                                                        )";
                                                                        $log = "INSERT INTO login( email, password) VALUES('{$email}', '{$password_1}')";
                                                                        $indetinty_url = "INSERT INTO user_identity( email, verified, identity_url) VALUES('{$email}', 'UNVERIFIED', 'img_url')";
                                                                        $query1 = mysqli_query($conn, $insert);
                                                                        $query2 = mysqli_query($conn, $log);
                                                                        $query3 = mysqli_query($conn, $indetinty_url);
                                                                        if($query1 && $query2 && $query3){
                                                                            $profile_dfault = "INSERT INTO user_profile(email, img_url) VALUES('{$email}', 'img_urls')";
                                                                            $user_details = "INSERT INTO user_details(email, name, mobile, country, city, zip_code, address) VALUES('{$email}','null', 'null', 'null', 'null', 'null', 'null')";
                                                                            $user_balance = "INSERT INTO user_balance(email, acc_balance, referral_code, grind_balance) VALUES('{$email}', 0, '$rand_2', 0)";
                                                                            $pflquery = mysqli_query($conn, $profile_dfault);
                                                                            $details_query2 = mysqli_query($conn, $user_details);
                                                                            $user_balance = mysqli_query($conn, $user_balance);
                                                                            if($pflquery && $details_query2 && $user_balance){                                                                            
                                                                             if(mysqli_query($conn, "INSERT INTO referral_earnings(amount, name, email, referrals_code, user_name)
                                                                             VALUES(500, '{$name}', '{$email}', '$rand_2', '{$username}')")){
                                                                                if(mysqli_query($conn,"INSERT INTO referrals(amount, name, email, referrals_code, user_name, parent_code)
                                                                                VALUES(500, '{$name}', '{$email}', '{$rand_2}', '{$username}', '{$referral}')")
                                                                               && mysqli_query($conn, "UPDATE user_balance SET referral_balance = referral_balance + 500 WHERE referral_code= '{$referral}'")){
                                                                                $_SESSION['email'] = $email; 
                                                                                header("Location: forgot-question.php?info= Your account has been created successfuly Kindly select your account recovery question!");
                                                                                }
                                                                             }
                                                                            }else{
                                                                                header('Location: signUp.php?danger= Something went wrong!');
                                                                            exit();    
                                                                            }
                                                                        }else{
                                                                            header('Location: signUp.php?danger= Something went wrong!');
                                                                            exit();
                                                                        }
                                                                    }
                                                                }else{
                                                                    header('Location: signUp.php?danger= Incorrect comfirm password!');
                                                                    exit();
                                                                }
                                                            }else{
                                                                header("Location: signUp.php?danger=Password must be atleast 6-12 chars and alphanumeric!");
                                                                exit();
                                                            }
                                                            }
                                                            else{
                                                            header("Location: signUp.php?danger= Email must be a valid email!");
                                                            exit();
                                                        }
                                                    }else{
                                                        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                                                            if(preg_match('/^[a-zA-Z0-9]{6,12}$/', $password)){
                                                                $password_1 = md5($password);
                                                                $password_2 = md5($comfirm_password);
                                                                if($password_1 === $password_2){
                                                                    $select = "SELECT * FROM signup WHERE email='{$email}'";
                                                                    $sql = mysqli_query($conn, $select);
                                                                    if(mysqli_num_rows($sql) > 0){
                                                                        header("Location: signUp.php?danger= This email already exist $email");
                                                                        exit();
                                                                    }else{
                                                                        $insert = "INSERT INTO signup(name, username, email, referral_code, password, code) VALUES('{$name}', '{$username}', 
                                                                        '{$email}', '$rand_2', '{$password_1}', '{$code}'
                                                                        )";
                                                                        $log = "INSERT INTO login( email, password) VALUES('{$email}', '{$password_1}')";
                                                                        $indetinty_url = "INSERT INTO user_identity( email, verified, identity_url) VALUES('{$email}', 'UNVERIFIED', 'img_url')";
                                                                        $query1 = mysqli_query($conn, $insert);
                                                                        $query2 = mysqli_query($conn, $log);
                                                                        $query3 = mysqli_query($conn, $indetinty_url);
                                                                        if($query1 && $query2 && $query3){
                                                                            $profile_dfault = "INSERT INTO user_profile(email, img_url) VALUES('{$email}', 'img_urls')";
                                                                            $user_details = "INSERT INTO user_details(email, name, mobile, country, city, zip_code, address) VALUES('{$email}','null', 'null', 'null', 'null', 'null', 'null')";
                                                                            $user_balance = "INSERT INTO user_balance(email, acc_balance, referral_code, grind_balance) VALUES('{$email}', 0, '$rand_2', 0)";
                                                                            $pflquery = mysqli_query($conn, $profile_dfault);
                                                                            $details_query2 = mysqli_query($conn, $user_details);
                                                                            $user_balance = mysqli_query($conn, $user_balance);
                                                                            if($pflquery && $details_query2 && $user_balance){                                                                          
                                                                             if(mysqli_query($conn, "INSERT INTO referral_earnings(amount, name, email, referrals_code, user_name)
                                                                             VALUES(50, '{$name}', '{$email}', '$rand_2', '{$username}')")){
                                                                                if(mysqli_query($conn,"INSERT INTO referrals(amount, name, email, referrals_code, user_name, parent_code)
                                                                                VALUES(50, '{$name}', '{$email}', '{$rand_2}', '{$username}', '{$referral}')")
                                                                               && mysqli_query($conn, "UPDATE user_balance SET referral_balance = referral_balance + 50 WHERE referral_code= '{$referral}'")){
                                                                                $_SESSION['email'] = $email;
                                                                                header("Location: forgot-question.php?info= Your account has been created successfuly Kindly select your account recovery question!");
                                                                                }
                                                                             }
                                                                            }else{
                                                                                header('Location: signUp.php?danger= Something went wrong!');
                                                                            exit();    
                                                                            }
                                                                        }else{
                                                                            header('Location: signUp.php?danger= Something went wrong!');
                                                                            exit();
                                                                        }
                                                                    }
                                                                }else{
                                                                    header('Location: signUp.php?danger= Incorrect comfirm password!');
                                                                    exit();
                                                                }
                                                            }else{
                                                                header("Location: signUp.php?danger=Password must be atleast 6-12 chars and alphanumeric!");
                                                                exit();
                                                            }
                                                            }
                                                            else{
                                                            header("Location: signUp.php?danger= Email must be a valid email!");
                                                            exit();
                                                        }
                                                    }
                                                    }
                                                    }
                                                    }
                                                    }
                                                    }
                                                    }
                                                    }
                                                    }
                                                    }
                                                    }else{
                                                        header("Location: signUp.php?danger= Wrong Referral Code!");
                                                    exit();
                                                    }
                                                }else{
                                                    header("Location: signUp.php?danger= Incorrect Referral Code!");
                                                    exit();
                                                }
                                            }else{
                                                if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                                                    if(preg_match('/^[a-zA-Z0-9]{6,12}$/', $password)){
                                                        $password_1 = md5($password);
                                                        $password_2 = md5($comfirm_password);
                                                        if($password_1 === $password_2){
                                                            $select = "SELECT * FROM signup WHERE email='{$email}'";
                                                            $sql = mysqli_query($conn, $select);
                                                            if(mysqli_num_rows($sql) > 0){
                                                                header("Location: signUp.php?danger= This email already exist $email");
                                                                exit();
                                                            }else{
                                                                $insert = "INSERT INTO signup(name, username, email, referral_code,  password, code) VALUES('{$name}', '{$username}', 
                                                                '{$email}', '$rand_2', '{$password_1}', '{$code}'
                                                                )";
                                                                $query1 = mysqli_query($conn, $insert);
                                                                if($query1){
                                                                    $profile_dfault = "INSERT INTO user_profile(email, img_url) VALUES('{$email}', 'img_urls')";
                                                                   
                                                                    $pflquery = mysqli_query($conn, $profile_dfault);

                                                                    if($pflquery && mysqli_query($conn, "INSERT INTO referrals(amount, name, email, referrals_code, user_name)
                                                                    VALUES('0', '{$name}', '{$email}', '$rand_2', '{$username}')") && mysqli_query($conn, "INSERT INTO referral_earnings(amount, name, email, referrals_code, user_name)
                                                                    VALUES('0', '{$name}', '{$email}', '$rand_2', '{$username}')")){
                                                                     
                                                                     $user_details = "INSERT INTO user_details(email, name, mobile, country, city, zip_code, address) VALUES('{$email}','null', 'null', 'null', 'null', 'null', 'null')";
                                                                       $user_balance = "INSERT INTO user_balance(email, acc_balance, referral_code, grind_balance) VALUES('{$email}', 0, '$rand_2', 0)";
                                                                      
                                                                       $details_query2 = mysqli_query($conn, $user_details);
                                                                       $user_balance = mysqli_query($conn, $user_balance);
                                                                       
                                                                       if($user_details && $user_balance){

                                                                        $log = "INSERT INTO login( email, password) VALUES('{$email}', '{$password_1}')";
                                                                        $indetinty_url = "INSERT INTO user_identity( email, verified, identity_url) VALUES('{$email}', 'UNVERIFIED', 'img_url')";
                                                                       
                                                                        $query2 = mysqli_query($conn, $log);
                                                                        $query3 = mysqli_query($conn, $indetinty_url);

                                                                        if($query2 && $query3){
                                                                            $_SESSION['email'] = $email;
                                                                            header("Location: forgot-question.php?info= Your account has been created successfuly Kindly select your account recovery question!");
                                                                        }else{
                                                                            header("Location: signUp.php?danger= Error inserting to user indentity try later");
                                                                        }
                                                                        
                                                                       }else{
                                                                        header("Location: signUp.php?danger= Error inserting user details try later");
                                                                       }
                                                                    }else{
                                                                        header('Location: signUp.php?danger= Something went wrong!');
                                                                    exit();    
                                                                    }
                                                                }else{
                                                                    header('Location: signUp.php?danger= Something went wrong!');
                                                                    exit();
                                                                }
                                                            }
                                                        }else{
                                                            header('Location: signUp.php?danger= Incorrect comfirm password!');
                                                            exit();
                                                        }
                                                    }else{
                                                        header("Location: signUp.php?danger=Password must be atleast 6-12 chars and alphanumeric!");
                                                        exit();
                                                    }
                                                    }
                                                    else{
                                                    header("Location: signUp.php?danger= Email must be a valid email!");
                                                    exit();
                                                }
                                                }
                                            }
                                            else{
                                            header('Location: signUp.php');
                                            exit();
                                        }
?>