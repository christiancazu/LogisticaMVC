<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/* Clase Que controla el ControlPanel */
class ControlPanel extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('MdlExpediente');
        $this->load->model('MdlFormatoFecha');
        if (!$this->session->userdata("login")) {
            redirect(base_url());
        }
    }
    /**
     * Función de inico de control panel que carga todas las vistas
     */
    public function Index() {

        $data=array('title' => 'Panel de Usuario');
        $this->load->view('HeadHtml',$data);
        $this->FormatodeFecha();
        $data = array (
            "ControlPanel" => $this->load->view('ControlPanel/Paneles/ControlPanel/ControlPanel','',true),
            "Registrar" => $this->load->view('ControlPanel/Paneles/Registrar/Registrar','',true),
            "Consultar" => $this->load->view('ControlPanel/Paneles/Consultar/Consultar','',true), 
            "Enviar" => $this->load->view('ControlPanel/Paneles/Enviar/Enviar','',true), 
            "Recibir" => $this->load->view('ControlPanel/Paneles/Recibir/Recibir','',true), 
            "Reporte" => $this->load->view('ControlPanel/Paneles/Reporte/Reporte','',true)
        );
        $this->load->view('ControlPanel/MenuLateral',$data);       
        $this->load->view('ControlPanel/FooterControlPanel');      
    }
 
    /**
     * Función que da formato a la fecha del sistema
     */
    public function FormatodeFecha() {

        $mes = $this->MdlFormatoFecha->NombreMes();
        $dia = $this->MdlFormatoFecha->NombreDia()." ".date("j");
        $anho = date("Y");
        $fecha = array (            
            'fecha' => $dia." de ".$mes." del ".$anho
        );
        $this->load->view('ControlPanel/Cabecera',$fecha);              
    }
    /**
     * Función para Salir de la Aplicación cerrando sesión
     */
    public function Salir() {
        $this->session->sess_destroy();
    }
    
    /*public function CargarViewReporte () {
        $data=array('title' => 'Panel de Usuario');
        $this->load->view('ControlPanel/Paneles/ReporteBody',$data);  
    }
    public function CargarViewRegistrar () {
      
        $this->load->view('ControlPanel/Paneles/Registrar');  
    }*/
}

?>