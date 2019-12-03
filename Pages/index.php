<?php 
$pageName = "Home"; 
$cssFilename = "../styles/index.css";
include "../Pages/header.php";
include "../Pages/menu.php";
?>

<h1> Welcome to the Cocktail Site! </h1>
<?php
    $url="https://www.thecocktaildb.com/api/json/v2/9973533/randomselection.php";
    $data =file_get_contents($url);
    $json = json_decode($data);
    echo "<div id='drinks' class='container'>";
    echo "<div class='grid-row'>";
    foreach($json as $drinks){
        foreach($drinks as $drink){
            echo "<a href='drinkInfo.php?d_id={$drink->idDrink}'>";
            echo "<div class='singleDrink box grid-item'>";
            $imgSrc ="{$drink->strDrinkThumb}";
            echo "<img src=$imgSrc>";
            echo "<div>";
            echo "{$drink->strDrink}";
            echo "</div>";
            if (isset($_SESSION['user'])) 
            {
                echo "<td><a href='favorite.php?d_id={$drink->idDrink}'>Favorite</a></td>";
            }
            echo "</div>";
            echo "</a>";
        }
    }
    echo "</div>";
    echo "</div>";
?>
<?php include "footer.php";?>