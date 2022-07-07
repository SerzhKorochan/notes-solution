<?php 
    require 'core/controllers/MainController.php';

    use Core\Controllers\MainController;

    session_start();

    $mainController = new MainController;
    $mainController->run();

?>