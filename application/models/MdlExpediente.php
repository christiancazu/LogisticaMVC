<?php
class MdlExpediente extends CI_Model {
    
    private $codexpe,$codusureg,$descexpe;

    function __construct() {
        parent::__construct();
        $this -> load -> database();
    }
    function MdlExpediente($codigo,$usuario,$descripcion) {
        $this -> codexpe = $codigo;
        $this -> codusureg = $usuario;
        $this -> descexpe = $descripcion;              
    }
   /* function getCodExpe()   { return $this->CodExpe;    }
    function getCodUsuReg() { return $this->CodUsuReg;  }
    function getMontoExpe() { return $this->MontoExpe;  }
    function getDescExpe()  { return $this->DescExpe;   }
    function setCodExpe($CodExpex)     { $this->CodExpe=$CodExpex;      }
    function setCodUsuReg($CodUsuRegx) { $this->CodUsuReg=$CodUsuRegx;  }
    function setMontoExpe($MontoExpex) { $this->MontoExpe=$MontoExpex;  }
    function setDescExpe($DescExpex)   { $this->DescExpe=$DescExpex;    }*/
    
    public function Mostrar() {
        $query = $this->db->get("tbl_envio");
        return $query;
    }
    public function MostrarExpe() {
        $querys = $this->db->get("tbl_expediente");
        return $querys;
    }
    public function Registrar() {

        $resultado = $this->db->query("CALL sp_RegistrarExpediente('".$this->codexpe."',".$this->codusureg.",'".$this->descexpe."')");
        if ($resultado -> num_rows() > 0) return $resultado -> row();
        else return false;
       
        
        /*$this->db->query("insert into tbl_expediente (vchrCodExpe,intCodUsuReg,dblMontoExpe,ltxtDescExpe) values ("$vchrCodExpe.",'".$intCodUsuReg."','".$MontoExpe."','".$ltxtDescExpe."')");*/
        /*$this->db->query("CALL sp_RegistrarExpediente('".$a."',".$b.",".$c.",'".$d."')");*/
    }

}