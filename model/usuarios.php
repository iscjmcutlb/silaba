<?php

include_once '../model/conexion.php';

class usuarios {

    private $db;

    function __construct() {
        $con = new conexo();
        $this->db = $con->conectar();
    }

    public function validar_empleado($nickname, $pass) {
        $sql = "select id_empleado, nombre, ape_pat, ape_mat, status from empleados where nickname = ? and password = ?";
        $prp = $this->db->Prepare($sql);
        return $this->db->Execute($prp, array($nickname, $pass));
    }

    public function validar_alumnos($nickname, $pass) {
        $sql = "select id_alumno, nombre, ape_pat, ape_mat, status from alumnos where matricula = ? and password = ?";
        $prp = $this->db->Prepare($sql);
        return $this->db->Execute($prp, array($nickname, $pass));
    }

}
