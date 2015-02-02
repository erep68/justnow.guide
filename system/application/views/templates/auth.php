
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php echo link_tag('public/stylesheet/backend.css', 'stylesheet', 'text/css', 'screen'); ?>
    
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
    <title><?php echo $site_name." - ".$subtitle ?></title>    
    
</head>

<body>

        <?php echo $this->ocular->message(); ?>
        <?php echo $this->ocular->yield(); ?>

	

</body>
</html>
