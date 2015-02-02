window.addEvent('domready',function() {
	
	/* manage Main Nav */
	manageMainNav();
	
});


function manageMainNav(){
	
	var mainNav = $('navtop').getElement('ul');
	var mainNavSubMenus = $('navtop').getElements('.submenu-n1').setStyle('top',0);
	//var mainNavSubSubMenus = $('navtop').getElements('.submenu-n2').fade('hide');
	$$('#navtop .submenu-n3').fade('hide');
	$$('#navtop .submenu-01').fade('hide');
	var mainNavEntries = $$('#navtop > ul > li'); 
	
	var chainedFn = new Chain();
	var active = false;
	var totalMainEntriesLength=0;
	
	/* MAIN NAV, main level */
	mainNavEntries.each(function(el,i){
		var morphSubNav;
		var inDelay,outDelay;
		
		var elWidth = parseInt(el.getSize().x);
		el.set('data-left-Xcoord',totalMainEntriesLength);
		totalMainEntriesLength += elWidth;
		el.set('data-right-Xcoord',totalMainEntriesLength);

		if(el.getElement('.submenu-n1')){
			var target = el.getElement('.submenu-n1');
			
			(function(){var subMenuLength = parseInt(target.getSize().x);
				var elLeftCoord = el.get('data-left-Xcoord');
				var elRightCoord = el.get('data-right-Xcoord');
				if(subMenuLength<elLeftCoord){
					target.setStyles({ 'width': elRightCoord+"px" });
					//console.log(subMenuLength,elRightCoord,target);
				}
			}).delay(100);
			
			var morphBreadcrumb = new Fx.Morph($('fil_ariane'), { link: 'cancel', 'duration':'200', transition: 'quad:in:out'});
			var morphSubNavIn = new Fx.Morph(el.getElement('.submenu-n1'), { link: 'cancel', 'duration':'200', transition: 'quad:out', onStart:function(){ active = true; /*$('fil_ariane').tween('top','25px'); morphBreadcrumb.start({'top':'25px'});*/  }, onComplete:function(){ chainedFn.callChain(); active = false; } });
			var morphSubNavOut = new Fx.Morph(el.getElement('.submenu-n1'), { link: 'cancel', 'duration':'200', transition: 'quad:in', onStart:function(){ active = true;  }, onComplete:function(){ chainedFn.callChain(); active = false; /*$('fil_ariane').tween('top',0); morphBreadcrumb.start({'top':0});*/ } });
			el.addEvents({
				'mouseenter':function(){ 
					if(outDelay){ clearTimeout(outDelay); } 
					inDelay = (function(){
						if(active){
							three = function(){	
								morphSubNavIn.start({'top':'25px'});
								morphBreadcrumb.start({'top':'25px'});
							}
							chainedFn.chain(three);				
						}else{
							morphSubNavIn.start({'top':'25px'});
							morphBreadcrumb.start({'top':'25px'});
						}
					}).delay(500); 
				},
				'mouseleave':function(){ 
					if(inDelay){ clearTimeout(inDelay); }
					outDelay = (function(){
						if(active){
							two = function(){	
								morphSubNavOut.start({'top':0});
								morphBreadcrumb.start({'top':0});
							}
							chainedFn.chain(two);				
						}else{
							morphSubNavOut.start({'top':0});
							morphBreadcrumb.start({'top':0});
						}
					}).delay(500); 
				}
			});	
		}

		
		
		/* SUB NAV, level1 */
		var subNavN1Entries = el.getElements('.submenu-n1 > li');
		subNavN1Entries.each(function(elSubN1,j){
			//var morphSubNavGen;
			/* MANAGE SUBNAV lvl1, gen type */
			var inGenDelay,outGenDelay;
			if(elSubN1.getElement('.submenu-n2.submenu-01')){
				
				var morphSubNavGenIn = new Fx.Morph(elSubN1.getElement('.submenu-01'), { link: 'cancel', duration:'300', transition: 'quad:out', onStart:function(){ elSubN1.getElement('.submenu-01').setStyle('visibility','visible'); } });
				var morphSubNavGenOut = new Fx.Morph(elSubN1.getElement('.submenu-01'), { link: 'cancel', duration:'300', transition: 'quad:in', onComplete:function(){ elSubN1.getElement('.submenu-01').setStyle('visibility','hidden'); } });
				elSubN1.addEvents({
					'mouseenter':function(){ 
						if(outGenDelay){ clearTimeout(outGenDelay); }
						inGenDelay = (function(){
							morphSubNavGenIn.start({'opacity':1});
						}).delay(300);;
					},
					'mouseleave':function(){ 
						if(inGenDelay){ clearTimeout(inGenDelay); }
						outGenDelay = (function(){
							morphSubNavGenOut.start({'opacity':0});	
						}).delay(300);
					}
				});
			}
			
			
			/* MANAGE SUBNAV lvl1, type ADDITIONNAL RIGHT SUBNAV */
			var inAddNavSlide,outAddNavSlide;
			if(elSubN1.getElement('.submenu-02')){
				//var morphAddNav;
				
				var morphAddNavIn = new Fx.Morph(elSubN1.getElement('.submenu-02'), { link: 'chain', 'duration':'300', transition: 'quad:out' });
				var morphAddNavOut = new Fx.Morph(elSubN1.getElement('.submenu-02'), { link: 'chain', 'duration':'300', transition: 'quad:in', onStart:function(){ active = true; }, onComplete:function(){ chainedFn.callChain(); active = false; } });
				var additionnalSubNavEntries = elSubN1.getElements('.submenu-02 > li');//$$('#navtop .submenu-02 > li');	
				var additionnalSubNavLength = additionnalSubNavEntries.length;
				var totalWidthAddNav = 0;
				additionnalSubNavEntries.each(function(elt,h){
					var elWidth = parseInt(elt.getSize().x);
					totalWidthAddNav += elWidth;
					//console.log(elWidth,totalWidthAddNav,i);
				});
				var lastAddSubNavItemWidth = parseInt(subNavN1Entries[subNavN1Entries.length-1].getSize().x);
				totalWidthAddNav = totalWidthAddNav+5;
				//console.log(totalWidthAddNav,lastAddSubNavItemWidth,subNavN1Entries[subNavN1Entries.length-1]);
		
				elSubN1.getElement('.submenu-02').setStyle('width',totalWidthAddNav);
				elSubN1.getElement('.submenu-02').set('data-width',totalWidthAddNav);
				additionnalSubNavEntries[additionnalSubNavLength-1].set('data-width',lastAddSubNavItemWidth);
				//var additionnalSubNavWidth = elSubN1.getElement('.submenu-02').get('data-width');
				elSubN1.getElement('.submenu-02').setStyle('left',-totalWidthAddNav);
				elSubN1.addEvents({
					'mouseenter':function(){ 
						if(outAddNavSlide){ clearTimeout(outAddNavSlide); }
						inAddNavSlide = (function(){
							morphAddNavIn.start({'left':lastAddSubNavItemWidth});
						}).delay(300);
					},
					'mouseleave':function(){ 
						if(inAddNavSlide){ clearTimeout(inAddNavSlide); }

						outAddNavSlide = (function(){
							if(active){
								one = function(){	
									morphAddNavOut.start({'left':-totalWidthAddNav});
								}
								chainedFn.chain(one);				
							}else{
								morphAddNavOut.start({'left':-totalWidthAddNav});
							}
						}).delay(300);
					}
				});
				//console.log(additionnalSubNavEntries);
				
			}
			
			
			/* SUB NAV, level2 */
			var subNavN2Entries = elSubN1.getElements('.submenu-n2 > li');
			subNavN2Entries.each(function(elSubN2,k){
					
				/* MANAGE SUBNAV lvl2 */
				var inGenDelay2,outGenDelay2;	
				if(elSubN2.getElement('.submenu-n3')){
					
					var morphSubNavGenIn = new Fx.Morph(elSubN2.getElement('.submenu-01'), { link: 'cancel', 'duration':'400', transition: 'quad:out', onStart:function(){ elSubN2.getElement('.submenu-01').setStyle('visibility','visible'); } });
					var morphSubNavGenOut = new Fx.Morph(elSubN2.getElement('.submenu-01'), { link: 'cancel', 'duration':'400', transition: 'quad:in', onStart:function(){ active = true; }, onComplete:function(){ elSubN2.getElement('.submenu-01').setStyle('visibility','hidden'); chainedFn.callChain(); active = false; } });
					elSubN2.addEvents({
						'mouseenter':function(){ 
							if(outGenDelay2){ clearTimeout(outGenDelay2); }
							inGenDelay2 = (function(){
								//elSubN2.getElement('.submenu-01').fade('in');
								morphSubNavGenIn.start({'opacity':1});
							}).delay(300);
						},
						'mouseleave':function(){ 
							if(inGenDelay2){ clearTimeout(inGenDelay2); }
							outGenDelay2 = (function(){
								//elSubN2.getElement('.submenu-01').fade('out');
								morphSubNavGenOut.start({'opacity':0});	
							}).delay(300);
							
						}
					});
				}	
					
			});
			
		});
			
	});
	
} 