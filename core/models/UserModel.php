<?php
    namespace Core\Models;
    use PDOException;

    class UserModel {
        private $pdo;
        private $email;
        private $password;

        function __construct($pdo, $email, $password) {
            $this->pdo = $pdo;
            $this->email = $email;
            $this->password = $password;
        }

        public function isUserExist() {
            $query_pattern = 'SELECT * FROM user WHERE user.email = "%s";';
            $query = sprintf($query_pattern, $this->email);
            $res = $this->pdo->query($query)->fetch();

            return (bool)$res;
        }

        public function isAuthDataCorrect() {
            $query_pattern = 'SELECT * FROM user WHERE user.email = "%s" AND user.password = "%s";';
            $query = sprintf($query_pattern, $this->email, $this->password);
            $res = $this->pdo->query($query)->fetch();

            return (bool)$res;
        }

        public function createUser() {
            $query_pattern = "INSERT INTO user VALUES (NULL, '%s', '%s');";
            $query = sprintf($query_pattern, $this->email, $this->password);

            try {
                $this->pdo->exec($query);
            } catch (PDOException $e) {
                echo "Failed to create user:". $e->getMessage();
                return false;
            }

            return true;
        }

        public function getUserId() {
            $query_pattern = 'SELECT user.id FROM user WHERE user.email = "%s";';
            $query = sprintf($query_pattern, $this->email);

            return $this->pdo->query($query)->fetch()['id'];
        }
    }

?>