<?php 
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  include_once '../../models/User.php';
  $user = new User();

  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id = md5(uniqid(""));
    $data = json_decode(file_get_contents("php://input"));
    $user->setId($id);
    $user->setUser($data->user);
    $user->setRole($data->role);
  }

  if($user->create()){
    echo json_encode(
      array('message' => 'User Created')
    );
  } else {
    echo json_encode(
      array('message' => 'User Not Created')
    );
  }

?>