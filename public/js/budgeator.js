function loadStyle(){
    //<![CDATA[
    if(document.createStyleSheet) {
        document.createStyleSheet('http://inaweb.es/budgeator/public/stylesheet/budgeator.css');
    }
    else {
        var styles = "@import url('http://inaweb.es/budgeator/public/stylesheet/budgeator.css');";
        var newSS=document.createElement('link');
        newSS.rel='stylesheet';
        newSS.href='data:text/css,'+escape(styles);
        document.getElementsByTagName("head")[0].appendChild(newSS);
    }
    //]]>
    //<![CDATA[
    if(document.createStyleSheet) {
        document.createStyleSheet('http://inaweb.es/budgeator/public/js/fancybox/jquery.fancybox-1.3.4.css');
    }
    else {
        var styles = "@import url(' http://inaweb.es/budgeator/public/js/fancybox/jquery.fancybox-1.3.4.css');";
        var newSS=document.createElement('link');
        newSS.rel='stylesheet';
        newSS.href='data:text/css,'+escape(styles);
        document.getElementsByTagName("head")[0].appendChild(newSS);
    }
    //]]>
    //<![CDATA[
    if(document.createStyleSheet) {
        document.createStyleSheet('http://netdna.bootstrapcdn.es/bootstrap/3.1.1/css/bootstrap-theme.min.css');
    }
    else {
        var styles = "@import url(' http://netdna.bootstrapcdn.es/bootstrap/3.1.1/css/bootstrap-theme.min.css');";
        var newSS=document.createElement('link');
        newSS.rel='stylesheet';
        newSS.href='data:text/css,'+escape(styles);
        document.getElementsByTagName("head")[0].appendChild(newSS);
    }
    //]]>
    //<![CDATA[
    if(document.createStyleSheet) {
        document.createStyleSheet('http://netdna.bootstrapcdn.es/bootstrap/3.1.1/css/bootstrap.min.css');
    }
    else {
        var styles = "@import url(' http://netdna.bootstrapcdn.es/bootstrap/3.1.1/css/bootstrap.min.css');";
        var newSS=document.createElement('link');
        newSS.rel='stylesheet';
        newSS.href='data:text/css,'+escape(styles);
        document.getElementsByTagName("head")[0].appendChild(newSS);
    }
    //]]>
}

function loadJS(){
    document.write("<script src='http://netdna.bootstrapcdn.es/bootstrap/3.1.1/js/bootstrap.min.js'></script>");
    document.write("<script type='text/javascript' src='http://inaweb.es/budgeator/public/js/fancybox/jquery.fancybox-1.3.4.js'></script>");
    document.write("<script type='text/javascript' src='http://inaweb.es/budgeator/public/js/jquery.easydrag.js'></script>");
}

function loadHTMLWidget(){
    var html = '<div class="budgeator-widget-collapse">';
    html +=         '<p class="fancybox"><a href="#content-div" class="fancybox">Budgeator <b class="caret"></b></a></p>';
    html +=    '</div>';
    return html;
}

function budgeator() {
	loadStyle();
        loadJS();
	
        document.write(loadHTMLWidget());
	
        var html = "<div  style='display:none'><div id='content-div'>";
        html += '<div class="budgeator-widget-expande"><div class="header">Budgeator</div></div>';

        $.ajax({
            url: "http://inaweb.es/budgeator/webservice/api/init",
            type: "GET",
            dataType: "JSON",
            data: {},
            async:false,
            success: function(response){
                if(response){
                    for (var i = 0; i<response.length; i++){
                        html += response[i].title;
                    }
                }else{
                }
            }
        }); 

        html += "</div></div>";
	document.write(html);
	

	$(document).ready(function() {
		$(".fancybox").fancybox({
			type: 'iframe',
			href: 'http://inaweb.es/angular/index.html#/home',
			width: '100%',
			height: '100%',
                    show:true,
                    hideOnContentClick: false,
                    closeClick  : false,
                    showCloseButton: true,
                    overlayShow: false
		});
	
		$(function(){
		// add drag and drop functionality to #box1
		$("#fancybox-wrap").easydrag();
		});
	});
        
}