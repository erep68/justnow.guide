
<h1 class="page-header">Nueva Categoria</h1>
<h2 class="sub-header"></h2>
<div class="clearfix"></div>
<div class="table-responsive">
<?php $data = array('id'=>'fomulari', 'class'=>'form_default', 'role' => 'form');
  echo form_open('',$data);?>

  <div class="input-group input-group-lg form_control">
      <span class="input-group-addon">Nombre</span>
      <input type="text" class="form-control input-lg " name="name" id="name" placeholder="Nombre de la Categoria">
  </div>
  <textarea  cols = "50" rows = "5" class="form-control" name="description" id="description" placeholder="Descripción"></textarea>
  <label class="checkbox">
      <input type="checkbox" name = "active" id="active"> Activo
   </label>
   <button class="btn btn-primary" type="submit">Guardar</button>
   <a href="<?php echo base_url();?>backend/administrar/categorias" class="btn btn-default">Salir</a>
</form>
<?php 
$mensage = $this->session->flashdata('mensaje');
echo isset($mensage)? $mensage : '';
echo validation_errors();
?>
</div>


