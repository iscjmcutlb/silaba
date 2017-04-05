<?php
include_once '../tools/adodb5/adodb-exceptions.inc.php';
include '../tools/adodb5/adodb.inc.php';
class conexo {
    private $db='mysql',$servidor='localhost', $user='root', $password='', $based='silaba_c';
        public function __construct() {
        }
       public function conectar() {
           $db = ADONewConnection($this->db);
           $db->debug = false;
           $db->Connect($this->servidor, $this->user, $this->password, $this->based);
           return $db;
        }
}
?>
