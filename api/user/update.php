<?php 
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: PUT');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  include_once '../../models/User.php';
  $user = new User();

  if($_SERVER['REQUEST_METHOD'] == 'PUT'){
    $data = json_decode(file_get_contents("php://input"));
    $user->setId($data->id);
    $user->setUser($data->user);
    $user->setRole($data->role);

    if($user->update()) {
      echo json_encode(
        array('message' => 'User Updated')
      );
    } else {
      echo json_encode(
        array('message' => 'User Not Updated')
      );
    }
  }
  

?>