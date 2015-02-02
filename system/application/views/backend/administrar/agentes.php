
<h1 class="page-header">Agentes</h1>
<h2 class="sub-header"></h2>
<div class="button-area pull-right clearfix">
    <a href = "<?php echo base_url();?>backend/administrar/newAgent" class="btn btn-primary ">Crear Agente</a>
</div>
<div class="clearfix"></div>
<div class="table-responsive">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Usuario</th>
          <th>Nombre</th>
          <th>Apellido</th>
          <th>Email</th>
          <th>Estado</th>
          <th>Opciones</th>
        </tr>
      </thead>
      <tbody>
          <?php foreach($object as $o){ ?>
        <tr>
            <td><?php echo $o->username?></td>
            <td><?php echo $o->name?></td>
            <td><?php echo $o->last_name?></td>
            <td><?php echo $o->email?></td>
            <td>
                <?php if($o->active == 1) { ?>
                    <span class="btn btn-xs btn-info">Activo</span>
                <?php }else{ ?>
                    <span class="btn btn-xs btn-danger">Inactivo</span>
                <?php }?>
            </td>
            <td>
                <a href = "<?php echo base_url() .'backend/administrar/updateAgente/'. $o->id;?>" class="btn btn-xs btn-info ">Editar</a>
            </td>
        </tr>
        <?php }?>
      </tbody>
    </table>
</div>


