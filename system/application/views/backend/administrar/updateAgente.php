<h1 class="page-header">Modificar Agente</h1>
<h2 class="sub-header"></h2>
<div class="clearfix"></div>
<div class="table-responsive">
<?php $data = array('id'=>'fomulari', 'class'=>'form_default', 'role' => 'form');
  echo form_open('',$data);?>
<table>
  <tr>
    <td>
      <div class="input-group input-group-lg form_control">
        <span class="input-group-addon">Nombre</span>
      <input type="text" class="form-control input-lg " value="<?php echo $object->name;?>" name="name" id="name" placeholder="Nombre del Agente">
      </div>
    </td>
    <td>
      <div class="input-group input-group-lg form_control">
        <span class="input-group-addon">Apellidos</span>
        <input type="text" class="form-control input-lg " value="<?php echo $object->last_name;?>" name="last_name" id="last_name" placeholder="Apellidos del Agente">
      </div>
    </td>
    </tr>
    <tr>
    <td>
      <div class="input-group input-group-lg form_control">
        <span class="input-group-addon">User</span>
        <input type="text" class="form-control input-lg " value="<?php echo $object->username;?>" name="username" id="username" placeholder="Nombre de Usuario">
      </div>
    </td>
  </tr>
  <tr>
    <td>
      <div class="input-group input-group-lg form_control">
        <span class="input-group-addon">E-mail</span>
        <input type="text" class="form-control input-lg " value="<?php echo $object->email;?>" name="email" id="email" placeholder="E-mail del Agente">
      </div>
    </td>
    <td>
      <label class="checkbox">
        <?php $valor = ''; if($object->active)$valor = 'checked="checked"';?>
        <input type="checkbox" name = "active" id="active" <?php echo $valor;?>> Activo
      </label>
    </td>
  </tr>
</table>
   <button class="btn btn-primary" type="submit">Guardar</button>
   <a href="<?php echo base_url();?>backend/administrar/agentes" class="btn btn-default">Salir</a>
</form>
<?php 
$mensage = $this->session->flashdata('mensaje');
echo isset($mensage)? $mensage : '';
echo validation_errors();
?>
</div>