<?php
    $pageName = "Login";
    include "../Pages/header.php";
    

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
        if($result != null){
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

<h1 id='loginHeader'>Login</h1>

<form action='' method="post">
    Username:
    <input id="username" type="text" name="user">
    Password:
    <input id="password" type="password" name="pass">
    <input id="loginBtn" type="submit" value="Submit">
</form>

<?php include "/Pages/footer.php"; ?>