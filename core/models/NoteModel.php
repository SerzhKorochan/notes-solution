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

    }

    public function getNotesList() {

    }
}
?>