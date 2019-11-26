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
                $url="https://www.thecocktaildb.com/api/json/v1/1/lookup.php?i=".$Drink_ID;
                $data =file_get_contents($url);
                $json = json_decode($data);
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