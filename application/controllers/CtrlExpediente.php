<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CtrlExpediente extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('MdlExpediente');
    }
    public function Mostrar() {
        $data['expediente'] = $this->MdlExpediente->Mostrar();
    }
}