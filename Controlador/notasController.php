<?php

namespace notasController;

use baseControler\BaseController;
use conexionDb\ConexionDbController;
use actividades\Actividades;

class NotasController extends BaseController
{
   
    function create ($actividad)
    {
        $sql1 = 'insert into actividades ';
        $sql1 .= '(id,descripcion,nota,codigoEstudiante) values ';
        $sql1 .= '(';
        $sql1 .= $actividad->getId() . ',';
        $sql1 .= '"' . $actividad->getDescripcion() .'",';
        $sql1 .= '"' . $actividad->getNota() .'",';
        $sql1 .= '"' . $actividad->getCodigoEstudiante() . '"';
        $sql1 .= ')';
        $conexiondb = new ConexionDbController();
        $resultadoSQL1 = $conexiondb->execSQL($sql1);//
        $conexiondb->close();
        return $resultadoSQL1;
         if($resultadoSQL1){
            return true;
        }else{
            return false;
        }
    }

    function readRow($id)
    {
        $sql1 = 'select * from actividades';
        $sql1 .= ' where id='.$id;
        $conexiondb = new ConexionDbController();
        $resultadoSQL1 = $conexiondb->execSQL($sql1);
        $actividades = new Actividades();
        while ($registro = $resultadoSQL1->fetch_assoc()) {
            $actividades->setId($registro['id']);
            $actividades->setDescripcion($registro['descripcion']);
            $actividades->setNota($registro['nota']);
            $actividades->setCodigoEstudiante($registro['codigoEstudiante']);
        }
        $conexiondb->close();
        return $actividades;
    }

    function read()
    {
        $sql1 = 'select * from actividades';
        $conexiondb = new ConexionDbController();
        $resultadoSQL1 = $conexiondb->execSQL($sql1);
        $actividades = [];
        while ($registro = $resultadoSQL1->fetch_assoc()) {
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


    function update($id, $actividad)//accion modificar
    {
        $sql1 = 'update estudiantes set ';
        $sql1 .= 'descripcion='.$actividad->getDescripcion().'",';
        $sql1 .= 'nota='.$actividad->getNota().'",';
        $sql1 .= 'codigoEstudiante='.$actividad->getCodigoEstudiante().'"';
        $sql1 .= ' where id='.$id;
        echo $sql1;
        $conexiondb = new ConexionDbController();
        $resultadoSQL1 = $conexiondb->execSQL($sql1);
        $conexiondb->close();
        return $resultadoSQL1;
        
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
