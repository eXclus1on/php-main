<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula 09-03-2024</title>
</head>

<body>

    <?php
    $searchTerm  = isset($_GET['searchTerm']) ? $_GET['searchTerm'] : 'pokemon';
    ?>
    <h1>Search Term: <?php echo $searchTerm ?></h1>
    <form action="index.php" method="get">
        <input type="text" placeholder="search" name="searchTerm">
        <button type="submit">Search</button>
    </form>



</body>

</html>