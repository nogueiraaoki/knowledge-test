<?php
require('User.php');
$user = new User();

$id = 3;
$name = "Lucas Farias";
$role = "admin";

$user->setId($id);
$user->setUser($name);
$user->setRole($role);
if ($user->create()) {
    # code...
    echo "Create with sucess!!!";
} else {
    # code...
    echo "Failure!!!";
}

?>