<?php
$menuArr = [  
    "Home" => "../Pages/index.php",
    "Search for Drinks" => "../Pages/drinkSearch.php"
];

$userSettings = array();
if(isset($_SESSION['user'])){
    $userSettings = array("Profile" => "../Pages/profile.php", "Logout" => "../Pages/logout.php");
}else{
    $userSettings = array("Login" => "../Pages/login.php", "Create Account" => "../Pages/createAccount.php");
}

$menuArr = array_merge($menuArr, $userSettings);

foreach($menuArr as $key => $value){
    echo "<a href=$value> $key </a>";
}

?>