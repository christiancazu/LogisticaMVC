<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/** Controlador Expediente llamado de la vista Consulta*/
class Expediente extends CI_Controller {
    
    var $objExpediente;
    
    public function __construct() {
        parent::__construct();
        $this->load->model('MdlExpediente');
        $this->objExpediente = new MdlExpediente();
        $this->load->library('export_excel');
    } 
    /**
     * Función llamada desde la vista Consultar y envia la consulta filtrada
     */
    public function ConsultarExpediente() {     
        $codigoconsulta = $this -> input -> post("codigo");   
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
    public function VerificarExpediente() {
        $codigo = $this -> input -> post("codigo");
        $resultado = $this -> objExpediente -> VerificarExpediente($codigo);
        echo json_encode($resultado);
    }
    /*Función para rellenar los campos de descrip y observ del módulo modificar registro de expediente*/
    public function DatosParaModificarRegistrar() {
        $codigoconsulta = $this -> input -> post("codigo");
        $resultado = $this -> objExpediente -> DatosParaModificarRegistrar($codigoconsulta);
        echo json_encode($resultado);
    }
    /*función para Consultar si el expediente existe y si esta disponible para enviar*/
    public function VerificarParaEnviar() {
        $codigoconsulta = $this -> input -> post("codigo");
        $resultado = $this -> objExpediente -> VerificarParaEnviar($codigoconsulta);
        echo json_encode($resultado);
    }
    public function VerificarParaModificarEnviar() {
        $codigoconsulta = $this -> input -> post("codigo");
        $resultado = $this -> objExpediente -> VerificarParaModificarEnviar($codigoconsulta);
        echo json_encode($resultado);
    }
    public function DatosParaModificarEnviar() {
        $codigoconsulta = $this -> input -> post("codigo");
        $resultado = $this -> objExpediente -> DatosParaModificarEnviar($codigoconsulta);
        echo json_encode($resultado);
    }
    /*función para Consultar si el expediente existe y si esta disponible para recibir*/
    public function VerificarParaRecibir() {
        $codigoconsulta = $this -> input -> post("codigo");
        $resultado = $this -> objExpediente -> VerificarParaRecibir($codigoconsulta);
        echo json_encode($resultado);
    }
    public function VerificarParaModificarRecibir() {
        $codigoconsulta = $this -> input -> post("codigo");
        $resultado = $this -> objExpediente -> VerificarParaModificarRecibir($codigoconsulta);
        echo json_encode($resultado);
    }
    public function DatosParaModificarRecibir() {
        $codigoconsulta = $this -> input -> post("codigo");
        $resultado = $this -> objExpediente -> DatosParaModificarRecibir($codigoconsulta);
        echo json_encode($resultado);
    }
    public function UltimoMovimiento() {
        $codigoconsulta = $this -> input -> post("codigo");
        $resultado = $this -> objExpediente -> UltimoMovimiento($codigoconsulta);
        echo json_encode($resultado);
    }
    public function MostrarMovimientos() {
        $codigoconsulta = $this -> input -> post("codigo");
        $resultado = $this -> objExpediente -> MostrarMovimientos($codigoconsulta);
        echo json_encode($resultado);
    }
    public function MostrarMovimientoExpediente() {
        $codigoconsulta = $this -> input -> post("codigo");
        $resultado = $this -> objExpediente -> MostrarMovimientoExpediente($codigoconsulta);
        echo json_encode($resultado);
    }
    public function Reporte() {
        $dateinicio = $this -> input -> post("dateinicio");
        $datefinal = $this -> input -> post("datefinal");
        $resultado = $this -> objExpediente -> Reporte($dateinicio, $datefinal);
        echo json_encode($resultado);
    }
    public function ExportarAExcel() {
        $dateinicio = $this -> input -> post("dateinicio");
        $datefinal = $this -> input -> post("datefinal");
        $resultado = $this -> objExpediente -> ExportarAExcel($dateinicio, $datefinal);
        $this->export_excel->to_excel($resultado, 'reporte');
        //echo json_encode($resultado);
    }
      
}