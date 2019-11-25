<?php
    $pageName = "Login";
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

<div id="contentHolder" class="box flex-col">
    <div class="box flex-row">
        <div id="signupArea" class='box flex-col center-align'>
            <div id="img"><img src="../styles/images/cocktails3.jpg" /></div>
            <div id="info">
                <div>Don't have an account?</div>
                <div>Sign up here!</div>
            </div>
            <div id="signupBtn" class="btn">Sign Up</div>
        </div>
        <div id="loginArea" class='box flex-col'>
            <form action='' method="post" class='box flex-col center-align'>
                <div id="title">Sign in to "site name"</div>
                <input class="formInput" type="text" name="user" placeholder="Username">
                <input class="formInput" type="text" name="pass" placeholder="Password">
                <input id="loginBtn" class="btn" type="submit" value="Sign In">
            </form>
        </div>
    </div>
    <?php include "footer.php"; ?>
</div>




