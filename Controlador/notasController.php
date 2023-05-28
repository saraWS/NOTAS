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
        $sql .= '(id,descripcion,nota,codigoEstudiante) values ';
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
            $actividad->setId($registro['id']);
            $actividad->setDescripcion($registro['descripcion']);
            $actividad->setNota($registro['nota']);
            $actividad->setCodigoEstudiante($registro['codigoEstudiante']);
            array_push($actividades, $actividad);
        }
        $conexiondb->close();
        return $actividades;
    }

    
    
    function readRow($id)//se usa para buscar un valor
    {
        $sql = 'select * from actividades';
        $sql .= ' where id='.$id;
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $actividad = new Actividades();
        while ($registro = $resultadoSQL->fetch_assoc()) {
            $actividad->setId($registro['id']);
            $actividad->setDescripcion($registro['descripcion']);
            $actividad->setNota($registro['nota']);
            $actividad->setCodigoEstudiante($registro['codigoEstudiante']);
        }
        $conexiondb->close();
        return $actividad;
    }

    function update($id, $actividad)//accion modificar
    {
        $sql = 'update estudiantes set ';
        $sql .= 'descripcion='.$actividad->getDescripcion().'",';
        $sql .= 'nota='.$actividad->getNota().'",';
        $sql .= 'codigoEstudiante='.$actividad->getCodigoEstudiantes().'"';
        $sql .= ' where id='.$id;
        echo $sql;
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $conexiondb->close();
        return $resultadoSQL;
        
    }

    function delete($id)
    {
        $sql = 'delete from actividades where id=' . $id;
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $conexiondb->close();
        return $resultadoSQL;
    }
}
