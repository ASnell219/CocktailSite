<?php 
$pageName = "Drink Info"; 
$cssFilename = "../styles/drinkInfo.css";
include "header.php";
include "menu.php";
?>
<?php
    $url="https://www.thecocktaildb.com/api/json/v2/9973533/lookup.php?i=".$_GET['d_id'];
    $data =file_get_contents($url);
    $json = json_decode($data);
    // echo "<div id='drinks' class='container'>";
    // echo "<div class='grid-row'>";
    echo "<div id='container' class='box flex-row'>";
    foreach($json as $drinks){
        foreach($drinks as $drink){
            // echo "<div class='grid-item'>";
            echo "<div id='image' class='box flex-col'>";
            $imgSrc ="{$drink->strDrinkThumb}";
            echo "<img src=$imgSrc>";
            echo "</div>";

            echo "<div id='info' class='box flex-col'>";
            echo "<div class='name' class='box flex-row'>{$drink->strDrink}</div>";
            echo "<div id='ingredientTitle' class='box flex-row'>Ingredients</div>";
            echo "<div id='ingredientsList' class='box flex-col'>";
            for($i = 1; $i < 16; $i++)
            {
                $ingredient = "strIngredient".$i;
                if(!empty($drink->$ingredient))
                {
                   echo "<div class='box flex-row ingredients'>{$drink->$ingredient}</div>";
                }
            }
            echo "</div>";
            
            echo "<div class='box flex-col'>";
            echo "<div id='instructTitle' class='box flex-row'>Instructions</div>";
            echo "<div id='instruct' class='box flex-row'>{$drink->strInstructions}</div>";
            echo "</div>";

            echo "</div>";
            if (isset($_SESSION['user'])) 
            {
                echo "<a class='favorites' href='favorite.php?d_id={$drink->idDrink}'><i class='far fa-heart fa-lg unfilled'></i><i class='fas fa-heart fa-lg filled'></i></a>";
            }
            echo "</div>";
        }
    }
    echo "</div>";
    echo "</div>";  
?>


<?php include "footer.php"; ?>
