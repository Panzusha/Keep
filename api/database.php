<?php

function getPDO($dsn, $username, $mdp) {

    $pdo = new PDO($dsn, $username, $mdp);
    return $pdo;
}

$pdo = getPDO('mysql:host=localhost;dbname=keep', 'root', '');
?>