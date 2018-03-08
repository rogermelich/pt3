<?php
class connexio {
    var $host;
    var $db;
    var $user;
    var $password;
    var $con;
    
    //Controlador
    function connexio($ruta="../../") {
        $this->host="localhost";
        $this->db="pt3";
        $this->user="roger";
        $this->password="roger";
    }

       function DB_Open(){
        $this->con =  mysqli_connect($this->host, $this->user, $this->password);
        if ($this->con){
            if (! mysqli_select_db($this->con, $this->db)){
                $status = mysqli_error();
            }
            else{
                $status=0;
            }
        } else {
            $status = mysqli_error();
        }
        return ($status);
    }
    
    function DB_Close() {
        if (mysqli_close($this->con)) {
            $status=1;
        } else {
            $status=0;
        }
        return ($status);
    }
    
       function DB_Select($strSelect){
        $this->DB_Open();
        $result = mysqli_query($this->con,$strSelect);
        if($result){
            if (mysqli_num_rows($result) > 0){
                return ($result);
            } else {
                return (0);
            }
        } else {
            $result = mysqli_error();
        }
        $this->DB_Close();   
    }
    
    function DB_Execute($strSelect) {
        $this->DB_Open();
        $result = mysqli_query($this->con,$strSelect);
        $this->DB_Close();
    }
    
    
    
    function DB_Fetch($result){
        if ($result){
            if (mysqli_num_rows($result)>0){
                return (mysqli_fetch_array($result));
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
?>