<?php

require('User.php');
$user = new User();

$id = 3;
$name = "teste";
$role = "guest";

$user->setId($id);
$user->setUser($name);
$user->setRole($role);

if ($user->update()) {
    # code...
    echo "Update with sucess!!";
} else {
    # code...
    echo "Failure!!!";
}




?>