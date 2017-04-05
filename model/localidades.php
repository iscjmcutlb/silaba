<?php
include_once '../model/conexion.php';
class localidades {
    private $db;
    
    function __construct() {
        $con = new conexo();
        $this->db = $con->conectar();
    }
    public function get_localidades_municipio($mun){
        $sql = "select id_localidad, nombre from localidades where id_municipio = ? order by nombre";
        $prp = $this->db->Prepare($sql);
       $rs = $this->db->Execute($prp, array($mun));
       return $rs;
    }
}
