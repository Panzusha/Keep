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
            <form action="#">
              <div class="mdl-card mdl-shadow--8dp">
                <div class="mdl-card__title">
                  <h2 class="mdl-card__title-text">Créer une note</h2>
                </div>
                <div class="mdl-card__supporting-text">
                  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" type="text" id="titreNote">
                    <label class="mdl-textfield__label" for="titreNote">Titre</label>
                  </div>
                  <div class="mdl-textfield mdl-js-textfield">
                    <textarea class="mdl-textfield__input" type="text" rows="5" id="note"></textarea>
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
        <div class="notes_list">
          ...
        </div>

      </div>
    </main>
  </div>
  <script src="public/libs/material-design-lite/material.min.js"></script>

</body>

</html>