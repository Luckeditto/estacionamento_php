<?php
require_once('/xampp/htdocs/estacionamento/database/conexao.php');
$pdo = new Conexao();
$pdo->connect();
$cmd = $pdo->prepare("SELECT * 
FROM registro RIGHT JOIN veiculo ON registro.veiculo_id = veiculo.id
 WHERE registro.data_entrada IS NOT NULL AND registro.data_saida IS NULL;");
$cmd->execute();

$arrayResult = $cmd->fetchAll(PDO::FETCH_ASSOC);

array_values($arrayResult);

date_default_timezone_set('America/Bahia');
$date = date('Y-m-d H:i:s');
;
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <title>Dar saída em veículo</title>
</head>
<body>
<form class="form-style" action="../model/dao/registerDAO.php" method="post">
        <h2>Selecione o Veículo para dar Saída:</h2>
        <select name="veiculo" class="form_field" required>
        <?php
           for ($i = 0; $i < count($arrayResult); $i++) :
                $veiculo = $arrayResult[$i];
        ?>
        <option value="<?php echo $veiculo['id']; ?>">
              <?php echo $veiculo['placa']; ?>
            </option>
          <?php endfor; ?>
        </select>

        <h2>Data-Hora de saída</h2>
        <input class="form_field" type="datetime-local" name="datahora" min="<?php echo $date?>" max="<?php echo $date?>" required>
        <input type="hidden" name="entradasaidaveic" value="saida">
        <input class="bttn_forms" type="submit" name="submit" value="Confirmar">
    </form>
    
</body>
</html>

