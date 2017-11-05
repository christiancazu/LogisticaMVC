<div class="container tab-pane fade in" id="controlpanel">
    <div class="row">
        <div class="col-sm-8 col-md-offset-2">
            <div class="controlpanel-modulos">                
                <div class="panel-head bg-azul controlpanel-head">
                    <h4 class="text-center">Panel de Control</h4>
                </div>
                <div class="panel-body">
                    <div class="container-fluid">
                        <div class="row" id="cargar-cp">            
                            <?php
                                foreach ($modulos as $array) {
                                    echo $array;
                                }
                            ?>
                        </div><br>                          
                    </div>
                </div> 
            </div>
        </div>               
    </div>
</div>