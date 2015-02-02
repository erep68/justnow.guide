<script type="text/javascript">
  function comboInit(thelist)
  {
    theinput = document.getElementById(theinput);  
    var idx = thelist.selectedIndex;
    var content = thelist.options[idx].innerHTML;
    if(theinput.value == "")
      theinput.value = content; 
  }

function combo(thelist, theinput)
{
  theinput = document.getElementById(theinput);  
  var idx = thelist.selectedIndex;
  var content = thelist.options[idx].innerHTML;
  theinput.value = content; 
}
</script>

<h1 class="page-header">Nuevo Servicio</h1>
<h2 class="sub-header"></h2>
<div class="clearfix"></div>
<div class="table-responsive">
<?php $data = array('id'=>'fomulari', 'class'=>'form_default', 'role' => 'form');
  echo form_open('',$data);?>

  <table class="table-responsive">
    <tr>
      <td>
        <div class="input-group input-group-lg form_control">
          <span class="input-group-addon">Nombre</span>
          <input type="text" class="form-control input-lg " value="<?php echo set_value('name');?>" name="name" id="name" placeholder="Nombre del producto">
        </div>
      </td>
      
    </tr>
    <tr>
      <td>
        <textarea class="form-control input-lg " value="<?php echo set_value('description');?>" name="description" id="description" placeholder="Descripción"></textarea>
      </td>
    </tr>
    <tr>
      <td>
        <div class="input-group input-group-lg form_control">
          <span class="input-group-addon">Precio</span>
          <input type="text" class="form-control input-lg " value="<?php echo set_value('price');?>" name="price" id="price" placeholder="€">
        </div>
      </td>
      <td>
        <label class="checkbox">
          <input type="checkbox" class="form-control input-lg " name = "active" id="active"> Activo
        </label>
      </td>
    </tr>
  </table>
  <button class="btn btn-primary" type="submit">Guardar</button>
  <a href="<?php echo base_url();?>backend/administrar/productos" class="btn btn-default">Salir</a>
</form>
<?php 
$mensage = $this->session->flashdata('mensaje');
echo isset($mensage)? $mensage : '';
echo validation_errors();
?>
</div>




