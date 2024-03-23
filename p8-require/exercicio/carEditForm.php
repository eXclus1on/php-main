<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <link rel="stylesheet" href="./styles/main.css">
</head>

<body>
    <?php
    $plate = isset($_GET["plate"]) ? $_GET["plate"] : "";
    $mysqli = new mysqli("localhost", "root", "", "bd_stand_ze", 3306);

    // Read City to edit based on ID
    $statement = $mysqli->prepare("SELECT * FROM cars WHERE Plate = ?");
    $statement->bind_param("s", $plate);
    $statement->execute();

    $result = $statement->get_result();
    $cars = $result->fetch_assoc();

    ?>
    <div id="pageWrapper">
        <h2>Edit <?= $cars["Plate"] ?></h2>
        <form id="editCarForm" action="carEditHandler.php" method="post">
            <input type="text" name="plate" placeholder="Plate" required value="<?= $cars["Plate"] ?>"><br>
            <input type="text" name="brand" placeholder="Brand" value="<?= $cars["Brand"] ?>"><br>
            <input type="text" name="model" placeholder="Model" value="<?= $cars["Model"] ?>"><br>
            <input type="number" name="year" placeholder="Year" value="<?= $cars["Year"] ?>"><br>
            <input type="text" name="color" placeholder="Color" value="<?= $cars["Color"] ?>"><br>
            <input type="number" name="price" placeholder="Price" value="<?= $cars["Price"] ?>"><br>
            <input type="text" name="image" placeholder="Image Link" value="<?= $cars["Image"] ?>"><br>

            <button class="editCarButton">Edit Car Info</button>
        </form>

</body>

</html>