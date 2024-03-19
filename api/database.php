<?php
class Database
{

    // connection BDD
    public function getPDO()
    {

        $pdo = new PDO('mysql:host=localhost;dbname=keep', 'root', '');
        return $pdo;
    }

    // ajout note dans BDD ( partie Create du CRUD)
    public function ajoutNote(string $titre, string $note): int
    {
        $conn = $this->getPDO();
        $query = $conn->prepare('INSERT INTO notes (title, description, created_at ) VALUES (:titre, :note, :dateAjout)');

        $query->execute([
            'titre' => $titre,
            'note' => $note,
            'dateAjout' => date("Y-m-d H:i:s"),
        ]);
        return $conn->lastInsertId();
    }

    // ajout d'une ou plusieurs catégories à la note au moment de sa création
    public function ajoutCategoriesDansNote(int $note_id, int $cat_id){
        $conn = $this->getPDO();
        $query = $conn->prepare('INSERT INTO pivot (note_id, cat_id) VALUES (:note_id, :cat_id)');

        $query->execute([
            'note_id' => $note_id,
            'cat_id' => $cat_id,
        ]);
    }

    // affichage notes (partie Read du CRUD)
    public function getNotes()
    {
        $query = $this->getPDO()->query('SELECT * 
        FROM notes n
        ORDER BY n.id ASC
        ');
        $notes = $query->fetchAll(PDO::FETCH_ASSOC);
        return $notes;
    }

    // affichage catégories (partie Read du CRUD)
    public function getCategories()
    {
        $query = $this->getPDO()->query('SELECT *
        FROM categories c
        ORDER BY c.id ASC
        ');
        $categories = $query->fetchAll(PDO::FETCH_ASSOC);
        return $categories;
    }

    // itération dans table pivot pour afficher les tags de catégorie (partie Read du CRUD)
    public function getCategoriesByNotes(int $note_id)
    {
        $query = $this->getPDO()->prepare('SELECT c.label
        FROM pivot p
        INNER JOIN notes n ON n.id = p.note_id
        INNER JOIN categories c ON c.id = p.cat_id
        WHERE p.note_id = :id
        ');
        $query->execute([
            'id' => $note_id
        ]);

        $categoriesByNotes = $query->fetchAll(PDO::FETCH_ASSOC);
        return $categoriesByNotes;
    }


    // suppression note dans BDD (partie delete du CRUD)
    public function suppressionNote(int $noteid)
    {
        $query = $this->getPDO()->prepare('DELETE FROM notes WHERE id = :valeurId');
        return $query->execute([
            'valeurId' => $noteid,
        ]);
    }

    // modification d'une note
    public function modifNote(int $note_id, string $note_title, string $note_descri)
    {
        $query = $this->getPDO()->prepare('UPDATE notes SET title = :title , description = :description WHERE id = :valeurId');
        return $query->execute([
            'valeurId' => $note_id,
            'title' => $note_title,
            'description' => $note_descri
        ]);
    }
}


class Test{
    public function somme(int $a, int $b) 
    {
        return $a + $b;
    }
}