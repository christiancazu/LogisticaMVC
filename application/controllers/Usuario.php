<?php
/*Controlador Usuario*/
defined('BASEPATH') OR exit('No direct script access allowed');
/* Clase Que controla el ControlPanel */
class Usuario extends CI_Controller {

    public function __construct() {
        parent::__construct();        
        $this->load->model('MdlExpediente');   
    }       
    /**
     * Función registro de Expediente
     */
    public function RegistrarExpediente() {
        $codigoexpe    = $this->input->post('cod1',TRUE).
                         $this->input->post('cod2',TRUE).
                         strtoupper($this->input->post('cod3',TRUE)).
                         $this->input->post('cod4',TRUE).
                         $this->input->post('cod5',TRUE);
        $codigousuarioreg = $this->session->userdata("codigo");
        $descripcion   = $this->input->post('descripcion',TRUE);
        $objExpediente = new MdlExpediente();
        $objExpediente -> MdlExpediente($codigoexpe,$codigousuarioreg,$descripcion);    
        $resultado = $objExpediente -> Registrar();       
        if ($resultado->errno) {
           echo "no registrado";          
        }
        else echo "registrado";
    }
}