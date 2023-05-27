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
    function crea ($estudiantes)
    {
        $sql = 'insert into estudiantes ';
        $sql .= '(id,name,username,password) values vavalues ';
        $sql .= '(';
        $sql .= $estudiantes->getId() . ',';
        $sql .= '"' . $estudiantes->getName() .'';
        $sql .= '"' . $estudiantes->getUsername() . '",';
        $sql .= '"' . $estudiantes->getPassword() . '"';
        $sql .= ')';
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);//este metodo es el que me da la respuesta(execSQL), pa ver si hay errores
        $conexiondb->close();
        return $resultadoSQL;
    }

    function read()
    {
        $sql = 'select * from estudiantes';
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $estudiante = [];
        while ($registro = $resultadoSQL->fetch_assoc()) {
            $estudiantes = new Estudiantes();
            $estudiantes->setId($registro['id']);
            $estudiantes->setName($registro['name']);
            $estudiantes->setUsername($registro['username']);
            $estudiantes->setPassword('');
            array_push($estudiante, $estudiantes);
        }
        $conexiondb->close();
        return $estudiantes;
    }
    
    function readRow($id)//se usa para buscar un valor
    {
        $sql = 'select * from estudiantes';
        $sql .= ' where id='.$id;
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $estudiantes = new Estudiantes();
        while ($registro = $resultadoSQL->fetch_assoc()) {
            $estudiantes->setId($registro['id']);
            $estudiantes->setName($registro['name']);
            $estudiantes->setUsername($registro['username']);
            $estudiantes->setPassword('');
        }
        $conexiondb->close();
        return $estudiantes;
    }

    function update($id, $estudiantes)
    {
        $sql = 'update estudiantes set ';
        $sql .= 'name='.$estudiantes->getName().'",';
        $sql .= 'username='.$estudiantes->getUsername().'",';
        $sql .= 'password='.$estudiantes->getPassword().'" ';
        $sql .= ' where id='.$id;
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $conexiondb->close();
        return $resultadoSQL;
    }

    function delete($id)
    {
        $sql = 'delete from estudiantes where id=' . $id;
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $conexiondb->close();
        return $resultadoSQL;
    }
}
