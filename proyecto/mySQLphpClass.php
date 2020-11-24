<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mySQLphpClass
 *
 * @author ira3ck
 */

include 'configSQLphp.php';

class mySQLphpClass extends configSQLphp{

    public $connectionString;
    public $dataSet;
    private $sqlQuery;

    protected $databaseName;
    protected $hostName;
    protected $userName;
    protected $passCode;
    protected $puerto;
    protected $socket;
            
    function mySQLphpClass()    {
        $this -> connectionString = NULL;
        $this -> sqlQuery = NULL;
        $this -> dataSet = NULL;

                $dbPara = new configSQLphp();
                $this -> databaseName = $dbPara -> dbName;
                $this -> hostName = $dbPara -> serverName;
                $this -> userName = $dbPara -> userName;
                $this -> passCode = $dbPara -> passCode;
                $this -> socket = $dbPara -> socket;
                $this -> puerto = $dbPara ->port;
                $dbPara = NULL;
    }
    
    private function connect(){
        $this->connectionString = new mysqli($this->hostName, $this->userName, $this->passCode, $this->databaseName, $this -> puerto, $this -> socket)
                or die('Could not connect to the database server' . mysqli_connect_error());
    }
    
    private function byebye(){
        $this->connectionString->close();
    }
    
    function seleccionaEso(){
        $this->connect();
        $sql = "select nombre, apellidoPaterno, apellidoMaterno, usuario, correo from USUARIO where usuario like 'ira3ck';";
        $result = $this->connectionString->query($sql);
        $this->byebye();
        return $result;
    }
    
    function usuarios($nombre, $paterno, $materno, $telefono, $correo, $usuario, $contraseña, $imagen, $genero, $nacimiento, $privilegio, $newUser, $seleccion){
        $this->connect();
        $sql = "call proc_dml_usuario( " . $nombre . ", " . $paterno . ", " . $materno . ", " . $telefono . ", " . $correo . ", " . $usuario . ", " . $contraseña
                 . ", " . $imagen . ", " . $genero . ", " . $nacimiento . ", " . $privilegio . ", " . $newUser . ", " . $seleccion . ");";
        $this->connectionString->query($sql);
        $this->byebye();
        return 0;
    }
    
    function seccion($orden, $color, $nombre, $estado, $newName, $seleccion){
        $this->connect();
        $sql = "call proc_dml_seccion( " . $orden . ", " . $color . ", " . $nombre . ", " . $estado . ", " . $newName . ", " . $seleccion . ");";
        $this->connectionString->query($sql);
        $this->byebye();
        return 0;
    }
    
    function noticias($codigo, $lugar, $fecha, $fechaPost, $reportero, $titulo, $desc, $seccion, $estado, $commEDT, $keywords, $likes, $seleccion){
        $this->connect();
        $sql = "call proc_dml_noticia( " . $codigo . ", " . $lugar . ", " . $fecha . ", " . $fechaPost . ", " . $reportero . ", " . $titulo . ", " . $desc
                 . ", " . $seccion . ", " . $estado . ", " . $commEDT . ", " . $keywords . ", " . $likes . ", " . $seleccion . ");";
        $this->connectionString->query($sql);
        $this->byebye();
        return 0;
    }
    
    function comentarios($clave, $texto, $fecha, $responde, $noticia, $usuario, $seleccion){
        $this->connect();
        $sql = "call proc_dml_comentarios( " . $clave . ", " . $texto . ", " . $fecha . ", " . $responde . ", " . $noticia . ", " . $usuario . ", " . $seleccion . ");";
        $this->connectionString->query($sql);
        $this->byebye();
        return 0;
    }
    
    function archivos($tipo, $seleccion, $noticia, $orden, $clave, $imagen, $video, $texto, $tamaño){
        $this->connect();
        $sql = "call proc_dml_archivos( " . $tipo . ", " . $seleccion . ", " . $noticia . ", " . $orden . ", " . $clave . ", " . $imagen . ", " . $video
                 . ", " . $texto . ", " . $tamaño . ");";
        $this->connectionString->query($sql);
        $this->byebye();
        return 0;
    }
    
    function get_secciones(){
        $this->connect();
        $sql = "call proc_secciones();";
        $result = $this->connectionString->query($sql);
        $this->byebye();
        return $result;
    }
    
    function get_noticias($cant){
        $this->connect();
        if($cant == null){
            $sql = "call proc_noticias(null);";
        }
        else{
            $sql = "call proc_noticias(" . $cant . ");";
        }
        $result = $this->connectionString->query($sql);
        $this->byebye();
        return $result;
    }
    
}
