<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <link rel="stylesheet" href="../styles/main.css">
</head>

<body>
    <?php
    $mysqli = new mysqli("127.0.0.1", "root", "", "world", 3306);
    $statement = $mysqli->prepare("SELECT Code, Name FROM country");
    $statement->execute();

    $result = $statement->get_result();
    ?>
    <div id="pageWrapper">
        <h2>Add a new Country</h2>
        <form id="addCountryForm" action="formHandler.php" method="post">

            <input type="text" name="Code" placeholder="Code" required><br>

            <input type="text" name="Name" placeholder="Name" required><br>

            <input type="text" name="Continent" placeholder="Continent" required><br>

            <input type="text" name="Region" placeholder="Region"><br>

            <input type="number" name="SurfaceArea" placeholder="SurfaceArea"><br>

            <input type="number" name="Population" placeholder="Population"><br>

            <input type="text" name="LocalName" placeholder="LocalName"><br>

            <input type="text" name="GovernmentForm" placeholder="GovernmentForm"><br>

            <input type="text" name="Code2" placeholder="Code2" required><br>


            <button class="addCountryButton">Add Country</button>
        </form>
    </div>
</body>

</html>