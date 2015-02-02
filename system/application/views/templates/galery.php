<script>
    $('.galery').find("#foto").each(function() {
        var element = $(this);
        element.css('display','block');
    });
    $('.galery').cycle({
        fx: 'fade' // choose your transition type, ex: fade, scrollUp, shuffle, etc...
    });
</script> 
<?php if(!empty($photos[0]->name)){ ?>
        <div class="galery">
            <?php 
                if(!empty($photos[0])){
                    foreach($photos as $photo){
                        $f['src'] = 'public/img/'.$photo->name;
                        $f['alt'] = $photo->alt;
                        $f['id'] = 'foto';
                        $class = "";
                        $year = $photo->txt($isoCode)->year;
                        $comments = $photo->txt($isoCode)->comments;
                        if(!is_null($year) && is_null($comments))
                            $comments = " ";
                        if($comments != null){
                            $class = "class='main'";
                        }
                        if(!empty($year)){
                            if(!empty($photo->link))
                                echo "<div class='galery-comments'><span $class><label class='year'>".$year." </label>".$comments."</span><a href='http://$photo->link' target='blank'>".img($f)."</a></div>";                                    
                            else
                                echo "<div class='galery-comments'><span $class><label class='year'>".$year." </label>".$comments."</span>".img($f)."</div>";
                        }else{
                            if(!empty($photo->link)){
                                if($photo->is_multi){
                                    $links = explode(',',$photo->link);
                                    echo "<div class='galery-comments'><span $class>".$comments."</span>".img($f);
                                    $num_y = 0;
                                    $pos_x = 0;
                                    $pos_y = 0;
                                    $offset_x = 0;
                                    foreach($links as $link){
                                        echo "<a href='http://$link' target='blank'><div style='height:170px; width:250px;position:absolute;left:".($pos_x + $offset_x)."px;top:".$pos_y."px;'></div></a>";
                                        if($num_y < 3){
                                            $pos_x = ($pos_x + $offset_x);
                                            $offset_x = 250;
                                            $num_y++;
                                        }else{
                                            $pos_x = 0;
                                            $offset_x = 0;
                                            $num_y = 0;
                                            $pos_y = 170;
                                        }
                                    }
                                    echo "</div>"; 
                                    
                                }else{
                                    echo "<div class='galery-comments'><span $class>".$comments."</span><a href='http://$photo->link' target='blank'>".img($f)."</a></div>";
                                }
                            }
                            else
                                echo "<div class='galery-comments'><span $class>".$comments."</span>".img($f)."</div>";
                        }
                    }
                }
            ?>
        </div>
<?php } ?>