<?php

include_once '../model/conexion.php';
class alumnos {
    private $db;
    
    function __construct() {
        $con = new conexo();
        $this->db = $con->conectar();
    }
    
    public function insert_aspirante($id_carrera,$id_escuela,$nombre,$ape_pat,$ape_mat,$curp,$email,$id_localidad,$edo_nacimiento,$calle,$numero_int,$numero_ext,$cp,$tel_personal,$tel_familiar1,$tel_familiar2,$fecha_nacimiento,$genero,$id_estado_civil,$no_examen,$id_perido_examen){
        $sql = "insert into alumnos (id_carrera,id_escuela,nombre,ape_pat,ape_mat,curp,email,id_localidad,edo_nacimiento,calle,numero_int,numero_ext,cp,tel_personal,tel_familiar1,tel_familiar2,fecha_nacimiento,genero,id_estado_civil,no_examen,id_perido_examen) VALUES "
                . "(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $prp = $this->db->Prepare($sql);
        $this->db->Execute($prp, array($id_carrera,$id_escuela,$nombre,$ape_pat,$ape_mat,$curp,$email,$id_localidad,$edo_nacimiento,$calle,$numero_int,$numero_ext,$cp,$tel_personal,$tel_familiar1,$tel_familiar2,$fecha_nacimiento,$genero,$id_estado_civil,$no_examen,$id_perido_examen));
        return $this->db->Execute("select last_insert_id()")->fields[0];
    }
    
    public function validar_curp($curp){
        $sql = "select id_alumno, id_carrera, id_cuatrimestre, id_escuela, matricula, password, fecha_de_registro, nombre, ape_pat, ape_mat, curp, email, id_localidad, edo_nacimiento, calle, numero_int, numero_ext, cp, tel_personal, tel_familiar1, tel_familiar2, fecha_nacimiento, genero, id_estado_civil, grupo_sangineo, no_examen, id_perido_examen, status from alumnos where curp = ?";
        $prp = $this->db->Prepare($sql);
        $rs = $this->db->Execute($prp, array($curp));
        return $rs;
    }
    
    public function get_data_aspirantes_pdf($registro){
        $sql = "select a.nombre, a.ape_pat, a.ape_mat, a.curp, a.email, dp.fecha_aplicacion , a.no_examen, c.nombre, c.clave from alumnos a join carreras c on a.id_carrera = c.id_carrera join detalle_periodo_fechas dp on a.id_perido_examen = dp.id_perido_examen where a.id_alumno = ?";
        $prp = $this->db->Prepare($sql);
        $rs = $this->db->Execute($prp, array($registro));
        return $rs;
    }
}
