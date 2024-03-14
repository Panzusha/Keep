let Keep = {};
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
    dialog.querySelector('.close').addEventListener('click', function () {
        dialog.close();
    });
    let url = "api.php?faire=delete&note_id="+id;
    //dialog.querySelector('.confirm').setAttribute('href', url);
    dialog.querySelector('.confirm').textContent = 'Oui, je confirme {'+id+'}';
    dialog.querySelector('.confirm').addEventListener('click', ()=>{
        window.location.href = url;
    })
}