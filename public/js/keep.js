let Keep = {};
Keep.init = () => {  // dépendance select2 pour le choix des catégories lors de la création d'une note
    $(document).ready(function () {
        $('.select2').select2({
            placeholder: "Selectionner une ou plusieurs catégories"
        });
    });
}

Keep.init();
Keep.emptyFormAdd = function () {
    // Efface le formulaire d'ajout de note
    let formTitre = document.getElementById('identifiantTitreNote');
    let formNote = document.getElementById('note');

    formTitre.value = formNote.value = '';
}

Keep.removeNote = (id) => {
    // Fais apparaitre la fenêtre de dialogue pour confirmer la suppression
    const dialog = document.querySelector('dialog');
    if (!dialog.showModal) {
        dialogPolyfill.registerDialog(dialog);
    }
    dialog.showModal();
    // bouton annuler
    dialog.querySelector('.close').addEventListener('click', function () {
        dialog.close();
    });
    let url = "api.php?faire=delete&note_id=" + id;
    // bouton ok
    //dialog.querySelector('.confirm').setAttribute('href', url);   autre façon de faire
    dialog.querySelector('.confirm').textContent = 'Oui, je confirme {' + id + '}';
    dialog.querySelector('.confirm').addEventListener('click', () => {
        window.location.href = url;
    })
}

Keep.setForm = (id, title, description) => {
    // Fais apparaitre le dialogue pour modifier une note
    document.getElementById('modificationTitreNote').value = title;
    // Utilise la fonction br2nl sur description , voir ligne 63
    document.getElementById('modificationDescriptionNote').value = br2nl(description);

    // Modifier une note
    const dialog = document.getElementById('modifDialog');
    if (!dialog.showModal) {
        dialogPolyfill.registerDialog(dialog);
    }
    dialog.showModal();
    // bouton annuler
    dialog.querySelector('.close').addEventListener('click', function () {
        dialog.close();
    });

    let url = "api.php?faire=modifier&note_id=" + id;
    let button = document.getElementById("boutonMAJ");
    // Modifie l'action du formulaire pour avoir une ID dynamique de la note a modifier
    let formDynamic = document.getElementById('updateForm');
    formDynamic.setAttribute("action", url);
}

function br2nl(str) {
    /*
    Change un text en <br /> et <br> et <br > et <br/> via \n
    */
    var regex = /<br\s*[\/]?>/gi;
    return str.replace(regex, "\n");
}