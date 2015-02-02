
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php echo link_tag('public/stylesheet/backend.css', 'stylesheet', 'text/css', 'screen'); ?>
    
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/stylesheet/backend.css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <title>Backend</title>    
</head>

<body>
        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
          <div class="container-fluid">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="<?php echo site_url().'backend/'?>">Budgeator</a>
            </div>
            <div class="navbar-collapse collapse">
              <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Perfil</a></li>
                <li><a href="<?php echo site_url().'backend/main/help'?>">Ayuda</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3 col-md-2 sidebar">
                  <ul class="nav nav-sidebar">
                        <li><a href='<?php echo site_url().'backend/main/visitas'?>' >Visitas</a></li>
                        <li><a href='<?php echo site_url().'backend/main/pedidos'?>' >Pedidos</a></li>
                        <li><a href='#' >Seguimiento</a></li>
                        <li><a href='#' >Ventas</a></li>
                        <li><a href='#' >Clientes</a></li>
                        <li><br /></a></li>
                        <li><a href='#' >ADMINISTRAR</a></li>
                        <li><a href='<?php echo site_url().'backend/administrar/agentes'?>' >Agentes</a></li>
                        <li><a href='<?php echo site_url().'backend/administrar/departamentos'?>' >Departamentos</a></li>
                        <li><a href='<?php echo site_url().'backend/administrar/categorias'?>' >Categorias</a></li>
                        <li><a href='<?php echo site_url().'backend/administrar/productos'?>' >Servicios</a></li>
                        <li><a href='<?php echo site_url().'backend/administrar/paquetes'?>' >Paquetes</a></li>
                        <li><br /></li>
                        <li><a href='#' >PRESUPUESTADOR</a></li>
                        <li><a href='<?php echo site_url().'backend/presupuestador'?>' >Todos</a></li>
                        <li><a href='<?php echo site_url().'backend/presupuestador/nuevo'?>' >Nuevo</a></li>
                  </ul>
                </div>
                <div class="col-sm-9 col-md-10 content">
                    <?php echo $this->ocular->yield(); ?>
                </div>
            </div>
        </div>
</body>
</html>
