<?php $pageName = "Drink Search"; 
include "header.php";
include "menu.php";
?>

<h1> Search for Drinks! </h1>

<?php 
if(isset($_POST['drinkName'])) {
    $drinkName = $_POST['drinkName'];
    $url="https://www.thecocktaildb.com/api/json/v1/1/search.php?s=".$drinkName;
}else{
    $drinkName = "";
    $url = "https://www.thecocktaildb.com/api/json/v1/1/search.php?f=a";
}
?>

<form method="post">
<input type="text" name="drinkName" id="drinkName" value="<?php echo $drinkName ?>"><br/>
<input type="submit" value="Search">
</form>

<?php   
    $data = file_get_contents($url);
    $json = json_decode($data);
    if(is_array($json) || is_object($json))
    {
        echo '<table border=1>';
        foreach($json as $drinks){
            if(is_array($drinks))
            {
                foreach($drinks as $drink){
                    echo "<tr>";
                    echo "<td><a href='drinkInfo.php?d_id={$drink->idDrink}'>{$drink->strDrink}</a></td>";
                    $imgSrc ="{$drink->strDrinkThumb}";
                    echo "<td><img src=$imgSrc></td>";
            
                    if (isset($_SESSION['user'])) 
                    {
                        echo "<td><a href='favorite.php?d_id={$drink->idDrink}'>Favorite</a></td>";
                    }
                    echo "</tr>";
                }
            } 
            else 
            {
            echo "There are no drinks with that in the name";
            }
        }
        echo "</table>";       
    }
?>

<?php "footer.php";?>
