<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="public/libs/material-design-lite/material.min.css">
    <link rel="stylesheet" href="public/css/default.css">
    <script defer src="public/libs/material-design-lite/material.min.js"></script>
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
                    <div class="mdl-cell mdl-cell--4-col"></div>
                    <div class="mdl-cell mdl-cell--4-col">
                        <form action="api.php?faire=ajout" method="POST">
                            <div class="mdl-card mdl-shadow--8dp">
                                <div class="mdl-card__title">
                                    <h2 class="mdl-card__title-text">Créer une note</h2>
                                </div>
                                <?php
                                $recuperationTitreNote = isset($_GET['monSuperTitre']) ? $_GET['monSuperTitre'] : '';
                                $recuperationContenuNote = isset($_GET['contenuNote']) ? $_GET['contenuNote'] : '';

                                if (isset($_GET['message'])) {
                                ?>
                                    <div class="mdl-color--red" align="center"><?= $_GET['message'] ?></div>
                                <?php
                                }
                                ?>
                                <div class="mdl-card__supporting-text">
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                        <!-- for lié a id -->
                                        <input required class="mdl-textfield__input" pattern="[A-Za-z]*" name="monSuperTitre" type="text" id="identifiantTitreNote" value="<?= $recuperationTitreNote ?>">
                                        <label class="mdl-textfield__label" for="identifiantTitreNote">Titre</label>
                                        <span class="mdl-textfield__error">Ce champ est obligatoire</span>
                                    </div>
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                        <textarea class="mdl-textfield__input" name="contenuNote" type="text" rows="5" id="note"><?= $recuperationContenuNote ?></textarea>
                                        <label class="mdl-textfield__label" for="note">Créer une note</label>
                                    </div>
                                </div>
                                <div class="mdl-card__actions">
                                    <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
                                        <i class="material-icons">save</i>
                                        Enregistrer
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="mdl-cell mdl-cell--4-col"></div>
                </div>
                <hr />
                <div class="mdl-grid notes_list">
                    <?php
                    for ($i = 0; $i < 36; $i++) {
                    ?>
                        <div class="mdl-cell mdl-cell--4-col">
                            <div class="mdl-card">
                                <div class="mdl-card__title">
                                    Titre
                                </div>
                                <div class="mdl-card__supporting-text">
                                    Sed (saepe enim redeo ad Scipionem, cuius omnis sermo erat de amicitia) querebatur, quod omnibus in rebus homines diligentiores essent; capras et oves quot quisque haberet, dicere posse, amicos quot haberet, non posse dicere et in illis quidem parandis adhibere curam, in amicis eligendis neglegentis esse nec habere quasi signa quaedam et notas, quibus eos qui ad amicitias essent idonei, iudicarent. Sunt igitur firmi et stabiles et constantes eligendi; cuius generis est magna penuria. Et iudicare difficile est sane nisi expertum; experiendum autem est in ipsa amicitia. Ita praecurrit amicitia iudicium tollitque experiendi potestatem.
                                    <br />
                                    <br />
                                    Dum apud Persas, ut supra narravimus, perfidia regis motus agitat insperatos, et in eois tractibus bella rediviva consurgunt, anno sexto decimo et eo diutius post Nepotiani exitium, saeviens per urbem aeternam urebat cuncta Bellona, ex primordiis minimis ad clades excita luctuosas, quas obliterasset utinam iuge silentium! ne forte paria quandoque temptentur, plus exemplis generalibus nocitura quam delictis.
                                </div>
                                <div class="mdl-card__actions">
                                    <i class="material-icons">settings</i>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </main>
    </div>
    <script src="public/libs/material-design-lite/material.min.js"></script>
    <script src="public/js/keep.js"></script>

</body>

</html>