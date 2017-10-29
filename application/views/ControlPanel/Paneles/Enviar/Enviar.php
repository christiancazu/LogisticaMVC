<div class="container tab-pane fade in" id="enviar">
    <div class="row">
        <div id="tabs-enviar">
            <ul class="nav nav-pills">
                <li class="color-blue col-xs-3 col-xs-offset-3 tabs-gestion-expediente">
                    <a href="#tab-enviar" data-toggle="tab">Enviar</a>
                </li>
                <li class="color-green col-xs-3 tabs-gestion-expediente">
                    <a href="#tab-modenviar" data-toggle="tab">Modificar Envio</a>
                </li>
            </ul>
            <div class="tab-content clearfix">
                <!--TAB-ENVIAR-->
                <div class="tab-pane tab-registrar fade in col-sm-6 col-sm-offset-3 active" id="tab-enviar">
                    <div class="row">
                        <form class="form" action="<?= base_url()?>Usuario/EnviarExpediente" method="post" id="form-enviarexp">
                            <div class="panel-head bg-azul">
                                <h4 class="text-center text-blanco">Datos de Envio</h4>
                            </div>
                            <div class="panel-body">
                                <div class="form-horizontal form-group">
                                    <label class="text-azul">Código de Expediente:</label>
                                </div>
                                <div class="form-inline form-codigo">
                                    <div class="input-group" data-validate="dosdigitos">
                                        <span class="input-group-addon default"><input type="text" class="input-codigo" name="cod1" id="validate-text" placeholder="0-9"  maxlength="2" required style="max-width: 46px;"></span>
                                    </div>
                                    <div class="input-group" data-validate="dosdigitos">
                                        <span class="input-group-addon default anho"><input type="text" class="input-codigo" name="cod2" id="validate-text" placeholder="0-9" maxlength="2" value="18" required style="max-width: 46px;"></span>
                                    </div>
                                    <div class="input-group" data-validate="uncaracter">
                                        <span class="input-group-addon default"><input type="text" class="input-codigo" name="cod3" id="validate-text" placeholder="a-z" maxlength="1" required style="max-width: 46px;"></span>
                                    </div>
                                    <div class="input-group" data-validate="cuatrodigitos">
                                        <span class="input-group-addon default" style="border-radius: 10px;"><input type="text" class="input-codigo" name="cod4" id="validate-text" placeholder="0-9" maxlength="4" required style="max-width: 72px;"></span>
                                    </div>
                                    <div class="input-group" data-validate="undigito">
                                        <span class="input-group-addon default"><input type="text" class="input-codigo" name="cod5" id="validate-text" placeholder="0-9" maxlength="1" required style="max-width: 46px;"></span>
                                    </div>
                                </div>
                                <div class="form-horizontal form-group">
                                    <label class="text-azul"><p>Datos del Responsable:</p></label>
                                    <div class="form-inline">
                                        <input class="form-control input-registrar" name="nombresrespo" required placeholder="Nombres" maxlength="30"/>                
                                        <input class="form-control input-registrar" name="apellidosrespo" required placeholder="Apellidos" maxlength="30"/>
                                    </div>
                                </div>                                   
                                <div class="form-horizontal form-group">
                                    <label class="text-azul"><p>Area del Responsable:</p></label>
                                    <div class="form-inline">
                                        <div class="col-sm-6">
                                            <input class="form-control input-registrar" name="arearespo" required maxlength="30"/>
                                        </div>
                                        <div class="switch-field col-sm-6">
                                            <div class="switch-title">Responsable es de fuera del área ?</div>
                                            <input type="radio" id="switch_left" name="fueradeareasiono" value="0" required/>
                                            <label for="switch_left">Si</label>
                                            <input type="radio" id="switch_right" name="fueradeareasiono" value="2"/>
                                            <label for="switch_right">No</label>
                                        </div>
                                    </div>
                                </div>                            
                                <div class="form-horizontal form-group">
                                    <label class="text-azul">Observaciones de Envio:</label>
                                    <textarea class="form-control input-registrar"name="observaciones" maxlength="120"></textarea>
                                </div>
                                <div class="form-horizontal form-group">
                                    <button class="btn btn-md btn-primary btn-block borrar-button" type="submit" disabled >
                                        <strong>Enviar</strong></button>
                                    <div id="mensaje-alert-envio">
                                        <!--Contenido de la respuesta de Registro de expediente enviado desde Usuario,js-->
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!--TAB-MODIFICAR ENVIO-->
            </div>
        </div>
    </div> 
</div>