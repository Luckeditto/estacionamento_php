<?php
//acessar o banco de dados e conectar
require_once('/xampp/htdocs/estacionamento/database/conexao.php');
$pdo = new Conexao();
$pdo->connect();
$cmd = $pdo->prepare("SELECT * FROM categoria");
$cmd->execute();
//transformar em array
$arrayResult = $cmd->fetchAll(PDO::FETCH_ASSOC);
/*echo "<pre>";
print_r($arrayResult);
echo"</pre>";
*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <title>Cadastro Veículo</title>
</head>
<body>
<form class="form-style" action="../model/dao/vehicleDAO.php" method="POST">
        <h2>Preencha as informações para cadastro do veículo:</h2>
        <label for="name">Nome</label>
        <input class="form_field" type="text" name="veiculo_nome" required>
        <label for="name">Placa</label>
        <input class="form_field" type="text" name="veiculo_placa">
        <label>Escolha a categoria do seu veículo:</label>
        <select name="categoria" class="form_field" required>
        <?php

        //percorre o array com as categorias e mostra em um dropdown // https://www.geeksforgeeks.org/create-a-drop-down-list-that-options-fetched-from-a-mysql-database-in-php/
        for ($i = 0; $i < count($arrayResult); $i++) :
            $categoria = $arrayResult[$i];
        ?>
           
            <option value="<?php echo $categoria['id']; ?>">
              <?php echo $categoria['nome']; ?>
            </option>
          <?php endfor; ?>
        </select>
        <input type="hidden" name="cadastrarveic" value="cadastro">
        <br>    
        <input class="bttn_forms"  type="submit" name="submit" value="Cadastrar"> 
    </form>

    <?php
       if(isset($_POST["submit"]) ) {
        $veiculo_name = htmlspecialchars($_POST["veiculo_nome"]);
        $veiculo_placa = htmlspecialchars($_POST["veiculo_placa"]);
            if(empty($veiculo_name) || empty($veiculo_placa)){
                echo "nome e/ou placa inválidos! Tente novamente.";
            }elseif(!empty($veiculo_name) && !empty($veiculo_placa)){
                echo"veiculo cadastrado!";
            }
           
       }
?>
</body>
</html>