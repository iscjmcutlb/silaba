<?php
include_once '../model/conexion.php';
class puestos {
    private $db;
    
    function __construct() {
        $con = new conexo();
        $this->db = $con->conectar();
    }
    
    public function catalogo_puestos(){
        $sql = "select id_puesto, descripcion, fecha_creacion from puestos order by fecha_creacion";
        return $this->db->Execute($sql);
    }
    
    public function count_empleados_puesto($pto){
        $sql = "select count(*) from detalle_pue_emp where id_puesto = ?";
        $prp = $this->db->Prepare($sql);
        return $this->db->Execute($prp, array($pto))->fields[0];
    }
}
