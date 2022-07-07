<?php 
    require 'core/helpers/DBConnection.php';
    require 'core/models/UserModel.php';
    require 'core/models/NoteModel.php';

    use Core\Helpers\DBConnection;
    use Core\Models\UserModel;
    use Core\Models\NoteModel;


    $obj = new DBConnection;

    $user = new UserModel(
        $obj->getPdoObj(),
        "serzhkorochan@gmail.com",
        "admin123"
    );

    $note = new NoteModel(
        $obj->getPdoObj(),
        $user->getUserId()
    );
    
   var_dump($note->getNotesList());
?>