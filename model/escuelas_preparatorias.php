<?php

include_once '../model/conexion.php';

class escuelas_preparatorias {

    private $db;

    function __construct() {
        $con = new conexo();
        $this->db = $con->conectar();
    }
    
    public function get_escuelas_localidad ($loc){
        $sql = "select id_escuela, nombre, clave from escuelas_preparatorias where id_localidad = ? order by nombre";
        $prp = $this->db->Prepare($sql);
        $rs = $this->db->Execute($prp, array($loc));
        return $rs;
    }

}
