<?php
$menuArr = [  
    "Home" => "../Pages/index.php",
    "Search for Drinks" => "../Pages/drinkSearch.php",
    "Search for Ingredients" => "../Pages/ingredientSearch.php",
];

$userSettings = array();
if(isset($_SESSION['login_user'])){
    $userSettings = array("Profile" => "../Pages/profile.php");
}else{
    $userSettings = array("Login" => "../Pages/login.php");
}

$menuArr = array_merge($menuArr, $userSettings);

foreach($menuArr as $key => $value){
    echo "<a href=$value> $key </a>";
}

?>