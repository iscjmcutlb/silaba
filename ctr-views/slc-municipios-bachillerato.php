<?php
include_once '../model/localidades.php';
$modelo_localidades = new localidades();
if ($mun == "") {
    ?>
    <label for="slc-localidad-esc">Localidad</label>
    <select class="form-control" id="slc-localidad-esc" name="slc-localidad-esc" required></select>
    <script>
        $("#slc-esc").empty();
    </script>
    <?php
} else {
    $rs = $modelo_localidades->get_localidades_municipio($mun);
    ?>
    <label for="slc-localidad-esc">Localidad</label>
    <select class="form-control select2" id="slc-localidad-esc" name="slc-localidad-esc" onchange="get_slc_esc_loc();" required>
        <option></option>
        <?php
        while(!$rs->EOF){
            ?>
        <option value="<?= $rs->fields[0]?>"><?= utf8_encode($rs->fields[1])?></option>
        <?php
            $rs->MoveNext();
        }
        ?>
    </select>
    <script>
        $(".select2").select2();
        $("#slc-esc").empty();
    </script>
    <?php
}