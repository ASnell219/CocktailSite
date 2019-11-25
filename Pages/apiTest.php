<?php $pageName = "Test"; 
include "../Pages/header.php";
include "../Pages/menu.php";
?>

<h1>Test</h1>
<?php
    $url="https://www.thecocktaildb.com/api/json/v1/1/search.php?s=margarita";
    $data =file_get_contents($url);
    $json = json_decode($data);
    echo '<table border=1>';
    foreach($json as $drinks){
        foreach($drinks as $drink){
            echo "<tr>";
            echo "<td>{$drink->strDrink}</td>";
            echo "<td>{$drink->strCategory}</td>";
            echo "<td>{$drink->strAlcoholic}</td>";
            $imgSrc ="{$drink->strDrinkThumb}";
            echo "<td><img src=$imgSrc></td>";
            echo "</tr>";
        }
    }
    echo "</table>";
?>
<?php include "footer.php";?>