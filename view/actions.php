<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <title>Estacionamento </title>
</head>
<body>
    <div class="form-style">
    <form method="POST">
    <input type="submit" class="submit-actions" name="cadastrarcat" value="Cadastrar Categoria">
    <input type="submit" class="submit-actions" name="cadastrarveiculo" value="Cadastrar Veículo">
    <input type="submit" class="submit-actions" name="entradaveiculo" value="Dar Entrada com Veículo">
    <input type="submit" class="submit-actions" name="saidaveiculo" value="Dar Saida no Veículo">
    <input type="submit" class="submit-actions" name ="listarveiculos" value="Registro de Veículos">
    </form>
    </div>
    
   
</body>
</html>

<?php

    if(isset($_POST["cadastrarcat"])){
        
       header("Location: cadastro_categ.php");
        

    }elseif(isset($_POST["cadastrarveiculo"])){
       
        header("Location: cadastro_veic.php");

    }elseif(isset($_POST["entradaveiculo"])){
        
        header("Location: cadastro_registro.php");

    }elseif(isset($_POST["saidaveiculo"])){
        
        header("Location: saida_veiculo.php");

    }elseif(isset($_POST["listarveiculos"])){
       
        header("Location: registros.php");
    }

?>
