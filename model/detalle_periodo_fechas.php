<?php
include_once '../model/conexion.php';

class detalle_periodo_fechas {

    private $db;

    function __construct() {
        $con = new conexo();
        $this->db = $con->conectar();
    }

    function get_slc_fechas_examen() {
        $fa = date("Y-m-d");
        $sql = "select dp.no_examen, dp.id_perido_examen, dp.fecha_aplicacion from periodo_examenes_colocacion pe join detalle_periodo_fechas dp on pe.id_perido_examen = dp.id_perido_examen where pe.fecha_inicio < ? and pe.fecha_termino > ? and dp.fecha_aplicacion > ?";
        $prp = $this->db->Prepare($sql);
        $rs = $this->db->Execute($prp, array($fa, $fa, $fa));
        while (!$rs->EOF) {
            ?>
            <option value="<?= $rs->fields[0] . "-" . $rs->fields[1] ?>"><?= date("d/m/Y", strtotime($rs->fields[2])) ?></option>
            <?php
            $rs->MoveNext();
        }
    }

}
