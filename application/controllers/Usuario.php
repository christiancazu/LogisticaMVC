<?php
/*Controlador Usuario*/
defined('BASEPATH') OR exit('No direct script access allowed');
/* Clase Que controla el la funciones del Usuario */
class Usuario extends CI_Controller {
  
    var $objExpediente,$objLogin;
    
    public function __construct() {
        parent::__construct();        
        $this -> load -> model('MdlExpediente');
        $this -> load -> model('MdlLogin'); 
        $this -> objExpediente = new MdlExpediente();
        $this -> objLogin = new MdlLogin();
    }   
    /**
     * Función de registro de Expediente
     */
    public function RegistrarExpediente() {
        $codigoexpe       = $this-> input -> post ('cod1').
                            $this-> input -> post ('cod2').
                            strtoupper($this-> input -> post ('cod3')).
                            $this-> input -> post ('cod4').
                            $this-> input -> post ('cod5');
        $codigousureg = $this-> session->userdata("codigo");
        $descripcion      = $this-> input -> post ('descripcion');
        $observaciones    = $this-> input -> post ('observaciones');
        $this -> objExpediente -> MdlExpedienteRegistrar($codigoexpe, $codigousureg, $descripcion, $observaciones);    
        $resultado = $this -> objExpediente -> Registrar();       
        echo json_encode($resultado);
    }
     /**
     * Función de modifación de Expediente
     */
    public function ModificarRegistrarExpediente() {
        $codigoexpe      = $this-> input -> post ('cod1').
                           $this-> input -> post ('cod2').
                           strtoupper($this-> input -> post ('cod3')).
                           $this-> input -> post ('cod4').
                           $this-> input -> post ('cod5');
        $codigoexpenew   = $this-> input -> post ('cod1-new').
                           $this-> input -> post ('cod2-new').
                           strtoupper($this -> input -> post ('cod3-new')).
                           $this-> input -> post ('cod4-new').
                           $this-> input -> post ('cod5-new');
        if ($codigoexpenew=="") $codigoexpenew = $codigoexpe;
        $descripcion     = $this-> input -> post ('descripcion');
        $observaciones   = $this-> input -> post ('observaciones');
        
        $this -> objExpediente -> MdlExpedienteModificar($codigoexpe, $descripcion, $observaciones);    
        $resultado = $this-> objExpediente -> ModificarRegistrarExpediente($codigoexpenew);       
        if ($resultado) {
           echo "no modificado";          
        }
        else echo "modificado";
    }
    /**
     * Función para Enviar de Expediente
     */
    public function EnviarExpediente() {
        $codigoexpe       = $this-> input -> post ('cod1').
                            $this-> input -> post ('cod2').
                            strtoupper($this-> input -> post ('cod3')).
                            $this-> input -> post ('cod4').
                            $this-> input -> post ('cod5');
        $codigousuenvio   = $this-> session->userdata("codigo");
        $nombresrespo     = $this-> input -> post ('nombresrespo');
        $apellidosrespo   = $this-> input -> post ('apellidosrespo');
        $arearespo        = $this-> input -> post ('arearespo'); 
        $observaciones    = $this-> input -> post ('observaciones'); 
        $fueradeareasiono = $this-> input -> post ('fueradeareasiono');
        $resultado = $this-> objExpediente -> EnviarExpediente($codigoexpe, $codigousuenvio, $nombresrespo, $apellidosrespo, $arearespo, $observaciones, $fueradeareasiono);
        echo json_encode($resultado);
    }  
    /**
     * Función para modificar los datos de envio del expediente
     */
    public function ModificarEnviarExpediente() {
        $codigoexpe       = $this-> input -> post ('cod1').
                            $this-> input -> post ('cod2').
                            strtoupper($this-> input -> post ('cod3')).
                            $this-> input -> post ('cod4').
                            $this-> input -> post ('cod5');
        $codigousuenvio   = $this-> session->userdata("codigo");
        $nombresrespo     = $this-> input -> post ('nombresrespo');
        $apellidosrespo   = $this-> input -> post ('apellidosrespo');
        $arearespo        = $this-> input -> post ('arearespo'); 
        $observaciones    = $this-> input -> post ('observaciones'); 
        $fueradeareasionox = $this-> input -> post ('fueradeareasionox');
        $resultado = $this-> objExpediente -> ModificarEnviarExpediente($codigoexpe, $codigousuenvio, $nombresrespo, $apellidosrespo, $arearespo, $observaciones, $fueradeareasionox);
        echo json_encode($resultado);
    }
    /**
     * Función para Recibir de Expediente
     */
    public function RecibirExpediente() {
        $codigoexpe       = $this-> input -> post ('cod1').
                            $this-> input -> post ('cod2').
                            strtoupper($this-> input -> post ('cod3')).
                            $this-> input -> post ('cod4').
                            $this-> input -> post ('cod5');
        $codigousuenvio   = $this-> session->userdata("codigo");
        $nombresrespo     = $this-> input -> post ('nombresrespo');
        $apellidosrespo   = $this-> input -> post ('apellidosrespo');
        $arearespo        = $this-> input -> post ('arearespo'); 
        $observaciones    = $this-> input -> post ('observaciones'); 
        $resultado = $this-> objExpediente -> Recibir($codigoexpe, $codigousuenvio, $nombresrespo, $apellidosrespo, $arearespo, $observaciones);
        echo json_encode($resultado);
    }
    public function ModificarRecibirExpediente() {
        $codigoexpe       = $this-> input -> post ('cod1').
                            $this-> input -> post ('cod2').
                            strtoupper($this-> input -> post ('cod3')).
                            $this-> input -> post ('cod4').
                            $this-> input -> post ('cod5');
        $codigousuenvio   = $this-> session->userdata("codigo");
        $nombresrespo     = $this-> input -> post ('nombresrespo');
        $apellidosrespo   = $this-> input -> post ('apellidosrespo');
        $arearespo        = $this-> input -> post ('arearespo'); 
        $observaciones    = $this-> input -> post ('observaciones');    
        $resultado = $this-> objExpediente -> ModificarRecibirExpediente($codigoexpe, $codigousuenvio, $nombresrespo, $apellidosrespo, $arearespo, $observaciones);
        echo json_encode($resultado);
    }
    public function CambiarPassword() {
        $codigousu = $this-> session->userdata("codigo");
        $oldpass   = $this-> input -> post ('oldpass');
        $newpass   = $this-> input -> post ('newpass');
        $resultado = $this-> objLogin -> CambiarPassword($codigousu, $oldpass, $newpass);
        echo json_encode($resultado);
    }
}