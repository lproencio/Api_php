<?php 

  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: PUT');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  include_once '../../config/conexao.php';
  include_once '../../models/post.php';

  $database = new Database();
  $db = $database->connect();

  $post = new Post($db);

  $data = json_decode(file_get_contents("php://input"));

  $post->id = $data->id;
  $post->nome = $data->nome;
  $post->endereco = $data->endereco;
  $post->bairro = $data->bairro;
  $post->cep = $data->cep;
  $post->cidade = $data->cidade;
  $post->uf = $data->uf;
  $post->email = $data->email;
  $post->telefone = $data->telefone;
  $post->tipo = $data->tipo;
  $post->quantidade = $data->quantidade;
  $post->atracao = $data->atracao;
  $post->sugestao = $data->sugestao;
  $post->imagens = $data->imagens;

  if($post->update()) {
    echo json_encode(
      array('message' => 'Post Updated')
    );
  } else {
    echo json_encode(
      array('message' => 'Post Not Updated')
    );
  }

