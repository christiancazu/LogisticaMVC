<div class="container tab-pane fade in" id="registrar">
    <div class="row">
        <div id="tabs-registrar">
            <ul class="nav nav-pills">
                <li class="color-blue col-xs-3 col-xs-offset-3 tabs-gestion-expediente active">
                    <a href="#tab-reg" data-toggle="tab">Registrar</a>
                </li>
                <li class="color-green col-xs-3 tabs-gestion-expediente">
                    <a href="#tab-modreg" data-toggle="tab">Modificar</a>
                </li>
            </ul>
            <div class="tab-content clearfix">
                <!--TAB-REGISTRAR-->
                <div class="tab-pane tab-registrar fade in col-sm-6 col-sm-offset-3 active" id="tab-reg">
                    <div class="row">
                        <form class="form" action="<?= base_url()?>Usuario/RegistrarExpediente" method="post" id="form-reg">
                            <div class="panel-head bg-azul">
                                <h4 class="text-center">Datos de Registro</h4>
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
                                        <span class="input-group-addon default"><input type="text" class="input-codigo" name="cod3" id="validate-text" placeholder="a-z" pattern="[A-Za-z]" maxlength="1" required style="max-width: 46px;"></span>
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
                                    <label class="text-azul">Descripción de Expediente:</label>
                                    <textarea class="form-control input-registrar" id="border-round" name="descripcion" required maxlength="120"></textarea>
                                </div>
                                <div class="form-horizontal form-group">
                                    <label class="text-azul">Observaciones de Registro:</label>
                                    <textarea class="form-control input-registrar" id="border-round" name="observaciones" maxlength="120"></textarea>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-md btn-primary btn-block borrar-button btn-azul" type="submit" disabled>
                                        <strong>Registrar</strong></button>
                                    <div id="mensaje-alert-reg">
                                        <!--Contenido de la respuesta de Registro de expediente enviado desde Usuario.js-->
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!--TAB-MODIFICAR-->
                <div class="tab-pane tab-modificar fade in col-sm-6 col-sm-offset-3" id="tab-modreg">
                    <div class="row">
                        <form class="form" action="<?= base_url()?>Usuario/ModificarRegistrarExpediente" method="post" id="form-reg-mod">
                            <div class="panel-head bg-verde">
                                <h4 class="text-center">Datos de Modificación</h4>
                            </div>
                            <div class="panel-body">
                                <div class="form-horizontal form-group">
                                    <label class="text-verde">Código de Expediente:</label>
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
                                <div id="comprobacion-expe-modi"><br>
                                    <!--  muestra mensaje si es valido el expediente para registro-->
                                </div>
                                <div class="row row-center">
                                    <div class="col-xs-6 col-xs-offset-3">
                                        <div class="form-group">
                                            <label>                                       
                                                <input type="checkbox" class="cbx-input" name="" value="" id="cbx-expe-new"/>
                                                <span class="cbx-dni">Cambiar código de Expediente</span>
                                            </label>
                                        </div>
                                    </div> 
                                </div>
                                <div id="dni-usu-new" class="hidden">
                                    <div class="form-horizontal form-group">
                                        <label class="text-verde">Nuevo código de Expediente:</label>
                                    </div>
                                    <div class="form-inline form-codigo-reg-mod">
                                        <div id="div-input-group" data-validate="dosdigitos">
                                            <span class="input-group-addon default"><input type="text" class="input-codigo" name="cod1-new" id="validate-text" placeholder="0-9" pattern="[0-9]{2,2}" maxlength="2" style="max-width: 46px;"></span>
                                        </div>
                                        <div id="div-input-group" data-validate="dosdigitos">
                                            <span class="input-group-addon default"><input type="text" class="input-codigo" name="cod2-new" id="validate-text" placeholder="0-9" pattern="[0-9]{2,2}" maxlength="2"  style="max-width: 46px;"></span>
                                        </div>
                                        <div id="div-input-group" data-validate="uncaracter">
                                            <span class="input-group-addon default"><input type="text" class="input-codigo" name="cod3-new" id="validate-text" placeholder="a-z" pattern="[a-zA-Z]{1,1}" maxlength="1" style="max-width: 46px;"></span>
                                        </div>
                                        <div id="div-input-group" data-validate="cuatrodigitos">
                                            <span class="input-group-addon default" style="border-radius: 10px;"><input type="text" class="input-codigo" name="cod4-new" id="validate-text" placeholder="0-9" maxlength="4" pattern="[0-9]{4,4}" style="max-width: 72px;"></span>
                                        </div>
                                        <div id="div-input-group" data-validate="undigito">
                                            <span class="input-group-addon default"><input type="text" class="input-codigo" name="cod5-new" id="validate-text" placeholder="0-9" maxlength="1" pattern="[0-9]{1,1}" style="max-width: 46px;"></span>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-horizontal form-group">
                                    <label class="text-verde">Descripción de Expediente:</label>
                                    <textarea class="form-control input-registrar" id="text-area-desc" name="descripcion" required maxlength="120"></textarea>
                                </div>
                                <div class="form-horizontal form-group">
                                    <label class="text-verde">Observaciones de Registro:</label>
                                    <textarea class="form-control input-registrar" id="text-area-obse" name="observaciones" maxlength="120"></textarea>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-md btn-primary btn-block borrar-button btn-verde" type="submit" disabled><strong>Modificar</strong></button>
                                    <div id="mensaje-alert">
                                        <!--Contenido de la respuesta de Modificación de expediente enviado desde Usuario,js-->
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
