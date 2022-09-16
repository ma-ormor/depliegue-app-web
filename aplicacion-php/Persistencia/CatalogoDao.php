<?php
  class CatalogoDao{
    private $server = "localhost"; //localhost
    private $usr = "ad_cm";
    private $pass = "pass";
    private $db = "catalogo_musica";

    private function conectar(){
      try{
        $mysqli = new mysqli($this->server, $this->usr, $this->pass, $this->db);
      }catch(RuntimeException $re){
        echo($re->getMessage());
      }

      return $mysqli;
    }

    public function consulta($csql){
      $conection = $this->conectar();
      $resultado = $conection->query($csql);
      return $resultado;
    }
  }
?>
