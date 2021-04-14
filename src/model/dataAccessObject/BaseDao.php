<?php

class BaseDao {
    private $_DSN = 'mysql:host=mysql-pieddevigne.alwaysdata.net;dbname=pieddevigne_db_win_beer';
    private $_USER = '232395';
    private $_PWD = 'dwwmafpa29';

    protected $db;

    public function __construct() {

        $this->db = null;
        try {
           $this->db = new PDO($this->_DSN, $this->_USER, $this->_PWD); 
           $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           $this->db->exec('set names utf8');

        } catch(PDOException $e) {
            die('<br>Pas de connexion');
        }
        
    }
}
?>