<?php
if ($type == 'M') {
    include_once '../model/municipios.php';
    $modelo_municipios = new municipios();
    $rs = $modelo_municipios->get_municipios_edos($val);
    ?>
    <div class="col-md-4">
        <label for="ape_pat">Municipio</label>
        <select class="form-control select2" id="slc-municipio" name="slc-municipio" onchange="cambio_municipio_localidad('L')" required>
            <option value=""></option>
            <?php
            while (!$rs->EOF) {
                ?>
                <option value="<?= utf8_encode($rs->fields[0]) ?>"><?= utf8_encode($rs->fields[1]) ?></option>
                <?php
                $rs->MoveNext();
            }
            ?>
        </select>
    </div>
    <div class="col-md-4" id="div-loca">
        <label for="name-alumno">Localidad</label>
        <select class="form-control" id="slc-localidad" name="slc-localidad" required></select>
    </div>
    <script>
        $(".select2").select2();
    </script>
    <?php
} else {
    include_once '../model/localidades.php';
    $modelo_localidades = new localidades();
    $rs = $modelo_localidades->get_localidades_municipio($val);
    ?>
        <label for="name-alumno">Localidad</label>
        <select class="form-control select2" id="slc-localidad" name="slc-localidad" required>
            <option value=""></option>
            <?php
            while (!$rs->EOF) {
                ?>
                <option value="<?= utf8_encode($rs->fields[0]) ?>"><?= utf8_encode($rs->fields[1]) ?></option>
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