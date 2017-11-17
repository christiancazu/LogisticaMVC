<div class="modal fade" id="modal-cambiar-pass" role="dialog">
    <div class="modal-dialog">     
        <div class="modal-content modal-consultar">
            <div class="modal-header">
                <span class="close" data-dismiss="modal"><i class="glyphicon glyphicon-remove-sign"></i></span>
                <h3 class="modal-title">Perfil de Usuario</h3>
            </div>
            <form class="form" action="<?= base_url()?>Usuario/CambiarPassword" id="form-cambiar-pass" method="post">
                <div class="modal-body">               
                    <h3 class="text-azul">Cambio de Contraseña</h3><br>
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label class="lbl-cambiar-pass pull-right">Actual contraseña :</label>
                            </div>
                        </div>
                        <div class="col-xs-5">
                            <div class="form-group">
                                <input type="password" class="form-control" name="oldpass" required maxlength="30"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label class="lbl-cambiar-pass pull-right">Nueva contraseña :</label>
                            </div>
                        </div>
                        <div class="col-xs-5">
                            <div class="form-group">
                                <input type="password" class="form-control" name="newpass" required maxlength="30"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label class="lbl-cambiar-pass pull-right">Confirme nueva contraseña :</label>
                            </div>
                        </div>
                        <div class="col-xs-5">
                            <div class="form-group">
                                <input type="password" class="form-control" name="newpassconfirm" required maxlength="30"/>
                            </div>
                        </div>
                    </div>
                </div>            
                <div class="modal-footer">
                    <div class="row">
                        <div class="col-xs-6 col-xs-offset-3">
                            <button class="btn btn-lg btn-primary btn-block borrar-button" type="submit">
                                <strong>Cambiar Contraseña</strong></button>
                            <div id="mensaje-alert">
                                <!--Contenido de la respuesta de cambio de contraseña enviado desde Usuario.js-->
                            </div>
                        </div>                    
                    </div>        
                </div>
            </form>
        </div>
    </div>
</div>