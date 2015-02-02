<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
<?php if($this->ocular->view_name == '') { ?>
<script type="text/javascript">
    $(document).ready(function(){
        $('select').change(function(){
            $('form.language').submit();
        });
    });
</script>
<?php }else{ ?>
<script type="text/javascript">
    $(document).ready(function(){
        $('select').change(function(){
            $('form.language').submit();
        });
    });
</script>
<?php } ?>
<?php if($this->ocular->active_controller() != 'magneto') { ?>
<header>
    <div class="row">
        <nav class="header">
            <ul>
                <li><a href="<?php echo site_url();?>" title="neolitic.com - programming your ideas"><img src="/public/img/neolitic_logo.png" title="neolitic - programming your ideas" alt="logotipo"/></a></li>
                <li id="btn1"><a href="http://www.neolitic.com/#what-is-neolitic" title="¿Qué es neolitic?"><?php echo lang('header_what');?></a></li> 
                <li><a href="http://www.neolitic.com/offers" title="Special offers"><?php echo lang('header_offers');?></a></li>
                <li><a href="<?php echo site_url().lang('budget_permalink');?>" title="Calculate your budget"><?php echo lang('budget_calculate');?></a></li>
                <li id="btn4"><a href="http://www.neolitic.com/#contact-us" title="Contact us"><?php echo lang('header_contact');?></a></li>
                <li>
                    <?php echo form_open('',array('class' => 'language')); ?>
                    <div class="styled-select">
                        <select name="lang">
                            <?php if($lang == 'es') { 
                                $ES = 'selected="selected"';
                                $EN = '';
                            }else{
                                $ES = '';
                                $EN = 'selected="selected"';
                            }?>
                            
                            <option <?php echo $EN;?> value="en">English</option>
                            <option <?php echo $ES; ?> value="es">Español</option>
                        </select>
                    </div>
                    <?php echo form_close(); ?>
                </li>
            </ul>
        </nav>
    </div>
</header>
<?php } ?>
