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
    $mysqli = new mysqli("localhost", "root", "", "world", 3306);
    $statement = $mysqli->prepare("SELECT * FROM country ORDER BY Code DESC LIMIT 20");
    $statement->execute();

    $result = $statement->get_result();
    ?>

    <div id="pageWrapper">
        <a href="./countryAddForm.php" class="addCountryLink">Add New City</a>
        <table>
            <thead>
                <tr>
                    <th>Country name</th>
                    <th>Continent</th>
                    <th>Region</th>
                    <th>Population</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="countryTableBody">
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?= $row['Name'] ?></td>
                        <td><?= $row['Continent'] ?></td>
                        <td><?= $row['Region'] ?></td>
                        <td><?= $row['Population'] ?></td>
                        <td><a href="#" class="editLink">✏️</a>
                            <a href="./countryDeleteHandler.php?id=<?= $row['Code'] ?>" class="deleteLink">❌</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</body>

</html>