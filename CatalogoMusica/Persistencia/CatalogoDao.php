<?php
  class CatalogoDao{
    private $server = "localhost";
    private $usr = "root";
    private $pass = "";
    private $db = "catalogo_musica";

    private function conectar(){
      $mysqli = new mysqli($this->server, $this->usr, $this->pass, $this->db);
      return $mysqli;
    }

    public function consulta($csql){
      $conection = $this->conectar();
      $resultado = $conection->query($csql);
      return $resultado;
    }
  }
?>