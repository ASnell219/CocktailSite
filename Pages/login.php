<?php
    $pageName = "Login";
    $cssFilename = "../styles/login.css";
    include "header.php";
    

    if(!empty($_POST))
    {
        if(isset($_POST["user"]) && isset($_POST["pass"]))
        {
            if(SearchForUser($_POST["user"], $_POST["pass"]))
            {
                $_SESSION['user'] = $_POST["user"];
                //need to know if admin
                header('Location: index.php');
            }
            else
            {
                echo "The username or password was incorrect.";
            }
        }
    }

    function SearchForUser($user, $pass) {
        include "../dbconfig.php";

        $query = "Select * from users where Username='".$user."'&&Password='".$pass."'";
        $result = $mysqli->query($query);
        $numResults = $result->num_rows;
        if($numResults>0){
            $row = $result->fetch_assoc();
            extract($row);
            if($IsAdmin == 1){
                $_SESSION['admin'] = true;
            }
            else{
                $_SESSION['admin'] = false;
            }

            return true;
        }
        else{
            return false;
        }
    }
?>

<div class="box flex-row contentHolder">
    <div class='infoArea box flex-col center-align'>
        <div class="imgHolder"><img src="../styles/images/cocktails3.jpg"/></div>
        <div class="signupInfo">
            <h1>Hello Friend!</h1>
            <div>Don't have an account?</div>
            <div>Sign up here!</div>
        </div>
        <a id="signBtn" class="btn2" href="createAccount.php">Sign Up</a>
    </div>
    <div id="formArea" class='box flex-col'>
        <form action='' method="post" class='box flex-col center-align'>
            <div id="title">Sign in to the Cocktail Lounge!</div>
            <input class="formInput" type="text" name="user" placeholder="Username">
            <input class="formInput" type="text" name="pass" placeholder="Password">
            <input id="submitBtn" class="btn" type="submit" value="Sign In">
        </form>
    </div>
</div>




