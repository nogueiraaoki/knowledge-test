<?php
  //Define Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../models/User.php';

  $users = new User();
  $result = $users->read();
  $json = json_encode($result, true);
  echo $json;