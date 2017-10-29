<?php
/*Controlador Usuario*/
defined('BASEPATH') OR exit('No direct script access allowed');
/* Clase Que controla el la funciones del Usuario */
class Usuario extends CI_Controller {
  
    var $objExpediente;
    
    public function __construct() {
        parent::__construct();        
        $this -> load -> model('MdlExpediente');  
        $this -> objExpediente = new MdlExpediente();
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
    public function ModificarRegistroExpediente() {
        $codigoexpe      = $this-> input -> post ('cod1').
                           $this-> input -> post ('cod2').
                           strtoupper($this-> input -> post ('cod3')).
                           $this-> input -> post ('cod4').
                           $this-> input -> post ('cod5');
        $codigoexpenew   = $this-> input -> post ('cod1-new').
                           $this-> input -> post ('cod2-new').
                           strtoupper($this -> input -> post ('cod3')).
                           $this-> input -> post ('cod4-new').
                           $this-> input -> post ('cod5-new');
        $descripcion     = $this-> input -> post ('descripcion');
        $observaciones   = $this-> input -> post ('observaciones');
        
        $this -> objExpediente -> MdlExpedienteModificar($codigoexpe, $descripcion, $observaciones);    
        $resultado = $this-> objExpediente -> Modificar($codigoexpenew);       
        if ($resultado) {
           echo "no modificado";          
        }
        else echo "modificado";
    }
    /**
     * Función para Mostrar de Expediente
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
        $resultado = $this-> objExpediente -> Enviar($codigoexpe, $codigousuenvio, $nombresrespo, $apellidosrespo, $arearespo, $observaciones, $fueradeareasiono);
        if ($resultado -> errno) {
           echo "no enviado";          
        }
        else echo "enviado";
    }  
    
}