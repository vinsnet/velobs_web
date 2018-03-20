<?php
	include_once 'key.php';

/**
 * encapsulate database related action
 *
 * pattern singleton based on this documentation https://apprendre-php.com/tutoriels/tutoriel-45-singleton-instance-unique-d-une-classe.html
 *
 * TODO move a lot of duplicated code in this class.
 * TODO use this class to abstract database (mysql/postgres)
 * TODO use this class to replace mysql_connect deprecated method
 */
  class Database {

    /**
     * @var Database
     * @access private
     * @static
     */
     private static $_instance = null;

     /**
      * Constructeur de la classe
      *
      * @param void
      * @return void
      */
     private function __construct() {
     }

     /**
      * Méthode qui crée l'unique instance de la classe
      * si elle n'existe pas encore puis la retourne.
      *
      * @param void
      * @return Database
      */
     public static function getInstance() {

       if(is_null(self::$_instance)) {
         self::$_instance = new Database();
       }

       return self::$_instance;
     }



		 public function connect(){
			 $link = mysql_connect(HOST.':'.PORT, DB_USER, DB_PASS);
			 mysql_select_db(DB_NAME);
			 mysql_query("SET NAMES utf8mb4");
			 return $link;
		 }


  }
