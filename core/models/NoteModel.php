<?php 

namespace Core\Models;

use \PDOException;

class NoteModel {
    private $pdo;
    private $ownerId;

    function __construct($pdo, $ownerId) {
        $this->pdo = $pdo;
        $this->ownerId = $ownerId;
    }

    private function getPreparedNotesList($notes) {
        $preparedNotes = [];

        foreach ($notes as $key => $value) {
            array_push($preparedNotes, $value);
        }

        return $preparedNotes;
    }

    public function createNote($text) {
        $query_pattern = "INSERT INTO note VALUES (NULL, %d, '%s');";
        $query = sprintf($query_pattern, $this->ownerId, $text);

        try {
            $this->pdo->exec($query);
        } catch (PDOException $e) {
            echo "Failed to create note:". $e->getMessage();
            return false;
        }

        return true;
    }

    public function removeNote($noteId) {
        $query = "DELETE FROM note WHERE note.id = $noteId";
        
        return (bool)$this->pdo->exec($query);
    }

    public function getNotesList() {
        $query = "SELECT * FROM note WHERE note.owner_id = $this->ownerId";
        $notes = $this->pdo->query($query)->fetchAll();

        return $this->getPreparedNotesList($notes);
    }
}
?>