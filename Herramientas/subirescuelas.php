<?php
ini_set('max_execution_time', 300); 
include_once '../model/conexion.php';
$con = new conexo();
$db = $con->conectar();
//include_once '../tools/lectorexcel/Excel/reader.php';
//$xls = new Spreadsheet_Excel_Reader();
//$xls->read("NAC_ESCUELAS_EMS2014.xls");
//$arr_clave = array();
//for ($i = 2; $i <= 14126; $i++) {
//    if (!in_array(trim($xls->sheets[0]['cells'][$i][3]), $arr_clave)) {
//        array_push($arr_clave, trim($xls->sheets[0]['cells'][$i][3]));
//        $sql = "select id_estado from estados where clave =" . trim($xls->sheets[0]['cells'][$i][1]);
//        $edo = $db->Execute($sql)->fields[0];
//        $name_mun = trim($xls->sheets[0]['cells'][$i][7]);
//        $name_loc = trim($xls->sheets[0]['cells'][$i][8]);
//        $sql2 = "select id_municipio from municipios where id_estado = $edo and nombre like '%$name_mun%'";
//        $mun = $db->Execute($sql2)->fields[0];
//        $sql3 = "select id_localidad from localidades where id_municipio = $mun and nombre like '%$name_loc%'";
//        $rsloc = $db->Execute($sql3);
//        $loc = $rsloc->fields[0];
//        $nombre_esc = utf8_encode(trim($xls->sheets[0]['cells'][$i][2]));
//        $modalidad = utf8_encode(trim($xls->sheets[0]['cells'][$i][10]));
//        $sostenimiento = utf8_encode(trim($xls->sheets[0]['cells'][$i][9]));
//        $clave = utf8_encode(trim($xls->sheets[0]['cells'][$i][3]));
//        $turno = utf8_encode(trim($xls->sheets[0]['cells'][$i][4]));
//        $extension = utf8_encode(trim($xls->sheets[0]['cells'][$i][5]));
//        if ($rsloc->RecordCount() == 0) {
//            $sql5 = "insert into localidades (id_municipio,nombre,activo) VALUES (?,?,?)";
//            $prp2 = $db->Prepare($sql5);
//            $db->Execute($prp2, array($mun,$name_loc,1));
//            $locobt = $db->Execute("select last_insert_id()")->fields[0];
//            $sql4 = "insert into escuelas_preparatorias (nombre,modalidad,sostenimiento,id_localidad,clave,extension) VALUES "
//                    . "(?,?,?,?,?,?)";
//            $prp = $db->Prepare($sql4);
//            $db->Execute($sql4, array($nombre_esc,$modalidad,$sostenimiento,$locobt,$clave,$extension));
//        } else {
//            $sql4 = "insert into escuelas_preparatorias (nombre,modalidad,sostenimiento,id_localidad,clave,extension) VALUES "
//                    . "(?,?,?,?,?,?)";
//            $prp = $db->Prepare($sql4);
//            $db->Execute($sql4, array($nombre_esc,$modalidad,$sostenimiento,$loc,$clave,$extension));
//        }
//    }
//}
