let Keep = {};
Keep.emptyFormAdd = function(){
    // Efface le formulaire d'ajout de note
    let formTitre = document.getElementById('identifiantTitreNote');
    let formNote = document.getElementById('note');

    formTitre.value = formNote.value = '';
}