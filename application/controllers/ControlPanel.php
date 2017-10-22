<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/* Clase Que controla el ControlPanel */
class ControlPanel extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('BooksmarksModel');
        $this->load->model('MdlExpediente');
        $this->load->model('MdlFormatoFecha');
        if (!$this->session->userdata("login")) {
            redirect(base_url());
        }
    }
    
    public function Index() {

        $data=array('title' => 'Panel de Usuario');
        $this->load->view('HeadHtml',$data);
         
        //$this->Mostrar();
        $this->ConsultarExpediente();
        $this->FormatodeFecha();
        $data = array (
            "ControlPanel" => $this->load->view('ControlPanel/Paneles/ControlPanel','',true),
            "Registrar" => $this->load->view('ControlPanel/Paneles/Consultar','',true),
            "Consultar" => $this->load->view('ControlPanel/Paneles/Registrar','',true), 
            "Enviar" => $this->load->view('ControlPanel/Paneles/Enviar','',true), 
            "Recibir" => $this->load->view('ControlPanel/Paneles/Recibir','',true), 
            "Reporte" => $this->load->view('ControlPanel/Paneles/Reporte','',true),
            "Salir" => $this->load->view('ControlPanel/Paneles/Salir','',true)
        );
        $this->load->view('ControlPanel/MenuLateral',$data);       
        $this->load->view('ControlPanel/FooterControlPanel'); 
        
    }
    
    public function Mostrar() {

        $data=array('expe' => $this->MdlExpediente->Mostrar());
        $this->load->view('ControlPanel/Paneles/Consultar',$data,true);
    }
    
    public function InsertarExpediente() {

        $codigo = $this->input->post('cod1',TRUE).$this->input->post('cod2',TRUE).strtoupper($this->input->post('cod3',TRUE)).$this->input->post('cod4',TRUE);
        $monto = $this->input->post('monto',TRUE);
        $descripcion = $this->input->post('descripcion',TRUE);
        $registrar = array (
            "vchrCodExpe" => $codigo,
            "intCodUsuReg" => 2,            
            "dblMontoExpe" => $monto,
            "ltxtDescExpe" => $descripcion
        );
        $this->BooksmarksModel->InsertarExpediente($registrar);
        redirect(ControlPanel);
        return true;
    }
    public function EnviarExpediente() {

        $codigo = $this->input->post('cod1',TRUE).$this->input->post('cod2',TRUE).strtoupper($this->input->post('cod3',TRUE)).$this->input->post('cod4',TRUE);
        $nomrespo = $this->input->post('nomrespo',TRUE);
        $aperespo = $this->input->post('aperespo',TRUE);
        /*$aperespo = $this->input->post('aperespo',TRUE);*/
        $observaciones = $this->input->post('observaciones',TRUE);
        
        $registrar = array (
            "vchrCodExpe" => $codigo,
            "intCodUsu" => 2,
            "dtmFecEnvio" =>  date("Y-m-d"),
            "vchrNomRespo" => $nomrespo,
            "vchrApeRespo" => $aperespo,
            /*"vchrAreaRespo" => $arearespo,*/
            "ltxtObseEnvio" => $observaciones
        );
        $this->BooksmarksModel->EnviarExpediente($registrar);
        $this->BooksmarksModel->Ocupado($codigo);
        redirect(ControlPanel);
        return true;
        
    }
     public function ConsultarExpediente() {
        $data=array('exped' => $this->MdlExpediente->MostrarExpe());
        $this->load->view('ControlPanel/Paneles/Consultar',$data,true);
     }
    public function FormatodeFecha() {
      
        $mes = $this->MdlFormatoFecha->NombreMes();
        $dia = $this->MdlFormatoFecha->NombreDia()." ".date("j");
        $anho = date("Y");
        $fecha = array (            
            'fecha' => $dia." de ".$mes." del ".$anho
        );
        $this->load->view('ControlPanel/Cabecera',$fecha);              
    }
        
    public function EstadoOcupado($codigo) {
        
        /*$this->BooksmarksModel->Ocupado($codigo);
        redirect(ControlPanel);
        return true;*/
    }
    public function RegistrarExpediente() {
        $codigo = $this->input->post('cod1',TRUE).$this->input->post('cod2',TRUE).strtoupper($this->input->post('cod3',TRUE)).$this->input->post('cod4',TRUE);
        $monto = $this->input->post('monto',TRUE);
        $descripcion = $this->input->post('descripcion',TRUE);
        $objExpediente = new MdlExpediente();
        $objExpediente->MdlExpediente($codigo,2,$monto,$descripcion);        
        $objExpediente->Registrar();
        redirect(ControlPanel);
    }
    public function Salir() {
       $this->session->sess_destroy();
    }
}

?>