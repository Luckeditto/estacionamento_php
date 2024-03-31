<?php
 require_once('../entities/vehicle.php');
 require_once('/xampp/htdocs/estacionamento/database/conexao.php');

    $pdo = new Conexao();
    
    
    switch ($_POST['cadastrarveic']) {
        case 'cadastro':
            $veic_name = htmlspecialchars($_POST["veiculo_nome"]);
            $veic_placa = htmlspecialchars($_POST["veiculo_placa"]);
            $veic_categoria = htmlspecialchars($_POST["categoria"]);
                if(!empty($veic_name) && !empty($veic_placa) && !empty($veic_categoria)){
                    $veiculo = new Vehicle($veic_name, $veic_placa, $veic_categoria);
                    cadastrarVeiculo($pdo, $veiculo);
                    
                }
            break;
        
        default:
           
            break;
    }

    

    function cadastrarVeiculo($connection, $veiculo){
        try {
            $connection->connect();
            $command = $connection->prepare("INSERT INTO veiculo(nome, placa, categoria_id)VALUES(:n, :t, :catid)");
            $command->bindValue(":n", $veiculo->getName());
            $command->bindValue(":t", $veiculo->getLicensePlate());
            $command->bindValue(":catid", $veiculo->getCategory());
            $command->execute();
            $connection->disconnect();
            
        }  catch (PDOException $e) {
            echo "erro no banco de dados: " . $e->getMessage();
        } catch(Exception $e) {
            echo "". $e->getMessage();
        }
       
    }

    header("Location: /estacionamento/view/actions.php");
            die();