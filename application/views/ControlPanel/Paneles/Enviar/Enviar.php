<div class="container tab-pane fade in" id="enviar">
    <div class="row">
        <div id="tabs-enviar">
            <ul class="nav nav-pills">
                <li class="color-blue col-xs-3 col-xs-offset-3 tabs-gestion-expediente active">
                    <a href="#tab-enviar" data-toggle="tab">Enviar</a>
                </li>
                <li class="color-green col-xs-3 tabs-gestion-expediente">
                    <a href="#tab-modenviar" data-toggle="tab">Modificar</a>
                </li>
            </ul>
            <div class="tab-content clearfix">
                <!--TAB-ENVIAR-->
                <div class="tab-pane tab-registrar fade in col-sm-6 col-sm-offset-3 active" id="tab-enviar">
                    <div class="row">
                        <form class="form" action="<?= base_url()?>Usuario/EnviarExpediente" method="post" id="form-envio">
                            <div class="panel-head bg-azul">
                                <h4 class="text-center">Datos de Envio</h4>
                            </div>
                            <div class="panel-body">
                                <label class="text-azul">Código de Expediente:</label>
                                <div class="form-inline form-codigo"><br>
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
                                <label class="text-azul">Datos del Responsable:</label>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <input class="form-control" name="nombresrespo" required placeholder="Nombres" maxlength="30" />
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <input class="form-control" name="apellidosrespo" required placeholder="Apellidos" maxlength="30" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label class="text-azul">Area del Responsable:</label>
                                            <select class="selectpicker form-control" name="arearespo" required id ="selectareas">
                                               <!--Cargar las areas de trabajo desde expediente.js-->   
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-4 col-xs-offset-1">
                                        <div class="form-group">
                                            <label class="text-azul">¿Fuera del área?</label>
                                            <div class="switch-field">
                                                <input type="radio" id="switch_left" name="fueradeareasiono" value="0" required/>
                                                <label for="switch_left">Si</label>
                                                <input type="radio" id="switch_right" name="fueradeareasiono" value="2" />
                                                <label for="switch_right">No</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <label class="text-azul">Observaciones de Envio:</label>
                                            <textarea class="form-control" name="observaciones"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <button class="btn btn-lg btn-primary btn-azul btn-block borrar-button" type="submit" disabled>
                                            <strong>Enviar</strong></button>
                                        <div id="mensaje-alert">
                                            <!--Contenido de la respuesta de Registro de expediente enviado desde Usuario,js-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!--TAB-MODIFICAR ENVIO-->
                <div class="tab-pane tab-modificar fade in col-sm-6 col-sm-offset-3" id="tab-modenviar">
                    <div class="row">
                        <form class="form" action="<?= base_url()?>Usuario/ModificarEnviarExpediente" method="post" id="form-envio-mod">
                            <div class="panel-head bg-verde">
                                <h4 class="text-center">Datos de Modificación</h4>
                            </div>
                            <div class="panel-body">
                                <label class="text-verde">Código de Expediente:</label>
                                <div class="form-inline form-codigo"><br>
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
                                <label class="text-verde">Datos del Responsable:</label>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <input class="form-control" name="nombresrespo" required placeholder="Nombres" maxlength="30" />
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <input class="form-control" name="apellidosrespo" required placeholder="Apellidos" maxlength="30" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label class="text-verde">Area del Responsable:</label>
                                            <select class="selectpicker form-control" name="arearespo" required id ="selectareas">
                                               <!--Cargar las areas de trabajo desde expediente.js-->   
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-5 col-xs-offset-1">
                                        <div class="form-group">
                                            <label class="text-verde">¿Fuera del área?</label>
                                            <div class="switch-field">
                                                <input type="radio" id="switch_leftx" name="fueradeareasionox" value="0" required/>
                                                <label for="switch_leftx">Si</label>
                                                <input type="radio" id="switch_rightx" name="fueradeareasionox" value="2" />
                                                <label for="switch_rightx">No</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <label class="text-verde">Observaciones de Envio:</label>
                                            <textarea class="form-control" name="observaciones"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <button class="btn btn-lg btn-primary btn-verde btn-block borrar-button" type="submit" disabled>
                                            <strong>Modificar</strong></button>
                                        <div id="mensaje-alert">
                                            <!--Contenido de la respuesta de Registro de expediente enviado desde Usuario,js-->
                                        </div>
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