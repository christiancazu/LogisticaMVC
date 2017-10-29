<div class="container tab-pane fade in" id="consultar">
    <div class="row">
        <div class="col-sm-6 col-md-offset-3" style="margin-bottom:20px">
            <div class="panel-consultar">
                <div class="panel-head bg-azul consultar-border">
                    <h4 class="text-center">Consulta de Expedientes</h4>
                </div>
                <div class="panel-body">
                    <div class="form-inline form-codigo">
                        <form id="form-consultar">
                            <h4><label class="text-azul">Ingrese código :</label>
                                <input type="text" class="input-codigo text-negro" id="consuexp-input3" maxlength="10"></h4>  
                        </form>
                    </div>
                </div>    
            </div> 
        </div> 
    </div>       
    <div class="row">      
        <div id="table-consulta">
            <!--table que contiene las consultas filtradas-->  
        </div>
    </div>
</div>
<div class="modal fade" id="modal-expe" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content modal-consultar">
            <div class="modal-header">
                <span class="close" data-dismiss="modal"><i class="glyphicon glyphicon-remove-sign"></i></span>
                <h3 class="modal-title">Información de Expediente</h3>
            </div>
            <div class="modal-body" id="info-expe">
                <!-- CONTENIDO DE DATOS DE EXPEDIENTE . enviado desde expediente.js-->
            </div>
            <div class="modal-footer" id="footer-expe">
                <!-- BUTTON (enviar/recepcionar) SEGÚN ESTADO DE EXPEDIENTE . enviado desde expediente.js-->  
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-nohayconsulta" role="dialog">
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
                <button type="button" class="btn btn-md btn-default bg-azul text-blanco pull-left" id="registrar-expe" data-dismiss="modal"><strong>Registrar</strong></button>
                <button type="button" class="btn btn-md btn-default bg-azul text-blanco lead pull-right" data-dismiss="modal"><strong>Cerrar</strong></button>
            </div>
        </div>
    </div>
</div>
