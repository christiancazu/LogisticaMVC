<div class="container-fluid">
    <nav class="navbar responsive navbar-default navbar-fixed-top navbar-panelusuario">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!--LLama al Funcion actualizar que redirija al ControlPanel mediante tabs-lateral.js -->
                <a href="#controlpanel" class="navbar-brand" onclick="actualizar();"><img class="img-cabecera" src="<?= IMG?>logo/logopanel2.png" alt=""></a>
                <a href="#controlpanel" class="navbar-brand" onclick="actualizar();">Logística</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse pull-right" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="nav-item">
                        <!--Formato de Fecha : Nombre de Día, Mes-->
                        <a href="#">
                            <?= 
                                $fecha                               
                            ?>
                        </a>
                    </li>
                    <!--<li class="nav-item"><a href="#"><i class="fa fa-user fa-border"></i></a></li>--> 

                    <li class="dropdown">
                        <a class="dropdown-toggle color-blanco" data-toggle="dropdown" href="#"><i class="fa fa-user-circle"></i>
                           
                            <!--Muestra El Nombre de sesión Simplificado--> 
                            <?= $this->session->userdata("nomyape") ?>
                            
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#" id="cambiar-pass"><i class="fa fa-user fa-border"></i>Cambiar Contraseña</a></li>
                            <li><a href="#" id="salir"><i class="fa fa-sign-out fa-border"></i>Salir</a></li>          
                        </ul>
                    </li> 
                </ul>
            </div><!-- /.navbar-collapse -->    
        </div>
    </nav>
</div>