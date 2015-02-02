
<h1 class="page-header">Nuevo Departamento</h1>
<h2 class="sub-header"></h2>
<div class="clearfix"></div>
<div class="table-responsive">
<?php $data = array('id'=>'fomulari', 'class'=>'form_default', 'role' => 'form');
  echo form_open('',$data);?>
  <table>
    <tr>
      <td style="width:500px;">
      <div class="input-group input-group-lg">
        <span class="input-group-addon">Nombre</span>
        <input type="text" class="form-control input-lg " name="name" id="name" placeholder="Nombre del Departamento">
      </div>
    </td>
    <td>
      <label style="margin-left: 10px;" class="checkbox">
        <input type="checkbox" name = "active" id="active"> Activo
      </label>
    </td>
    </tr>
  </table>
  <button class="btn btn-primary" type="submit">Guardar</button>
  <a href="<?php echo base_url();?>backend/administrar/departamentos" class="btn btn-default">Salir</a>
</form>
<?php 
$mensage = $this->session->flashdata('mensaje');
echo isset($mensage)? $mensage : '';
echo validation_errors();
?>
</div>


