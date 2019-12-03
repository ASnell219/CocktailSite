<?php 
    $pageName = "Create Account"; 
    $cssFilename = "../styles/createAccount.css";
    include "header.php"; 
    if(!empty($_POST))
    {
        if(isset($_POST["user"]) && isset($_POST["pass"]))
        {
            SearchForUser($_POST["user"], $_POST["pass"]);
        }
    }
    function SearchForUser($user, $pass) {
        include "../dbconfig.php";

        $query = "Select * from users where Username='".$user."'";
        $result = $mysqli->query($query);
        $numResults = $result->num_rows;
        if($numResults>0){
            header('Location: login.php');            
        }
        else{
            CreateUser($user, $pass);
                //need to know if admin
                header('Location: index.php');
        }
    }
    function CreateUser($user, $pass) {
        include "../dbconfig.php";

        $query = "Insert into `users` (`Username`, `Password`, `IsAdmin`) VALUES ('".$user."','".$pass."',0)";
        $mysqli->query($query);
    }
?>
<!-- <h1 id='loginHeader'>CreateAccount</h1>

<form action='' method="post">
    Username:
    <input id="username" type="text" name="user">
    Password:
    <input id="password" type="password" name="pass">
    <input id="createBtn" type="submit" value="Submit">
</form> -->
<div class="box flex-row contentHolder">
    <div id="formArea" class='box flex-col'>
        <form action='' method="post" class='box flex-col center-align'>
            <div id="title">Create Account</div>
            <input class="formInput" type="text" name="user" placeholder="Username">
            <input class="formInput" type="text" name="pass" placeholder="Password">
            <input id="submitBtn" class="btn" type="submit" value="Create Account">
        </form>
    </div>
    <div class='infoArea box flex-col center-align'>
        <div class="imgHolder"><img src="../styles/images/cocktails5.jpg"/></div>
        <div class="signupInfo"> 
            <h1>Hey Friend!</h1>
            <div>Already have an account?</div>
            <div>Sign in here!</div>
        </div>
        <a id="signBtn" class="btn2" href="login.php">Sign In</a>
    </div>
</div>