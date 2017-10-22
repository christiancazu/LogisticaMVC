<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class BooksmarksModel extends CI_Model {
    public function __construct() {
        parent::__construct();

    }
    public function InsertarExpediente($Registrar) {
        $this->db->insert('tbl_expediente', $Registrar);   
    }
    public function EnviarExpediente($Registrar) {
        $this->db->insert('tbl_envio', $Registrar);   
    }

    public function Ocupado($codigo) {
        /* $this->load->database(); 
   $this->db->where('tbl_expediente', ); 
   $update = array('testi', $update); 
   $this->db->update('testimonials', $update);*/
        $z= array(
            'tintCodEstadoExpe'=>0
        ) ;

        $this->db->where("vchrCodExpe",$codigo);
        $this->db->update("tbl_expediente",$z);
    }
}

?>