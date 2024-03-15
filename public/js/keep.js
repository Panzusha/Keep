let Keep = {};
Keep.init = ()=>{  // dépendance select2
    $(document).ready(function() {
        $('.select2').select2();
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
    let url = "api.php?faire=delete&note_id="+id;
    // bouton ok
    //dialog.querySelector('.confirm').setAttribute('href', url);   autre façon de faire
    dialog.querySelector('.confirm').textContent = 'Oui, je confirme {'+id+'}';
    dialog.querySelector('.confirm').addEventListener('click', ()=>{
        window.location.href = url;
    })
}