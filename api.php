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
    switch ($faire) { // compare la valeur du switch a celles des cases
        case ("ajout"): // on ajoute une note (crud create)
            $monSuperTitre = $_POST['monSuperTitre'];
            $contenuNote = $_POST['contenuNote'];
            // var_dump($_POST);
            // exit();
            if (empty($monSuperTitre) || empty($contenuNote)) {
                //si l'un des deux postes est vide, renvoie index avec message dans l URL et les $_POST titre + note
                header("Location: index.php?message=Veuillez remplir tous les champs&monSuperTitre=".$monSuperTitre."&contenuNote=".$contenuNote);
            } else {
                //enregistrement dans la base de donnée.
                $database = new Database();
                $identifiantInsertionNote = $database->ajoutNote($monSuperTitre, $contenuNote);
                //pour chacune des categories, on l'insert dans la table "pivot"
                //var_dump($_POST['categories']);
                foreach ($_POST['categories'] as $category){
                    $database->ajoutCategoriesDansNote($identifiantInsertionNote, $category);
                }
            }
            break;
        case ("delete"): // on supprime une note (crud delete)
            $noteid = $_GET['note_id'];
            if($noteid){
                
                $database = new Database();
                $resultatDeleteNote = $database->suppressionNote($noteid);
                header("Location: index.php");
            }
            break;
        default:
            echo "Dans mon switch, je n'ai pas défini le case :" . $faire;
            break;
    }
} else {
    echo "no";
}
