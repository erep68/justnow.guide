<div id="patrocinadores">
    <?php foreach($patrocinadores as $patrocinador) { ?>
        <?php if (!empty($patrocinador->title)) { ?>
            <div id="patrocinadores-title"><?php echo $patrocinador->title;?></div>
        <?php } ?>
        <div id="patrocinadores-content">
            <?php 
                $f['src'] = site_url().'public/img/'.$patrocinador->image;
                $f['alt'] = $patrocinador->name;
                $nofollow = array(
                                'rel' => 'nofollow' 
                            );
                if(!empty($patrocinador->link))
                    echo anchor_popup('http://'.$patrocinador->link,img($f),$nofollow); 
                else
                    echo img($f);
            ?>
        </div>
    <?php } ?>
</div>