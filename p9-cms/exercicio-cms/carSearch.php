<?php require_once("./css/bootstrap.php"); ?>

<?php
$mysqli = new mysqli("localhost", "root", "", "bd-exercicio-stan-carros", 3306);

$query = $_GET['query'];

$statement = $mysqli->prepare("SELECT * FROM cars WHERE plate LIKE ? OR color LIKE ?");
$search = "%$query%";
$statement->bind_param("ss", $search, $search);
$statement->execute();

$result = $statement->get_result();
?>

<table class="table table-hover">
    <thead>
        <tr>
            <th>Plate</th>
            <th>Color</th>
            <th>Brand</th>
            <th>Model</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = $result->fetch_assoc()) : ?>
            <tr>
                <td><?= $row["plate"] ?></td>
                <td><?= $row["color"] ?></td>
                <td><?= $row["brand"] ?></td>
                <td><?= $row["model"] ?></td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>