<?php 
namespace baseControler;

abstract class BaseController
{
    //se CREAN las funciones
    abstract function create($model);
    abstract function read();
    abstract function update($codigo, $estudiantes);
    abstract function delete($codigo);
  //  abstract function readRow($id);

}
