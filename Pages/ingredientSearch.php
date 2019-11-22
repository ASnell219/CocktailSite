<?php $pageName = "Ingredient Search"; 
include "../Pages/header.php";
include "../Pages/menu.php";
?>

<h1>Search for Ingredients! </h1>

<form method="post">
<input type="text" name="ingredient" id="ingredient" value=""><br/>
<input type="submit" value="Search">
</form>


<?php include "../Pages/footer.php"; ?>
