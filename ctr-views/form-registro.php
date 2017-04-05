<?php
include_once '../model/estados_civil.php';
include_once '../model/estados.php';
include_once '../model/carreras.php';
include_once '../model/detalle_periodo_fechas.php';
$modelo_edo_civil = new estados_civil();
$modelo_estados = new estados();
$modelo_carreras = new carreras();
$modelo_detalle_periodo_fecha = new detalle_periodo_fechas();
?>
<form id="form-reg-aspirantes" name="form-reg-aspirantes" onsubmit="confirm_send_aspirantes(); return false;">
    <div class="row">
        <div class="col-md-12">
            <!-- The time line -->
            <ul class="timeline">
                <li>
                    <i class="fa fa-user bg-blue"></i>
                    <div class="timeline-item">
                        <h3 class="timeline-header">Datos Personales</h3>
                        <div class="timeline-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="ape_pat">Apellido Paterno</label>
                                    <input type="text" class="form-control" id="ape_pat" name="ape_pat" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="ape_mat">Apellido Materno</label>
                                    <input type="text" class="form-control" id="ape_pat" name="ape_mat" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="name_alumno">Nombre (s)</label>
                                    <input type="text" class="form-control" id="name_alumno" name="name_alumno" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <label for="curp">CURP</label>
                                    <input type="text" class="form-control" id="curp" name="curp" required>
                                </div>
                                <div class="col-md-4">
                                    <br>
                                    <a class="btn btn-primary" href="https://consultas.curp.gob.mx/CurpSP/inicio2_2.jsp" target="_blanck"><span class="fa fa-search"></span> Consultar CURP</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="ape_pat">Correo Electrónico</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="tel_p">Teléfono Personal</label>
                                    <input type="text" class="form-control text-center" id="tel_p" name="tel_p"  data-inputmask='"mask": "999-999-9999"' data-mask required>
                                </div>
                                <div class="col-md-4">
                                    <label for="tel_f1">Teléfono Familiar 1</label>
                                    <input type="text" class="form-control text-center" id="tel_f1" name="tel_f1"  data-inputmask='"mask": "999-999-9999"' data-mask required>
                                </div>
                                <div class="col-md-4">
                                    <label for="tel_f2">Teléfono Familiar 2</label>
                                    <input type="text" class="form-control text-center" id="tel_f2" name="tel_f2"  data-inputmask='"mask": "999-999-9999"' data-mask required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="edo_civil">Estado Civil</label>
                                    <select class="form-control" id="edo_civil" name="edo_civil" required>
                                        <?php
                                        $modelo_edo_civil->get_data_select();
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <i class="fa fa-home bg-green"></i>
                    <div class="timeline-item">
                        <h3 class="timeline-header">Domicilio de Origen</h3>
                        <div class="timeline-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="slc-edo">Estado</label>
                                    <select class="form-control" id="slc-edo" name="slc-edo" onchange="cambio_municipio_localidad('M');">
                                        <?php $modelo_estados->get_select_estados(); ?>
                                    </select>
                                </div>
                                <div id="id-muni-loca">
                                    <div class="col-md-4">
                                        <label for="slc-municipio">Municipio</label>
                                        <select class="form-control" id="slc-municipio" name="slc-municipio" required></select>
                                    </div>
                                    <div class="col-md-4" id="div-loca">
                                        <label for="slc-localidad">Localidad</label>
                                        <select class="form-control" id="slc-localidad" name="slc-localidad" required></select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="calle">Calle</label>
                                    <input type="text" class="form-control" id="calle" name="calle" required>
                                </div>
                                <div id="id-muni-loca">
                                    <div class="col-md-2">
                                        <label for="num_ext">Numero Exterior</label>
                                        <input type="text" class="form-control" id="num_ext" name="num_ext" required>
                                    </div>
                                    <div class="col-md-2" id="div-loca">
                                        <label for="num_int">Numero Interior</label>
                                        <input type="text" class="form-control" id="num_int" name="num_int">
                                    </div>
                                    <div class="col-md-4" id="div-loca">
                                        <label for="cp">Codigo Postal</label>
                                        <input type="text" class="form-control text-center" id="cp" name="cp" data-inputmask='"mask": "99999"' data-mask required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <i class="fa fa-institution bg-navy"></i>
                    <div class="timeline-item">
                        <h3 class="timeline-header">Bachillerato de Procedencia</h3>
                        <div class="timeline-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="slc-edo-esc">Estado</label>
                                    <select class="form-control" id="slc-edo-esc" name="slc-edo-esc" onchange="get_slc_esc_edo();">
                                        <?php $modelo_estados->get_select_estados(); ?>
                                    </select>
                                </div>
                                <div class="col-md-4" id="div-slc-mun-bachi">
                                    <label for="slc-municipio-esc">Municipio</label>
                                    <select class="form-control" id="slc-municipio-esc" name="slc-municipio-esc" required></select>
                                </div>
                                <div class="col-md-4" id="div-loca-bachillerato">
                                    <label for="slc-localidad-esc">Localidad</label>
                                    <select class="form-control" id="slc-localidad-esc" name="slc-localidad-esc" required></select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8" id="slc-bachillerato">
                                    <label for="slc-esc">Bachillerato de Procedencia</label>
                                    <select class="form-control" id="slc-esc" name="slc-esc" required></select>
                                </div>
                                <div class="col-md-4">
                                    <label for="promedio">Promedio</label>
                                    <input type="text" class="form-control" id="promedio" name="promedio" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <i class="fa fa-graduation-cap bg-orange"></i>
                    <div class="timeline-item">
                        <h3 class="timeline-header">Selección de Carrera</h3>
                        <div class="timeline-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="slc_carrera">Seleccionar Carrera</label>
                                    <select class="form-control" id="slc_carrera" name="slc_carrera" required>
                                        <option value=""></option>
                                        <?php $modelo_carreras->get_carreras_slc(); ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <i class="fa fa-list bg-purple"></i>
                    <div class="timeline-item">
                        <h3 class="timeline-header">Selección de Fecha de Examen</h3>
                        <div class="timeline-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="slc-date-ex">Elegir Fecha de Examen:</label>
                                    <select class="form-control" id="slc-date-ex" name="slc-date-ex" required>
                                        <option value=""></option>
                                        <?php $modelo_detalle_periodo_fecha->get_slc_fechas_examen(); ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <i class="fa fa-send bg-red"></i>
                    <div class="timeline-item">
                        <div class="timeline-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <button class="btn btn-bitbucket btn-block">Terminar Registro</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</form>