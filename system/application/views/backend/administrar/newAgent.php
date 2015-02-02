
<h1 class="page-header">Nuevo Agente</h1>
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
      <input type="text" class="form-control input-lg " value="<?php echo set_value('name');?>" name="name" id="name" placeholder="Nombre del Agente">
      </div>
    </td>
    <td>
      <div class="input-group input-group-lg form_control">
        <span class="input-group-addon">Apellidos</span>
        <input type="text" class="form-control input-lg " value="<?php echo set_value('last_name');?>" name="last_name" id="last_name" placeholder="Apellidos del Agente">
      </div>
    </td>
    </tr>
    <tr>
    <td>
      <div class="input-group input-group-lg form_control">
        <span class="input-group-addon">User</span>
        <input type="text" class="form-control input-lg " value="<?php echo set_value('username');?>" name="username" id="username" placeholder="Nombre de Usuario">
      </div>
    </td>
  </tr>
  <tr>
    <td>
      <div class="input-group input-group-lg form_control">
        <span class="input-group-addon">Contraseña</span>
        <input type="password" class="form-control input-lg " name="password" id="password" placeholder="Password">
      </div>
    </td>
    <td>
      <div class="input-group input-group-lg form_control">
        <span class="input-group-addon">Repite</span>
        <input type="password" class="form-control input-lg " name="rpassword" id="rpassword" placeholder="Password">
      </div>
    </td>
  </tr>
  <tr>
    <td>
      <div class="input-group input-group-lg form_control">
        <span class="input-group-addon">E-mail</span>
        <input type="text" class="form-control input-lg " value="<?php echo set_value('email');?>" name="email" id="email" placeholder="E-mail del Agente">
      </div>
    </td>
    <td>
      <label class="checkbox">
        <input type="checkbox" name = "active" id="active"> Activo
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


