<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <?php
    $mysqli = new mysqli("localhost", "root", "", "bd-exercicio-stan-carros", 3306);
    $statement = $mysqli->prepare("SELECT * FROM cars ORDER BY id DESC");
    $statement->execute();
    $result = $statement->get_result();
    ?>

    <form action="./carSearch.php" method="GET">
        <input type="text" name="query" placeholder="Search cars...">
        <button type="submit">Search</button>
    </form>

    <table class="table table-hover">
        <thead>
            <tr>
                <th>License Plate</th>
                <th>Color</th>
                <th>Model</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()) : ?>
                <tr>
                    <td><?= $row["plate"] ?></td>
                    <td><?= $row["color"] ?></td>
                    <td><?= $row["model_id"] ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>