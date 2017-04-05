<?php
include_once '../model/conexion.php';

class carreras {

    private $db;

    function __construct() {
        $con = new conexo();
        $this->db = $con->conectar();
    }

    public function get_carreras_slc() {
        $sql = "select id_carrera, clave, nombre from carreras order by clave";
        $rs = $this->db->Execute($sql);
        while (!$rs->EOF) {
            ?>
            <option value="<?= $rs->fields[0] ?>"><?= utf8_decode($rs->fields[1] . " - " . $rs->fields[2]) ?></option>
            <?php
            $rs->MoveNext();
        }
    }

}
