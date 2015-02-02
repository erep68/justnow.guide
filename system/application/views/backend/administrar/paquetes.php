<h1 class="page-header">Paquetes de Productos</h1>
<h2 class="sub-header"></h2>
<div class="button-area pull-right clearfix">
    <a class="btn btn-primary ">Crear Paquete</a>
</div>
<div class="clearfix"></div>
<div class="table-responsive">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Nombre</th>
          <th>Descripción</th>
          <th>Precio</th>
          <th>Estado</th>
          <th>Opciones</th>
        </tr>
      </thead>
      <tbody>
          <?php foreach($object as $o){ ?>
        <tr>
            <td><?php echo $o->name?></td>
            <td><?php echo $o->description?></td>
            <td><?php echo $o->price?></td>
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

