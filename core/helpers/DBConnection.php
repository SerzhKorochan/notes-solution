<?php 

    namespace Core\Helpers;

    class DBConnection {
        private $pathToConfigFile = "core/config/db.ini";

        function __construct() {
            $config = parse_ini_file($this->pathToConfigFile);

            var_dump($config);
        }
    }