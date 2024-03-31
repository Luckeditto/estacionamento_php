<?php
require_once('/xampp/htdocs/estacionamento/database/conexao.php');
$pdo = new Conexao();
$pdo->connect();
$cmd = $pdo->prepare("SELECT * FROM registro INNER JOIN veiculo ON registro.veiculo_id = veiculo.id;");
$cmd->execute();
$arrayResult = $cmd->fetchAll(PDO::FETCH_ASSOC);




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <title>Registros</title>
</head>
<body>
    <h2>Registros de Veículos</h2>
    <table>
        <tr>
            <th>Placa</th>
            <th>Data e Hora de Entrada</th>
            <th>Data e Hora de Saída</th>
            <th>Tempo de permanência</th>
            <th>Cobrança do Estacionamento</th>
        </tr>
        <tr>
            <?php
                for ($i = 0; $i < count($arrayResult); $i++):
                    $registro = $arrayResult[$i];
            ?>
            <td> <?php  echo $registro['placa']?> </td>
            <td> <?php  echo $registro['data_entrada']?> </td>
            <td> <?php  echo $registro['data_saida']?> </td>
            <td> <?php  echo $registro['tempo_de_permanencia']?></td>
            <td> <?php  echo $registro['valor_total_estacionamento']?> </td>
        </tr>
            <?php endfor; ?>

        </tr>
    </table>
</body>
</html>