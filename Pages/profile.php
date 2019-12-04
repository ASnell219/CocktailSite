<?php 
$pageName = "Profile"; 
$cssFilename = "../styles/profile.css";
include "header.php";
include "menu.php";
?>


<div id='profileContainer' class='box flex-row'>
    <div id='userProfile' class='box flex-col'>
        <div id='profilePic' class='box flex-row'><img src="../styles/images/cocktails4.jpg"/></div>
        <div id='username' class='box flex-row'> Username </div>
    </div>
    <div id='favoritesArea' class='box flex-col'>
        <?php
        if (isset($_SESSION['user'])) 
            {
                include "../dbconfig.php";
                $query = "Select * from users where Username='".$_SESSION['user']."'";
                $result = $mysqli->query($query);
                $u_id;
                if($result->num_rows>0 ){
                    $row = $result->fetch_assoc();
                    extract($row);
                    $u_id= $User_ID;
                }
                $query = "Select * from Favorites where User_ID=".$u_id;
                $result = $mysqli->query($query);
                $num_results = $result->num_rows;
                echo '<table border=1>';

        if($num_results>0){
            while( $row = $result->fetch_assoc() ){
                extract($row);
                $url="https://www.thecocktaildb.com/api/json/v2/9973533/lookup.php?i=".$Drink_ID;
                $data =file_get_contents($url);
                $json = json_decode($data);
                foreach($json as $drinks){
                    foreach($drinks as $drink){
                        echo "<tr>";  
                        echo "<td><a href='drinkInfo.php?d_id={$drink->idDrink}'>{$drink->strDrink}</a></td>";
                        $imgSrc ="{$drink->strDrinkThumb}";
                        echo "<td><img src=$imgSrc></td>";
                        
                        if (isset($_SESSION['user'])) 
                        {
                            echo "<td><a href='unfavorite.php?d_id={$drink->idDrink}'>Unfavorite</a></td>";
                        }
                    }
                }else{
                }
                echo "</table>";

            }
        ?>
    </div>
</div>
<?php include "footer.php";?>

<!-- 
    Unfilled X
    <i class="far fa-times-circle fa-lg unfilled"></i>

    Filled X
    <i class="fas fa-times-circle fa-lg filled"></i> 
-->