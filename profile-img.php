<?php
session_start();
include("serverConn/conn.php");

if(isset($_POST["submit"]) && isset($_FILES["user_profile"])){
    $img_name = $_FILES['user_profile']['name'];
    $img_size = $_FILES['user_profile']['size'];
    $tmp_name = $_FILES['user_profile']['tmp_name'];
    $img_error = $_FILES['user_profile']['error'];
    if($img_error === 0){
        if($img_size > 12500000){
            header("Location: profilekey.php?danger= File too large for upload!");
        exit(); 
        }else{
           $img_path_info = pathinfo($img_name, PATHINFO_EXTENSION);
           $img_str_lw = strtolower($img_path_info);
           $img_alwd_ex = array("png", "jpg", "jpeg");
           if(in_array($img_str_lw, $img_alwd_ex)){
                $new_img_name = uniqid("Bitclub-",true). "." .$img_str_lw;
                $img_upload_path = "profiles/" . $new_img_name;
                $move1 = move_uploaded_file($tmp_name, $img_upload_path);
                if($move1){
                    $user_email_1 = $_SESSION['email'];
                    $user_id_1 = $_SESSION['id'];
                    $update1 = "UPDATE user_profile SET img_url='{$new_img_name}' WHERE email='$user_email_1' AND id='$user_id_1'";
                    if(mysqli_query($conn, $update1)){
                        header("Location: profilekey.php?success= Profile updated succefully.");
                        exit();
                    }else{
                        header("Location: profilekey.php?danger= Error uploading image!");
                        exit();
                    }
                }else{
                    header("Location: profilekey.php?danger= Error uploading image!");
                    exit(); 
                }
           }else{
            header("Location: profilekey.php?danger= This file type is not supported!");
            exit();
           }
        }
    }else{
        header("Location: profilekey.php?danger= An error has occured!");
        exit();
    }
}elseif(isset($_POST['submit']) && isset($_FILES['identity'])){
    $img_name_2 = $_FILES['identity']['name'];
    $img_size_2 = $_FILES['identity']['size'];
    $tmp_name_2 = $_FILES['identity']['tmp_name'];
    $img_error_2 = $_FILES['identity']['error'];
    if($img_error_2 === 0){
        if($img_size_2 > 12500000){
            header("Location: profilekey.php?danger2= File too large for upload!");
            exit();
        }else{
            $img_path_info_2 = pathinfo($img_name_2, PATHINFO_EXTENSION);
            $img_str_lw_2 = strtolower($img_path_info_2);
            $img_alwd_ex_2 = array("jpg", "png", "jpeg");
            if(in_array($img_str_lw_2, $img_alwd_ex_2)){
                $new_img_name_2 = uniqid("Bitclub-",true). "." . $img_str_lw_2;
                $img_upload_path_2 = "identityDoc/" . $new_img_name_2;
                $move_2 = move_uploaded_file($tmp_name_2, $img_upload_path_2);
                if($move_2){
                    $user_email_1 = $_SESSION['email'];
                    $user_id_1 = $_SESSION['id'];
                    $update2 = "UPDATE user_identity SET verified='VERIFIED', identity_url='{$new_img_name_2}' WHERE email='$user_email_1' AND id='$user_id_1' ";
                   if(mysqli_query($conn, $update2)){
                    header("Location: profilekey.php?success= Your identity info has been submited succesfully!");
                    exit();
                   }else{
                    header("Location: profilekey.php?danger= Error uploading image!");
                    exit();   
                   }
                }else{
                    header("Location: profilekey.php?danger= Error uploading image!");
                    exit(); 
                }
            }else{
                header("Location: profilekey.php?danger= This file type is not supported!");
                exit();
            }
        }
    }else{
        header("Location: profilekey.php?danger= An error has occured!");
        exit();
    }
}elseif(isset($_POST["user_details"])){
   $name = mysqli_real_escape_string($conn, $_POST["fulltName"]);
   $mobile = mysqli_real_escape_string($conn, $_POST["number"]);
   $country = mysqli_real_escape_string($conn, $_POST["country"]);
   $city = mysqli_real_escape_string($conn, $_POST["city"]);
   $zip_code = mysqli_real_escape_string($conn, $_POST["zip_code"]);
   $address = mysqli_real_escape_string($conn, $_POST["address"]);
   
   $email = $_SESSION['email'];
   $id = $_SESSION['id'];
   $update3 = "UPDATE user_details SET name='{$name}', mobile='{$mobile}', country='{$country}',
    city='{$city}', zip_code='{$zip_code}', address='{$address}' WHERE email='{$email}' AND id='{$id}'";
    if(mysqli_query($conn, $update3)){
        header("Location: profilekey.php?success= Account information have been updated succesfully!");
        exit();
    }else{
        header("Location: profilekey.php?danger= Error updating account information!");
        exit();
    }
}else{
    header("Location: profilekey.php");
    exit();
}


?>