<?php
 require_once('../entities/category.php');
 require_once('/xampp/htdocs/estacionamento/database/conexao.php');

    $pdo = new Conexao();
    
    
    switch ($_POST['cadastrarcateg']) {
        case 'cadastro':
            $categ_name = htmlspecialchars($_POST["cat_nome"]);
            $categ_tax = htmlspecialchars($_POST["tax"]);
                if(!empty($categ_name) && !empty($categ_tax)){
                    $categoria = new category($categ_name,$categ_tax, null);
                    cadastrarCategoria($pdo, $categoria);
                }
            break;
        
        default:
           
            break;
    }

    function cadastrarCategoria($connection, $categoria){
        try {
            $connection->connect();
            $command = $connection->prepare("INSERT INTO categoria(nome, tarifa)VALUES(:n, :t)");
            $command->bindValue(":n", $categoria->getName());
            $command->bindValue(":t", $categoria->getParkingCharge());
            $command->execute();
            $connection->disconnect();
        } catch (PDOException $e) {
            echo "erro no banco de dados: " . $e->getMessage();
        } catch(Exception $e) {
            echo "erro generico: ". $e->getMessage();
        }
    }

    header("Location: /estacionamento/view/actions.php");
    die();
    