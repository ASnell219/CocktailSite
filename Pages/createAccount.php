<<<<<<< HEAD
<?php include "header.php"; 
    if(!empty($_POST))
    {
        if(isset($_POST["user"]) && isset($_POST["pass"]))
        {
            if(!SearchForUser($_POST["user"]))
            {
                CreateUser($_POST["user"], $_POST["pass"]);
                //need to know if admin
                header('Location: index.php');
            }
            else
            {
                header('Location: createAccount.php');
            }
        }
    }
    function SearchForUser($user) {
        include "../dbconfig.php";

        $query = "Select * from users where Username='".$user."'";
        $result = $mysqli->query($query);
        if($result != null){
        
            return true;
        }
        else{
            return false;
        }
    }
    function CreateUser($user, $pass) {
        include "../dbconfig.php";

        $query = "Insert into `users` (`Username`, `Password`, `IsAdmin`) VALUES ('".$user."','".$pass."',0)";
        $result = $mysqli->query($query);
    }
?>
<h1 id='loginHeader'>CreateAccount</h1>

<form action='' method="post">
    Username:
    <input id="username" type="text" name="user">
    Password:
    <input id="password" type="password" name="pass">
    <input id="loginBtn" type="submit" value="Submit">
</form>
<?php include "footer.php"; ?>
=======
<?php $pageName = "Create Account"; 
include "../Pages/header.php";
?>
>>>>>>> 01918c16420021aece308f256c34effe6d278e7e
