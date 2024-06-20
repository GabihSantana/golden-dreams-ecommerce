<?php
    class CaminhoBd{
        public static $usuario = "root";
        public static $senha = "";
        public static $connect = null;

        private static function Conectar(){
            try{
                self::$connect = new PDO('mysql:host=localhost;dbname=bdgoldendreams', self::$usuario, self::$senha);
            } catch (Exception $erro) {
                echo 'ERRO - ' . $erro->getMessage();
                die;
            }
            return self::$connect;
        }
        public function getConexaoBd(){
            return self::Conectar();
        }
    }
?>