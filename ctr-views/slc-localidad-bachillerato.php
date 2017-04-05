<?php
include_once '../model/escuelas_preparatorias.php';
$modelo_escuelas_preparatorias = new escuelas_preparatorias();
if ($loc == "") {
        ?>
    <label for="slc-esc">Bachillerato de Procedencia</label>
    <select class="form-control select2" id="slc-esc" name="slc-esc" required></select>
    <?php
} else {
    $rs = $modelo_escuelas_preparatorias->get_escuelas_localidad($loc);
    ?>
    <label for="slc-esc">Bachillerato de Procedencia</label>
    <select class="form-control select2" id="slc-esc" name="slc-esc" required>
        <option></option>
        <?php
        while(!$rs->EOF){
            ?>
        <option value="<?= $rs->fields[0]; ?>"><?= utf8_decode($rs->fields[1]) . " - " . $rs->fields[2]?></option>
        <?php
            $rs->MoveNext();
        }
        ?>
    </select>
    <script>
        $(".select2").select2();
    </script>
    <?php
}