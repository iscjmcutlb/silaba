<?php

include_once '../model/conexion.php';
class municipios {
    private $db;
    function __construct() {
        $con = new conexo();
        $this->db = $con->conectar();
    }
    
   function get_municipios_edos($edo){
       $sql = "select id_municipio, nombre from municipios where id_estado = ? order by nombre";
       $prp = $this->db->Prepare($sql);
       $rs = $this->db->Execute($prp, array($edo));
       return $rs;
   }
}
