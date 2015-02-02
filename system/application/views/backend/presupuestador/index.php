<h1 class="page-header">Presupuestador</h1>
A continuación se muestra un listado de todos los presupuestadores creados en el sistema
<h2 class="sub-header">Todos</h2>
<div class="button-area pull-right clearfix">
    <a class="btn btn-primary ">Crear Nuevo Presupuestador</a>
</div>
<div class="clearfix"></div>
<div class="table-responsive">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Nombre</th>
          <th>Descripción</th>
          <th>Tipo</th>
          <th>Encuesta</th>
          <th>Visualización</th>
          <th>Pregunta Abierta</th>
          <th>Registrar Cliente</th>
          <th>Aceptar Pago</th>
          <th>Copia Descargable</th>
          <th>Estado</th>
          <th>Opciones</th>
        </tr>
      </thead>
      <tbody>
          <?php foreach($object as $o){ ?>
        <tr>
            <td><?php echo $o->name?></td>
            <td><?php echo $o->description?></td>
            <td><?php echo ($o->type == 0)? 'Presupuesto Aproximado' : 'Presupuesto Cerrado'?></th>
            <td><?php echo ($o->poll == 0)? 'No' : 'Sí'?></th>
            <td><?php echo ($o->display == 0)? 'Pricing Table' : 'Shopping Cart'?></th>
            <td><?php echo ($o->open_question == 0)? 'No' : 'Sí'?></th>
            <td><?php echo ($o->register == 0)? 'No' : 'Sí'?></th>
            <td><?php echo ($o->payment == 0)? 'No' : 'Paypal'?></th>
            <td><?php echo ($o->download == 0)? 'No' : 'PDF/EMAIL'?></th>
            <td>
                <?php if($o->active == 1) { ?>
                    <span class="btn btn-xs btn-info">Activo</span>
                <?php }else{ ?>
                    <span class="btn btn-xs btn-danger">Inactivo</span>
                <?php }?>
            </td>
            <td>
                <span class="btn btn-xs btn-info">Editar</span>
            </td>
        </tr>
        <?php }?>
      </tbody>
    </table>
</div>
