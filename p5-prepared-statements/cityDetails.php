<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula 12-03-2024</title>
</head>
<body>
    <h1>City Details</h1>
    <?php

    $cityId = isset( $_GET['id'] ) ? $_GET['id'] : 0;

    // Conectar ao banco de dados
    $mysqli = new mysqli("127.0.0.1", "root", "", "world", 3306);
    // DANGER: We should never concatenate directly could lead to SQL INJECTIONS
    // Use parametized queries instead
    $statment = $mysqli->prepare("
        SELECT 
            ID
            city.Name AS City,
            District,
            City.Population,
            country.Name AS Country,
            Continent
        FROM city
        JOIN country ON country.Code = city.CountryCode
        WHERE ID = ?");

    $statment->bind_param( "i", $cityId);

    $statment ->  execute();

    $numRows = $result->num_rows;
    $row = $result->fetch_assoc();
    ?>

    <p>Number of results: <?= $numRows ?></p>
    <h2><? $row["City"] ?></h2>
    <p>District: <? $row["District"] ?></p>
    <p>Population: <?= $row ["Population"] ?></p>
    <p>Country: <?= $row ["Country"] ?></p>
    <p>Continent: <?= $row ["Continent"] ?></p>

    <!-- Closing the database connection -->
    <?php
    $mysqli->close();
    ?>
</body>
</html>
