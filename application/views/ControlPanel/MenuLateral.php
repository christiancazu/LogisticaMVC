<div class="container-fluid panel-tab" id="content">
    <ul id="tabs-lateral" data-tabs="tabs">
         <!--Tabs de MenuLateral-->
        <?php
            foreach($tabslateral as $array) {
            echo $array;
            }
        ?>

    </ul>
    <div id="my-tab-content" class="tab-content">
        <!--Carga de módulos según el tipo de usuario identificado-->
        <?php
            foreach($vistas as $array) {
            echo $array;
            }
        ?>
    </div>
</div>