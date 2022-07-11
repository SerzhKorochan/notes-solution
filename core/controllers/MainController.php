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
        
        if (strpos($request, "?")) {
            $uriParts = explode("?", $request);
            $request = $uriParts[0];
            $uriParams = $uriParts[1];

            $getVar = explode("=", $uriParams);
            
            if ($getVar[0] == "id") {
                $noteId = (int)$getVar[1];
            }
        }

        if (isset($_SESSION['user_id'])) {
            $note = new NoteModel(
                $this->dbConnection->getPdoObj(), 
            $_SESSION['user_id']
            );
        }
    
        switch ($request) {
            case '/':
                if (isset($_SESSION['user_id'])) {
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
                            $_SESSION['user_id'] = $user->getUserId();
                            header('Location: /');
                        } else {
                            header('Location: /login');
                        }     
                    } else {
                        if ($user->createUser()) {
                            $_SESSION['user_id'] = $user->getUserId();
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
            
            case '/note/create':
                if (isset($_POST['noteText']) && !empty($_POST['noteText']) && isset($note)) {
                    $note->createNote($_POST['noteText']);
                }
                header('Location: /');
                break;

            case '/note/remove': 
                if (isset($noteId)) {
                    $note->removeNote($noteId);
                }
                header('Location: /');
                break;
                

            case '/notes': 
                $noteList = $note->getNotesList();
                header("Content-Type: application/json");
                echo json_encode($noteList);
                break;

            default:
                http_response_code(404);
                echo "404 Page not found!";
                break;
        }
    }
}

?>