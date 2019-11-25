<?php
    session_start();

    include "../dbconfig.php";
    
    $query = "Select * from users where Username='".$_SESSION['user']."'";
    $result = $mysqli->query($query);
    $u_id;
    if($result != null){
        $row = $result->fetch_assoc();
        extract($row);
        $u_id= $User_ID;
    }else{
        echo "null";
    }
    $query = 'insert into `favorites` (`User_ID`, `Drink_ID`) Values ('; 
    $query .= '"'.$u_id.'",';//get user ID
    $query .= '"'.$_GET['d_id'].'")';
    $result = $mysqli->query($query);

?>