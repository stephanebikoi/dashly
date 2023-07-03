<?php
namespace App\Core;

// importation de PDO
use PDO;
use PDOException;

class Db extends PDO {

    // instance unique de la classe

    private static $instance;

    // information de connexion

    private const DBHOST = 'localhost';
    private const DBUSER = 'mantallb_dashly';
    private const DBPASS = 'Dashly12//';
    private const DBNAME = 'mantallb_dashly';

    private function __construct() {
        
        //DSN de connexion
        $_dsn = 'mysql:dbname='. self::DBNAME . ';host=' . self::DBHOST;

        //appelle du constructeur de la classs PDO
        try{
            parent::__construct($_dsn,self::DBUSER,self::DBPASS);

            $this->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAMES utf8');
            $this->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {
            die($e->getMessage());
        }
        
    }

    public static function getInstance():self {
        if (self::$instance === null) {
            self::$instance = new self();
        } 
        return self::$instance;

    }

}