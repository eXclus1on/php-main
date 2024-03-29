<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
    $searchTerm = isset($_GET["searchTerm"]) ? $_GET["searchTerm"] : "";
    ?>

    <h1>Search Term: <?= $searchTerm ?></h1>
    <form action="" method="get">
        <input type="text" placeholder="search" name="searchTerm" value="<?= $searchTerm ?>">
        <button type="submit">Go</button>
    </form>

    <?php
    $mysqli = new mysqli("127.0.0.1", "root", "", "world", 3306);
    // DANGER: We should never concatenate directly could lead to SQL INJECTIONS
    // Use parametized queries instead
    $result = $mysqli->query("SELECT * FROM city WHERE Name LIKE '%$searchTerm%'");

    $numRows = $result->num_rows;
    ?>

    <?php if ($numRows > 0) { ?>
        <p>Number of results: <?= $numRows ?></p>
        <table border="1">
            <thead>
                <tr>
                    <th>Identifier</th>
                    <th>Name</th>
                    <th>Country Code</th>
                    <th>District</th>
                    <th>Population Number</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["ID"] . "</td>";
                    echo "<td>" . $row["Name"] . "</td>";
                    echo "<td>" . $row["CountryCode"] . "</td>";
                    echo "<td>" . $row["District"] . "</td>";
                    echo "<td>" . $row["Population"] . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    <?php } else { ?>
        <h2>No cities found!</h2>
    <?php }  ?>



    <!-- EXERCICIO
        Se a busca nao devolver resultados
        mostrem uma frase e uma imagem...
        a informar que nao existem cidades correspondentes a pesquisa

        se existirem cidades mostrem a tabelo como ja esta feito
    -->
</body>

</html>