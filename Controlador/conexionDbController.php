<?php namespace conexionDb;

use mysqli;

class ConexionDbController
{
    //La conexion a la base de datos
    private $server_db = '127.0.0.1';
    private $user_db = 'root';
    private $pwd_db = '';
    private $name_db = 'notas_bd';
    private $conex;

    //AYudan a ver los errores en las bases de datos
    function __construct()
    {
        $this->conex = new mysqli($this->server_db, $this->user_db, $this->pwd_db, $this->name_db);
    }

    function execSQL($sql)
    {
        return $this->conex->query($sql);
    }

    function close()
    {
        $this->conex->close();
    }

    function validarConexion()
    {
        return $this->conex->connect_error;
    }
}
