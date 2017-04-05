<?php
include_once '../controller/validar-sesiones.php';
include_once '../model/puestos.php';
$model_puestos = new puestos();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>SILABA | Inicio</title>
        <<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="shortcut icon" href="../img/favicon_1.ico" type="image/x-icon">
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
        <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
        <link rel="stylesheet" href="../plugins/iCheck/flat/blue.css">
        <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">
        <link rel="stylesheet" href="../plugins/jvectormap/jquery-jvectormap-1.2.2.css">
        <link rel="stylesheet" href="../plugins/datepicker/datepicker3.css">
        <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
        <link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    </head>
    <body class="hold-transition skin-red-light sidebar-mini fixed"  data-spy="scroll" data-target="#scrollspy">
        <div class="wrapper">
            <?php
            include_once '../ctr-views/header.php';
            include_once '../ctr-views/side-bar.php';
            ?>


            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        RECURSOSO HUMANOS
                        <small>Catálogo de Puestos y Registro</small>
                    </h1>
                </section>
                <section class="content">
                    <div class="box box-success">
                        <div class="box-header">
                            <h3 class="box-title">Registrar Puesto</h3>
                        </div>
                        <form id="form-puesto" onsubmit="return false;">
                            <div class="box-body">
                                
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-success">Registrar</button>
                            </div>
                        </form>
                    </div>
                    <div class="box box-info">
                        <div class="box-header">
                            <h3 class="box-title">Catálogo de Puestos</h3>
                        </div>
                        <div class="box-body">
                            <?php
                            $rs = $model_puestos->catalogo_puestos();
                            include_once '../ctr-views/table-puestos.php';
                            ?>
                        </div>
                    </div>
                </section>
            </div>
            <?php include_once '../ctr-views/footer.php'; ?>
        </div>
        <script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
        <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
        <script>
            $.widget.bridge('uibutton', $.ui.button);
        </script>
        <script src="../bootstrap/js/bootstrap.min.js"></script>
        <script src="../plugins/daterangepicker/daterangepicker.js"></script>
        <script src="../plugins/datepicker/bootstrap-datepicker.js"></script>
        <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
        <script src="../plugins/sparkline/jquery.sparkline.min.js"></script>
        <script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
        <script src="../plugins/knob/jquery.knob.js"></script>
        <script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
        <script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
        <script src="../plugins/fastclick/fastclick.js"></script>
        <script src="../dist/js/app.min.js"></script>
        <script src="../dist/js/pages/dashboard.js"></script>
        <script src="../dist/js/demo.js"></script>
        <script>
            $("#example1").DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": false,
                "info": true,
                "autoWidth": false
            });
        </script>
    </body>
</html>
