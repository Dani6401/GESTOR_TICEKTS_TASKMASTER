<?php

    class Notificacion extends Conectar{

        public function get_notificaicion_x_usu($usu_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM tm_notificacion WHERE usu_id= ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $_SESSION["usu_id"]);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }

    }