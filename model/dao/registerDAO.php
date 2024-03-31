<?php
require_once('../entities/register.php');
require_once('/xampp/htdocs/estacionamento/database/conexao.php');

$pdo = new Conexao();

    switch ($_POST['entradasaidaveic']) {
        case 'entrada':
            $veiculo_entrada = $_POST['veiculo'];
            $entrada_data_hora = $_POST['datahora'];
            if (!empty($veiculo_entrada) && !empty($entrada_data_hora)) {
                $registro = new ParkingRegister($veiculo_entrada,$entrada_data_hora, null);
                CadastrarRegistro($pdo, $registro);  
            }
            break;
        case 'saida':
            $veiculo_saida = $_POST['veiculo'];
            $saida_data_hora = $_POST['datahora'];
            if (!empty($veiculo_saida) && !empty($saida_data_hora)) {





                $registro = new ParkingRegister($veiculo_saida,null,$saida_data_hora);
                UpdateRegistro($pdo,$registro);
            }
            break;
        default:
            echo "should NEVER be reached";
            break;
    }

    function CadastrarRegistro($connection, $register) {
        try {
            $connection->connect();
            $command = $connection->prepare("INSERT INTO registro(veiculo_id, data_entrada)VALUES(:vid, :de)");
            $command->bindValue(":vid", $register->getVehicle());
            $command->bindValue(":de", $register->getEntranceTime());
            $command->execute();
            $connection->disconnect();
        }catch (PDOException $e) {
            echo "erro no banco de dados: " . $e->getMessage();
        } catch(Exception $e) {
            echo "erro generico: ". $e->getMessage();
        }
    }

    function UpdateRegistro($connection, $register) {
        try {
            $connection->connect();
            $hora_entrada_bd = strtotime(RetrieveDataHora($connection, $register));
            $hora_saida_bd = strtotime($register->getExitTime());   
            $segundos_permanencia = $hora_saida_bd - $hora_entrada_bd;
            
            //montando tempo de permanencia correto em hh:mm:ss
            $horas = floor($segundos_permanencia / 3600);
            $minutos = floor(($segundos_permanencia % 3600) / 60);
            $segundos = $segundos_permanencia % 60;
            $horas_formatadas = str_pad($horas, 2, "0", STR_PAD_LEFT);
            $minutos_formatados = str_pad($minutos, 2, "0", STR_PAD_LEFT);
            $segundos_formatados = str_pad($segundos, 2, "0", STR_PAD_LEFT);
            $tempo_formatado = $horas_formatadas . ":" . $minutos_formatados . ":" . $segundos_formatados;
            
            $tempo_permanencia_horas = $segundos_permanencia/3600;
            var_dump($tempo_permanencia_horas);
            $tarifa = RetrieveTarifa($connection, $register);
            var_dump($tarifa);
            $valor_total = $tempo_permanencia_horas * $tarifa;
            var_dump($valor_total);
            
           
            $command = $connection->prepare("UPDATE registro SET data_saida = :ds,
                                                tempo_de_permanencia = :tdp,
                                                valor_total_estacionamento = :vte
                                                WHERE veiculo_id = :vid");

            $command->bindValue(":ds",$register->getExitTime());
            $command->bindValue(":tdp", $tempo_formatado);
            $command->bindValue(":vte", $valor_total);
            $command->bindValue(":vid", $register->getVehicle());
            $command->execute();
            $connection->disconnect();
        } catch(PDOException $e) {
            echo "erro no banco de dados: ". $e->getMessage();
        } catch(Exception $e) {
            echo "erro generico: ". $e->getMessage();
        }
    }


    function RetrieveDataHora($connection, $register) {
            $command = $connection->prepare("SELECT * FROM registro WHERE veiculo_id = :rgvid");
            $command->bindValue(":rgvid", $register->getVehicle());
            $command->execute();
            $result = $command->fetch(PDO::FETCH_ASSOC);
             return $result['data_entrada'];
    }


    function RetrieveTarifa($connection, $register) {
        $command = $connection->prepare("SELECT categoria.tarifa FROM categoria
                                        WHERE categoria.id =
                                        (SELECT veiculo.categoria_id FROM veiculo WHERE veiculo.id = :vid);");
        $command->bindValue(":vid",$register->getVehicle());
        $command->execute();
        $result = $command->fetch(PDO::FETCH_ASSOC);                              
    return $result['tarifa'];
    }



    function DeleteRegistro($connection, $register) {
        try {
            $connection->connect();
            $command = $connection->prepare("DELETE FROM registro WHERE id = :id");
            $command->bindValue(":id", $register->getId());
            $command->execute();
            $connection->disconnect();
        }catch (PDOException $e) {
            echo "erro no banco de dados: " . $e->getMessage();
        } catch(Exception $e) {
            echo "erro generico: ". $e->getMessage();
        }
    }

    header("Location: /estacionamento/view/actions.php");
    die();
    


    









