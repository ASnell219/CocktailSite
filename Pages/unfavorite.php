<?php
    session_start();

    include "../dbconfig.php";
    
    $query = "Select * from users where Username='".$_SESSION['user']."'";
    $result = $mysqli->query($query);
    $u_id;
    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        extract($row);
        $u_id= $User_ID;
    }
    $query = "Delete from favorites where User_ID='".$u_id."'&& Drink_ID='".$_GET['d_id']."'";
    $mysqli->query($query);
    header('Location: profile.php');
    
?>