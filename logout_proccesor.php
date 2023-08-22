<?php 
session_start();
require('serverConn/conn.php');
if(isset($_GET['logout'])){
    if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM status_2")) > 0){
        $row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM status_2"));
        $decreament = $row['pending'] - 1;
        if(mysqli_query($conn, "UPDATE status_2 SET pending='{$decreament}'")){
           if(session_destroy()){
            header("Location: login.php");
           }
        }else{
            echo "Error";
            return 0;
        }
    }
}
?>