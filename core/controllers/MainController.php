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
                if (isset($_SESSION['is_auth'])) {
                    require 'core/views/indexView.php';
                } else {
                    header('Location: /login');
                }
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
                            $_SESSION['is_auth'] = true;
                            header('Location: /');
                        } else {
                            header('Location: /login');
                        }     
                    } else {
                        if ($user->createUser()) {
                            $_SESSION['is_auth'] = true;
                            header('Location: /');
                        }
                    }
                } else {
                    require 'core/views/authView.php';
                }
            
                break;

            case '/logout':
                $_SESSION = array();
                session_destroy();
                header('Location: /login');
                break;

            default:
                http_response_code(404);
                echo "404 Page not found!";
                break;
        }
    }
}

?>