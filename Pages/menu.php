<?php
$menuArr = [  
    "Home" => "../Pages/index.php",
    "Drinks" => "../Pages/drinkSearch.php"
];

$userSettings = array();
if(isset($_SESSION['user'])){
    $userSettings = array("Profile" => "../Pages/profile.php", "Logout" => "../Pages/logout.php");
}else{
    $userSettings = array("Login" => "../Pages/login.php", "Create Account" => "../Pages/createAccount.php");
}

$menuArr = array_merge($menuArr, $userSettings);
echo "<ul id='navbar' class='box flex-row'>";
echo "<div id='logo' class='box flex-row'> Logo </div>";
echo "<div class='box flex-row'>";
foreach($menuArr as $key => $value){
    echo "<li><a href=$value> $key </a></li>";
    
}
echo "</div>";
echo "</ul>";

?>