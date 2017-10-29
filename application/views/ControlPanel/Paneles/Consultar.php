<div class="container tab-pane" id="consultar">
    <div class="row">
        <div class="col-sm-6 col-md-6 col-md-offset-3">
            <div class="panel bg-blanco">
                <div class="panel-head bg-azul">
                    <h4 class="text-center text-blanco">Consulta de Expedientes</h4>
                </div>
                <div class="panel-body">                        
                    <div class="form-horizontal">
                        <div class="form-group">
                            <label class="control-label" for="requestid">Ingrese Consulta :</label>
                        </div>
                    </div>
                    <div class="form-horizontal">

                        <div class="form-group">
                            <form class="form" action="#" method="get">                 
                                <!-- USE TWITTER TYPEAHEAD JSON WITH API TO SEARCH -->
                                <input class="form-control" id="system-search" name="q" placeholder="Consultar Expediente" required>
                            </form>
                        </div>
                    </div>
                    <!-- <div class="form-inline">
<div class="form-group">                   
<div class="input-consultar" data-validate="dosdigitos">
<span class="input-consultar-addon default"><input type="text" class="form-control input-control" name="cod1" id="validate-text" placeholder="0-9"  maxlength="2" style="max-width: 66px;"></span>
</div>
</div>
<div class="form-group">       			
<div class="input-consultar" data-validate="dosdigitos">
<span class="input-consultar-addon default"><input type="text" class="form-control input-control" name="cod2" id="validate-text" placeholder="0-9" maxlength="2" style="max-width: 66px;"></span>						
</div>
</div>
<div class="form-group">       			
<div class="input-consultar" data-validate="uncaracter">
<span class="input-consultar-addon default"><input type="text" class="form-control input-control" name="cod3" id="validate-text" placeholder="A-Z" maxlength="1" style="max-width: 66px;"></span>						
</div>
</div>
<div class="form-group">        			
<div class="input-consultar" data-validate="cincodigitos">
<span class="input-consultar-addon default"><input type="text" class="form-control input-control" name="cod4" id="validate-text" placeholder="0-9" maxlength="5" style="max-width: 132px;"></span>	
</div>
</div>
</div><br>-->
                    <!--<div class="form-horizontal">
<div class="form-group">
<label for="country" class="control-label">	
Responsable :
</label>
<div class="controls">
<select name="country" id="country">
<option value=""></option>
<option value="AR">1</option>
<option value="AU">2</option>
<option value="AT">3</option>			
</select>
</div>
</div>
<div class="form-group">
<label class="control-label" for="requestid"><p>Usuario :</p></label> 
<input name="usuario" placeholder="usuario" class="form-control" id="input-registrar" type="combobox">
</div>
<div class="form-group">
<label class="control-label" for="requestid"><p>Responsable :</p></label> 
<input name="usuario" placeholder="usuario" class="form-control" id="input-registrar" type="text">
</div>                            
</div>-->
                    <!--<div class="form-group">
<label class=" control-label" for="submit"></label><center>
<button class="btn btn-lg btn-primary bg-azul text-blanco" type="submit">
<i class="fa fa-search fa-2x fa-fw"></i><strong class="lead"> Consultar</strong></button> 
</center>
</div>-->
                </div>
            </div>
        </div>
        <div class="container">
        <div class="col-sm-6 col-md-6 col-md-offset-1">
            <table class="table table-list-search centered bordered striped" id="table-consultar" style="visibility:hidden;">
                <thead>
                    <tr>                        
                        <th>Código expediente</th>
                        <th>Registrado por</th>
                        <th>Fecha de registro</th>                        
                        <th>Monto</th>
                        <th>Estado</th>
                        <th>Observaciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php  
                    foreach ($exped->result() as $row) {
                        echo "<tr>
                        <td>".$row->vchrCodExpe."</td>                       
                        <td>Christian Carrillo</td>
                        <td>".$row->tmsFecRegExpe."</td>                        
                        <td>".$row->dblMontoExpe."</td>
                        <td>No Disponible</td>
                        
                        <td>".$row->ltxtDescExpe."</td>                         
                        </tr>";
                    }
                    ?>
                </tbody>
            </table>   
        </div>
</div>
    </div>
</div>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content modal-consultar">
            <div class="modal-header">
                <span class="close" data-dismiss="modal"><i class="glyphicon glyphicon-remove-sign"></i></span>
                <h3 class="modal-title">Aviso</h3>
            </div>
            <div class="modal-body">
                <h3>La Consulta no encontro resultados</h3>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-lg btn-default bg-azul text-blanco lead" data-dismiss="modal">Aceptar</button>
            </div>
        </div>

    </div>
</div>