<?php

namespace Src\Manager;

use PDO;
use Exception;

class DataBaseManager
{
        private PDO $connection;
    public function __construct()
    {
        try {

            $host = "localhost";
            $databaseName = "pressing";
            $user = "root";
            $password = "";

            $this->connection = new PDO("mysql:host=" . $host . ";port=3307;dbname=" . $databaseName . ";charset=utf8", $user, $password);

            $this->configPdo();

           
        } catch (Exception $e) {

            //Lancer l'erreur
            //throw $e;

            echo ("base de données non connectée : " .  $e->getMessage());

            exit();
        }
    }
    public function configPdo(): void
    {
        // Recevoir les erreurs PDO ( coté SQL )
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // Choisir les indices dans les fetchs
        $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }

        /**
         * Get the value of connection
         */ 
        public function getConnection()
        {
                return $this->connection;
        }
}
