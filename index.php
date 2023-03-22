<!DOCTYPE html>
<html lang="pt_Br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./img/1034365_sale_buy_price_tag_icon.png" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <title>Exibindo produtos</title>
</head>

<body>
    <div class="container">
        <div class="containerBg">
            <div class="containerTitle">
                <img src="./img/1034365_sale_buy_price_tag_icon.png" class="containerIcon">
                <h1>Descubra Nossos Produtos</h1>
            </div>
            <div class="containerContent">
                <?php

                //Faz o requirimento da Classe (Caso não ache, para a execução do programa)
                require_once "./Class/ConexaoDB.class.php";

                //Crio uma variavel onde instacio a class
                $connectedDB = new ConexaoDB();
                //A Query onde passo o comando do banco de dados para Selecionar o que trazer
                $query = 'SELECT *FROM tabela_de_produtos';


                //Crio uma variavel que recebe o preparo da query para a execução (previne o SQL Injection(Invasão))
                $qr = $connectedDB->conn->prepare($query);
                //Executo a query
                $qr->execute();
                //Crio uma variavel que recebe a query executada e com o fetchAll obtem os itens dela
                $recebe = $qr->fetchAll();

                //Faço um Foreach(Para Cada) para percorrer cada valor recebido($recebe) como/com o valor determinado($value)
                foreach ($recebe as $value) {
                    echo "<br><table class='containerTable'>";
                    echo "<tr>";
                    echo "<tr><th>Nome do Produto: " . $value['NOME_DO_PRODUTO'] . "</th></tr>";
                    echo "<th>Embalagem do Produto: " . $value['EMBALAGEM'] . "</th>";
                    echo "</tr></table>";
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>