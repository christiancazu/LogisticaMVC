<div class="container tab-pane fade in" id="movimientos">
    <div class="row">
        <div class="col-sm-6 col-md-offset-3" style="margin-bottom:20px">
            <div class="panel-movimientos">
                <div class="panel-head bg-azul consultar-border">
                    <h4 class="text-center">Movimientos de Expediente</h4>
                </div>
                <div class="panel-body">
                    <div class="form-inline form-codigo">
                        <form id="form-movimientos" class="">
                            <h4><label class="text-azul">Ingrese código :</label>
                                <input type="text" class="input-codigo text-negro" id="consuexp-input3" maxlength="10">&nbsp;&nbsp;<button class="btn btn-md bg-azul text-blanco" id="buscar-movimientos"><strong> Consultar</strong></button></input></h4>  
                        </form>
                    </div>
                </div>    
            </div> 
        </div> 
    </div>        
    <div class="row">      
        <div id="table-movimientos">
            <!--table que contiene las consultas filtradas cargado desde expediente.js-->  
        </div>
    </div>
</div>
<div class="modal fade" id="modal-movimientos" role="dialog">
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
<div class="modal fade" id="modal-nohaymovimientos" role="dialog">
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