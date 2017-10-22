<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*Clase que Da nombres a los dìas y meses */
class MdlFormatoFecha extends CI_Model {
    public function __construct() {
        parent::__construct(); 
    }      
    /**
     * Clase que da Nombre al número de Mes
     * @return string Nombre de Mes
     */
    public function NombreMes() {
        $timezone = "America/Lima";
        date_default_timezone_set($timezone);
        switch (date("n")) {
            case 1:
                return 'Enero';
            case 2:
                return 'Febrero';
            case 3:
                return 'Marzo';
            case 4:
                return 'Abril';
            case 5:
                return 'Mayo';
            case 6:
                return 'Junio';
            case 7:
                return 'Julio';
            case 8:
                return 'Agosto';
            case 9:
                return 'Septiembre';
            case 10:
                return 'Octubre';
            case 11:
                return 'Noviembre';
            case 12:
                return 'Diciembre';
        }
    }
    
    /**
     * Clase que da Nombre al número de Día
     * @return string Nombre de Día
     */
    public function NombreDia() {

        switch (date("N")) {                
            case 1:
                return 'Lunes';
            case 2:
                return 'Martes';
            case 3:
                return 'Miércoles';
            case 4:
                return 'Jueves';
            case 5:
                return 'Viernes';
            case 6:
                return 'Sábado';					
            case 7:
                return 'Domingo';
        }
    }
}