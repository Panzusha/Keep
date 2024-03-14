<?php

include "api/database.php";
/*

**
** A P I
**
var_dump($_POST);
var_dump($_SERVER["REMOTE_ADDR"]);
var_dump($_GET);
*/
if (!empty($_GET) && isset($_GET['faire'])) {  // voir faire=ajout dans le form action (page index.php)
    $faire = $_GET['faire'];
    switch ($faire) {
        case ("ajout"):
            $monSuperTitre = $_POST['monSuperTitre'];
            $contenuNote = $_POST['contenuNote'];
            if (empty($monSuperTitre) || empty($contenuNote)) {
                //si l'un des deux postes est vide, renvoie index avec message dans l URL et les $_POST titre + note
                header("Location: index.php?message=Veuillez remplir tous les champs&monSuperTitre=".$monSuperTitre."&contenuNote=".$contenuNote);
            } else {
                //enregistrement dans la base de donnée.
                $database = new Database();
                $resultatInsertionNote = $database->ajoutNote($monSuperTitre, $contenuNote);
                echo $resultatInsertionNote;
            }
            break;
        default:
            echo "Faire n'est pas définie :" . $faire;
            break;
    }
} else {
    echo "no";
}
