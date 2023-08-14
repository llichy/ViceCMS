<?php

/**
 * Database
 * Connexion à la base de données
 *
 * Liste des fonctions
 *  - __construct
 *  - connect
 */

class Database
{
    private $host = '127.0.0.1';
    private $user = 'vicehabbo';
    private $pass = 'ViceHabbo7331*';
    private $table = 'vicehabbo';

    public static $pdo = null;

    public function __construct() {
        try {
            self::$pdo = new \PDO('mysql:charset=utf8;host=' . $this->host . ';dbname=' . $this->table, $this->user, $this->pass, [
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
                \PDO::ATTR_PERSISTENT => true,
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'
            ]);
            return self::$pdo;
        } catch (\PDOException $e) {           
			die('Erreur lors de la connexion &agrave; la base de donn&eacute;es: ' . $e->getMessage());
			die();
        }
    }

    public static function connect(){
        if( is_null(self::$pdo) ){
          $inst = new Database();
        }
        return self::$pdo;
    }

    

}