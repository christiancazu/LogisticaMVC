<div class="container-fluid tab-pane" id="controlpanel">
    <div class="row">
        <div class="col-sm-8 col-md-8 col-md-offset-2">
            <div class="controlpanel bg-blanco">                
                <div class="panel-head bg-azul">
                    <h4 class="text-center text-blanco">Panel de Control</h4>
                    <!--<h5 class="text-blanco">
                        <?= $this->session->userdata("nombres") ?>
                        <?= $this->session->userdata("apellidos") ?>
                        <?= $this->session->userdata("nomyape") ?>
                    </h5>-->
                </div>
                <div class="panel-body">
                    <div class="container-fluid">
                        <div class="row text-center">                
                            <a href="#registrar" data-toggle="tab">
                                <div class="col-sm-4">
                                    <div class="pricing-wrapper">
                                        <div class="pricing-table">
                                            <div class="price-wrap">
                                                <span class="price"><img class="img-controlpanel" src="<?php echo IMG?>iconos/registrar2.png" alt=""></span>
                                            </div>
                                            <span class="type">
                                                REGISTRAR EXPEDIENTE
                                            </span>           
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="#consultar" data-toggle="tab">
                                <div class="col-sm-4">
                                    <div class="pricing-wrapper ">
                                        <div class="pricing-table">
                                            <div class="price-wrap">
                                                <span class="price"><img class="img-controlpanel" src="<?php echo IMG?>iconos/consultar.png" alt=""></span>
                                            </div>
                                             <span class="type">
                                                CONSULTAR EXPEDIENTE
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="#enviar" data-toggle="tab">
                                <div class="col-sm-4">
                                    <div class="pricing-wrapper">
                                        <div class="pricing-table">
                                            <div class="price-wrap">
                                                <span class="price"><img class="img-controlpanel" src="<?php echo IMG?>iconos/enviar.png" alt=""></span>
                                            </div>
                                            <span class="type">
                                                ENVIAR<br>EXPEDIENTE
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </a>          
                        </div>   
                        <div class="row text-center">                           
                            <a href="#recibir" data-toggle="tab">
                                <div class="col-sm-4">
                                    <div class="pricing-wrapper">
                                        <div class="pricing-table">
                                            <div class="price-wrap">
                                                <span class="price"><img class="img-controlpanel" src="<?php echo IMG?>iconos/recibir.png" alt=""></span>
                                            </div>
                                            <span class="type">
                                                RECIBIR <br>EXPEDIENTE
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="#reporte" data-toggle="tab">
                                <div class="col-sm-4">
                                    <div class="pricing-wrapper">
                                        <div class="pricing-table">
                                            <div class="price-wrap">
                                                <span class="price"><img class="img-controlpanel" src="<?php echo IMG?>iconos/reporte.png" alt=""></span>
                                            </div>
                                             <span class="type">
                                                REPORTE DE EXPEDIENTE
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="javascript:void(0)" onclick="PanelSalir();"  id="panel-salir">
                                <div class="col-sm-4">
                                    <div class="pricing-wrapper">
                                        <div class="pricing-table">
                                            <div class="price-wrap">
                                                <span class="price"><img class="img-controlpanel" src="<?php echo IMG?>iconos/logout.png" alt=""></span>
                                            </div>
                                            <span class="type">
                                                <br>SALIR
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div> 
                </div>
            </div>               
        </div>
    </div>
</div>