<?php

class llibre extends connexio {
    //Atributs
    var $llib_idllibre;
    var $llib_llibre;
    var $llib_autorllib;
    
    //Constructor
    function llibre($ruta="../../") {
        parent::connexio($ruta);
    }
    
    function inicialitza($id) {
        $this->llib_idllibre=$id;
        if ($this->llib_idllibre==0) {
            $this->llib_llibre="";
            $this->llib_autorllib="";
        } else {
            $sql="SELECT LLIBRES.LLIB_IDLLIBRE, LLIBRES.LLIB_LLIBRE, LLIBRES.LLIB_AUTORLLIB ".
            "FROM LLIBRES WHERE (((LLIBRES.LLIB_IDLLIBRE)=".$id."))";
            $rs= $this->DB_Select($sql);
            $rs= $this->DB_Fetch($rs);
            $this->llib_llibre = $rs['LLIB_LLIBRE'];
            $this->llib_autorllib = $rs['LLIB_AUTORLLIB'];
        }
    }
    
    function carregaValors($id,$llibre,$autorllib) {
        $this->set_llib_idllibre($id);
        $this->set_llib_llibre($llibre);
        $this->set_Llib_autorllib($llib_autorllib);
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
    
    function get_Llib_autorllib() {
        return $this->llib_autorllib;
    }

    function set_Llib_autorllib($llib_autorllib) {
        $this->llib_autorllib = $llib_autorllib;
    }
    
    function textSubmit() {
        if ($this->llib_idllibre == 0)
            return "Acceptar";
        else
            return "Modificar";
    }

    function textDelete() {
        if ($this->llib_idllibre == 0)
            return "Cancelar";
        else
            return "Esborrar";
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
        $sql="INSERT INTO LLIBRES (LLIB_LLIBRE) VALUES ('".$this->llib_llibre."')";
        $this->DB_Execute($sql);
        
        $sql_id="SELECT max(LLIB_IDLLIBRE) AS LLIB_IDLLIBRE FROM LLIBRES";
        $rs_id=$this->DB_Select($sql_id);
        $rs_id=$this->DB_Fetch($sql_id);
        $this->llib_idllibre=$rs_id['LLIB_IDLLIBRE'];
        return $this->llib_idllibre;
    }
    
}
?>
