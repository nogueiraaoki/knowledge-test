<?php
require('User.php');
$user = new User();
$json = $user->read();
foreach ($json as $value) {
    # code...
    echo  $value['id']." - ". $value['user']." - ".$value['role']."<br>";
}
?>