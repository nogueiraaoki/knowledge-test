<?php

require('User.php');
$user = new User();

$id = 3;

$user->setId($id);

if ($user->delete()) {
    # code...
    echo "Delete with sucess!!";
} else {
    # code...
    echo "Failure!!!";
}

?>