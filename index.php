<?php 
    require 'core/helpers/DBConnection.php';
    require 'core/models/UserModel.php';

    use Core\Helpers\DBConnection;
    use Core\Models\UserModel;


    $obj = new DBConnection;

    $user = new UserModel(
        $obj->getPdoObj(),
        "serzhkorochan@gmail.com",
        "admin123"
    );

    // var_dump($user->isUserExist());
    var_dump($user->getUserId());
?>