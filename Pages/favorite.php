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
    }else{
        echo "null";
    }
    $d_id=$_GET['d_id'];
    // $query = "Select * from favorites where User_ID='".$u_id."'&& Drink_ID='".$d_id."'";
    // $result = $mysqli->query($query);
    // if($result->num_rows==0){
        $query = 'insert into `favorites` (`User_ID`, `Drink_ID`) Values ('; 
        $query .= '"'.$u_id.'",';
        $query .= '"'.$d_id.'")';
        $result = $mysqli->query($query);

    // }
    // header('Location: index.php');

    
?>