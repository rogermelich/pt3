<?php

class llibre extends connexio {
    //Atributs
    var $llib_idllibre;
    var $llib_llibre;
    
    //Constructor
    function llibre($ruta="../../") {
        parent::connexio($ruta);
    }
    
    function inicialitza($id) {
        $this->llib_idllibre=$id;
        if ($this->llib_idllibre==0) {
            $this->llib_llibre="";
        } else {
            $sql="SELECT LLIBRES.LLIB_IDLLIBRE, LLIBRES.LLIB_LLIBRE ".
            "FROM LLIBRES WHERE (((LLIBRES.LLIB_IDLLIBRE)=".$id."))";
            $rs= $this->DB_Select($sql);
            $rs= $this->DB_Fetch($rs);
            $this->llib_llibre = $rs['LLIB_LLIBRE'];
        }
    }
    
    function carregaValors($id,$llibre) {
        $this->set_llib_idllibre($id);
        $this->set_llib_llibre($llibre);
    }
    
    function get_llib_idllibre() {
        return $this->llib_idllibre;
    }

    function get_llib_llibre() {
        return $this->llib_llibre;
    }
    
    function set_llib_idllibre($valor) {
        $this->llib_idllibre = $valor;
    }

    function set_llib_llibre($valor) {
        $this->llib_llibre = $valor;
    }
    
    function esborra() {
        $sql="DELETE FROM LLIBRES WHERE LLIB_IDLLIBRE=".$this->llib_idllibre;
        $this->DB_Execute($sql);
    }
    
    function modifica() {
        $sql="UPDATE LLIBRES SET LLIB_LLIBRE='".$this->llib_llibre."' WHERE LLIB_IDLLIBRE=".$this->llib_idllibre;
        $this->DB_Execute($sql);
        return $this->llib_idllibre;
    }
    
    function afegeix() {
        $sql="INSERT INTO (LLIB_LLIBRE) VALUES ('".$this->llib_llibre."')";
        $this->DB_Execute($sql);
        
        $sql_id="SELECT max(LLIB_IDLLIBRE) AS LLIB_IDLLIBRE FROM LLIBRES";
        $rs_id=$this->DB_Select($sql_id);
        $rs_id=$this->DB_Fetch($sql_id);
        $this->llib_idllibre=$rs_id['LLIB_IDLLIBRE'];
        return $this->llib_idllibre;
    }
    
}
?>
