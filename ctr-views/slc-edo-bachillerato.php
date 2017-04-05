<?php
include_once '../model/municipios.php';
$modelo_municipios = new municipios();
if ($edo == "") {
    ?>
    <label for="slc-municipio-esc">Municipio</label>
    <select class="form-control select2" id="slc-municipio-esc" name="slc-municipio-esc" required></select>
    <script>
        $("#slc-localidad-esc").empty();
        $("#slc-esc").empty();
    </script>
    <?php
} else {
    $rs = $modelo_municipios->get_municipios_edos($edo);
    ?>
    <label for="slc-municipio-esc">Municipio</label>
    <select class="form-control select2" id="slc-municipio-esc" name="slc-municipio-esc" onchange="get_slc_esc_mun();" required>
        <option value=""></option>
        <?php
        while (!$rs->EOF) {
            ?>
            <option value="<?= $rs->fields[0] ?>"><?= utf8_encode($rs->fields[1]) ?></option>
            <?php
            $rs->MoveNext();
        }
        ?>
    </select>
    <script>
        $(".select2").select2();
        $("#slc-localidad-esc").empty();
        $("#slc-esc").empty();
    </script>
    <?php
}
