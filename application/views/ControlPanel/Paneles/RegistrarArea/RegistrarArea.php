<div class="container tab-pane fade in" id="registrararea">
    <div class="row">
        <div id="tabs-enviar">
            <ul class="nav nav-pills">
                <li class="color-blue col-xs-3 col-xs-offset-3 tabs-gestion-expediente active">
                    <a href="#tab-regarea" data-toggle="tab">Registrar</a>
                </li>
                <li class="color-green col-xs-3 tabs-gestion-expediente">
                    <a href="#tab-modregarea" data-toggle="tab">Modificar</a>
                </li>
            </ul>
            <div class="tab-content clearfix">
                <!--TAB-ENVIAR-->
                <div class="tab-pane tab-registrar fade in col-sm-6 col-sm-offset-3 active" id="tab-regarea">
                    <div class="row">
                        <form class="form" action="<?= base_url()?>Admin/RegistrarAreaTrabajo" method="post" id="form-regarea">
                            <div class="panel-head bg-azul">
                                <h4 class="text-center">Datos de Registro</h4>
                            </div>
                            <div class="panel-body">
                                <label class="text-azul">Nueva Area:</label>
                                <div class="row">
                                    <div class="col-xs-8 col-xs-offset-2">
                                        <div class="form-group">
                                            <input class="form-control <text-center></text-center>" name="area" required placeholder="area" maxlength="30" style="font-size:20px"/>
                                        </div>
                                    </div>                                   
                                </div>
                                <div id="comprobacion-area"><br>
                                    <!--  muestra mensaje si es valido el expediente para registro-->
                                </div>
                                <label class="text-azul">Areas Existentes:</label>                   
                                <div class="row">
                                    <div class="col-xs-8 col-xs-offset-2">
                                        <div class="form-group">                                            
                                            <select class="selectpicker form-control" id="selectareas">
                                               <!--Cargar las areas de trabajo desde expediente.js-->   
                                            </select>
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
                <div class="tab-pane tab-modificar fade in col-sm-6 col-sm-offset-3" id="tab-modregarea">
                    <div class="row">
                        <form class="form" action="<?= base_url()?>Admin/ModificarRegistrarAreaTrabajo" method="post" id="form-regusu-mod">
                            <div class="panel-head bg-verde">
                                <h4 class="text-center">Datos de Modificación</h4>
                            </div>
                            <div class="panel-body">
                                <label class="text-azul">Area:</label>
                                <div class="row">
                                    <div class="col-xs-8 col-xs-offset-2">
                                        <div class="form-group">
                                            <input class="form-control <text-center></text-center>" name="area" required placeholder="area" maxlength="30" style="font-size:20px"/>
                                        </div>
                                    </div>                                   
                                </div>
                                <div id="comprobacion-area"><br>
                                    <!--  muestra mensaje si es valido el expediente para registro-->
                                </div>
                                <label class="text-azul">Nueva Area:</label>
                                <div class="row">
                                    <div class="col-xs-8 col-xs-offset-2">
                                        <div class="form-group">
                                            <input class="form-control <text-center></text-center>" name="areanew" required placeholder="nueva area" maxlength="30" style="font-size:20px"/>
                                        </div>
                                    </div>                                   
                                </div>
                                <label class="text-azul">Areas Existentes:</label>                   
                                <div class="row">
                                    <div class="col-xs-8 col-xs-offset-2">
                                        <div class="form-group">                                            
                                            <select class="selectpicker form-control" id="selectareas">
                                               <!--Cargar las areas de trabajo desde expediente.js-->   
                                            </select>
                                        </div>
                                    </div>                                    
                                </div>                                
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <button class="btn btn-lg btn-primary bg-verde btn-block borrar-button" type="submit" type="submit">
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