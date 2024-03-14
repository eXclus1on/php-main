<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
    $code = isset($_POST["Code"]) ? $_POST["Code"] : "GLB";
    $name = isset($_POST["Name"]) ? $_POST["Name"] : "";
    $continent = isset($_POST["Continent"]) ? $_POST["Continent"] : "";
    $region = isset($_POST["Region"]) ? $_POST["Region"] : 0;
    $surfaceArea = isset($_POST["SurfaceArea"]) ? $_POST["SurfaceArea"] : "";
    $population = isset($_POST["Population"]) ? $_POST["Population"] : "";
    $localName = isset($_POST["LocalName"]) ? $_POST["LocalName"] : "";
    $governmentForm = isset($_POST["GovernmentForm"]) ? $_POST["GovernmentForm"] : 0;
    $code2 = isset($_POST["Code2"]) ? $_POST["Code2"] : "";

    $mysqli = new mysqli("127.0.0.1", "root", "", "world", 3306);
    $statement = $mysqli->prepare("
    INSERT INTO country (Code, Name, Continent, Region, SurfaceArea, Population, LocalName, GovernmentForm, Code2) 

    VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?)

    ");

    $statement->bind_param("ssssiisss", $code, $name, $continent, $region, $surfaceArea, $population, $localName, $governmentForm, $code2);

    $insertResult = $statement->execute();

    echo $insertResult;

    ?>
    
</body>

</html>