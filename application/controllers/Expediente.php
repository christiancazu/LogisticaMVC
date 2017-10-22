<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Expediente extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('MdlExpediente');
    }
    public function Mostrar() {
        $data['expediente'] = $this->MdlExpediente->Mostrar();
    }
    public function Registrar() {
        $data['expediente'] = $this->MdlExpediente->Mostrar();
    }
}