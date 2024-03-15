<?php

include "api/database.php";
// Connection à la Base De Données
$database = new Database();
$pdo = $database->getPDO();

// Appel de la fonction qui permettra de remplir les cards notes
$notes = $database->getNotes();

// Appel de la fonction qui permettra de remplir les choix de catégories
$categories = $database->getCategories();

// var_dump($categoriesByNote);

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="public/libs/material-design-lite/material.min.css">
    <link rel="stylesheet" href="public/libs/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="public/css/default.css?x=<?= time() ?>">
    <script defer src="public/libs/material-design-lite/material.min.js"></script>
    <script defer src="public/libs/jquery/dist/jquery.min.js"></script>
    <script defer src="public/libs/select2/dist/js/select2.min.js"></script>
    <script defer src="public/js/keep.js?x=<?= time() ?>"></script>
    <title>Keep</title>
</head>

<body>
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer
            mdl-layout--fixed-header">
        <header class="mdl-layout__header">
            <div class="mdl-layout__header-row">
                <div class="mdl-layout-spacer"></div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable
                  mdl-textfield--floating-label mdl-textfield--align-right">
                    <label class="mdl-button mdl-js-button mdl-button--icon" for="fixed-header-drawer-exp">
                        <i class="material-icons">search</i>
                    </label>
                    <div class="mdl-textfield__expandable-holder">
                        <input class="mdl-textfield__input" type="text" name="sample" id="fixed-header-drawer-exp">
                    </div>
                </div>
            </div>
        </header>
        <div class="mdl-layout__drawer">
            <span class="mdl-layout-title">Keep</span>
            <nav class="mdl-navigation">
                <a class="mdl-navigation__link" href="">Notes</a>
                <a class="mdl-navigation__link" href="">Rappels</a>
                <a class="mdl-navigation__link" href="">Modifier les libellés</a>
                <hr />

                <a class="mdl-navigation__link" href="">Archive</a>
                <a class="mdl-navigation__link" href="">Corbeille</a>
            </nav>
        </div>
        <main class="mdl-layout__content">
            <div class="page-content">
                <h1 align="center">Keep</h1>
                <hr />
                <div class="mdl-grid">
                    <div class="mdl-cell mdl-cell--4-col mdl-cell--4-col-tablet mdl-cell--4-col-phone mdl-cell--2-offset-tablet mdl-cell--4-offset-desktop">
                        <!-- lie le formulaire au fichier api.php -->
                        <form action="api.php?faire=ajout" method="POST">
                            <div class="mdl-card mdl-shadow--8dp">
                                <div class="mdl-card__title">
                                    <h2 class="mdl-card__title-text">Créer une note</h2>
                                </div>
                                <?php // propriétés utilisées dans le formulaire plus bas
                                // ternaire : si rempli = valeur de l'url sinon vide ou valeurs par défaut
                                $recuperationTitreNote = isset($_GET['monSuperTitre']) ? $_GET['monSuperTitre'] : 'Toto';
                                $recuperationContenuNote = isset($_GET['contenuNote']) ? $_GET['contenuNote'] : 'Titi';

                                if (isset($_GET['message'])) { // active le message défini dans ligne 23 api.php
                                ?>
                                    <div class="mdl-color--red" align="center"><?= $_GET['message'] ?></div>
                                <?php
                                }
                                ?>
                                <div class="mdl-card__supporting-text">
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                        <!-- pattern regex, name utilisé par api.php et ternaire ci dessus -->
                                        <input required class="mdl-textfield__input" name="monSuperTitre" type="text" id="identifiantTitreNote" value="<?= $recuperationTitreNote ?>">
                                        <!-- for lié a l'id -->
                                        <label class="mdl-textfield__label" for="identifiantTitreNote">Titre</label>
                                        <span class="mdl-textfield__error">Ce champ est obligatoire</span>
                                    </div>
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                        <textarea class="mdl-textfield__input" name="contenuNote" type="text" rows="5" id="note"><?= $recuperationContenuNote ?></textarea>
                                        <label class="mdl-textfield__label" for="note">Créer une note</label>
                                    </div>
                                    <div class="">
                                        <!-- utilisation select2 (amélioration Jquery du select) -->
                                        <select class="select2 full" multiple name="categories[]">
                                            <?php
                                            foreach($categories as $categorie) : // itération dans la table catégories
                                            ?>
                                            <option value="<?= $categorie['id'] ?>"><?= $categorie['label'] ?></option>
                                            <?php
                                            endforeach;
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="mdl-card__actions">
                                    <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
                                        <i class="material-icons">save</i>
                                        Enregistrer
                                    </button>
                                    <button type="reset" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
                                        Reset
                                    </button>
                                    <button type="button" onclick="Keep.emptyFormAdd();" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
                                        Effacer
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <hr />
                <div class="mdl-grid notes_list">
                    <?php // création des cartes
                    foreach ($notes as $note) : // itération dans la table note
                    ?>
                        <div class="mdl-cell mdl-cell--4-col mdl-cell--6-col-tablet mdl-cell--12-col-phone mdl-cell--1-offset-tablet">
                            <div class="mdl-card">
                                <div class="mdl-card__title">
                                    <?= $note['title'] ?>
                                </div>
                                <div class="mdl-card__supporting-text">
                                    <?= $note['description'] ?>
                                </div>
                                <div class="mdl-card__actions">
                                    <button class="mdl-button mdl-js-button mdl-button--icon mdl-color--blue">
                                        <i class="material-icons">edit</i>
                                    </button>
                                    <button onclick="Keep.removeNote(<?= $note['id'] ?>);" class="mdl-button mdl-js-button mdl-button--icon mdl-color--red">
                                        <i class="material-icons">delete</i>
                                    </button>
                                    <?php
                                        $categoriesByNotes = $database->getCategoriesByNotes($note['id']);
                                        foreach ($categoriesByNotes as $item) { ?>
                                    <p><?= $item['label'] ?></p>
                                        <?php } ?>
                                </div>
                            </div>
                        </div>
                    <?php
                    endforeach;
                    ?>
                </div>
            </div>
        </main>
    </div>
    <!-- Fenêtre de dialogue améliorée par mdl, voir keep.js -->
    <dialog class="mdl-dialog">
        <h3 class="mdl-dialog__title">Confirmez-vous la suppression ?</h3>
        <div class="mdl-dialog__content">
            <p>Voulez-vous vraiment supprimer cette note ?</p>
        </div>
        <div class="mdl-dialog__actions">
            <a href="#" type="button" class="mdl-button confirm"></a>
            <button type="button" class="mdl-button close">Annuler</button>
        </div>
    </dialog>

</body>

</html>