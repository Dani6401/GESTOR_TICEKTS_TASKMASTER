<?php 
    require_once ("../config/conexion.php");
    require_once ("../models/Notificacion.php");
    $notificacion = new Notificacion();

    switch($_GET["op"]){

        case "listar": 
            $datos=$notificacion->get_notificaicion_x_usu($_SESSION["usu_id"]);
            $data= Array();
            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = $row["not_mensaje"]. ' ' . $row["tick_id"];
                $sub_array[] = '<button type="button" onClick="ver('.$row["tick_id"].');"  id="'.$row["tick_id"].'" class="btn btn-inline btn-info btn-sm ladda-button"><i class="fa fa-eye"></i></button>';
                $data[] = $sub_array;
            }

            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
            echo json_encode($results);
            break;
            }

