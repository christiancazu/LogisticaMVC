<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*Clase para Cargar Vistas*/
class MdlModulos extends CI_Model {
    
    /*constructor por defecto*/
    function __construct() {
        parent::__construct();
    }
    /**
     * Función que contiene las rutas de las vistas del módulo CargarControlPanel
     * @return [[Type]] [[Description]]
     */
    public function CargarControlPanel() {
        $ControlPanel = [           
            "tab"    => "ControlPanel/TabsMenuLateral/TabControlPanel"
        ];
        return $ControlPanel;
    }
    /**
     * Función que contiene las rutas de las vistas del módulo Registrar
     * @return [[Type]] [[Description]]
     */
    public function CargarRegistrar() {
        $Registrar = [
            "modulo" => "ControlPanel/Paneles/ControlPanel/Registrar",
            "vista"  => "ControlPanel/Paneles/Registrar/Registrar",
            "tab"    => "ControlPanel/TabsMenuLateral/TabRegistrar"
        ];
        return $Registrar;
    }
    /**
     * Función que contiene las rutas de las vistas del módulo Consultar
     * @return [[Type]] [[Description]]
     */
    public function CargarConsultar() {
        $Consultar = [
            "modulo" => "ControlPanel/Paneles/ControlPanel/Consultar",
            "vista"  => "ControlPanel/Paneles/Consultar/Consultar",
            "tab"    => "ControlPanel/TabsMenuLateral/TabConsultar"
        ];
        return $Consultar;
    }
    /**
     * Función que contiene las rutas de las vistas del módulo Enviar
     * @return [[Type]] [[Description]]
     */
    public function CargarEnviar() {
        $Enviar = [
            "modulo" => "ControlPanel/Paneles/ControlPanel/Enviar",
            "vista"  => "ControlPanel/Paneles/Enviar/Enviar",
            "tab"    => "ControlPanel/TabsMenuLateral/TabEnviar"
        ];
        return $Enviar;
    }
    /**
     * Función que contiene las rutas de las vistas del módulo Recibir
     * @return [[Type]] [[Description]]
     */
    public function CargarRecibir() {
        $Recibir = [
            "modulo" => "ControlPanel/Paneles/ControlPanel/Recibir",
            "vista"  => "ControlPanel/Paneles/Recibir/Recibir",
            "tab"    => "ControlPanel/TabsMenuLateral/TabRecibir"
        ];
        return $Recibir;
    }
    /**
     * Función que contiene las rutas de las vistas del módulo Movimientos
     * @return [[Type]] [[Description]]
     */
    public function CargarMovimientos() {
        $Movimientos = [
            "modulo" => "ControlPanel/Paneles/ControlPanel/Movimientos",
            "vista"  => "ControlPanel/Paneles/Movimientos/Movimientos",
            "tab"    => "ControlPanel/TabsMenuLateral/TabMovimientos"
        ];
        return $Movimientos;
    }
    /**
     * Función que contiene las rutas de las vistas del módulo Reportes
     * @return [[Type]] [[Description]]
     */
    public function CargarReportes() {
        $Reportes = [
            "modulo" => "ControlPanel/Paneles/ControlPanel/Reportes",
            "vista"  => "ControlPanel/Paneles/Reportes/Reportes",
            "tab"    => "ControlPanel/TabsMenuLateral/TabReportes"
        ];
        return $Reportes;
    }
    /**
     * Función que contiene las rutas de las vistas del módulo CargarSalir
     * @return [[Type]] [[Description]]
     */
    public function CargarSalir() {
        $Salir = [           
            "tab"    => "ControlPanel/TabsMenuLateral/TabSalir"
        ];
        return $Salir;
    }
    
}