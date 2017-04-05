<?php
$opc = $_POST['opc'];
switch ($opc) {
    case 1:
        $type = $_POST['type'];
        $val = $_POST['val'];
        include_once '../ctr-views/cte-municipios-localidades-slc.php';
        break;
    case 2:
        $edo = $_POST['slc-edo-esc'];
        include_once '../ctr-views/slc-edo-bachillerato.php';
        break;
    case 3:
        $mun = $_POST['slc-municipio-esc'];
        include_once '../ctr-views/slc-municipios-bachillerato.php';
        break;
    case 4:
        $loc = $_POST['slc-localidad-esc'];
        include_once '../ctr-views/slc-localidad-bachillerato.php';
        break;
    case 5:
        include_once '../ctr-views/ctr-registro-aspirante.php';
        break;
    case 6:
        $registro = $_POST['registro'];
        ?>
        <div id="Modal-ficha" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Pre-Ficha</h4>
                    </div>
                    <div class="modal-body">
                        <iframe src="../format-pdf/ficha-preregistro.php?registro=<?= $registro; ?>" style="zoom:0.60" width="99.6%" height="550" frameborder="0"></iframe>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
                $("#Modal-ficha").modal('show');
        </script>
        <?php
        break;
    default:
        break;
}