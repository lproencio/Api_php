<?php 
  
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/conexao.php';
  include_once '../../models/post.php';

 
  $database = new Database();
  $db = $database->connect();

  
  $post = new Post($db);

  $result = $post->read();
 
  $num = $result->rowCount();

  if($num > 0) {
    
    $posts_arr = array();
    

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);

      $post_item = array(
        'id' => $id,
        'nome' => $nome,
        'telefone' => $telefone
      );


      array_push($posts_arr, $post_item);
     
    }

  
    echo json_encode($posts_arr);

  } else {
    
    echo json_encode(
      array('message' => 'No Posts Found')
    );
  }
