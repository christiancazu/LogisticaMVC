<div class="container tab-pane" id="recibir">
    <div class="row">
        <div class="col-sm-6 col-md-6 col-md-offset-3">
            <div class="panel bg-blanco">
                <form class="form" action="<?= base_url()?>CtrlControlPanel/EnviarExpediente" method="post">
                    <div class="panel-head bg-azul">
                        <h4 class="text-center text-blanco">Recepción de Expediente</h4>
                    </div>
                    <div class="panel-body">                        
                        <div class="form-horizontal" >
                            <div class="form-group">
                                <label class="control-label" for="requestid">Código de Expediente :</label>
                            </div>
                        </div>
                        <div class="form-inline" >
                            <div class="form-group">                   
                                <div class="input-group" data-validate="dosdigitos" >
                                    <span class="input-group-addon default"><input type="text" class="form-control input-control" name="cod1" id="validate-text" placeholder="0-9"  maxlength="2" required style="max-width: 46px;"></span>
                                </div>
                            </div>
                            <div class="form-group">       			
                                <div class="input-group" data-validate="dosdigitos">
                                    <span class="input-group-addon default"><input type="text" class="form-control input-control" name="cod2" id="validate-text" placeholder="0-9" maxlength="2" required style="max-width: 46px;"></span>						
                                </div>
                            </div>
                            <div class="form-group">       			
                                <div class="input-group" data-validate="uncaracter" >
                                    <span class="input-group-addon default" ><input type="text" class="form-control input-control" name="cod3" id="validate-text" placeholder="a-z" maxlength="1" required style="max-width: 46px;"></span>						
                                </div>
                            </div>
                            <div class="form-group" style="border-radius: 10px;">        			
                                <div class="input-group" data-validate="cincodigitos">
                                    <span class="input-group-addon default" style="border-radius: 10px;"><input type="text" class="form-control input-control" name="cod4" id="validate-text" placeholder="0-9" maxlength="5" required style="max-width: 72px;" ></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-horizontal" >
                            <fieldset class="panel panel-fieldset">
                                <legend class="panel-heading text-azul">Responsable</legend>
                                <div class="form-horizontal" >
                                    <div class="form-group" style="margin-bottom:0px;">
                                        <label class="control-label" for="requestid"><p>Nombres :</p></label> 
                                        <input name="nomrespo" pattern="^[a-zA-Z\s]+$" maxlength="30" placeholder="Nombres de responsable" class="form-control" id="input-registrar" required type="text">
                                    </div>
                                    <div class="form-group" style="margin-bottom:0px;">
                                        <label class="control-label" for="requestid"><p>Apellidos :</p></label> 
                                        <input name="aperespo" pattern="^[a-zA-Z\s]+$" maxlength="30" placeholder="Apellidos de responsable" class="form-control" id="input-registrar" required type="text">
                                    </div><br>
                                </div>
                            </fieldset>
                            <div class="form-group">
                                <label class="control-label" for="dis"><p>Observaciones :</p></label>
                                <textarea class="form-control input-registrar" id="border-round" name="observaciones" style="height: 100px;"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <center>
                                <button class="btn btn-md btn-primary bg-azul text-blanco" type="submit" disabled>
                                    <strong>Recepcionar</strong></button> 
                            </center>
                        </div>
                    </div>
                    </div>
                </form>
        </div>
    </div>
</div>