<?php
  class Usuario{
    //-- Atributos
    private $idInt;
    private $nombreStr;
    private $contrasenaStr;

    //-- Set
    public function setId($id){$this->idInt = $id;}
    public function setNombre($nombre){$this->nombreStr = $nombre;}
    public function setContrasena($contrasena){$this->contrasenaStr = $contrasena;}

    //-- Get
    public function getId(){
      return $this->idInt;
    }// Function getId

    public function getNombre(){return $this->nombreStr;}
    public function getContrasena(){return $this->contrasenaStr;}
  }// Class Empleado
?>