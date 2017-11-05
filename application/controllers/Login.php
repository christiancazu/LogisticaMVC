<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*Clase que controla la Identificación de Usuario*/
class Login extends CI_Controller {

    var $objLogin;
    
    function __construct() {
        parent::__construct();
        $this->load->model('MdlLogin');
        $this->objLogin = new MdlLogin();
    }
    /**
     * Clase que recibe por POST los datos del Formulario de Login, y los envia al modelo: MdlLogin atravez de un objeto, para validar si son correctos, si lo son Inicia la Sesión con un array de datos y se redirecciona a ControlPanel, si los datos son falsos Muestra mensaje de error, ambos sucesos se dan atravez de login.js
     */
    function index() {
        $usuario   = $this -> input -> post('usuario');
        $password  = $this -> input -> post('password');
        /*Instanciamiento e inicialización de objeto del modelo: MdlLogin*/
        
        $this -> objLogin -> MdlLogin($usuario,$password);
        /*LLama al método Identificar del modelo: MdlLogin*/
        $resultado = $this -> objLogin -> Identificar();
        
        if ($resultado) {
            $nomyape = $this->ReducirNombre($resultado -> vchNomUsu, $resultado -> vchApeUsu);
            $datos = array(
                "nombres"   => $resultado -> vchNomUsu,
                "apellidos" => $resultado -> vchApeUsu,
                "codigo"    => $resultado -> tinCodUsu,
                "tipo"      => $resultado -> tinTipoUsu,
                "nomyape"   => $nomyape,
                "login"     => TRUE
            ); 
            $this->session->set_userdata($datos);
            redirect(base_url()."ControlPanel");
        }
        else echo "error";
    }
    /**
     * Funcion Para Reducir el nombre a mostrar en la cabecera de ControlPanel
     * en el Formato : [Primer Nombre ][Primera letra de Apellido].
     * ejem: " Christian C. "
     * @param [[Type]] $nombres   [[Description]]
     * @param [[Type]] $apellidos [[Description]]
     */
    public function ReducirNombre($nombres,$apellidos) {
        
        $i=0;
        for ( $i ; $i < strlen($nombres) ; $i++ ) 
            if ( substr($nombres, $i, 1) == " " )                
                break;                   
        return $nomyape = substr($nombres, 0, $i)." ".substr($apellidos, 0, 1).".";

    }
}