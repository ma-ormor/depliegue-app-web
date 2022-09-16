<?php 
class Artista{
  private $idInt;
  private $nombreStr;
  private $paisStr;
  private $grupoStr;
  
  public function setId($idInt){$this->idInt = $idInt;}
  public function setNombre($nombreStr){$this->nombreStr = $nombreStr;}
  public function setPais($paisStr){$this->paisStr = $paisStr;}
  public function setGrupo($grupoStr){$this->grupoStr = $grupoStr;}

  public function getId(){return $this->idInt;}
  public function getNombre(){return $this->nombreStr;}
  public function getPais(){return $this->paisStr;}
  public function getGrupo(){return $this->grupoStr;}
}
?>