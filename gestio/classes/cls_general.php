<?php
class general extends connexio {
    var $con;
    
    function general($ruta="../../") {
        parent::connexio($ruta);
    }
    
    function llistat_autors(){
      $sql="SELECT AUT_IDAUTOR FROM AUTORS";
      $rs=$this->DB_Select($sql);
      $i=1;
      while ($rs_f=$this->DB_Fetch($rs)){
          $aut=new autor();
          $aut->inicialitza($rs_f['AUT_IDAUTOR']);
          $items[$i]=serialize($aut);
          $i=$i+1;
      }
      return $items;
    }
    
    function llistat_llibres(){
      $sql="SELECT LLIB_IDLLIBRE FROM LLIBRES";
      $rs=$this->DB_Select($sql);
      $i=1;
      while ($rs_f=$this->DB_Fetch($rs)){
          $llib=new llibre();
          $llib->inicialitza($rs_f['LLIB_IDLLIBRE']);
          $items[$i]=serialize($llib);
          $i=$i+1;
      }
      return $items;
    }
}

?>

