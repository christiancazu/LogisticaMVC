<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*Clase que controla la Identificación de Usuario*/
class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('MdlLogin');
    }
    /**
     * Clase que recibe por POST los datos del Formulario de Login, y los envia al modelo: MdlLogin atravez de un objeto, para validar si son correctos, si lo son Inicia la Sesión con un array de datos y se redirecciona a ControlPanel, si los datos son falsos Muestra mensaje de error, ambos sucesos se dan atravez de login.js
     */
    function index() {
        $usuario   = $this -> input -> post('usuario');
        $password  = $this -> input -> post('password');
        /*Instanciamiento e inicialización de objeto del modelo: MdlLogin*/
        $ojbLogin = new MdlLogin();
        $ojbLogin -> MdlLogin($usuario,$password);
        /*LLama al método Identificar del modelo: MdlLogin*/
        $resultado = $ojbLogin->Identificar();
        if ($resultado) {
            $nomyape = $this->ReducirNombre($resultado -> vchrNomUsu, $resultado -> vchrApeUsu);
            $datos = array(
                "nombres"   => $resultado -> vchrNomUsu,
                "apellidos" => $resultado -> vchrApeUsu,
                "codigo"    => $resultado -> intCodUsu,
                "tipo"      => $resultado -> tintTipoUsu,
                "nomyape"   => $nomyape,
                "login"     => TRUE
            ); 
            $this->session->set_userdata($datos);            
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

