<?php 

namespace Core\Controllers;

require 'core/helpers/DBConnection.php';
require 'core/models/UserModel.php';
require 'core/models/NoteModel.php';

use Core\Helpers\DBConnection;
use Core\Models\UserModel;
use Core\Models\NoteModel;


class MainController {
    private $dbConnection;
    function __construct() {
        $this->dbConnection = new DBConnection;
    }

    public function run() {
        $email = "serzhkorochan@gmail.com";
        $password = "admin123";

        $user = new UserModel(
            $this->dbConnection->getPdoObj(),
            $email,
            $password
        );

        $request = $_SERVER['REQUEST_URI'];
        
        switch ($request) {
            case '/':
                require 'core/views/indexView.php';
                break;

            case '/login':
                require 'core/views/authView.php';
                break;

            default:
                http_response_code(404);
                echo "404 Page not found!";
                break;
        }
    }
}

?>