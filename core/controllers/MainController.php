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
    private function getEnteredUserData() {
        if (isset($_POST['auth_email'], $_POST['auth_pass'])) {
            return [
                'email' => $_POST['auth_email'], 
                'password' => $_POST['auth_pass']
            ];

        } else {
            return False;
        }
    }

    public function run() {
        $request = $_SERVER['REQUEST_URI'];
    
        switch ($request) {
            case '/':
                require 'core/views/indexView.php';
                break;

            case '/login':
                $enteredUserData = $this->getEnteredUserData();

                if ($enteredUserData) {
                    $user = new UserModel(
                        $this->dbConnection->getPdoObj(),
                        $enteredUserData['email'],
                        $enteredUserData['password']
                    );

                    if ($user->isUserExist()) {
                        if ($user->isAuthDataCorrect()) {
                            session_start(['user_id' => $user->getUserId()]);
                            header('Location: /');
                        } else {
                            header('Location: /login');
                        }     
                    } else {
                        if ($user->createUser()) {
                            header('Location: /');
                        }
                    }
                } else {
                    require 'core/views/authView.php';
                }
            
                break;

            default:
                http_response_code(404);
                echo "404 Page not found!";
                break;
        }
    }
}

?>