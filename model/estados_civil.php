<?php
include_once '../model/conexion.php';

class estados_civil {

    private $db;

    function __construct() {
        $con = new conexo();
        $this->db = $con->conectar();
    }

    public function get_data_select() {
        $sql = "select id_estado_civil, concepto from estados_civil";
        $rs = $this->db->Execute($sql);
        ?>
        <option value=""></option>
        <?php
        while (!$rs->EOF) {
            ?>
            <option value="<?= $rs->fields[0] ?>"><?= utf8_decode($rs->fields[1]) ?></option>
            <?php
            $rs->MoveNext();
        }
    }

}
