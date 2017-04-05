<?php
include_once '../model/conexion.php';
class catalogo_derechos_educativos {
    private $db;
    
    function __construct() {
        $con = new conexo();
        $this->db = $con->conectar();
    }
    
    public function get_derecho_educhativo_preficha(){
        $sql = "select concepto, cuota from catalogos_derechos_educativos where id_derecho = 4";
        $rs = $this->db->Execute($sql);
        return $rs;
    }
}
