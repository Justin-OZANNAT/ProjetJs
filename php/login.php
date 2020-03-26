<?php

session_start(); // initialisation de la session

$obj = new stdClass();
$obj->success = false;
$username = $_POST['username']; // la variable récupère la valeur Username du form
$password = $_POST['password']; // idem pour le MDP
echo date('d/m/y h:i:s') . "\n"; // affichage de la date
echo 'Ton username est : ' .htmlspecialchars($username) . "\n" . 'Ton password est : ' . $password . "\n"; // affichage username et mdp

$message = 'Connecté';
try
{
    // On se connecte à MySQL
    $bdd = new PDO('mysql:host=mysql-justin-ozannat.alwaysdata.net;dbname=justin-ozannat_bd;charset=utf8', '202756', 'Richard2001!');
}
catch(Exception $e)
{
    // En cas d'erreur, on affiche un message et on arrête tout
    die('Erreur : '.$e->getMessage());
}
$requete = $bdd->query('INSERT into login(username, password) VALUES ( )');
while ($donnees = $requete->fetch())
{
    echo $donnees['nom'] . "\n";
}

$requete->closeCursor();



if ($username == 'admin' && $password == 'admin'){ // on vérifie les identifiants
    $obj->success = true;
    $_SESSION['admin'] = 123;
    echo 'Bonne combinaison MDP / USNM';
} else {
    echo 'Mauvaise combinaison MDP/USNM' . "\n";
} // condition pour afficher la réussite de la combinaison ou non


setcookie('username', $username, time() + 365*24*3600, null ,null ,false ,true);
setcookie('password', $password, time() + 365*24*3600, null ,null ,false ,true);


header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');

