<?php
/*Controlador Admin*/
defined('BASEPATH') OR exit('No direct script access allowed');
/* Clase Que controla las funciones del Admin */
class Admin extends CI_Controller {

    var $objExpediente,$objAdmin;

    public function __construct() {
        parent::__construct();        
        $this -> load -> model('MdlExpediente'); 
        $this -> load -> model('MdlAdmin'); 
        $this -> objExpediente = new MdlExpediente();
        $this -> objAdmin = new MdlAdmin();
    }
    /**
     * Función registrar usuario
     */
    public function RegistrarUsuario() {
        $dniusu        = $this-> input -> post ('dniusu');
        $nombresusu    = $this-> input -> post ('nombresusu');
        $apellidosusu  = $this-> input -> post ('apellidosusu');
        $tipousu = $this-> input -> post ('tipousu');
        $areausu = $this-> input -> post ('areausu');
        $observaciones = $this-> input -> post ('observaciones');
        $resultado = $this -> objAdmin -> RegistrarUsuario($dniusu,$nombresusu,$apellidosusu,$tipousu,$areausu,$observaciones);     
        echo json_encode($resultado);
    }
    public function VerificarParaRegistrarUsuario() {
        $dniusu    = $this-> input -> post ('dni');
        $resultado = $this -> objAdmin -> VerificarParaRegistrarUsuario($dniusu);     
        echo json_encode($resultado);
    }
    public function DatosParaModificarRegistrarUsuario() {
        $dniusu    = $this-> input -> post ('dni');
        $resultado = $this -> objAdmin -> DatosParaModificarRegistrarUsuario($dniusu);     
        echo json_encode($resultado);
    }
    public function ModificarRegistrarUsuario() {
        $dniusu        = $this-> input -> post ('dniusu');
        $dniusunew     = $this-> input -> post ('dniusunew');
        if ($dniusunew=='') $dniusunew = $dniusu;
        $nombresusu    = $this-> input -> post ('nombresusu');
        $apellidosusu  = $this-> input -> post ('apellidosusu');
        $tipousu = $this-> input -> post ('tipousu');
        $areausu = $this-> input -> post ('areausu');
        $activosiono = $this-> input -> post ('activosiono');
        $observaciones = $this-> input -> post ('observaciones');
        $resultado = $this -> objAdmin -> ModificarRegistrarUsuario($dniusu,$dniusunew,$nombresusu,$apellidosusu,$tipousu,$areausu,$activosiono,$observaciones);     
        echo json_encode($resultado);
    } 
    public function RegistrarAreaTrabajo() {
        $area    = $this-> input -> post ('area');        
        $resultado = $this -> objAdmin -> RegistrarAreaTrabajo($area);     
        echo json_encode($resultado);
    }
    public function ConsultarUsuario() {     
        $codigoconsulta = $this -> input -> post("codigo");   
        $resultado = $this -> objAdmin -> ConsultarUsuario($codigoconsulta);
        echo json_encode($resultado);           
    }
    public function MostrarUsuario() {     
        $codigoconsulta = $this -> input -> post("codigo");   
        $resultado = $this -> objAdmin -> MostrarUsuario($codigoconsulta);
        echo json_encode($resultado);           
    }
    
    
}