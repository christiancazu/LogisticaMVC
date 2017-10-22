<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*Clase que carga el router al Inicio*/
class Inicio extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this -> load -> model('MdlLogin');
    }
    /**
     * Clase que Arma las vistas de Inicio de la App
     */
    public function Index() {
        $data = array('title' => 'Inicio');
        $this -> load -> view('HeadHtml',$data);
        $this -> load -> view('Inicio/Login');
        $this -> load -> view('FooterHtml');       
    }
}