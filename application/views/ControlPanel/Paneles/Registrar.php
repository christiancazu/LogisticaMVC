<div class="container tab-pane active" id="registrar">
    <div class="row">
        <div class="col-sm-6 col-md-6 col-md-offset-3">
            <div class="panel-registrar bg-blanco">
                <form class="form" action="<?= base_url()?>Usuario/RegistrarExpediente" method="post" id="form-regexp">
                    <div class="panel-head bg-azul">
                        <h4 class="text-center text-blanco">Registro de Expediente</h4>
                    </div>
                    <div class="panel-body">
                        <div class="form-horizontal">
                            <div class="form-group">
                                <label class="control-label" for="requestid">Código de Expediente :</label>
                            </div>
                        </div>
                        <div class="form-inline form-codigo">
                            <div class="input-group" data-validate="dosdigitos">
                                <span class="input-group-addon default"><input type="text" class="input-codigo" name="cod1" id="validate-text" placeholder="0-9"  maxlength="2" required style="max-width: 46px;"></span>
                            </div>
                            <div class="input-group" data-validate="dosdigitos">
                                <span class="input-group-addon default"><input type="text" class="input-codigo" name="cod2" id="validate-text" placeholder="0-9" maxlength="2" value="18" required style="max-width: 46px;"></span>
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
                        <div class="form-horizontal">
                            <div class="form-group">
                                <label class="control-label" for="dis"><p>Descripción :</p></label>
                                <textarea class="form-control input-registrar" id="border-round" name="descripcion" style="height: 100px;"></textarea>
                            </div>
                        </div>
                        <div class="form-group">

                            <button class="btn btn-md btn-primary btn-block bg-azul text-blanco" type="submit" disabled>
                                <strong>Registrar</strong></button>

                        </div>
                        <div class="form-group">
                            <div class="alert alert-danger alert-dismissable fade-in alert-error hidden" id="alert-error">
                                <a href="#" class="close" id="alert-close">&times;</a>
                                <strong> Error </strong> <i class="fa fa-times-circle fa-2x"></i> 
                                <p>El Expediente ya está Registrado.</p>     
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="alert alert-success alert-dismissable fade-in  alert-correcto hidden" id="alert-correcto">
                                <a href="#" class="close" id="alert-closex">&times;</a>
                                <strong> Correcto </strong> <i class="fa fa-check fa-2x"></i>
                                
                                <p>El Expediente ha sido Registrado.</p>     
                            </div>
                        </div>
                    </div>
                    </div>
                </form>
        </div>
    </div>
</div>
