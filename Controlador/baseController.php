<?php 
namespace baseControler;

abstract class BaseController
{
    //se CREAN las funciones
    abstract function create($model);
    abstract function read();
    abstract function update($id, $model);
    abstract function delete($id);
    abstract function readRow($id);

}
