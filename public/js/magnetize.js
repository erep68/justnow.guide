$(document).ready(function(){
   //categories and keywords are defined in the view
    $('.category-input').autocomplete({
        source: categories
    });
    $('.keyword-input').autocomplete({
        source: keywords
    });
    $('#more-url').click(function(){
        $(this).prev().append('<input type="text" name="url[]" class="url-input"></input>');
    });
    $('#more-keyword').click(function(){
        $(this).prev().append('<input type="text" name="keyword[]" class="keyword-input"></input>');
        $('.keyword-input').autocomplete({
            source: keywords
        })
    });
    $('#more-cat').click(function(){
        $(this).prev().append('<input type="text" name="category[]" class="category-input"></input>');
        $('.category-input').autocomplete({
            source: categories
        })
    });
});
