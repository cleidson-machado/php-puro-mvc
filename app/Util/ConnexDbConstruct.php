<?php

    //AQUI CRIADA A PARTIR DO EXEMPLO DO PROETO MAPA REALIZADO COMO PROJETO PARA A GERÊNCIAL
    //USA O PADRÃO DE CRIAÇÃO A PARTIR DO MÉTODO DE CONSTRUÇÃO PADRÃO DE UMA CLASSE....
    abstract class ConnexDbConstruct
    {

        private static $connDbaseDbase;

        public static function openLinkConnection()
        {
            $servername = "127.0.0.1";
            $username = "root";
            $password = "kabala";
            $dbasename = "mvcphptest";

            if (self::$connDbaseDbase == null)
            {
                try {

                    self::$connDbaseDbase = new PDO("mysql:host=$servername;dbname=$dbasename", $username, $password);
                    self::$connDbaseDbase->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);      

                } catch (PDOException $e) {

                    echo "___ CLASS: linkConnection.php CONETION failed: " . $e->getMessage() . " This is a PERSONAL ECHO for error!___" . "<br><br>";
                
                }
            }        
            return self::$connDbaseDbase;
        }

        static function closeLinkConnection() 
        {
            self::$connDbaseDbase == null;
        }
    }

?>