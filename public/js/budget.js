$(document).ready(function() {
    $('.button_continue').click(function(){
        var data = [];
        $('section.main').find('article').find('input[type="button"]').each(function(){
            if($(this).hasClass('selected'))
                data.push($(this).attr('id'));
        })
        var uriData = '';
        
        //the data of the poll
        for (var i = 0; i < data.length; ++i) {
            uriData += i+'='+data[i]+'&' ;
        }
        window.location.href = 'http://www.neolitic.com/budget/2?' + uriData;
    });
    
    $('input[type="button"]').click(function(){
        if($(this).attr('id') !== undefined && !$.isNumeric($(this).attr('id')))
            var article = $(this).attr('id').split('b_');
        $(this).parent().find('input').attr('disabled','disabled');
        $(this).addClass('selected');
        $(this).parent().find('figure').hide();
        if(article !== undefined && !$.isNumeric($(this).attr('id'))){
            $('#'+article[1]).slideDown();
            $('#back_'+article[1]).show();
        }else{
            $(this).parent().next().slideDown();
        }
    });
    $('figure').click(function(){
        if($(this).attr('id') !== undefined && !$.isNumeric($(this).attr('id'))){
            var article = $(this).attr('id').split('back_');
            $('#'+article[1]).slideUp();
            var previous = $(this).parent().attr('id');
            $(this).parent().find('input[type="button"]').each(function(){
                $(this).removeClass('selected');
                $(this).removeAttr('disabled');
                if($(this).parent().attr('id') != 'first')
                    $(this).parent().slideUp();    
            })
            $('#b_'+previous).removeClass();
            $('#b_'+previous).parent().find('figure').show();
            $('#b_'+previous).parent().find('input').removeAttr('disabled');
        }else{
            $(this).parent().slideUp();
            $(this).parent().prev().find('input').removeAttr('disabled');
            $(this).parent().prev().find('input').removeClass();
            $(this).parent().prev().find('figure').show();
        }
    });
    
    
    /*STEP2*/
    var sumTotal = 0;
    $('article').find('.price').each(function(){
        if($(this).html()!= 'GRATIS'){
            var price = $(this).html().split('€');
            sumTotal += Number(price[0]);
        }
    })
    $('.budget-total').html(sumTotal);
    
    
    $('input[type="checkbox"]').click(function(){
        var title_price = $(this).parent().parent().parent().find('.price').html().split('€');
        var price = $(this).val();
        var sum = 0;
        
        if($(this).is(":checked")){
            if($(this).parent().parent().parent().find('.price').html() == 'GRATIS')
                sum = Number(price);
            else
                sum = Number(title_price[0]) + Number(price);
            sumTotal += Number(price);
            $('.budget-total').html(sumTotal);
        }else{
            sum = Number(title_price[0]) - Number(price);
            sumTotal -= Number(price);
            if(sumTotal <= 0)
                sumTotal = 'GRATIS';
            $('.budget-total').html(sumTotal);
        }
        if(sum <= 0)
            sum = 'GRATIS';
        else
            sum += '€'
        $(this).parent().parent().parent().find('.price').html(sum);
    });
    
    $('.help-box-toggle-titles').click(function(){
        $(this).parent().find('article').slideToggle();
    })
    $('.help-box-toggle').click(function(){
        $(this).parent().next().slideToggle();
    })
});