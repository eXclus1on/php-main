<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula 09-03-2024</title>
</head>

<body>

    <?php
    // Verifica se o parâmetro de pesquisa foi enviado via método GET
    $searchTerm = isset($_GET["searchTerm"]) ? $_GET["searchTerm"] : "";
    ?>

    <h1>Search Term: <?= $searchTerm ?></h1>
    <form action="" method="get">
        <input type="text" placeholder="search" name="searchTerm" value="<?= $searchTerm ?>">
        <button type="submit">Go</button>
    </form>

    <?php
    // Conectar ao banco de dados
    $mysqli = new mysqli("127.0.0.1", "root", "", "world", 3306);
    // DANGER: We should never concatenate directly could lead to SQL INJECTIONS
    // Use parametized queries instead
    $statment = $mysqli->prepare("SELECT * FROM city WHERE Name LIKE ?");

    $searchBindParam = "%" . "searchTerm" . " %";
    echo $searchBindParam;
    $statment->bind_param("s", $searchBindParam);

    $statment->execute();
    $result = $statment->get_result();


    // Executar a consulta SQL usando LIKE para procurar correspondências no campo 'Name'
    $result = $mysqli->query("SELECT * FROM city WHERE Name LIKE '%$searchTerm%'");
    ?>

    <?php
    // Obter o número de resultados encontrados
    $numResults = $result->num_rows;

    // Verificar se a busca não devolveu resultados
    if ($numResults === 0) {
        // Se não houver resultados, exibe uma mensagem e uma imagem indicando que não existem cidades correspondentes
        echo "<p>Não existem cidades correspondentes à pesquisa.</p>";
        echo "<img src='imagem_nao_encontrada.jpg' alt='Imagem não encontrada'>";
    } else {
        // Se houver resultados, exibe o número de resultados e a tabela com os dados encontrados
        echo "<p>Encontrados " . $numResults . " resultados.</p>";
    ?>
        <table border="1">
            <thead>
                <tr>
                    <th>Identifier</th>
                    <th>Name</th>
                    <th>Country Code</th>
                    <th>District</th>
                    <th>Population Number</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Loop para percorrer os resultados e preencher as linhas da tabela
                while ($row = $result->fetch_assoc()) {
                    $id  = $row['ID'];
                    $name    = $row['Name'];

                    echo "<tr>";
                    echo "<td>" . $row["ID"] . "</td>";
                    echo "<td><a href='cityDetail.php?id=" . $row["ID"] . "'>" . $row["Name"] . "</a></td>";
                    echo "<td>" . $row["CountryCode"] . "</td>";
                    echo "<td>" . $row["District"] . "</td>";
                    echo "<td>" . $row["Population"] . "</td>";
                    echo "<td><a href='deleteHandler.php?id=$id'>Delete</a></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    <?php
    }
    ?>

    <!-- EXERCICIO
        Se a busca nao devolver resultados
        mostrem uma frase e uma imagem...
        a informar que nao existem cidades correspondentes a pesquisa

        se existirem cidades mostrem a tabelo como ja esta feito
        -->

</body>

</html>