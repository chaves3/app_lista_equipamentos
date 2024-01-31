<?php


class Conexao
{

     private $host = 'localhost';

     private $dbname = 'cadastro_equipamentos';

     private $user = 'root';

     private $password = '';

     public function conectar()
     {
        try{
            $conexao = new PDO("mysql:host=$this->host;dbname=$this->dbname", "$this->user", "$this->password");
            return $conexao;
       
        }catch(PDOException $e)
        {
           
            print("<p>".$e->getMessage()."</p>");
        
        }
     }
}

?>