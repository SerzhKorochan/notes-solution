<?php 

    namespace Core\Helpers;

    use \PDOException;
    use \PDO;


    class DBConnection {
        private $pdo;
        private $pathToConfigFile = "core/config/db.ini";

        function __construct() {
            $config = parse_ini_file($this->pathToConfigFile);

            $dsnPattern = "mysql:host=%s;dbname=%s;charset=%s";
            $dsn = sprintf(
                $dsnPattern, 
                $config['host'], 
                $config['dbname'], 
                $config['charset']
            );

            try {
                $pdo = new PDO($dsn, $config['user'], $config['pass']);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $this->pdo = $pdo;

            } catch (PDOException $e) {
                echo "Connection failed: ". $e->getMessage();
            }

        }

        public function getPdoObj() {
            return $this->pdo;
        }
    }