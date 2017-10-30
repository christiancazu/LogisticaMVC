<div class="container tab-pane fade in" id="recibir">
    <div class="row">
        <div id="tabs-recibir">
            <ul class="nav nav-pills">
                <li class="color-blue col-xs-3 col-xs-offset-3 tabs-gestion-expediente active">
                    <a href="#tab-recibir" data-toggle="tab">Recepcionar</a>
                </li>
                <li class="color-green col-xs-3 tabs-gestion-expediente">
                    <a href="#tab-modrecibir" data-toggle="tab">Modificar</a>
                </li>
            </ul>
            <div class="tab-content clearfix">
                <!--TAB-ENVIAR-->
                <div class="tab-pane tab-registrar fade in col-sm-6 col-sm-offset-3 active" id="tab-recibir">
                    <div class="row">
                        <form class="form" action="<?= base_url()?>Usuario/RecibirExpediente" method="post" id="form-recibir">
                            <div class="panel-head bg-azul">
                                <h4 class="text-center text-blanco">Datos de Recepción</h4>
                            </div>
                            <div class="panel-body">
                                <div class="form-horizontal form-group">
                                    <label class="text-azul">Código de Expediente:</label>
                                </div>
                                <div class="form-inline">
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
                                <div id="comprobacion-expe"><br>
                                    <!--  muestra mensaje si es valido el expediente para registro-->
                                </div>
                                <div class="form-horizontal form-group">
                                    <label class="text-azul">Datos del Responsable:</label>
                                    <div class="row">
                                        <div class="col-sm-6 form-movi">
                                            <input name="nombresrespo" required placeholder="Nombres" maxlength="30"/>
                                        </div> 
                                        <div class="col-sm-6 form-movi">  
                                            <input name="apellidosrespo" required placeholder="Apellidos" maxlength="30"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-horizontal form-group">
                                    <div class="row">
                                        <div class="col-sm-6 form-movi">
                                            <label class="text-azul">Area del Responsable:</label> 
                                            <input name="arearespo" required maxlength="30"/>    
                                        </div>
                                      <!--  <div class="col-sm-6 switch">
                                            <label class="text-azul">¿Fuera del área?</label>
                                            <div class="switch-field">
                                                <input type="radio" id="switch_left" name="fueradeareasiono" value="0" required/>
                                                <label for="switch_left">Si</label>
                                                <input type="radio" id="switch_right" name="fueradeareasiono" value="2"/>
                                                <label for="switch_right">No</label>
                                            </div>
                                        </div>-->
                                    </div>
                                </div>
                                <div class="form-horizontal form-group">
                                    <label class="text-azul">Observaciones de Recepción:</label>
                                    <textarea class="form-control input-registrar" name="observaciones" maxlength="120"></textarea>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-md btn-primary btn-azul btn-block borrar-button" type="submit" disabled >
                                        <strong>Recepcionar</strong></button>
                                    <div id="mensaje-alert"> 
                                        <!--Contenido de la respuesta de Registro de expediente enviado desde Usuario,js-->
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!--TAB-MODIFICAR ENVIO-->
                <div class="tab-pane tab-modificar fade in col-sm-6 col-sm-offset-3" id="tab-modrecibir">
                    <div class="row">
                        <form class="form" action="<?= base_url()?>Usuario/ModificarRecepcionExpediente" method="post" id="form-recibir-mod">
                            <div class="panel-head bg-verde">
                                <h4 class="text-center">Datos de Modificación</h4>
                            </div>
                            <div class="panel-body">
                                <div class="form-horizontal form-group">
                                    <label class="text-verde">Código de Expediente:</label>
                                </div>
                                <div class="form-inline">
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
                                <div id="msg-existe"><br>
                                    <!--  muestra mensaje si es valido el expediente para registro-->
                                </div>
                                <div class="form-horizontal form-group">
                                    <label class="text-verde">Datos del Responsable:</label>
                                    <div class="row">
                                        <div class="col-sm-6 form-movi">
                                            <input name="nombresrespo" required placeholder="Nombres" maxlength="30"/>
                                        </div> 
                                        <div class="col-sm-6 form-movi">  
                                            <input name="apellidosrespo" required placeholder="Apellidos" maxlength="30"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-horizontal form-group">
                                    <div class="row">
                                        <div class="col-sm-6 form-movi">
                                            <label class="text-verde">Area del Responsable:</label> 
                                            <input name="arearespo" required maxlength="30"/>    
                                        </div>
                                       <!-- <div class="col-sm-6 switch">
                                            <label class="text-verde">¿Fuera del área?</label>
                                            <div class="switch-field">
                                                <input type="radio" id="switch_leftx" name="fueradeareasiono" value="0" required/>
                                                <label for="switch_leftx">Si</label>
                                                <input type="radio" id="switch_rightx" name="fueradeareasiono" value="2" />
                                                <label for="switch_rightx">No</label>
                                            </div>
                                        </div>-->
                                    </div>
                                </div>                            
                                <div class="form-horizontal form-group">
                                    <label class="text-verde">Observaciones de Recepción:</label>
                                    <textarea class="form-control input-registrar"name="observaciones" id="txa-obse" maxlength="120"></textarea>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-md btn-primary btn-block borrar-button btn-verde" type="submit" disabled>
                                        <strong>Modificar</strong></button>
                                    <div id="mensaje-alert">
                                        <!--Contenido de la respuesta de Registro de expediente enviado desde Usuario.js-->
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</div>