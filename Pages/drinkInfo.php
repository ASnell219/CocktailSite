<?php $pageName = "Drink Info"; 
include "header.php";
include "menu.php";
?>
<?php
    $url="https://www.thecocktaildb.com/api/json/v2/9973533/lookup.php?i=".$_GET['d_id'];
    $data =file_get_contents($url);
    $json = json_decode($data);
    echo '<table border=1>';
    foreach($json as $drinks){
        foreach($drinks as $drink){
            echo "<tr>";
            echo "<td>{$drink->strDrink}</td>";
            $imgSrc ="{$drink->strDrinkThumb}";
            echo "<td><img src=$imgSrc></td>";


            for($i = 1; $i < 16; $i++)
            {
                $ingredient = "strIngredient".$i;
                if(!empty($drink->$ingredient))
                {
                   echo "<td>{$drink->$ingredient}</td>";
                }
            }

            echo "<td>{$drink->strInstructions}</td>";
            
            if (isset($_SESSION['user'])) 
            {
                echo "<td><a href='favorite.php?d_id={$drink->idDrink}'>Favorite</a></td>";
            }
            echo "</tr>";
        }
    }
    echo "</table>";
?>


<?php include "footer.php"; ?>
