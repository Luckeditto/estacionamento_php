<?php

    class Conexao{

        private $host;
        private $dbname;
        private $username;
        private $password;

        private $pdo;

        public function __construct(){
            $this->host = "localhost";
            $this->dbname = "PARKING";
            $this->username = "root";
            $this->password = "";
        }



        public function connect(){
            try {
                $this->pdo = new PDO("mysql:dbname=$this->dbname;host=$this->host","$this->username","$this->password");
            } catch (\PDOException $e) {
                echo "Erro com banco de dados: " . $e->getMessage();
            }catch (Exception $e) {
                echo "Erro generico: ". $e->getMessage();
            }
        }

        public function prepare ($sql){
            return $this->pdo->prepare($sql);   
        }

        public function disconnect(){
            $this->pdo = null;
        }



/*forma de fazer insert
$res = $pdo->prepare("INSERT INTO categoria(nome, tarifa) VALUES(:n, :t)");

$res->bindValue(":n", $nome);
$res->bindValue(":t", $tarifa);
$res->execute();


    }
    */
}