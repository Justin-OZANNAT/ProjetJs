<?php

session_start();
$message = 'Connecté';

$obj = new stdClass();
$obj->success = false;
$username = $_POST['username'];
$password = $_POST['password'];

echo 'Ton username est : ' .htmlspecialchars($username) . "\n" . 'Ton password est : ' . $password . "\n";

if ($username == 'admin' && $password == 'admin'){
    $obj->success = true;
    $_SESSION['user'] = 123;
    echo 'Bonne combinaison MDP / USNM';
} else {
    echo 'Mauvaise combinaison MDP/USNM';
}

header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');

