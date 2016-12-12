(function($){

    "use strict"; 
	
	var themeData                    = [];
	var parallaxImages               = [];
	
	//window
	themeData.win                    = $(window);
	themeData.winHeight              = themeData.win.height();
	themeData.winScrollTop           = themeData.win.scrollTop();
	themeData.winHash                = window.location.hash.replace('#', '');
	themeData.stateObject            = {};
	
	//document
	themeData.doc                    = $(document);
	themeData.docHeight              = themeData.doc.height();

	//ID A~Z
	themeData.backTop                = $('#back-top');
	themeData.footer                 = $('#footer');
	themeData.headerWrap             = $('#header');
	themeData.header                 = $('#header-main');
	themeData.MenuOverPanel          = $('#mobile-panel');
	themeData.MenuOverTrigger        = $('#navi-trigger');
	themeData.MenuOverClose          = $('#mobile-panel-close');
	themeData.jplayer                = $('#jquery_jplayer');
	themeData.logo                   = $('#logo');
	themeData.MenuToggle             = $('#menu_toggle');
	themeData.navi                   = $('#navi');
	themeData.naviMenu               = $('#navi .menu');
	themeData.naviSide               = $('.navi-side #navi_wrap .menu');
	themeData.container              = $('#wrap');
	themeData.WrapOurter             = $('#wrap-outer');
	themeData.searchOpen             = $('.search-top-btn-class');
	themeData.searchOverlay          = $('#search-overlay');
	themeData.searchClose            = $('#search-overlay-close');
	themeData.searchResult           = $('#search-result');
	themeData.socialHeader           = $('#social-header-out');
	themeData.hideTitle              = $('#title-hidden');
	themeData.SliderTriggleDown      = $('#topslider-triggle')
	themeData.contentWrap            = $('#content_wrap');
	
	//tag
	themeData.body                   = $('body');
	
	//tag class
	themeData.carousel               = $('.owl-carousel');
	themeData.uxResponsive           = $('body.responsive-ux');
	themeData.headerNaviMenu         = themeData.header.find('#navi ul.menu');
	themeData.galleryCollage         = $('section.Collage');
	
	//class
	themeData.audioUnit              = $('.audio-unit');
	themeData.flexDirectionNav       = $('.flex-direction-nav');
	themeData.GalleryListSlider      = $('.gallery-list-slider');
	themeData.lightboxPhotoSwipe     = $('.lightbox-photoswipe');
	themeData.Menu                   = $('.menu');
	themeData.pagenumsDefault        = $('.pagenums-default');
	themeData.pageLoading            = $('.loading-mask1');
	themeData.pageLoading2           = $('.loading-mask2');
	themeData.tooltip                = $('.tool-tip');
	themeData.searchForm             = $('.search-overlay-form');
	themeData.titlecon               = $('.title-wrap-con');
	
	themeData.videoFace              = $('.blog-unit-img-wrap, .mainlist-img-wrap');
	themeData.videoOverlay           = $('.video-overlay');
	
	themeData.blogPagenumsTwitter    = $('.blog-list .pagenums.page_twitter a, .magzine-list .pagenums.page_twitter a, .archive-grid .pagenums.page_twitter a, .main-list .pagenums.page_twitter a');
	themeData.blogPagenumsSelect     = $('.blog-list .pagenums .select_pagination, .magzine-list .pagenums .select_pagination');
	
	
	//define
	themeData.globalFootHeight       = 0;
	
	var resizeTimer = null;
	
	//condition
	themeData.isResponsive = function(){
		if(themeData.uxResponsive.length){
			return true;
		}else{
			return false;
		}
	}
	
	var switchWidth = 768;
	
	
	themeData.isMobile = function(){
		if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) || themeData.win.width() < switchWidth){
			return true; 
		}else{
			return false;
		}
	}

	var ios = navigator.userAgent.match(/(iPod|iPhone|iPad)/);
	
	
	//Function
	//Menu on top fold wrap size calc
	themeData.NaviTopFoldSize = function (){
		
		if($('#nav-top-content-wrap-inn').length ) {

			var 
			topnavi_height   = $('#nav-top-content-wrap-inn').height(),
			topnavi_left_w   = topnavi_height*0.76,
			topnavi_left_l   = topnavi_height*1.256,
			topnavi_right_w  = topnavi_height*0.86,
			topnavi_right_l  = topnavi_height*1.32,
			topnavi_left_p   = topnavi_left_w - 1,
			topnavi_right_p  = topnavi_right_w - 1;

			$('#nav-top-content, .mobile-panel-content, .mobile-panel-child, .mobile-panel-child-content, .mobile-panel-fold, .mobile-panel-fold-content').css('height',topnavi_height);
			$('#mobile-panel-left,#mobile-panel-left .mobile-panel-child-content,#mobile-panel-left .mobile-panel-fold-content').css('width',topnavi_left_w);
			$('#mobile-panel-right,#mobile-panel-right .mobile-panel-child-content,#mobile-panel-right .mobile-panel-fold-content').css('width',topnavi_right_w);
			$('#mobile-panel-center').css('left',topnavi_left_p).css('right',topnavi_right_p);
			$('#mobile-panel-center .mobile-panel-content').css('left','-'+topnavi_left_p+'px');
			$('#mobile-panel-left .mobile-panel-fold,#mobile-panel-left .mobile-panel-child').css('width',topnavi_left_l);
			$('#mobile-panel-right .mobile-panel-fold,#mobile-panel-right .mobile-panel-child').css('width',topnavi_right_l);
		}

	}

	//Calc Fullscreen wrap / slider Height 
	themeData.fnFullscreenWrapHeight = function(){ 
		if($('.fullscreen-wrap').length) {
			$('.fullscreen-wrap').each(function(){
				if(window.innerHeight > window.innerWidth) {
					$(this).css('height',themeData.win.height()/2);
				} else {
					if($(this).hasClass('topslider') && $('.navi-over').length) {
						$(this).css('height',themeData.win.height()-120);
					} else {
						$(this).css('height',themeData.win.height());
					}
					
				}
			});
		}
	}

	//Calc  Menu wrap Height  - Menu on Side
	themeData.fnNaviHeight = function(){ 

		if($('.head-meta').length) {
			var header_meta = 120;
		} else {
			var header_meta = 0;
		}
		if($('.navi-logo').length) {
			var logo_h = $('.navi-logo').height()+80;
		} else {
			var logo_h = 0;
		}
		
		if(themeData.body.is('.navi-side')){
			$('.navi-main').css('height', themeData.win.height() - header_meta - logo_h).css('opacity','1');
		}

	}

	// Top slider Triggle Down Click
	themeData.TopsliderTrggleDown = function(){
		themeData.SliderTriggleDown.on({'touchstart click': function(){ 
			$('html, body').animate({scrollTop:themeData.win.height()}, 400);
		}});
	}


	// Top slider
	themeData.carouselFn = function(carouselWrap){

		carouselWrap.each(function(){

			var 
			_carousel = $(this),
			_margin = $(this).data('margin'),
			_center = $(this).data('center'),
			_item   = $(this).data('item'),
			_autoW  = $(this).data('autowidth'),
			_slideby = $(this).data('slideby'),
			_auto    = $(this).data('auto');

			$(this).find('img').imagesLoaded(function(){
				_carousel.owlCarousel({
				    margin: _margin,
				    loop:true,
				    autoWidth:_autoW,
				    center: _center,
				    slideSpeed : 300,
		            paginationSpeed : 400,
				    items: _item,
				    autoplay: _auto,
				    responsiveClass:true,
				    navText:["",""],
				    slideBy:_slideby,
				    responsive:{
				        0:{
				            items:1,
				            nav:true
				        },
				        480:{
				            items:1,
				            nav:true
				        },
				        769:{
				            items:_item,
				            nav:true 
				        }
				    }
				});
			});

		});
	}


	//Header  scrolled
	themeData.fnHeaderAnima =  function(){

		themeData.win.scroll(function(){

			if(themeData.win.scrollTop() > 200){
				if(!themeData.body.hasClass('header-scrolled')) {
				 	themeData.body.addClass('header-scrolled');
				}
			} else {
				if(themeData.body.hasClass('header-scrolled')) {
				 	themeData.body.removeClass('header-scrolled');
				}	
			}
		});
		
	}

	//Hide Title
	themeData.fnHideTitle =  function(){

		themeData.win.scroll(function(){

			if(themeData.win.scrollTop() > 200){
				if(!themeData.hideTitle.hasClass('title-shown')) {
				 	themeData.hideTitle.addClass('title-shown');
				}
			} else {
				if(themeData.hideTitle.hasClass('title-shown')) {
				 	themeData.hideTitle.removeClass('title-shown');
				}	
			}
		});

		if(themeData.win.scrollTop() > 200){
			if(!themeData.hideTitle.hasClass('title-shown')) {
			 	themeData.hideTitle.addClass('title-shown');
			}
		} else {
			if(themeData.hideTitle.hasClass('title-shown')) {
			 	themeData.hideTitle.removeClass('title-shown');
			}	
		}
		
	}

	//Search show
	themeData.fnSerchShow = function(){

		themeData.searchOverlay.css('height',themeData.winHeight);

		themeData.searchOpen.click(function(){
			if(!themeData.searchOverlay.hasClass('search-fadein')){
				themeData.searchOverlay.addClass('search-fadein');
				$('body,html').addClass('no-scroll').css('height',themeData.winHeight);
				$('.search-overlay-input-text').focus();
			}
		});
		themeData.searchClose.click(function(){
			if(themeData.searchOverlay.hasClass('search-fadein')){
				themeData.searchOverlay.removeClass('search-fadein');
				$('body,html').removeClass('no-scroll').css('height','auto');
			}
		});
	}
	
	//Search form
	themeData.fnSearchForm = function(){
		themeData.searchForm.submit(function(event){
			var search_result = themeData.searchForm.find('input[name=\"s\"]');
			var search_loading = $('<div id="search-loading"><div class="search-loading"></div></div>');
			
			event.preventDefault();
			themeData.searchResult.html(search_loading);
			var data = {
				'keywords' : search_result.val(),
				'paged'    : 1
			}
			
			$.post(AJAX_M, {
				'mode': 'search-list',
				'data': data
			}).done(function(content){
				var content = $(content);
				themeData.searchResult.html(content);
				themeData.fnSearchPaged(search_result.val(), search_loading);
				
				themeData.searchResult.find('.search-result-unit a').click(function(){
					themeData.fnPageLoadingEvent($(this));
				});
			});
		});
	}
	
	//Search form paged
	themeData.fnSearchPaged = function(keywords, loading){
		var load_more = themeData.searchResult.find('a.tw-style-a');
		if(load_more.length){
			load_more.click(function(){
				var paged = $(this).attr('data-paged');
				
				$(this).parent().remove();
				themeData.searchResult.append(loading);
				
				var data = {
					'keywords' : keywords,
					'paged'    : paged
				}
				
				$.post(AJAX_M, {
					'mode': 'search-list',
					'data': data
				}).done(function(content){
					var content = $(content);
					themeData.searchResult.append(content);
					themeData.searchResult.find('#search-loading').remove();
					themeData.fnSearchPaged(keywords, loading);
					
				});
			});
		}
	}
	
	themeData.fnSetMenuLevel = function(index, el){
		if(el){
			el.each(function(i){
				$(this).addClass('level-' +index);
				if($(this).hasClass('menu-item-has-children')){
					themeData.fnSetMenuLevel(index + 1, $(this).find('> .sub-menu > li'));
				}
			});
		}
	}

	//Responsive Mobile Menu function
	themeData.fnResponsiveMenu = function(){
		
		var 
		menu                 = $('#navi ul.menu'),
		container            = themeData.container,
		mobile_advanced      = menu.clone().attr({id:"mobile-advanced", "class":""}),
		menu_added           = false;
						
		if(themeData.win.width() > switchWidth) {
			themeData.body.removeClass('ux-mobile');
		} else {
			themeData.body.addClass('ux-mobile');
		}
		
		themeData.win.resize(function(){
			if(themeData.win.width() > switchWidth) {
				themeData.body.removeClass('ux-mobile');
			} else {
				themeData.body.addClass('ux-mobile');
			}
			
			if(themeData.body.is('.show_mobile_menu')){
				themeData.fnSet_height();
			}

		});
		

		themeData.MenuOverTrigger.click(function(){
			if(themeData.body.is('.show_mobile_menu')){
				setTimeout(function() {
					themeData.body.removeClass('show_mobile_menu'); 
					$('#nav-top-content').css('z-index', 0); 
				},20);
				
			}else{
				setTimeout(function() {
					themeData.body.addClass('show_mobile_menu');
					themeData.fnSubMenu();
					themeData.fnSet_height();
					$('#nav-top-content').css('z-index', 999);
				},10);
				
			}
			
			return false;
        });

        themeData.MenuOverClose.click(function(){
			if(themeData.body.is('.show_mobile_menu')){
				setTimeout(function() {
					themeData.body.removeClass('show_mobile_menu'); 
				},20);
				themeData.fnClearSubMenu();
			}else{
				setTimeout(function() { 
					themeData.body.addClass('show_mobile_menu'); 
					
				},10);
			}
			
			return false;
        });
		
		themeData.fnClearSubMenu = function(){
			themeData.NaviWrapMobile = $('#navi-wrap-mobile > .menu');
			themeData.NaviWrapMobile.find('li, li > a').show();
			themeData.NaviWrapMobile.find('.sub-menu').hide();
			themeData.NaviWrapMobile.find('.menu-item-back, .submenu-icon').remove();
			
			themeData.body.css({'height': 'auto', 'overflow': 'auto'});
			
			
		}
		
		themeData.fnSubMenu = function() {
			themeData.NaviWrapMobile = $('#navi-wrap-mobile > .menu');
			themeData.fnSetMenuLevel(1, themeData.NaviWrapMobile.find('> li'));
			
			themeData.NaviWrapMobile.find('li').each(function(index){
				var _this = $(this),
				    _this_link = _this.find('> a');
				
				if(_this.hasClass('menu-item-has-children')){

					_this.find('> .sub-menu').prepend('<li class="menu-item-back"><a href="#"><span class="fa fa-play"></span></a></li>');
					_this_link.append('<span class="fa fa-play submenu-icon"></span>');
					
					_this_link.click(function(){
						themeData.NaviWrapMobile.find('li').hide(10, function(){
							_this_link.hide();
							_this_link.next().show();
							_this_link.next().children().show();
							_this_link.parents('.menu-item').show();
						});
						
						themeData.fnSet_height();
						
						return false;
					});
					
					_this.find('> .sub-menu > .menu-item-back > a').click(function(){
						var sub_menu = $(this).parent().parent();
						var parent_item = sub_menu.parent();
						var parent_item_link = parent_item.find('> a');
						
						if(parent_item.not('.level-1')){
							parent_item.parent().children().show();
							parent_item_link.show();
							sub_menu.hide();
						}
						
						themeData.fnSet_height();
							
						return false;
					});
				}else{
					_this_link.click(function(){

						if(!Modernizr.touch){
							if(!$(this).parent().hasClass('current-menu-anchor')){
								themeData.fnPageLoadingEvent($(this));
								return false;
							}
						} else {
							if(!$(this).parent().hasClass('current-menu-anchor')&& !$(this).parent().hasClass('menu-item-has-children')){
								themeData.fnPageLoadingEvent($(this));
								return false;
							}
						}
						
					});
				}
				
			});
        	
        };

        themeData.fnSet_height = function() {
			
			setTimeout(function(){
			
				var mobile_panel_logo = themeData.MenuOverPanel.find('.mobile-panel-logo');
				var mobile_panel_in = themeData.MenuOverPanel.find('.mobile-panel-in');
				var mobile_panel_main = themeData.MenuOverPanel.find('.mobile-panel-main');
				var mobile_panel_height = mobile_panel_logo.height() + mobile_panel_in.height();
				
				themeData.winHeight = themeData.win.height();
				if(mobile_panel_height <= themeData.winHeight){
					themeData.MenuOverPanel.height(themeData.winHeight);
					themeData.body.css({'height': themeData.winHeight, 'overflow': 'hidden'});
					mobile_panel_main.css({'height': themeData.winHeight, 'margin-top': -50});
				}else if(mobile_panel_height > themeData.winHeight){
					themeData.MenuOverPanel.height(mobile_panel_height);
					themeData.body.css({'height': mobile_panel_height, 'overflow': 'hidden'});
					mobile_panel_main.css({'height': mobile_panel_in.height(), 'margin-top': 0});
				}
			
			}, 100);

        };
    }

    // Respond form
    themeData.fnResponToggle = function(){
		$("#reply-title").click(function () {
			$("#commentform").slideToggle(500, function() {
				if ($(this).is(":visible")) {
					$("#reply-title").addClass('reply-title-shown');
				} else {
					$("#reply-title").removeClass('reply-title-shown');
				}
			});
		});
	}

    //Navi on side
    themeData.fnSideNavi = function(){
    	themeData.win.find('img').imagesLoaded(function(){
    		var navMenuDiv = jQuery("#nav-side");
			var navMenuContent = jQuery("#nav-side-content");
			var navMenuContentCopies = jQuery(".nav-side-content");
		
			themeData.header.height();
			
			for (var a = navMenuContent[0].innerHTML, f = navMenuContentCopies.length; f--;) navMenuContentCopies[f].innerHTML = a
			for (var a = themeData.winHeight, f = navMenuContentCopies.length; f--;) navMenuContentCopies[f].style.height = a + "px"

	    	themeData.win.scroll(function(){
				var menu_is_scroll = 0;
	    		
	    		if(themeData.win.scrollTop() > 100){
	    			if(!themeData.body.hasClass('scrolled')) {
						themeData.body.addClass('scrolled');
						$('#header').css('z-index', 1000);
					}
	    		} else {
	    			if(themeData.body.hasClass('scrolled')) {
	    				themeData.body.removeClass('scrolled');
						$('#header').css('z-index', 0);

	    			} 
	    		}
	    	});

    	});
    }

    	//Back top
	themeData.fnBackTop = function(){
		
		themeData.win.find('img').imagesLoaded(function(){

			themeData.win.scroll(function(){

				if(themeData.win.scrollTop() > 200){
					if(!themeData.backTop.hasClass('backtop-shown')) {
					 	themeData.backTop.addClass('backtop-shown');
					}
				} else {
					if(themeData.backTop.hasClass('backtop-shown')) {
					 	themeData.backTop.removeClass('backtop-shown');
					}
				}

			});

			var BacktopBottom = themeData.footer.find('.footer-info').height() - 50;
			themeData.backTop.css('bottom',BacktopBottom);

		});

	}

    //Video cover title show & hide
	themeData.fnVideocoverTitle = function(){
		
		themeData.win.scroll(function(){
			themeData.winScrollTop = themeData.win.scrollTop();
			if(themeData.winScrollTop > 100){
				if(!themeData.titlecon.hasClass('witle-wrap-con-shown')) {
				 	themeData.titlecon.addClass('witle-wrap-con-shown');
				}
				
			}else{
				if(themeData.titlecon.hasClass('witle-wrap-con-shown')) {
					themeData.titlecon.removeClass('witle-wrap-con-shown');
				}
				
			}
		});
	}
	
	
	//audio player function
	themeData.fnJplayerCall = function(){
		if(themeData.jplayer.length){
			themeData.jplayer.jPlayer({
				ready: function(){
					$(this).jPlayer("setMedia", {
						mp3:""
					});
				},
				swfPath: JS_PATH,
				supplied: "mp3",
				wmode: "window"
			});
			
			themeData.audioPlayClick(themeData.body);
			themeData.audioPauseClick(themeData.body);
		}
	}
	
	//call player play
	themeData.audioPlayClick = function(container){
		container.find('.pause').click(function(){
			var thisID = $(this).attr("id");
			container.find('.audiobutton').removeClass('play').addClass('pause');
			$(this).removeClass('pause').addClass('play');
			themeData.jplayer.jPlayer("setMedia", {
				mp3: $(this).attr("rel")
			});
			themeData.jplayer.jPlayer("play");
			themeData.jplayer.bind($.jPlayer.event.ended, function(event) {
				$('#'+thisID).removeClass('play').addClass('pause');
			});
			themeData.audioPauseClick(container);
			themeData.audioPlayClick(container);
		})
	}
	
	//call player pause
	themeData.audioPauseClick = function(container){
		container.find('.play').click(function(){
			$(this).removeClass('play').addClass('pause');
			themeData.jplayer.jPlayer("stop");
			themeData.audioPlayClick(container);
		})
	}
	
	//page loading event
	themeData.fnPageLoadingEvent = function(el){
		var _url = el.attr('href');
		if(_url){
			themeData.pageLoading2.addClass('mask2-show');
			setTimeout(function(){
				window.location.href = _url;
			}, 2000);
			
		}
	}
	
	//video face
	themeData.fnVideoFace = function(arrayVideo){
		arrayVideo.each(function(){
			var videoFace = [];
			var videoOverlay = [];
			
			videoFace.item = $(this);
			videoFace.playBtn = videoFace.item.find('.blog-unit-video-play');
			videoFace.videoWrap = videoFace.item.find('.video-wrap');
			videoFace.videoIframe = videoFace.videoWrap.find('iframe');
			
			videoOverlay.item = themeData.videoOverlay;
			videoOverlay.videoWrap = videoOverlay.item.find('.video-wrap');
			videoOverlay.close = videoOverlay.item.find('.video-close');
			
			videoFace.playBtn.click(function(){
				var src = videoFace.videoIframe.attr('src').replace('autoplay=0', 'autoplay=1');
				videoFace.videoIframe.attr('src', src);
				videoOverlay.close.before(videoFace.videoWrap.removeClass('hidden').attr('style', 'height:100%;padding-bottom:0px;'));
				videoOverlay.item.addClass('video-slidedown');
				
				return false;
			});
			
			videoOverlay.close.click(function(){
				videoOverlay.item.removeClass('video-slidedown');
				videoOverlay.item.find('.video-wrap').remove();
			});
		});
	}

	//Switch words
	themeData.PageLoadingLetter = function(){
		var animationDelay = 2500,
		//loading bar effect
		barAnimationDelay = 3800,
		barWaiting = barAnimationDelay - 3000, //3000 is the duration of the transition on the loading bar - set in the scss/css file
		//letters effect
		lettersDelay = 50,
		//type effect
		typeLettersDelay = 150,
		selectionDuration = 500,
		typeAnimationDelay = selectionDuration + 800,
		//clip effect 
		revealDuration = 600,
		revealAnimationDelay = 1500;

		initHeadline();

		function initHeadline() {
			singleLetters($('.cd-headline.letters').find('b'));
			animateHeadline($('.cd-headline'));
		}

		function singleLetters($words) {
			$words.each(function(){
				var word = $(this),
					letters = word.text().split(''),
					selected = word.hasClass('is-visible'),
					i = '';
				for (i in letters) {
					if(word.parents('.rotate-2').length > 0) letters[i] = '<em>' + letters[i] + '</em>';
					letters[i] = (selected) ? '<i class="in">' + letters[i] + '</i>': '<i>' + letters[i] + '</i>';
				}
			    var newLetters = letters.join('');
			    word.html(newLetters).css('opacity', 1);
			});
		}

		function animateHeadline($headlines) { 
			var duration = animationDelay;
			$headlines.each(function(){
				var headline = $(this);
				var words = headline.find('.cd-words-wrapper b'),
					width = 0;
				words.each(function(){
					var wordWidth = $(this).width();
				    if (wordWidth > width) width = wordWidth;
				});
				headline.find('.cd-words-wrapper').css('width', width);
				setTimeout(function(){ hideWord( headline.find('.is-visible').eq(0) ) }, duration);
			});
		}

		function hideWord($word) {
			var nextWord = takeNext($word);

			if($word.parents('.cd-headline').hasClass('letters')) {
				var bool = ($word.children('i').length >= nextWord.children('i').length) ? true : false;
				hideLetter($word.find('i').eq(0), $word, bool, lettersDelay);
				showLetter(nextWord.find('i').eq(0), nextWord, bool, lettersDelay);
			} else {
				switchWord($word, nextWord);
			setTimeout(function(){ hideWord(nextWord) }, animationDelay);
			}
			
		}

		function hideLetter($letter, $word, $bool, $duration) {
			$letter.removeClass('in').addClass('out');
			
			if(!$letter.is(':last-child')) {
			 	setTimeout(function(){ hideLetter($letter.next(), $word, $bool, $duration); }, $duration);  
			} else if($bool) { 
			 	setTimeout(function(){ hideWord(takeNext($word)) }, animationDelay);
			}

			if($letter.is(':last-child') && $('html').hasClass('no-csstransitions')) {
				var nextWord = takeNext($word);
				switchWord($word, nextWord);
			} 
		}

		function showLetter($letter, $word, $bool, $duration) {
			$letter.addClass('in').removeClass('out');
			
			if(!$letter.is(':last-child')) { 
				setTimeout(function(){ showLetter($letter.next(), $word, $bool, $duration); }, $duration); 
			} else { 
				if($word.parents('.cd-headline').hasClass('type')) { setTimeout(function(){ $word.parents('.cd-words-wrapper').addClass('waiting'); }, 200);}
				if(!$bool) { setTimeout(function(){ hideWord($word) }, animationDelay) }
			}
		}

		function takeNext($word) {
			return (!$word.is(':last-child')) ? $word.next() : $word.parent().children().eq(0);
		}

		function switchWord($oldWord, $newWord) {
			$oldWord.removeClass('is-visible').addClass('is-hidden');
			$newWord.removeClass('is-hidden').addClass('is-visible');
		}

	}
	
	//Module Load Ajax
	themeData.fnModuleLoad = function(data, container){
		$.post(AJAX_M, {
			'mode': 'module',
			'data': data
		}).done(function(content){ 
			var newElems = $(content); 
			switch(data['mode']){
				case 'pagenums': 
					var this_pagenums = container.find('a[data-post=\"'+data["module_post"]+'\"][data-paged=\"'+data["paged"]+'\"]');
					
					this_pagenums.text(data["paged"]);
					$('html,body').animate({
						scrollTop: container.parent().offset().top - 80
					},
					1000); 
	
					container.parent().find('section').remove();
					container.before(newElems);
				break;
				case 'twitter': 
					var this_twitter = container.find('a[data-post=\"'+data["module_post"]+'\"]');
					var pagination_text = this_twitter.parent('.page_twitter').data('pagetext');
	
					this_twitter.attr('data-paged',Number(data['paged']) + 1).text(pagination_text).removeClass('tw-style-loading');
	
					if(data['paged'] == this_twitter.data('count')){
						this_twitter.fadeOut(300);
						this_twitter.parent('.page_twitter').css('margin-top','0');
					}
	
					container.before(newElems);
				break;
			}
			
			//Fadein theitems of next page 
			newElems.animate({opacity:1}, 1000); 
			
			//gallery
			themeData.gallerycarousel = $('.blog-gallery-carousel');
			if(themeData.gallerycarousel.length){
				themeData.fnGalleryCarousel();
			}
			
			if(newElems.find('.audio_player_list').length){	
	
				//Audio player
				themeData.fnJplayerCall();
				themeData.jplayer.jPlayer("stop");
				themeData.audioPlayClick(newElems);
				themeData.audioPauseClick(newElems);
			
			}
			
			//Video play
			if(newElems.find('.blog-unit-video-play').length){
				themeData.fnVideoFace(newElems.find('.blog-unit-img-wrap'));
				themeData.fnVideoFace(newElems.find('.mainlist-img-wrap'));
			}
	
			//gallery list
			if(newElems.find('.Collage').length){
				$('.Collage').imagesLoaded(function(){ 
					$('.Collage').collagePlus({
						'fadeSpeed'     : 2000,
						'targetHeight'  : 200
					});
				});
			}
			
			//call carousel
			if(newElems.find('.owl-carousel').length){
				themeData.carouselFn(newElems.find('.owl-carousel'));
			}
	
		});
}
	
	//gallery collage
	themeData.fnGalleryCollage = function(collageWrap){
		collageWrap.collagePlus({
			'fadeSpeed'     : 2000,
			'targetHeight'  : 200
		});
	}
	
	//navi side
	themeData.fnNaviSide = function(){
		
		themeData.fnSetMenuLevel(1, themeData.naviSide.find('> li'));
		
		themeData.naviSide.find('li').each(function(index){
			var _this = $(this),
				_this_link = _this.find('> a');
			
			if(_this.hasClass('menu-item-has-children')){
				_this.find('> .sub-menu').prepend('<li class="menu-item-back"><a href="#"><span class="fa fa-play"></span></a></li>');
				_this_link.append('<span class="fa fa-play submenu-icon"></span>');
				_this_link.click(function(){
					themeData.naviSide.find('li').hide(10, function(){
						_this_link.hide();
						_this_link.next().show();
						_this_link.next().children().show();
						_this_link.parents('.menu-item').show();
					});
					
					return false;
				});
				
				_this.find('> .sub-menu > .menu-item-back > a').click(function(){
					var sub_menu = $(this).parent().parent();
					var parent_item = sub_menu.parent();
					var parent_item_link = parent_item.find('> a');
					
					if(parent_item.not('.level-1')){
						parent_item.parent().children().show();
						parent_item_link.show();
						sub_menu.hide();
					}
					
					return false;
				});
			}else{
				_this_link.click(function(){
					if(!Modernizr.touch){
						if(!$(this).parent().hasClass('current-menu-anchor')){
							themeData.fnPageLoadingEvent($(this));
							return false;
						}
					} else {
						if(!$(this).parent().hasClass('current-menu-anchor')&& !$(this).parent().hasClass('menu-item-has-children')){
							themeData.fnPageLoadingEvent($(this));
							return false;
						}
					}
				});
			}
			
		});
	}
	
	//document ready
	themeData.doc.ready(function(){
		
		if($('.navi-over').length && $('#nav-top-content').length) {
			var mobilePanelDiv = jQuery("#nav-top-content-wrap");
			var mobilePanelContent = jQuery("#nav-top-content-wrap-inn");
			var mobilePanelContentCopies = jQuery(".mobile-panel-content");
			
			mobilePanelDiv.width();
			
			//(Math.atan2(wh, hw)/Math.PI) *180
			//Math.sqrt((wh*wh) + (hw*hw))
			
			for (var a = mobilePanelContent[0].innerHTML, f = mobilePanelContentCopies.length; f--;) mobilePanelContentCopies[f].innerHTML = a
			for (var a = document.documentElement.clientWidth, f = mobilePanelContentCopies.length; f--;) mobilePanelContentCopies[f].style.width = a + "px"
		}

		themeData.NaviTopFoldSize();
		
		themeData.fnFullscreenWrapHeight();
		$(window).bind('resize', themeData.fnFullscreenWrapHeight);
		
		
		if($('#header').length){
			themeData.fnNaviHeight(); 
			$(window).on("debouncedresize",themeData.fnNaviHeight);
		}

		
		//Call Lightbox 
		if(themeData.lightboxPhotoSwipe.length){
			fnInitPhotoSwipeFromDOM('.lightbox-photoswipe');
		}

		//Call top silder
		if(themeData.carousel.length) {
			themeData.carouselFn(themeData.carousel);
			
		}
		
		//Call Tip
		if(themeData.tooltip.length){
			themeData.tooltip.tooltip();
		}

		// Back top 
		if(themeData.backTop.length){
			themeData.backTop.on({'touchstart click': function(){ 
				$('html, body').animate({scrollTop:0}, 1200);
			}});
		}

		//Call Hide Title
		themeData.fnHideTitle();

		//Call Header scrolled
		if($('.navi-over').length) {
			themeData.fnHeaderAnima();
		}
		
		//Pagenumber re-layout
		if(themeData.pagenumsDefault.length) {
			themeData.pagenumsDefault.each(function(){
				if($(this).find('.prev').length && $(this).find('.next').length){
					$(this).find('.next').after($(this).find('.prev'));
				}
			});
		}
		
		//Call audio player
		if(themeData.audioUnit.length > 0){
			themeData.fnJplayerCall();
		}

		//Call switch words 
		if($('.cd-headline').length) { 
			themeData.PageLoadingLetter();
		}
		
		//Pagination - twitter style
		if(themeData.blogPagenumsTwitter.length){
			themeData.blogPagenumsTwitter.each(function(){
				var twitterLink = [];
				
				twitterLink.item = $(this);
				twitterLink.moduleID = twitterLink.item.data('module');
				twitterLink.modulePost = twitterLink.item.data('post');
				twitterLink.postID = twitterLink.item.data('postid');
				twitterLink.paged = twitterLink.item.data('paged');
				
				twitterLink.item.click(function(){
					twitterLink.item.html('<span>Loading...</span>');
					
					twitterLink.item.addClass('tw-style-loading');
					twitterLink.paged = twitterLink.item.attr('data-paged');

					var ajax_data = {
						'module_id'   : twitterLink.moduleID,
						'module_post' : twitterLink.modulePost,
						'post_id'     : twitterLink.postID,
						'paged'       : twitterLink.paged,
						'mode'        : 'twitter'
					}
					
					themeData.fnModuleLoad(ajax_data, twitterLink.item.parents('.pagenums'));
					return false;
				});
			})
			
		}
		

		//Call response toggle
		if($("#reply-title").length) {
			themeData.fnResponToggle();
		}

		//call video popup
		if(themeData.videoFace.length){
			themeData.fnVideoFace(themeData.videoFace);
		}

		//Fix ellipsis css bug for main list
		if($('.ux-ellipsis-before').length) {
			$('.ux-ellipsis-before').each(function(){
				var eH = $(this).parent('.ux-ellipsis').height();
				$(this).css('height',eH);
				if( eH < 70 ){
					$(this).parent('.ux-ellipsis').css('overflow','visible').addClass('clearfix');
				}
			});
		}


		//Page Loading
		if(themeData.pageLoading.length){
			
			//Logo
			$('#logo a').click(function(){
				themeData.fnPageLoadingEvent($(this));
				return false;
			});

			//Navi, WPML 
			$('.wpml-language-flags a,#navi li:not(.menu-item-has-children) a').click(function(){
				themeData.fnPageLoadingEvent($(this));
				return false;
			});
			

			//blog, post 
			$('.mainlist-tit-a,.mainlist-tit a,.mainlist-meta-a, .title-wrap a,.related-posts-tit-a,.related-posts-meta a, .page-numbers,.archive-grid-item a').click(function(){
				themeData.fnPageLoadingEvent($(this));
				return false;
			});
			
			//gallery navi
			$('.single .gallery-navi-post a').click(function(){
				themeData.fnPageLoadingEvent($(this));
				return false;
			});
		
			//slide   / archive unit
			$('.disable-scroll-a,.blog-unit-tit a,.carousel-des-wrap-tit-a,.article-meta-unit a,.blog-unit-more-a').click(function(){
				themeData.fnPageLoadingEvent($(this));
				return false;
			});
		
			//sidebar widget
			$('.widget_archive a, .widget_recent_entries a, .widget_search a, .widget_pages a, .widget_nav_menu a, .widget_tag_cloud a, .widget_calendar a, .widget_text a, .widget_meta a, .widget_categories a, .widget_recent_comments a, .widget_tag_cloud a').click(function(){
				themeData.fnPageLoadingEvent($(this));
				return false;
			});
		
			/** Module*/
			$('.moudle .blog-bigimage a,.moudle .iterlock-caption a, .moudle .tab-content a, .moudle .accordion-inner a, .moudle .blog-item a, .moudle .isotope a, .moudle .ux-btn, .moudle .post-carousel-item a, .moudle .caroufredsel_wrapper:not(.portfolio-caroufredsel) a').click(function(){
				if($(this).is('.lightbox')||$(this).is('.tw-style-a')||$(this).is('.lightbox-item')){}else if($(this).is('.liquid_list_image')){}else if($(this).is('.ajax-permalink')){}else{
					themeData.fnPageLoadingEvent($(this));
					return false;
				}
			});

			//Porfolio template
			$('.related-post-unit a,.tags-wrap a').click(function(){	
				themeData.fnPageLoadingEvent($(this));
				return false;
			});
		
			
		
			$("html, body").css({height: themeData.winHeight});
			
		}


	});
	
	//win load
	themeData.win.load(function(){

		//call menu
		if(themeData.isResponsive()){
			themeData.win.find('img').imagesLoaded(function(){ 
			themeData.fnResponsiveMenu();
			});
		}

		themeData.pageLoading.removeClass('visible'); 
		$("html, body").css({height: "auto"});

		if(themeData.searchOverlay.length){
			themeData.fnSerchShow();
		}
		
		if(themeData.searchForm.length){
			themeData.fnSearchForm();
		}

		themeData.body.removeClass("preload");
		
		if(themeData.galleryCollage.length) {
			themeData.win.find('img').imagesLoaded(function(){ 
				themeData.fnGalleryCollage(themeData.galleryCollage);
			});
		}

		if(themeData.body.hasClass('with-page-cover')){
			themeData.fnSideNavi();
		}

		if(themeData.body.hasClass('with-video-cover')) {
			themeData.fnVideocoverTitle();
		}

		if(themeData.backTop.length) {
			themeData.fnBackTop();
		}

		if(themeData.naviSide.length){
			themeData.fnNaviSide();
		}

		if(themeData.SliderTriggleDown.length) {
			themeData.TopsliderTrggleDown();
		}

	});
	
	
	//win resize
	themeData.win.resize(function(){
		if(themeData.galleryCollage.length){
			$('.Collage .Image_Wrapper').css("opacity", 0);
			if (resizeTimer) clearTimeout(resizeTimer);
			resizeTimer = setTimeout(function(){
				themeData.fnGalleryCollage(themeData.galleryCollage)
			}, 200);
		}
		
	});

	window.onpageshow = function(event) {
	    if (event.persisted) {
	        window.location.reload() 
	    }
	};
	
})(jQuery);

function fnInitPhotoSwipeFromDOM(gallerySelector){
	// parse slide data (url, title, size ...) from DOM elements 
	// (children of gallerySelector)
	var parseThumbnailElements = function(el){
		var thumbElements = jQuery(el).find('[data-lightbox=\"true\"]'),
			numNodes = thumbElements.length,
			items = [],
			figureEl,
			linkEl,
			size,
			item;

		for(var i = 0; i < numNodes; i++){

			figureEl = thumbElements[i]; // <figure> element

			// include only element nodes 
			if(figureEl.nodeType !== 1){
				continue;
			}

			//linkEl = figureEl.children[0]; // <a> element
			linkEl = jQuery(figureEl).find('.lightbox-item');

			size = linkEl.attr('data-size').split('x');

			// create slide object
			item = {
				src: linkEl.attr('href'),
				w: parseInt(size[0], 10),
				h: parseInt(size[1], 10)
			};



			if(figureEl.children.length > 1){
				// <figcaption> content
				item.title = linkEl.attr('title'); 
			}

			if(linkEl.find('img').length > 0){
				// <img> thumbnail element, retrieving thumbnail url
				item.msrc = linkEl.find('img').attr('src');
			} 

			item.el = figureEl; // save link to element for getThumbBoundsFn
			items.push(item);
		}

		return items;
	};

	// find nearest parent element
	var closest = function closest(el, fn){
		return el && (fn(el) ? el : closest(el.parentNode, fn));
	};

	// triggers when user clicks on thumbnail
	var onThumbnailsClick = function(e){
		e = e || window.event;
		e.preventDefault ? e.preventDefault() : e.returnValue = false;

		var eTarget = e.target || e.srcElement;

		// find root element of slide
		var clickedListItem = closest(eTarget, function(el){
			if(el.tagName){
				return (el.hasAttribute('data-lightbox') && el.getAttribute('data-lightbox') === 'true'); 
			}
		});

		if(!clickedListItem){
			return;
		}

		// find index of clicked item by looping through all child nodes
		// alternatively, you may define index via data- attribute
		var clickedGallery = jQuery(clickedListItem).parents('.lightbox-photoswipe'),
			childNodes = clickedGallery.find('[data-lightbox=\"true\"]'),
			numChildNodes = childNodes.length,
			nodeIndex = 0,
			index;

		for (var i = 0; i < numChildNodes; i++){
			if(childNodes[i].nodeType !== 1){ 
				continue; 
			}

			if(childNodes[i] === clickedListItem){
				index = nodeIndex;
				break;
			}
			nodeIndex++;
		}
		
		if(index >= 0){
			// open PhotoSwipe if valid index found
			openPhotoSwipe(index, clickedGallery[0]);
		}
		return false;
	};

	// parse picture index and gallery index from URL (#&pid=1&gid=2)
	var photoswipeParseHash = function(){
		var hash = window.location.hash.substring(1),
		params = {};

		if(hash.length < 5) {
			return params;
		}

		var vars = hash.split('&');
		for (var i = 0; i < vars.length; i++) {
			if(!vars[i]) {
				continue;
			}
			var pair = vars[i].split('=');  
			if(pair.length < 2) {
				continue;
			}           
			params[pair[0]] = pair[1];
		}

		if(params.gid) {
			params.gid = parseInt(params.gid, 10);
		}

		if(!params.hasOwnProperty('pid')) {
			return params;
		}
		params.pid = parseInt(params.pid, 10);
		return params;
	};

	var openPhotoSwipe = function(index, galleryElement, disableAnimation){
		var pswpElement = document.querySelectorAll('.pswp')[0],
			gallery,
			options,
			items;

		items = parseThumbnailElements(galleryElement);

		// define options (if needed)
		options = {
			index: index,

			// define gallery index (for URL)
			galleryUID: galleryElement.getAttribute('data-pswp-uid'),

			getThumbBoundsFn: function(index) {
				// See Options -> getThumbBoundsFn section of documentation for more info
				var thumbnail = items[index].el.getElementsByTagName('img')[0], // find thumbnail
					pageYScroll = window.pageYOffset || document.documentElement.scrollTop,
					rect = thumbnail.getBoundingClientRect(); 

				return {x:rect.left, y:rect.top + pageYScroll, w:rect.width};
			}

		};

		if(disableAnimation) {
			options.showAnimationDuration = 0;
		}

		// Pass data to PhotoSwipe and initialize it
		gallery = new PhotoSwipe(pswpElement, PhotoSwipeUI_Default, items, options);
		gallery.init();
	};

	// loop through all gallery elements and bind events
	var galleryElements = document.querySelectorAll(gallerySelector);
	
	for(var i = 0, l = galleryElements.length; i < l; i++){
		galleryElements[i].setAttribute('data-pswp-uid', i+1);
		galleryElements[i].onclick = onThumbnailsClick;
	}

	// Parse URL and open gallery if it contains #&pid=3&gid=1
	var hashData = photoswipeParseHash();
	if(hashData.pid > 0 && hashData.gid > 0) {
		openPhotoSwipe( hashData.pid - 1 ,  galleryElements[ hashData.gid - 1 ], true );
	}
}