<?php
include_once '../model/conexion.php';

class estados {

    private $db;

    function __construct() {
        $con = new conexo();
        $this->db = $con->conectar();
    }

    public function get_select_estados() {
        $sql = "select id_estado, abrev, nombre from estados where activo = 1 order by nombre";
        $rs = $this->db->Execute($sql);
        ?>
        <option value=""></option>
        <?php
        while(!$rs->EOF){
            ?>
        <option value="<?= $rs->fields[0]?>"><?= utf8_encode($rs->fields[2])?></option>
        <?php
            $rs->MoveNext();
        }
    }

}
