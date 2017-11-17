<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*Clase para Identificar Usuario*/
class MdlLogin extends CI_Model {
    /*atributos de la Clase*/
    private $usuario,$password;
    /*constructor por defecto*/
    function __construct() {
        parent::__construct();
        $this -> load -> database();
    }
/**
     * constructor de inicialización de atributos
     * @param [[Type]] $usuario   [[Description]]
     * @param [[Type]] $password [[Description]]
     */
    function MdlLogin($usuario,$password) {
        $this -> usuario  = $usuario;
        $this -> password = $password;            
    }
/**
 * Funcion que llama al procedimiento IdentificarUsuario de la BD
 * @return boolean : Si encuentra Usuario registrado retorna la fila
 *                   sino retorna false          
 */
    function Identificar() {
        $resultado = $this -> db -> query("CALL sp_IdentificarUsuario('".$this->usuario."','".$this->password."')");      
        return $resultado -> row();   
    }    
    function CambiarPassword($codigousu, $oldpass, $newpass) {
        $resultado = $this->db->query("CALL sp_CambiarPassword(".$codigousu.",'".$oldpass."','".$newpass."')");
        return $resultado -> result();
    }
}