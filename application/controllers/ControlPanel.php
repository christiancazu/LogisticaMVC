<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/* Clase Que controla el ControlPanel */
class ControlPanel extends CI_Controller {
    
    var $objModulos;
 
    public function __construct() {
        parent::__construct();
        $this->load->model('MdlExpediente');
        $this->load->model('MdlFormatoFecha');
        if (!$this->session->userdata("login")) {
            redirect(base_url());
        } else {
            $this->load->model('MdlModulos');
            $this->objModulos = new MdlModulos();
        } 
    }
    /**
     * Función de inico de control panel que carga todas las vistas
     */
    public function Index() {

        $data=array('title' => 'Panel de Usuario');
        $this->load->view('HeadHtml',$data);
        $this->FormatodeFecha();
        $this->CargarModulos();
        $this->load->view('ControlPanel/FooterControlPanel'); 
    }    
    /**
     * Función que carga los módulos según el tipo de usuario identificado
     */
    public function CargarModulos()  {
        $modulos = [];
        $vistas = [];
        $tabslateral = [];
        $array = $this->objModulos->CargarControlPanel();
        array_push($tabslateral,$this->load->view($array['tab'],'',true));
        $tipo = $this->session->userdata("tipo");
            
            if ($tipo == 1) {
            $array =  $this->objModulos->CargarRegistrarUsuario();   
            array_push($modulos,    $this->load->view($array['modulo'],'',true));
            array_push($vistas,     $this->load->view($array['vista'],'',true));
            array_push($tabslateral,$this->load->view($array['tab'],'',true));
             $array =  $this->objModulos->CargarConsultarUsuario();   
            array_push($modulos,    $this->load->view($array['modulo'],'',true));
            array_push($vistas,     $this->load->view($array['vista'],'',true));
            array_push($tabslateral,$this->load->view($array['tab'],'',true));     
            $array =  $this->objModulos->CargarRegistrarArea();   
            array_push($modulos,    $this->load->view($array['modulo'],'',true));
            array_push($vistas,     $this->load->view($array['vista'],'',true));
            array_push($tabslateral,$this->load->view($array['tab'],'',true));                
            }
            if ($tipo == 2 || $tipo == 3 || $tipo == 4 || $tipo == 5) {
            $array =  $this->objModulos->CargarRegistrar();   
            array_push($modulos,    $this->load->view($array['modulo'],'',true));
            array_push($vistas,     $this->load->view($array['vista'],'',true));
            array_push($tabslateral,$this->load->view($array['tab'],'',true)); 
            }
            if ($tipo == 2 || $tipo == 3 ||  $tipo == 4 || $tipo == 5 || $tipo == 6) {
            $array =  $this->objModulos->CargarConsultar();   
            array_push($modulos,    $this->load->view($array['modulo'],'',true));
            array_push($vistas,     $this->load->view($array['vista'],'',true));
            array_push($tabslateral,$this->load->view($array['tab'],'',true));  
            }
            if ($tipo == 2 || $tipo == 3 || $tipo == 4) {
            $array =  $this->objModulos->CargarEnviar();   
            array_push($modulos,    $this->load->view($array['modulo'],'',true));
            array_push($vistas,     $this->load->view($array['vista'],'',true));
            array_push($tabslateral,$this->load->view($array['tab'],'',true));  
            }
            if ($tipo == 2 || $tipo == 3 || $tipo == 5) {
            $array =  $this->objModulos->CargarRecibir();   
            array_push($modulos,    $this->load->view($array['modulo'],'',true));
            array_push($vistas,     $this->load->view($array['vista'],'',true));
            array_push($tabslateral,$this->load->view($array['tab'],'',true));  
            }
            if ($tipo == 2 || $tipo == 3 || $tipo == 4 || $tipo == 5 || $tipo == 6) {
            $array =  $this->objModulos->CargarMovimientos();   
            array_push($modulos,    $this->load->view($array['modulo'],'',true));
            array_push($vistas,     $this->load->view($array['vista'],'',true));
            array_push($tabslateral,$this->load->view($array['tab'],'',true));  
            }
            if ($tipo == 2) {
            $array =  $this->objModulos->CargarReportes();   
            array_push($modulos,    $this->load->view($array['modulo'],'',true));
            array_push($vistas,     $this->load->view($array['vista'],'',true));
            array_push($tabslateral,$this->load->view($array['tab'],'',true));  
            }
           
        $array = $this->objModulos->CargarSalir();
        array_push($tabslateral,$this->load->view($array['tab'],'',true));
        
        $this->load->view('ControlPanel/MenuLateral',array_merge(compact("vistas"), compact("tabslateral")));
        $this->load->view('ControlPanel/Paneles/ControlPanel/ControlPanel',compact("modulos"));   
    }
    /**
     * Función para cargar los select de areas de trabajo
     */
    public function CargarAreas() {
        $resultado = $this-> objModulos -> CargarAreas();
        echo json_encode($resultado);
    }
    /**
     * Función para cargar los select de tipos de usuario
     */
    public function CargarTipoUsuario() {
        $resultado = $this-> objModulos -> CargarTipoUsuario();
        echo json_encode($resultado);
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

}