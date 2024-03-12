<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula 12-03-2024</title>
</head>
<body>
    <?php
        // Conectar ao banco de dados
        $mysqli = new mysqli("127.0.0.1", "root", "", "world", 3306);
        
        // Preparar e executar a consulta SQL para selecionar códigos e nomes dos países
        $statement = $mysqli->prepare("SELECT code, Name FROM country");
        $statement->execute();
        
        // Obter o resultado da consulta
        $result = $statement->get_result();
    ?>

    <!-- Formulário HTML para adicionar uma nova cidade -->
    <form id="form1" action=""  method="post">
        <!-- Campo de texto para o nome da cidade -->
        <input type="text" name="someValue" placeholder="Name"><br>
        <!-- Dropdown para selecionar o país -->
        <select name="countryCode">
            <?php
            // Loop para iterar sobre os resultados da consulta e criar as opções do dropdown
            while ($row = $result->fetch_assoc()) {
                // Extrair o código e o nome do país de cada linha do resultado
                $code = $row["code"];
                $name = $row["Name"];
                // Criar uma opção no dropdown com o código do país como valor e o nome do país como texto visível
                echo "<option value='$code'>$name</option>";
            }
            ?>
        </select><br>
        <!-- Campo de texto para o distrito da cidade -->
        <input type="text" name="district" placeholder="District"><br>
        <!-- Campo de texto para a população da cidade -->
        <input type="text" name="population" placeholder="Population"><br>
        <!-- Botão para enviar o formulário -->
        <button type="submit">Add City</button>
    </form>

    <!-- Link para o Google -->
    <a href="https://google.com" id="link1" target="_blank">Vai para o Google</a>

    <!-- Script JavaScript -->
    <script>
        // Selecionar o formulário e o link usando JavaScript
        const form1 = document.querySelector("#form1");
        const link1 = document.querySelector("#link1");
        
        // Impedir o envio padrão do formulário
        // form1.addEventListener("submit", function (event) {
        //  event.preventDefault()  // para nao atualizar a pagina toda vez que enviar o formulario
        // });

        // Impedir o comportamento padrão do link
        link1.addEventListener("click", function(event){
            event.preventDefault();   //para nao recarregar a pagina toda vez que clicar no botao
        });
    </script>
</body>
</html>
