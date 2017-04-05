<table id="example1" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Acciones</th>
            <th>Concepto del Puesto</th>
            <th>Creación</th>
            <th>Empleados en el Puesto</th>
        </tr>
    </thead>
    <tbody>
        <?php
        while (!$rs->EOF) {
            ?>
        <tr>
            <td class="text-center">
                <a href="#" title="Modificar" class="text-info"><span class="fa fa-pencil"></span></a>
                <a href="#" title="Eliminar" class="text-danger"><span class="fa fa-remove"></span></a>
                <a href="#" title="Modificar"><span class="fa fa-pencil"></span></a>
            </td>
            <td><?= utf8_decode($rs->fields[1]); ?></td>
            <td><?= date("d/m/Y", strtotime($rs->fields[2])) ?></td>
            <td><?= utf8_decode($model_puestos->count_empleados_puesto($rs->fields[0])); ?></td>
        </tr>
        <?php
            $rs->MoveNext();
        }
        ?>
    </tbody>
    <tfoot>
        <tr>
            <th>Acciones</th>
            <th>Concepto del Puesto</th>
            <th>Creación</th>
            <th>Empleados en el Puesto</th>
        </tr>
    </tfoot>
</table>