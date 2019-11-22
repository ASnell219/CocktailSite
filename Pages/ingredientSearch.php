<?php $pageName = "Ingredient Search"; 
include "header.php";
include "menu.php";
?>

<h1>Search for Ingredients! </h1>

<form method="post">
<input type="text" name="ingredient" id="ingredient" value=""><br/>
<input type="submit" value="Search">
</form>


<?php include "footer.php"; ?>
