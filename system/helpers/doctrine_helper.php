<?php

/*Deberíamos ampliar esta función para que pudiera seleccionarse la dirección de enlace*/

function paginator($current_page = '1',$results_per_page = '5', $chunk ='5', $query = ''){
    $pagerLayout = new Doctrine_Pager_Layout(
        $pager = new Doctrine_Pager(
            $query,
            $current_page,
            $results_per_page
        ),
        new Doctrine_Pager_Range_Sliding(array(
            'chunk' => $chunk
        )),
        '?p={%page_number}'
    );
    $pagerLayout->setTemplate('<a href="{%url}"><span>{%page}</span></a>');
    $pagerLayout->setSelectedTemplate('<span class="selected">{%page}</span>');
    
    return $pagerLayout;
}

?>
