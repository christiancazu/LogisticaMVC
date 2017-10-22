<?php
class MdlExpediente extends CI_Model {
    
    private $CodExpe,$CodUsuReg,$MontoExpe,$DescExpe;

    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    function MdlExpediente($codigo,$usuario,$monto,$descripcion) {
        $this->CodExpe=$codigo;
        $this->CodUsuReg=$usuario;
        $this->MontoExpe=$monto;
        $this->DescExpe=$descripcion;              
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

        $this->db->query("SELECT fn_RegistrarExpediente('".$this->CodExpe."',".$this->CodUsuReg.",".$this->MontoExpe.",'".$this->DescExpe."')");
        
        /*$this->db->query("insert into tbl_expediente (vchrCodExpe,intCodUsuReg,dblMontoExpe,ltxtDescExpe) values ("$vchrCodExpe.",'".$intCodUsuReg."','".$MontoExpe."','".$ltxtDescExpe."')");*/
        /*$this->db->query("CALL sp_RegistrarExpediente('".$a."',".$b.",".$c.",'".$d."')");*/
    }

}