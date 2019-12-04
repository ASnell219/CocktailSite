<?php $pageName = "Profile"; 
include "header.php";
include "menu.php";
?>


<h1>Here are your favorites </h1>
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
                        echo "</tr>";
                    }
                }
            }
        }else{
        }
        echo "</table>";

    }
?>
<?php include "footer.php";?>
