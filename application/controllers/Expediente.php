<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/** Controlador Expediente llamado de la vista Consulta*/
class Expediente extends CI_Controller {
    
    var $objExpediente;
    
    public function __construct() {
        parent::__construct();
        $this->load->model('MdlExpediente');
        $this->objExpediente = new MdlExpediente();
    } 
    /**
     * Función llamada desde la vista Consultar y envia la consulta filtrada
     */
    public function ConsultarExpediente() {     
        $codigoconsulta = $this -> input -> post("buscar");   
        $resultado = $this -> objExpediente -> Consultar($codigoconsulta);
        echo json_encode($resultado);           
    }
    /**
     * Función llamada desde la vista Consultar y envia la información del expediente seleccionado
     */
    public function MostrarExpediente() {
        $codigoexpe = $this -> input -> post("codigo");   
        $resultado = $this -> objExpediente -> Mostrar($codigoexpe);
        echo json_encode($resultado);           
    }
    /**
     * Función para mostrar por expediente.js si el expediente es valido a registro
     */
    public function ConsultarParaRegistrar() {
        $codigoconsulta = $this -> input -> post("buscar");
        $resultado = $this -> objExpediente -> ConsultarParaRegistrar($codigoconsulta);
        echo json_encode($resultado); 
    }
    public function ObtenerDatosParaModificar() {
        $codigoconsulta = $this -> input -> post("buscar");
        $resultado = $this -> objExpediente -> ObtenerDatosParaModificar($codigoconsulta);
        echo json_encode($resultado);
    }
    
}