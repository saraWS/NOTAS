<?php
// En el controller se definen las funciones creadas en el base controller
namespace estudiantesController;

use baseControler\BaseController;
use conexionDb\ConexionDbController;
use estudiantes\Estudiantes;

class EstudiantesController extends BaseController
{
    //La funcion que se invoca en el formulario
    //EStas funciones estan definidas en usuario.php
    //botones
    function create ($estudiantes)//accion registro
    {
        $sql = 'insert into estudiantes ';
        $sql .= '(codigo,nombres,apellidos) values ';
        $sql .= '(';
        $sql .= $estudiantes->getCodigo() . ',';
        $sql .= '"' . $estudiantes->getNombres() .'",';
        $sql .= '"' . $estudiantes->getApellidos() . '"';
        $sql .= ')';
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);//este metodo es el que me da la respuesta(execSQL), pa ver si hay errores
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
        $sql = 'select * from estudiantes';
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $estudiante = [];
        while ($registro = $resultadoSQL->fetch_assoc()) {
            $estudiantes = new Estudiantes();
            $estudiantes->setCodigo($registro['codigo']);
            $estudiantes->setNombres($registro['nombres']);
            $estudiantes->setApellidos($registro['apellidos']);
            array_push($estudiante, $estudiantes);
        }
        $conexiondb->close();
        return $estudiante;
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
            $estudiantes->setNombres($registro['nombres']);
            $estudiantes->setApellidos($registro['apellidos']);
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

