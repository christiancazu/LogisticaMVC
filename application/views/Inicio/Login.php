<div class="bg-essalud">
    <div class="container">       
        <div class="col-sm-4 col-sm-offset-4">
            <div class="form-login-logistica">
                <div class="login-head">
                    <h2>Logística</h2>
                    <img class="img-login-logistica" src="<?= IMG?>logo/logopanel2.png">
                </div>
                <!--Formulario de Login LLama al Controlador Login-->
                <form class="form-horizontal" method="POST" id="form-login" 

                      action="<?= base_url()?>Login">                   

                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>                   
                            <input type="text" class="form-control" name="usuario" placeholder="Usuario" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock fa-fw"></i></span>                   
                            <input type="password" class="form-control" name="password" placeholder="Contraseña" required/>
                        </div>
                    </div>                                       
                    <div class="form-group">
                        <button class="btn btn-md btn-primary btn-block borrar-button" type="submit">
                            <strong>Iniciar Sesión</strong></button>
                        <div id="mensaje-alert-login">
                            <!--Contenido de la respuesta de LOGIN enviado desde login.js-->
                        </div>
                    </div>
                </form>
            </div>            
        </div>
    </div>
</div>
<div class="navbar navbar-default navbar-fixed-bottom footer-login">   
    <div class="container">
        <h4 class="text-center">© 2017 - Control de Expedientes</h4>
        <h4 class="text-center">Essalud - Logística</h4>            
    </div>  
</div>