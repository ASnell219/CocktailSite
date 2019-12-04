<?php 
$pageName = "Home"; 
$cssFilename = "../styles/index.css";
include "../Pages/header.php";
include "../Pages/menu.php";
?>

<h1 id="title"> Drinks of the Day </h1>
<?php
    $url="https://www.thecocktaildb.com/api/json/v2/9973533/randomselection.php";
    $data =file_get_contents($url);
    $json = json_decode($data);
    echo "<div id='drinks' class='container'>";
    echo "<div class='grid-row'>";
    foreach($json as $drinks){
        foreach($drinks as $drink){
            echo "<div class='singleDrink box grid-item'>";
            echo "<a id='card' href='drinkInfo.php?d_id={$drink->idDrink}'>";
            $imgSrc ="{$drink->strDrinkThumb}";
            echo "<img src=$imgSrc>";
            echo "<div class='name'>{$drink->strDrink}</div>";

            if (isset($_SESSION['user'])) 
            {
                echo "<a class='favorites' href='favorite.php?d_id={$drink->idDrink}'><i class='far fa-heart fa-lg unfilled'></i><i class='fas fa-heart fa-lg filled'></i></a>";
            }
            echo "</a>";
            echo "</div>";
        }
    }
    echo "</div>";
    echo "</div>";
?>
<?php include "footer.php";?>