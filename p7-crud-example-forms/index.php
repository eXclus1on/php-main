<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css"/>
    <link href="
    <title>Aula 14-03-2024</title>
</head>
<body>
    <?php
        $mysqli = new mysqli("127.0.0.1", "root", "", "world", 3306);
        $statement = $mysqli->prepare("SELECT * FROM city ORDER BY  ID DESC LIMIT 20");
        $statement->execute();

        $result = $statement->get_result();
    ?>

    <div id="pageWrapper">
        <a href="#" class="addCityLink">Add New City</a>
        <table>
            <thead>
                <tr>
                    <th>City name</th>
                    <th>Country code</th>
                    <th>District</th>
                    <th>Population</th>
                    <th>Actions</th>
                    <th></th>
                </tr>
            </thead>
            <tbody id="cityTableBody">
                <?php while ($row = $result ->  fetch_assoc()) {?>
                <tr>
                    <td><?= $row['Name'] ?></td>
                    <td><?= $row['CountryCode'] ?></td>
                    <td><?= $row['District'] ?></td>
                    <td><?= $row['Population'] ?></td>
                    <td><a href="#" class="editLink">Edit</a></td>
                    <td><a href="./cityDeleteHandler.php?id=<? $row ['ID'] ?>" class="deleteLink">Delete</a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <script>
        const cityTableBody = document.querySelector("#cityTableBody");
        cityTableBody.addEventListener("click" , function(event){
            if (event.target.className !== "deleteLink"){
                return;
            }
            if(!confirm("Are you sure you want to delete?")) {
                event.preventDefault();
            }                        
        });
    </script>

    
</body>
</html>