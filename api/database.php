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
    public function ajoutNote(string $titre, string $note): bool
    {
        $query = $this->getPDO()->prepare('INSERT INTO notes (title, description, created_at ) VALUES (:titre, :note, :dateAjout)');

        return $query->execute([
            'titre' => $titre,
            'note' => $note,
            'dateAjout' => date("Y-m-d H:i:s"),
        ]);
    }

    // affichage notes ( partie Read du CRUD)
    public function getNotes()
    {
        $query = $this->getPDO()->query('SELECT * 
        FROM notes n
        ORDER BY n.id ASC
    ');
        $notes = $query->fetchAll(PDO::FETCH_ASSOC);
        return $notes;
    }
    public function suppressionNote($noteid)
    {
        $query = $this->getPDO()->prepare('DELETE FROM notes WHERE id = :valeurId');
        return $query->execute([
            'valeurId' => $noteid,
        ]);
    }
}
