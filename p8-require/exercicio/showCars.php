<!DOCTYPE html>
<html lang="en">
<?php require_once("./head.php"); ?>

<body>
    <?php
    require_once("./navbar.php");

    /*     $mysqli = new mysqli("localhost", "root", "", "stand", 3306);
    $statement = $mysqli->prepare("SELECT * FROM Cars");
    /*     $statement->bind_params() */

    /*     $result = $statement->get_result(); */

    $mysqli = new mysqli("localhost", "root", "", "bd_stand_ze", 3306);
    $query = "SELECT * FROM Cars";
    $result = $mysqli->query($query);
    ?>

    <div id="pageWrapper">
        <a href="./carAddForm.php" class="carAddForm">Add New Car</a>

        <table>
            <thead>
                <tr>
                    <th>Plates</th>
                    <th>Brand</th>
                    <th>Model</th>
                    <th>Year</th>
                    <th>Color</th>
                    <th>Price</th>
                    <th>Image</th>
                </tr>
            </thead>
            <tbody id=carTableBody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?= $row['Plate'] ?> </td>
                        <td><?= $row['Brand'] ?> </td>
                        <td><?= $row['Model'] ?> </td>
                        <td><?= $row['Year'] ?> </td>
                        <td><?= $row['Color'] ?> </td>
                        <td><?= $row['Price'] ?> </td>
                        <td><a href="<?= $row['Image'] ?>"> <img src="<?= $row['Image'] ?>" alt="image" style="max-width: 100px" ;></a></td>
                        <td><a href="./carEditForm.php?plate=<?= $row['Plate'] ?>" class="editLink">✏️</a></td>
                        <td><a href="./carDeleteHandler.php?plate=<?= $row['Plate'] ?>" class="deleteCar">❌</a>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
</body>
<script>
    const carTableBody = document.querySelector("#carTableBody");
    carTableBody.addEventListener("click", function(event) {
        if (event.target.className !== "deleteCar") {
            return;
        }
        if (!confirm("Are you sure you want to delete?")) {
            event.preventDefault();
        }
    });
</script>

</html>