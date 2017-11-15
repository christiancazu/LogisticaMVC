<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*Clase para Identificar Usuario*/
class MdlAdmin extends CI_Model {
    /*atributos de la Clase*/
   
    /*constructor por defecto*/
    function __construct() {
        parent::__construct();
        $this -> load -> database();
    }
    public function RegistrarUsuario($dniusu,$nombresusu,$apellidosusu,$tipousu,$areausu,$observaciones) {
        $resultado = $this->db->query("CALL sp_RegistrarUsuario('".$dniusu."','".$nombresusu."','".$apellidosusu."',".$tipousu.",".$areausu.",'".$observaciones."')");
        return $resultado -> result();
    }    
    public function VerificarParaRegistrarUsuario($dniusu) {
        $resultado = $this->db->query("CALL sp_VerificarParaRegistrarUsuario('".$dniusu."')");
        return $resultado -> result();
    }
    public function DatosParaModificarRegistrarUsuario($dniusu) {
        $resultado = $this->db->query("CALL sp_DatosParaModificarRegistrarUsuario('".$dniusu."')");
        return $resultado -> result();
    }
    public function ModificarRegistrarUsuario($dniusu,$dniusunew,$nombresusu,$apellidosusu,$tipousu,$areausu,$activosiono,$observaciones) {
        $resultado = $this->db->query("CALL sp_ModificarRegistrarUsuario('".$dniusu."','".$dniusunew."','".$nombresusu."','".$apellidosusu."',".$tipousu.",".$areausu.",".$activosiono.",'".$observaciones."')");
        return $resultado -> result();
    }
    public function RegistrarAreaTrabajo($area) {
        $resultado = $this->db->query("CALL sp_RegistrarAreaTrabajo('".$area."')");
        return $resultado -> result();
    }
    public function ConsultarUsuario($codigoconsulta) {
        $resultado = $this->db->query("CALL sp_FiltrarConsultaUsuario('".$codigoconsulta."')");
        return $resultado -> result();
    }
    public function MostrarUsuario($codigoconsulta) {
        $resultado = $this->db->query("CALL sp_MostrarUsuario('".$codigoconsulta."')");
        return $resultado -> result();
    }
 
}