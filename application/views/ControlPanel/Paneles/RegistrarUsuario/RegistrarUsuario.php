<div class="container tab-pane fade in" id="registrarusuario">
    <div class="row">
        <div id="tabs-enviar">
            <ul class="nav nav-pills">
                <li class="color-blue col-xs-3 col-xs-offset-3 tabs-gestion-expediente active">
                    <a href="#tab-regusu" data-toggle="tab">Registrar</a>
                </li>
                <li class="color-green col-xs-3 tabs-gestion-expediente">
                    <a href="#tab-modregusu" data-toggle="tab">Modificar</a>
                </li>
            </ul>
            <div class="tab-content clearfix">
                <!--TAB-ENVIAR-->
                <div class="tab-pane tab-registrar fade in col-sm-6 col-sm-offset-3 active" id="tab-regusu">
                    <div class="row">
                        <form class="form" action="<?= base_url()?>Admin/RegistrarUsuario" method="post" id="form-regusu">
                            <div class="panel-head bg-azul">
                                <h4 class="text-center">Datos de Registro</h4>
                            </div>
                            <div class="panel-body">
                                <label class="text-azul">DNI de usuario:</label>
                                <div class="row">
                                    <div class="col-xs-4 col-xs-offset-4">
                                        <div class="form-group">
                                            <input class="form-control text-center" name="dniusu" required placeholder="dni" pattern="[0-9]{8,8}" maxlength="8" style="font-size:20px"/>
                                        </div>
                                    </div>                                   
                                </div>
                                <div id="comprobacion-dni"><br>
                                    <!--  muestra mensaje si es valido el expediente para registro-->
                                </div>
                                <label class="text-azul">Datos del Usuario:</label>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <input class="form-control" name="nombresusu" required placeholder="Nombres" maxlength="30"/>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <input class="form-control" name="apellidosusu" required placeholder="Apellidos" maxlength="30"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label class="text-azul">Tipo de Usuario: &nbsp;</label><a href="#modal-tiposusu" data-toggle="modal" data-target="#modal-tiposusu" class="tips">&nbsp;?&nbsp;</a>
                                            <select class="selectpicker form-control" name="tipousu" required id="selecttipousu">
                                                <!--Cargar las areas de trabajo desde expediente.js-->   
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label class="text-azul">Area del Usuario:</label>
                                            <select class="selectpicker form-control" name="areausu" required id="selectareas">
                                                <!--Cargar las areas de trabajo desde expediente.js-->   
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <label class="text-azul">Observaciones de Registro:</label>
                                            <textarea class="form-control" name="observaciones"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <button class="btn btn-lg btn-primary btn-block borrar-button" type="submit" type="submit">
                                            <strong>Registrar</strong></button>
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
                <div class="tab-pane tab-modificar fade in col-sm-6 col-sm-offset-3" id="tab-modregusu">
                    <div class="row">
                        <form class="form" action="<?= base_url()?>Admin/ModificarRegistrarUsuario" method="post" id="form-regusu-mod">
                            <div class="panel-head bg-verde">
                                <h4 class="text-center">Datos de Modificación</h4>
                            </div>
                            <div class="panel-body container-fluid">
                                <label class="text-verde">DNI de usuario:</label>
                                <div class="row">
                                    <div class="col-xs-4 col-xs-offset-4">
                                        <div class="form-group">
                                            <input class="form-control text-center" name="dniusu" required placeholder="dni" pattern="[0-9]{8,8}" maxlength="8" style="font-size:20px"/>
                                        </div>
                                    </div>                                   
                                </div>
                                <div id="comprobacion-dni"><br>
                                    <!--  muestra mensaje si es valido el usuario para registro-->
                                </div>
                                <div class="row row-center">
                                    <div class="col-xs-6 col-xs-offset-3">
                                        <div class="form-group">
                                            <label>                                       
                                                <input type="checkbox" class="cbx-input" name="" value="" id="cbx-dni-new"/>
                                                <span class="cbx-dni">Cambiar N° de DNI</span>
                                            </label>
                                        </div>
                                    </div> 
                                </div>
                                <div id="dni-usu-new" class="hidden">
                                <label class="text-verde">Nuevo DNI de usuario:</label>
                                <div class="row">
                                    <div class="col-xs-4 col-xs-offset-4">
                                        <div class="form-group">
                                            <input class="form-control text-center" name="dniusunew" placeholder="dni" pattern="[0-9]{8,8}" maxlength="8" style="font-size:20px"/>
                                        </div>
                                    </div>                                   
                                </div>
                                </div>
                                <label class="text-verde">Datos de Usuario:</label>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <input class="form-control" name="nombresusu" required placeholder="Nombres" maxlength="30"/>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <input class="form-control" name="apellidosusu" required placeholder="Apellidos" maxlength="30"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label class="text-verde">Tipo de Usuario: &nbsp;</label>
                                            <a href="#modal-tiposusu" data-toggle="modal" data-target="#modal-tiposusu" class="tips" style="color:#33b7a3; border:2px solid #33b7a3">&nbsp;?&nbsp;</a>
                                            <select class="selectpicker form-control" name="tipousu" required id="selecttipousu">
                                                <!--Cargar las areas de trabajo desde expediente.js-->   
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label class="text-verde">Area del Usuario:</label>
                                            <select class="selectpicker form-control" name="areausu" required id="selectareas">
                                                <!--Cargar las areas de trabajo desde expediente.js-->   
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row row-center">                                    
                                    <div class="col-xs-6 col-xs-offset-3">
                                        <div class="form-group">
                                            <label class="text-verde">Usuario Activo :</label>
                                            <div class="switch-field">
                                                <input type="radio" id="switch_left" name="activosiono" value="1" required/>
                                                <label for="switch_left">Si</label>
                                                <input type="radio" id="switch_right" name="activosiono" value="0"/>
                                                <label for="switch_right">No</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <label class="text-verde">Observaciones de Registro:</label>
                                            <textarea class="form-control" name="observaciones"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <button class="btn btn-lg btn-primary btn-block bg-verde borrar-button" type="submit" type="submit">
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
<div class="modal fade" id="modal-registrarusu" role="dialog">
    <div class="modal-dialog modal-lg">       
        <div class="modal-content modal-consultar">
            <div class="modal-header">
                <span class="close" data-dismiss="modal"><i class="glyphicon glyphicon-remove-sign"></i></span>
                <h3 class="modal-title">Atención</h3>
            </div>
            <div class="modal-body">
                <h3 class="text-azul">Recuerde que si elije NO, estará desactivando el acceso del usuario y no podrá ingresar al sistema.</h3>               
            </div>
            <div class="modal-footer">                
                <button type="button" class="btn btn-md btn-default bg-azul text-blanco lead pull-right" data-dismiss="modal"><strong>Cerrar</strong></button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-tiposusu" role="dialog">
    <div class="modal-dialog modal-lg">       
        <div class="modal-content modal-consultar">
            <div class="modal-header">
                <span class="close" data-dismiss="modal"><i class="glyphicon glyphicon-remove-sign"></i></span>
                <h3 class="modal-title">Tipos de Usuario</h3>
            </div>
            <div class="modal-body">
                <h3 class="text-azul">Usuario Total</h3> 
                <h3 class="text-azul">Usuario Parcial</h3> 
                <h3 class="text-azul">Usuario Envios</h3> 
                <h3 class="text-azul">Usuario Recepciones</h3>
                <h3 class="text-azul">Usuario Consultas</h3>               
            </div>
            <div class="modal-footer">                
                <button type="button" class="btn btn-md btn-default bg-azul text-blanco lead pull-right" data-dismiss="modal"><strong>Cerrar</strong></button>
            </div>
        </div>
    </div>
</div>