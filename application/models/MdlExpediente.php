<?php
class MdlExpediente extends CI_Model {

    private $codexpe,$codusureg,$descexpe,$obseexpe;

    function __construct() {
        parent::__construct();
        $this -> load -> database();
    }
    /**
     * Función tipo constructor invocado por un objeto del contrlador Usuario para inicializar atributos que serviran para el registro de expediente
     * @param [[Type]] $codigo        [[Description]]
     * @param [[Type]] $usuario       [[Description]]
     * @param [[Type]] $descripcion   [[Description]]
     * @param [[Type]] $observaciones [[Description]]
     */
    function MdlExpedienteRegistrar($codigo,$usuario,$descripcion,$observaciones) {
        $this -> codexpe   = $codigo;
        $this -> codusureg = $usuario;
        $this -> descexpe  = $descripcion;  
        $this -> obseexpe  = $observaciones; 
    }
    /**
     * Función tipo constructor invocado por un objeto del contrlador Usuario para inicializar atributos que serviran para la modificación de expediente
     * @param [[Type]] $codigo        [[Description]]
     * @param [[Type]] $descripcion   [[Description]]
     * @param [[Type]] $observaciones [[Description]]
     */
    function MdlExpedienteModificar($codigo,$descripcion,$observaciones) {
        $this -> codexpe  = $codigo;       
        $this -> descexpe = $descripcion; 
        $this -> obseexpe  = $observaciones;
    }
    /* function getCodExpe()   { return $this->CodExpe;    }
    function getCodUsuReg() { return $this->CodUsuReg;  }
    function getMontoExpe() { return $this->MontoExpe;  }
    function getDescExpe()  { return $this->DescExpe;   }
    function setCodExpe($CodExpex)     { $this->CodExpe=$CodExpex;      }
    function setCodUsuReg($CodUsuRegx) { $this->CodUsuReg=$CodUsuRegx;  }
    function setMontoExpe($MontoExpex) { $this->MontoExpe=$MontoExpex;  }
    function setDescExpe($DescExpex)   { $this->DescExpe=$DescExpex;    }*/

    /*public function Mostrar() {
        $resultado = $this->db->query("SELECT * FROM vw_mostrarexpediente");
        return $resultado;
    }*/
    /**
     * Funcion para Registrar Expediente invocado por el contrlador Usuario
     * @return boolean 
     */
    public function Registrar() {
        $resultado = $this->db->query("CALL sp_RegistrarExpediente('".$this->codexpe."',".$this->codusureg.",'".$this->descexpe."','".$this->obseexpe."')");
        return $resultado -> result();
    }
    /**
     * Función para Modificar Expediente invocado por el contrlador Usuario 
     * @param  string $codigoexpenew recibe el nuevo código que se le dará al expediente
     * @return boolean  [[Description]]
     */
    public function Modificar($codigoexpenew) {
        $resultado = $this->db->query("CALL sp_ModificarExpediente('".$this->codexpe."','".$codigoexpenew."','".$this->descexpe."','".$this->obseexpe."')");
        if ($resultado -> num_rows() > 0) return true;
        else return false; 
    }
    /**
     * Función para Consultar Expediente invocado por el contrlador Usuario 
     * @param  [[Type]] $codigoconsulta [[Description]]
     * @return [[Type]] [[Description]]
     */
    public function Consultar($codigoconsulta) {
        $resultado = $this->db->query("CALL sp_FiltrarConsulta('".$codigoconsulta."')");
        return $resultado -> result();
    }
    /**
     * Función para Mostrar Expediente invocado por el contrlador Usuario 
     * @param  [[Type]] $codigoconsulta [[Description]]
     * @return [[Type]] [[Description]]
     */
    public function Mostrar($codigoexpe) {
        $resultado = $this->db->query("CALL sp_DatosExpediente('".$codigoexpe."')");
        return $resultado -> result();
    }
    /**
     * Función para Enviar Expediente invocado por el contrlador Usuario 
     */
    public function Enviar($codigoexpe, $codigousuenvio, $nombresrespo, $apellidosrespo, $arearespo, $observaciones, $fueradeareasiono) {
        $resultado = $this->db->query("CALL sp_EnviarExpediente('".$codigoexpe."',".$codigousuenvio.",'".$nombresrespo."','".$apellidosrespo."','".$arearespo."','".$observaciones."',".$fueradeareasiono.")"); 
        if ($resultado -> num_rows() > 0) return $resultado -> row();
        else return false;
    }
    /**
     * Función para consultar si el expediente es valido para registro
     * @param  [[Type]] $codigoexpe [[Description]]
     * @return [[Type]] [[Description]]
     */
    public function ConsultarParaRegistrar($codigoexpe) {
        $resultado = $this->db->query("CALL sp_ConsultarParaRegistrar('".$codigoexpe."')");
        return $resultado -> result();
    }
    /**
     * Función para ObtenerDatosParaModificar si el expediente es valido para modicacion
     * @param  [[Type]] $codigoexpe [[Description]]
     * @return [[Type]] [[Description]]
     */
    public function ObtenerDatosParaModificar($codigoexpe) {
        $resultado = $this->db->query("CALL sp_ObtenerDatosParaModificar('".$codigoexpe."')");
        return $resultado -> result();
    }
    
}
