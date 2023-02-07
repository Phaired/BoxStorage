<?php

class Database {
    static private $oPDO = NULL;
    static private $oInstance = NULL;

    private function __construct() {
        self::$oPDO = new PDO('mysql:host=database;dbname=projet', 'root', 'password');
        self::$oPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        self::$oPDO->query("SET NAMES 'utf8'");
    }

    public function __destruct() {
        self::$oPDO = null ;
    }

    public function __clone() {
        throw new Exception('Impossible de cloner une connexion SQL protégée par un singleton');
    }

    public function __wakeUp( ) {
        // Vérification de la connexion
        if(self::$oInstance instanceof self) {
            throw new MySQLException();
        }
        // Correction de la reference
        self::$oInstance = $this;
    }

    public function __call($method, $params) {
        if(self::$oPDO == NULL){
            self::__construct();
        }

        return call_user_func_array(array(self::$oPDO, $method), $params);
    }

    static public function getInstance(){
        // Verification que l'instance n'a pas déja ete initialisée
        if(!(self::$oInstance instanceof self)){
            self::$oInstance = new self();
        }
        // Retour de l'instance unique
        return self::$oInstance;
    }
}