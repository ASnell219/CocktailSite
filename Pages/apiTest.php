<?php $pageName = "Test"; 
    include "../Pages/header.php";
    include "../Pages/menu.php";
    $_SESSION['currentPage'] = $_SERVER['REQUEST_URI'];
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
            
            if (isset($_SESSION['user'])) 
            {
                echo "<td><a href='favorite.php?d_id={$drink->idDrink}'>Favorite</a></td>";
            }
            echo "</tr>";
        }
    }
    echo "</table>";
?>
<?php include "footer.php";?>