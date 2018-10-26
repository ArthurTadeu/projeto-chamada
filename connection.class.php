<?php
class Connection {
    private $conn;
    
    function getConnect(){
        //tratamento de exceção
        try {
            //pdo = php data objet - objeto de acesso de dados
            $this->conn = new PDO("mysql:host=localhost;
                                   port=3306;
                                   dbname=XXX",
                                   "XXX","XXX");
        } catch (Exeption $ex){
            echo 'Error ' . $ex->getMessage(); 
        }catch (PDOException $ex){
            echo 'Error ' . $ex->getMessage();
        }
        
        return $this->conn;
    }
    
    function closeConnect(){
        if ($this->conn != NULL){
            $this->conn = NULL;
        }
    }
}
?>
