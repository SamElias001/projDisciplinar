<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estoque</title>

    <link rel="stylesheet" href="../style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body style="display: flex;">
    <div class="menu">
        <div class="menu-img" onclick="toggleTray()"></div>
    </div>

    <div class="tray" id="trayMenu">
        <ul class="list">
            <li class="op-itens">
                <i class="fa-solid fa-print" onclick="window.location.href='./impressoras.php'"></i>
                <a href="./impressoras.php">Impressoras</a>
            </li>
            <li class="op-itens">
                <i class="fa-solid fa-boxes-stacked"></i>
                <a>Estoque</a>
            </li>
            <li class="op-itens">
                <i class="fa-solid fa-file-pen" onclick="window.location.href='./gerenciamento.php'"></i>
                <a href="./gerenciamento.php">Gerenciamento</a>
            </li>
            <li class="op-itens">
                <i class="fa-solid fa-circle-half-stroke" onclick="toggleDarkMode()"></i>
                <a onclick="toggleDarkMode()">Tema Escuro</a>
            </li>
        </ul>
    </div>

    <div class="content">
        <table>
            <thead>
                <tr>
                    <th>Peça</th>
                    <th>Marca</th>
                    <th>Quantidade</th>
                    <th>Necessidade</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require("../classeimpressora.php");

                $estoque = new Estoque();
                $listaEstoque = $estoque->listarEstoque();

                foreach ($listaEstoque as $registro) {
                    $nome_peca = $registro['nome_peca'];
                    $marca_peca = $registro['marca_peca'];
                    $quantidade = $registro['quantidade'];

                    $necessidade = ($quantidade < 10) ? "<span style='color:red;'>Necessita de mais</span>" : "<span style='color:green;'>OK</span>";

                    echo "<tr>";
                    echo "<td>$nome_peca</td>";
                    echo "<td>$marca_peca</td>";
                    echo "<td>$quantidade</td>";
                    echo "<td>$necessidade</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table> 
    </div>

    <script src="../script.js"></script>
</body>
</html>