<div class="container-fluid panel-tab" id="content">
    <ul id="tabs-lateral" data-tabs="tabs">

        <li><a href="#controlpanel" class="xxx" onclick="Actualizar();" data-toggle="tab"><span>Panel &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img class="img-menulateral" src="<?php echo IMG?>iconos/paneldecontrol.png" alt=""></span></a></li>

        <li><a href="#registrar" data-toggle="tab"><span>Registrar &nbsp;&nbsp;<img class="img-menulateral" src="<?php echo IMG?>iconos/registrar2.png" alt=""></span></a></li>

        <li><a href="#consultar" data-toggle="tab"><span>Consultar &nbsp;<img class="img-menulateral" src="<?php echo IMG?>iconos/consultar.png" alt=""></span></a></li>

        <li><a href="#enviar" data-toggle="tab"><span>Enviar &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img class="img-menulateral" src="<?php echo IMG?>iconos/enviar.png" alt=""></span></a></li>

        <li><a href="#recibir" data-toggle="tab"><span>Recibir &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img class="img-menulateral" src="<?php echo IMG?>iconos/recibir.png" alt=""></span></a></li>

        <li><a href="#reporte" data-toggle="tab"><span>Reporte &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img class="img-menulateral" src="<?php echo IMG?>iconos/reporte.png" alt=""></span></a></li>

        <li><a href="javascript:void(0)" data-toggle="tab" id="salir"><span>Salir &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img class="img-menulateral" src="<?php echo IMG?>iconos/logout.png" alt=""></span></a></li>

    </ul>
    <div id="my-tab-content" class="tab-content">
        <!--Tabs de MenuLateral [PaneldeControl/Paneles]-->
        <?= $ControlPanel ?>
        <?= $Registrar ?>
        <?= $Consultar ?>
        <?= $Enviar ?>
        <?= $Recibir ?>
        <?= $Reporte ?>
        <?= $Salir ?>        
    </div>
</div>