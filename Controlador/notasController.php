<?php

namespace notasController;

use baseControler\BaseController;
use conexionDb\ConexionDbController;
use actividades\Actividades;

class NotasController extends BaseController
{
   
    function create ($actividad)
    {
        $sql = 'insert into actividades ';
        $sql .= '(codigo,nombres,apellidos) values ';
        $sql .= '(';
        $sql .= $actividad->getId() . ',';
        $sql .= '"' . $actividad->getDescripcion() .'",';
        $sql .= '"' . $actividad->getNota() .'",';
        $sql .= '"' . $actividad->getCodigoEstudiante() . '"';
        $sql .= ')';
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $conexiondb->close();
        return $resultadoSQL;
         if($resultadoSQL){
            return true;
        }else{
            return false;
        }
    }

    function read()
    {
        $sql = 'select * from actividades';
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $actividades = [];
        while ($registro = $resultadoSQL->fetch_assoc()) {
            $actividad = new Actividades();
            $actividad->setId($registro['codigo']);
            $actividad->setDescripcion($registro['name']);
            $actividad->setNota($registro['apellido']);
            $actividad->setCodigoEstudiante($registro['apellido']);
            array_push($actividades, $actividad);
        }
        $conexiondb->close();
        return $actividades;
    }

    
    
    function readRow($codigo)//se usa para buscar un valor
    {
        $sql = 'select * from estudiantes';
        $sql .= ' where codigo='.$codigo;
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $estudiantes = new Estudiantes();
        while ($registro = $resultadoSQL->fetch_assoc()) {
            $estudiantes->setCodigo($registro['codigo']);
            $estudiantes->setNombres($registro['name']);
            $estudiantes->setApellidos($registro['apellido']);
        }
        $conexiondb->close();
        return $estudiantes;
    }

    function update($codigo, $estudiantes)//accion modificar
    {
        $sql = 'update estudiantes set ';
        $sql .= 'name='.$estudiantes->getNombres().'",';
        $sql .= 'apellido='.$estudiantes->getApellidos().'"';
        $sql .= ' where codigo='.$codigo;
        echo $sql;
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $conexiondb->close();
        return $resultadoSQL;
        
    }

    function delete($codigo)
    {
        $sql = 'delete from estudiantes where codigo=' . $codigo;
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $conexiondb->close();
        return $resultadoSQL;
    }
}
