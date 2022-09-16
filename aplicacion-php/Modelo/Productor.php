<?php 
class Productor{
  private $idInt;
  private $nombreStr;
  private $paisStr;

  public function setId($idInt){$this->idInt = $idInt;}
  public function setNombre($nombreStr){$this->nombreStr = $nombreStr;}
  public function setPais($paisStr){$this->paisStr = $paisStr;}

  public function getId(){return $this->idInt;}
  public function getNombre(){return $this->nombreStr;}
  public function getPais(){return $this->paisStr;}
}
?>