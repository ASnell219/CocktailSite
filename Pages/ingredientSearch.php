<?php $pageName = "Ingredient Search"; 
include "header.php";
include "menu.php";
?>

<h1>Search for Ingredients! </h1>

<?php 
if(isset($_POST['ingredientName'])) {
    $ingredientName = $_POST['ingredientName'];
    $url = "https://www.thecocktaildb.com/api/json/v1/1/search.php?i=".$ingredientName;
}else{
    $ingredientName = "";
    $url = "https://www.thecocktaildb.com/api/json/v1/1/list.php?i=list";
}
?>

<form method="post">
<input type="text" name="ingredientName" id="ingredientName" value="<?php echo $ingredientName ?>"><br/>
<input type="submit" value="Search">
</form>

<?php
    $data = file_get_contents($url);
    $json = json_decode($data);
    echo '<table border=1>';
    foreach($json as $ingredients){
        foreach($ingredients as $ingredient){
            echo "<tr>";
            echo "<td>{$ingredient->strIngredient}</td>";
            //echo "<td>{$drink->strCategory}</td>";
            //echo "<td>{$drink->strAlcoholic}</td>";
            //$imgSrc ="{$drink->strDrinkThumb}";
            //echo "<td><img src=$imgSrc></td>";
            
            // if (isset($_SESSION['user'])) 
            // {
            //     echo "<td><a href='favorite.php?d_id={$drink->idDrink}'>Favorite</a></td>";
            // }
            echo "</tr>";
        }
    }
    echo "</table>";
?>

<?php include "footer.php"; ?>
