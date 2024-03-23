<!DOCTYPE html>
<html lang="en">
<?php require_once("./head.php"); ?>

<body>
    <?php
    require_once("./navbar.php");
    ?>

    <div id="pageWrapper">
        <h2>Add a new Car</h2>
        <form id="addCarForm" action="carAddHandler.php" method="post">
            <input type="text" name="plate" placeholder="Plate" required><br>
            <input type="text" name="brand" placeholder="Brand"><br>
            <input type="text" name="model" placeholder="Model"><br>
            <input type="number" name="year" placeholder="Year"><br>
            <input type="text" name="color" placeholder="Color"><br>
            <input type="number" name="price" placeholder="Price"><br>
            <input type="text" name="image" placeholder="Image Link"><br>

            <button class="addCarButton">Add Car</button>
        </form>
        

</body>

</html>