<?php 
$pageName = "Drink Search"; 
$cssFilename = "../styles/drinkSearch.css";
include "header.php";
include "menu.php";
?>

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
    <div id="inputArea" class="box flex-row">
        <input type="text" name="drinkName" id="drinkName" value="<?php echo $drinkName ?>"><br/>
        <button id="submitBtn" type="submit"><i id='search' class="fas fa-search"></i></button>
    </div>
</form>

<?php   
    $data = file_get_contents($url);
    $json = json_decode($data);
    if(is_array($json) || is_object($json))
    {
        echo "<div id='drinks' class='container'>";
        echo "<div class='grid-row'>";
        foreach($json as $drinks){
            if(is_array($drinks))
            {
                foreach($drinks as $drink){
                    echo "<div class='grid-item'>";
                    echo "<div id='card' href='drinkInfo.php?d_id={$drink->idDrink}'>";
                    $imgSrc ="{$drink->strDrinkThumb}";
                    echo "<img src=$imgSrc>";
                    echo "<a class='name'>{$drink->strDrink}</a>";
            
                    if (isset($_SESSION['user'])) 
                    {
                        echo "<a class='favorites' href='favorite.php?d_id={$drink->idDrink}'><i class='far fa-heart fa-lg unfilled'></i><i class='fas fa-heart fa-lg filled'></i></a>";
                    }
                    echo "</div>";
                    echo "</div>";
                }
            } 
            else 
            {
            echo "<div id='error'>There are no drinks with that in the name</div>";
            }
        }
        echo "</div>";
        echo "</div>";;       
    }
?>

<?php "footer.php";?>

<!-- 
    Unfilled Heart
    <i class='far fa-heart fa-lg unfilled'></i>

    Filled Heart
    <i class='fas fa-heart fa-lg filled'></i> 

    Search Icon
    <i id='search' class="fas fa-search"></i>
-->