<?php


class EquipamentoService{

     private $conexao;

     private $equipamento;

     public function __construct(Conexao $conexao, Equipamento $equipamento)
     {
        $this->conexao = $conexao->conectar();
        $this->equipamento = $equipamento;
     }

     public function inserir()//Inserir dados
     {
        $query = "INSERT INTO cadastro (equipamento, cod_calibracao, 
        departamento, data_retirada, data_devolucao, responsavel_liberacao,
        email_responsavel, responsavel_devolucao, email_destinado,
        status_equipamento) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
        ";
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(1, $this->equipamento->__get('equipamento'));
        $stmt->bindValue(2, $this->equipamento->__get('cod_calibracao'));
        $stmt->bindValue(3, $this->equipamento->__get('departamento'));
        $stmt->bindValue(4, $this->equipamento->__get('data_retirada'));
        $stmt->bindValue(5, $this->equipamento->__get('data_devolucao'));
        $stmt->bindValue(6, $this->equipamento->__get('responsavel_liberacao'));
        $stmt->bindValue(7, $this->equipamento->__get('email_responsavel'));
        $stmt->bindValue(8, $this->equipamento->__get('responsavel_devolucao'));
        $stmt->bindValue(9, $this->equipamento->__get('email_destinado'));
        $stmt->bindValue(10, $this->equipamento->__get('status_equipamento'));
        return $stmt->execute();
     }

     public function recuperar() // Mostrar todos os registros
     {
       $query = "SELECT * FROM cadastro";
       $stmt = $this->conexao->prepare($query);
       $stmt->execute();
       return $stmt->fetchAll(PDO::FETCH_OBJ);
     }

     public function atualizar()
     {
      $query = "UPDATE cadastro SET equipamento = ? WHERE id = ?";
      $stmt = $this->conexao->prepare($query);
      $stmt->bindValue(1, $this->equipamento->__get('equipamento'));
      $stmt->bindValue(2, $this->equipamento->__get('id'));
      return $stmt->execute();
     }

     public function remover()
     {
       $query = "DELETE FROM cadastro WHERE id = ?";
       $stmt = $this->conexao->prepare($query);
       $stmt->bindValue(1, $this->equipamento->__get('id'));
       return $stmt->execute();
     }

     public function devolvido()
     {
      $query = "UPDATE cadastro SET status_equipamento = 'returning' WHERE id = ?";
      $stmt = $this->conexao->prepare($query);
      $stmt->bindValue(1, $this->equipamento->__get('id'));
      return $stmt->execute();
          
     }

     public function emUso() // Mostrar todos os registros
     {
       $query = "SELECT * FROM cadastro WHERE status_equipamento <> 'loaned' ";
       $stmt = $this->conexao->prepare($query);
       $stmt->execute();
       return $stmt->fetchAll(PDO::FETCH_OBJ);
     }

}

?>