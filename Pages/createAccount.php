<?php $pageName = "Create Account"; 
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
<h1 id='loginHeader'>CreateAccount</h1>

<form action='' method="post">
    Username:
    <input id="username" type="text" name="user">
    Password:
    <input id="password" type="password" name="pass">
    <input id="createBtn" type="submit" value="Submit">
</form>
<?php include "footer.php"; ?>

