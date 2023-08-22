<?php
require('serverConn/conn.php');
class resset_password {
    private$data;
    private $errors = [];
    private static $fields = ['new', 'old'];

    public function __construct($post_data){
        $this->data = $post_data;
    }

    public function validate_form_1(){
        foreach( self:: $fields as $field ){
            if(!array_key_exists($field, $this->data)){
                trigger_error("$field is not present in data");
                return;
            }
        }
        $this->validateNew();
        $this->validateOld();
        return $this->errors;
    }

    private function validateNew(){
        $val = trim($this->data['new']);
        if(empty($val)){
            $this->addError('new', 'Password cannot be empty');
        }else{
            if(!preg_match('/^[a-zA-Z0-9]{6,12}$/', $val)){
                $this->addError('new', 'Password must be atleast 6-12 chars & alphanumeric');
            }
        }
    }

    private function validateOld(){
        $val = trim($this->data['old']);
        if(empty($val)){
            $this->addError('old', 'Password cannot be empty!');
        }
    }

    private function addError($key, $val){
    $this->errors[$key] = $val;
    }
}

if(isset($_POST['update'])){
    $ressetValidator = new resset_password($_POST);
    $errors = $ressetValidator->validate_form_1();

    if(!$errors){
        $old = mysqli_real_escape_string($conn, md5($_POST['old']));
        $new = mysqli_real_escape_string($conn, md5($_POST['new']));

        if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM admin"))){
            $row_1 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM admin"));
            if($row_1['password'] == $old){
                if(mysqli_query($conn, "UPDATE admin SET password='{$new}'")){
                    header("Location: settings.php?success= Password updaed succesfuly!");
                exit();
                }else{
                    header("Location: settings.php?danger= An error has occured!");
                exit();   
                }
            }else{
                header("Location: settings.php?danger= Incorrect password!");
                exit();
            }
        }
    }
}elseif(isset($_FILES['profile'])){
    $img_name = $_FILES['profile'] ['name'];
    $img_size = $_FILES['profile'] ['size'];
    $tmp_name = $_FILES['profile'] ['tmp_name'];
    $img_error = $_FILES['profile'] ['error'];

    if($img_error === 0){
        if($img_size > 1250000){
            header("Location: settings.php?danger= File is too large for upload!");
            exit();    
        }else{
            $img_path_info = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_str_lw = strtolower($img_path_info);
            $img_alw_ex = array('jpg', 'png', 'jpeg');
            
            if(in_array($img_str_lw, $img_alw_ex)){
                $new_img_name = uniqid('IMG-',true) . '.' . $img_str_lw;
                $img_upload_path = "profiles/" . $new_img_name;
                $move = move_uploaded_file($tmp_name, $img_upload_path);
                if($move){
                    if(mysqli_query($conn, "UPDATE admin SET img_url='{$new_img_name}'")){
                        header("Location: settings.php?success= Profile updated succesfuly!");
                        exit();
                    }else{
                        header("Location: settings.php?danger= Error upoading profile!");
                    exit();
                    }
                }else{
                    header("Location: settings.php?danger= Error upoading profile!");
                    exit();
                }
            }else{
                header("Location: settings.php?danger= This file type is not accepted!");
                exit();
            }
        }
    }else{
        header("Location: settings.php?danger= An error has occured please try again later!");
        exit();
    }
}elseif(isset($_POST['email'])){
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header("Location: settings.php?danger= Email must be a valid email");
        exit();
    }else{
        if(mysqli_query($conn, "UPDATE admin SET email='{$email}'")){
            header("Location: settings.php?succes= Email has been updated succesfuly!");
            exit();
        }
    }
}


?>