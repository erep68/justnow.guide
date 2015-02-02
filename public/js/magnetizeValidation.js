var validator = new FormValidator('magnetize-form', [{
    name: 'title',
    display: 'Title',    
    rules: 'required'
}, {
    name: 'content',
    display: 'Description',    
    rules: 'required'
}, {
    name: 'url[]',
    display: 'URL',    
    rules: 'required'
}, {
    name: 'category[]',
    display: 'Categories',    
    rules: 'required'
}, {
    name: 'keyword[]',
    display: 'Keywords',    
    rules: 'required'
}], function(errors, event) {
    if (errors.length > 0) {
        var errorString = '';
        
        for (var i = 0, errorLength = errors.length; i < errorLength; i++) {
            errorString += errors[i].message + '<br />';
        }
        
        $('.error-box').html(errorString);
        $('.error-box').show();
    }
});
