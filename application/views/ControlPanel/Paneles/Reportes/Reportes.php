<div class="container tab-pane fade in" id="reportes">
    <div class="row">
        <div class="col-sm-10 col-md-offset-1" style="margin-bottom:20px">
            <div class="panel-movimientos">
                <div class="panel-head bg-azul consultar-border">
                    <h4 class="text-center">Reporte de Expediente</h4>
                </div>
                <form id="form-reportes" method="post" action="<?= base_url()?>Expediente/ExportarAExcel">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-2">
                                <div class="form-group">
                                    <h4><label class="text-azul pull-right">Ingrese Fecha :</label></h4>
                                </div>
                            </div>
                            <div class="col-xs-3">



                                <div class="form-group">
                                    <div class='form-group date'>
                                        <input type='date' id='dateinicio' class="form-control" placeholder="dd Mon yyyy" />
                                       
                                    </div>
                                </div>



                            </div>
                            <div class="col-xs-3">



                                <div class="form-group">
                                    <div class='form-group date'>
                                        <input type='date' id='datefinal' class="form-control" placeholder="dd Mon yyyy" />
                                        
                                    </div>
                                </div>



                            </div>
                            <div class="col-xs-2">
                                <div class="form-group">
                                     <button class="btn-consultar" id="buscar-reportes">Generar Reporte</button>
                                </div>
                            </div>
                            <div class="col-xs-2">
                                <div class="form-group">
                                     <button class="btn-consultar" id="exportaraexcel">Exportar a Excel</button>
                                </div>
                            </div>
                        </div>                
                    </div>  
                </form>  
            </div> 
        </div> 
    </div>   

    <div class="row">      
        <div id="table-reportes">
            <!--table que contiene las consultas filtradas cargado desde expediente.js-->  
        </div>
    </div>
</div>
<div class="modal fade" id="modal-reportes" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content modal-consultar">
            <div class="modal-header">
                <span class="close" data-dismiss="modal"><i class="glyphicon glyphicon-remove-sign"></i></span>
                <h3 class="modal-title">Información de Movimiento</h3>
            </div>
            <div class="modal-body" id="info-movimientos">               
                <!-- CONTENIDO DE DATOS DE EXPEDIENTE . enviado desde expediente.js-->
            </div>
            <div class="modal-footer" id="footer-movimientos">
                <!-- BUTTON (enviar/recepcionar) SEGÚN ESTADO DE EXPEDIENTE . enviado desde expediente.js-->  
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-nohayreportes" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content modal-consultar">
            <div class="modal-header">
                <span class="close" data-dismiss="modal"><i class="glyphicon glyphicon-remove-sign"></i></span>
                <h3 class="modal-title">Aviso <i class="fa fa-exclamation" aria-hidden="true"></i></h3>
            </div>
            <div class="modal-body">
                <h3 class="text-azul">La Consulta no encontro resultados para :</h3>
                <h3 class="text-negro" id="codigo-nulo"></h3>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>