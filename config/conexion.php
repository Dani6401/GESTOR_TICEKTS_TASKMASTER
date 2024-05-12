<?php
    /* Inicio de Sesion en la WebApp */
    session_start();

    class Conectar{
        protected $dbh;

        protected function Conexion(){
            try {
                // Cadena de Conexion Local
				$conectar = $this->dbh = new PDO("mysql:local=localhost;dbname=helpdesk","root","");
                // Cadenad e Conexion Produccion
                //$conectar = $this->dbh = new PDO("mysql:host=localhost;dbname=helpdesk","admin","root");
				return $conectar;
			} catch (Exception $e) {
				print "¡Error BD!: " . $e->getMessage() . "<br/>";
				die();
			}
        }

        /* Set Name para utf 8 español - evitar tener problemas con las tildes */
        public function set_names(){
			return $this->dbh->query("SET NAMES 'utf8'");
        }

        /* TODO: Ruta o Link del proyecto */
        public static function ruta(){
            // Ruta Proyecto Local
			return "http://localhost:8080/PROYECTOS/TASKMASTER_CENTRAL/";
            // Ruta Proyecto Produccion
            // "http:///TASKMASTER_CENTRAL/.com/";
		}

    }
?>