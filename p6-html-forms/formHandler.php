<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula 12-03-2024</title>
</head>
<body>
    <?php
    $name = isset ($_GET["name"])?$_GET["name"]:"";
    $countryCode = isset ($_GET["countryCode"])?$_GET["countryCode"]: "";
    $district = isset ($_GET ["district"])? $_GET ["district"] : "";
    $population = isset ($_GET["population"]) ? $_GET["population"] : "";

    // Conectar ao banco de dados
    $mysqli = new mysqli("127.0.0.1", "root", "", "world", 3306);
    // DANGER: We should never concatenate directly could lead to SQL INJECTIONS
    // Use parametized queries instead
    $statment = $mysqli->prepare("
        INSERT INTO city VALUES (NULL, ?, ?, ?, ?"
    );

    $statment->bind_param( "sssi", $name, $countryCode, $district, $population);

    $insertResult = $statment ->  execute();
    echo $insertResult;
    ?>
</body>
</html>