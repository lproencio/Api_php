<?php 
  class Post {
   
    private $conn;
    private $table = 'dados';
   
    public $id;
    public $nome;
    public $telefone;
  
    public function __construct($db) {
      $this->conn = $db;
    }

    
    public function read() {
     
      $query = 'SELECT id, nome, telefone FROM ' . $this->table . '';
     
      $stmt = $this->conn->prepare($query);

     
      $stmt->execute();

      return $stmt;
    }

   
    public function create() {
         
          $query = 'INSERT INTO ' . $this->table . 
              ' SET nome = :nome,
                endereco = :endereco,
                bairro = :bairro,
                cep = :cep,
                cidade = :cidade,
                uf = :uf,
                email = :email,
                telefone = :telefone,
                tipo = :tipo,
                quantidade = :quantidade,
                atracao = :atracao,
                sugestao = :sugestao,
                imagens = :imagens';

          $stmt = $this->conn->prepare($query);

          $this->nome = htmlspecialchars(strip_tags($this->nome));
          $this->endereco = htmlspecialchars(strip_tags($this->endereco));
          $this->bairro = htmlspecialchars(strip_tags($this->bairro));
          $this->cep = htmlspecialchars(strip_tags($this->cep));
          $this->cidade = htmlspecialchars(strip_tags($this->cidade));
          $this->uf = htmlspecialchars(strip_tags($this->uf));
          $this->email = htmlspecialchars(strip_tags($this->email));
          $this->telefone = htmlspecialchars(strip_tags($this->telefone));
          $this->tipo = htmlspecialchars(strip_tags($this->tipo));
          $this->quantidade = htmlspecialchars(strip_tags($this->quantidade));
          $this->atracao = htmlspecialchars(strip_tags($this->atracao));
          $this->sugestao = htmlspecialchars(strip_tags($this->sugestao));
          $this->imagens = htmlspecialchars(strip_tags($this->imagens));

          $stmt->bindParam(':nome', $this->nome);
          $stmt->bindParam(':endereco', $this->endereco);
          $stmt->bindParam(':bairro', $this->bairro);
          $stmt->bindParam(':cep', $this->cep);
          $stmt->bindParam(':cidade', $this->cidade);
          $stmt->bindParam(':uf', $this->uf);
          $stmt->bindParam(':email', $this->email);
          $stmt->bindParam(':telefone', $this->telefone);
          $stmt->bindParam(':tipo', $this->tipo);
          $stmt->bindParam(':quantidade', $this->quantidade);
          $stmt->bindParam(':atracao', $this->atracao);
          $stmt->bindParam(':sugestao', $this->sugestao);
          $stmt->bindParam(':imagens', $this->imagens);


          if($stmt->execute()) {
            return true;
      }

     
      printf("Error: %s.\n", $stmt->error);

      return false;
    }

   
    public function update() {
        
          $query = 'UPDATE ' . $this->table . '
                                SET nome = :nome,
                                endereco = :endereco,
                                bairro = :bairro,
                                cep = :cep,
                                cidade = :cidade,
                                uf = :uf,
                                email = :email,
                                telefone = :telefone,
                                quantidade = :quantidade,
                                atracao = :atracao,
                                sugestao = :sugestao,
                                imagens = :imagens
                                WHERE id = :id';

         
          $stmt = $this->conn->prepare($query);
         
          $this->nome = htmlspecialchars(strip_tags($this->nome));
          $this->endereco = htmlspecialchars(strip_tags($this->endereco));
          $this->bairro = htmlspecialchars(strip_tags($this->bairro));
          $this->cep = htmlspecialchars(strip_tags($this->cep));
          $this->cidade = htmlspecialchars(strip_tags($this->cidade));
          $this->uf = htmlspecialchars(strip_tags($this->uf));
          $this->email = htmlspecialchars(strip_tags($this->email));
          $this->telefone = htmlspecialchars(strip_tags($this->telefone));
          $this->quantidade = htmlspecialchars(strip_tags($this->quantidade));
          $this->atracao = htmlspecialchars(strip_tags($this->atracao));
          $this->sugestao = htmlspecialchars(strip_tags($this->sugestao));
          $this->imagens = htmlspecialchars(strip_tags($this->imagens));
          $this->id = htmlspecialchars(strip_tags($this->id));

          $stmt->bindParam(':nome', $this->nome);
          $stmt->bindParam(':endereco', $this->endereco);
          $stmt->bindParam(':bairro', $this->bairro);
          $stmt->bindParam(':cep', $this->cep);
          $stmt->bindParam(':cidade', $this->cidade);
          $stmt->bindParam(':uf', $this->uf);
          $stmt->bindParam(':email', $this->email);
          $stmt->bindParam(':telefone', $this->telefone);
          $stmt->bindParam(':quantidade', $this->quantidade);
          $stmt->bindParam(':atracao', $this->atracao);
          $stmt->bindParam(':sugestao', $this->sugestao);
          $stmt->bindParam(':imagens', $this->imagens);
          $stmt->bindParam(':id', $this->id);

          
          if($stmt->execute()) {
            return true;
          }

          printf("Error: %s.\n", $stmt->error);

          return false;
    }

    public function delete() {

      $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';

          $stmt = $this->conn->prepare($query);

          $this->id = htmlspecialchars(strip_tags($this->id));

          $stmt->bindParam(':id', $this->id);

          if($stmt->execute()) {
            return true;
          }

          printf("Error: %s.\n", $stmt->error);

          return false;
    }
    
  }