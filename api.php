<?php

/*
include "api/database.php";

**
** A P I
**
**
var_dump($_POST);
var_dump($_SERVER["REMOTE_ADDR"]);
var_dump($_GET);
*/
if (!empty($_GET) && isset($_GET['faire'])) {
    $faire = $_GET['faire'];
    switch ($faire) {
        case ("ajout"):
            $monSuperTitre = $_POST['monSuperTitre'];
            $contenuNote = $_POST['contenuNote'];
            if (empty($monSuperTitre) || empty($contenuNote)) {
                //l'un des deux postes est peut-etre vide, 
                header("Location: index.php?message=Veuillez remplir tous les champs&monSuperTitre=".$monSuperTitre."&contenuNote=".$contenuNote);
            } else {
                echo "Youpi joie";
            }
            break;
        default:
            echo "Faire n'est pas définie :" . $faire;
            break;
    }
} else {
    echo "no";
}
