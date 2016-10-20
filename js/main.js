jQuery(window).ready(function () {

	$('.btn-team-show-more').click(function(){
		if($(this).text()=='show more'){
			$(this).text('show less');
			$(this).siblings('.cont-description').addClass('show-more').removeClass('show-less');
		}else{
			$(this).text('show more');
			$(this).siblings('.cont-description').addClass('show-less').removeClass('show-more');
		}
	});

	jQuery.ajax({
        dataType: "json",
        url: "https://www.googleapis.com/youtube/v3/videos",
        data: {
            part: 'snippet',
            id: 'Ro_0p-Jo8ls',
            key: 'AIzaSyATs9R_IBTjzMUEM8xGAmRn5PAb3DUrPYs'
        },
        success: function(data) {
            if (typeof data.items != "undefined" && data.items.length > 0) {
                console.log(data.items[0].snippet.publishedAt);
            }
        }
    });
	var flag = 1;
	$(window).scroll(function (event) {
	    var scroll = $(window).scrollTop();
	    var sliderheight = $('#slider').height();
	    var headerheight = $('#header').height();
	    if((sliderheight+headerheight)<scroll&&flag){
	    	flag = 0;
			$('.cont-askanexpert').fadeIn(500);
			$('.askanexpert-avatar').animate({top: '10px'},1500);
			setTimeout(function(){
				$('.askanexpert-message').fadeIn(500);
			},1700);
	    }
	});



	/** Isotope Blog
	 *********************** **/
	var blog_isotope_container = jQuery("#blog.blog-isotope");

	if(blog_isotope_container.length > 0) {
		loadScript(plugin_path + 'isotope/isotope.pkgd.min.js', function() {

			// Isotope blog
			if(jQuery().isotope) {
				var _container = jQuery('#blog');
				// Calculate Item Width on Fullwidth Blog
				if(_container.hasClass('blog-isotope-2')) {
					_cols = 2;
				} else
				if(_container.hasClass('blog-isotope-3')) {
					_cols = 3;
				} else
				if(_container.hasClass('blog-isotope-4')) {
					_cols = 4;
				} else { _cols = 4; }


				function _customrecalcW2() {

					_dw		= jQuery(document).width();
					if(_container.hasClass('fullwidth')) { // Fullwidth

						_w 		= jQuery(document).width();
						_wItem	= (_w/_cols);

						if(_dw < 760) {
							_wItem = (_w/2);
						}
						if(_dw < 480) {
							_wItem = jQuery("#blog").width();
						}

						// Apply item width
						jQuery("#blog>.blog-post-item").css({"width":_wItem});

					} else { // Non Fullwidth

						_mR		= parseInt(jQuery("#blog>.blog-post-item").css('margin-right'));
						_w 		= jQuery("#blog").closest('.container').width();
						_wItem 	= _w / _cols - _mR;

						if(_dw < 1200) {
							_wItem = (_w/3);
						}
						if(_dw < 760) {
							_wItem = (_w/2 - _mR);
						}
						if(_dw < 480) {
							_wItem = _w;
						}

						// Apply item & container width
						jQuery("#blog.blog-isotope").css({"width":_w});
						jQuery("#blog>.blog-post-item").css({"width":_wItem});

					}

					// Resize Flex Slider if exists!
					if(jQuery('.flexslider').length > 0) {
						jQuery('.flexslider').resize();
					}

				}

				setTimeout(function(){
					_customrecalcW2();
				},5);

				jQuery(window).load(function(){

					var _t = setTimeout(function(){

						_container.isotope({
							masonry: {},

							filter: '*',
							animationOptions: {
								duration: 750,
								easing: 'linear',
								queue: false
							}
						});

						jQuery('#blog_filter>li>a').bind("click", function(e){
							e.preventDefault();

							jQuery('#blog_filter>li.active').removeClass('active');
							jQuery(this).parent('li').addClass('active');

							var selector = jQuery(this).attr('data-filter');
							_container.isotope({
								filter: selector,
								animationOptions: {
									duration: 750,
									easing: 'linear',
									queue: false
								}
							 });

						});


					}, 50 );

					setTimeout(function() {
						_container.isotope('layout');
					}, 300);
				});


				// On Resize
				jQuery(window).resize(function() {

					if(window.customafterResizeApp2) {
						clearTimeout(window.customafterResizeApp2);
					}

					window.customafterResizeApp2 = setTimeout(function() {
						setTimeout(function(){
							_customrecalcW2();
						},5);

						setTimeout(function() {
							_container.isotope('layout');
						}, 500);

					}, 300);
				});
			}
		});
	}	/** end isotope **/

	/** Isotope Portfolio
	 *********************** **/
	var portfolio_isotope_container = jQuery("#portfolio.portfolio-isotope");

	if(portfolio_isotope_container.length > 0) {
		loadScript(plugin_path + 'isotope/isotope.pkgd.min.js', function() {

			// Isotope Portfolio
			if(jQuery().isotope) {

				var _container = jQuery('#portfolio');

				// Calculate Item Width on Fullwidth portfolio
				if(_container.hasClass('portfolio-isotope-2')) {
					_cols = 2;
				} else
				if(_container.hasClass('portfolio-isotope-3')) {
					_cols = 3;
				} else
				if(_container.hasClass('portfolio-isotope-4')) {
					_cols = 4;
				} else
				if(_container.hasClass('portfolio-isotope-5')) {
					_cols = 5;
				} else
				if(_container.hasClass('portfolio-isotope-6')) {
					_cols = 6;
				} else { _cols = 4; }



				function _customrecalcW2() {
					_dw		= jQuery(document).width();

					if(_container.hasClass('fullwidth')) { // Fullwidth

						// _w 		= jQuery(document).width(); // NOT USED - problems on aside header
						_w 		= _container.width();
						_wItem	= (_w/_cols);

						if(_dw < 760) {
							_wItem = (_w/2);
						}
						if(_dw < 480) {
							_wItem = jQuery("#portfolio").width();
						}

						// Apply item width
						jQuery("#portfolio>.portfolio-item").css({"width":_wItem});

					} else { // Non Fullwidth

						_mR		= parseInt(jQuery("#portfolio>.portfolio-item").css('margin-right'));
						_w 		= jQuery("#portfolio").closest('.container').width();
						_wItem 	= _w / _cols - _mR;
						if(_dw < 1200) {
							_wItem = (_w/3);
						}
						if(_dw < 760) {
							_wItem = (_w/2 - _mR);
						}
						if(_dw < 480) {
							_wItem = _w;
						}

						// Apply item & container width
						jQuery("#portfolio.portfolio-isotope").css({"width":_w});
						jQuery("#portfolio>.portfolio-item").css({"width":_wItem});

					}

					// Resize Flex Slider if exists!
					if(jQuery('.flexslider').length > 0) {
						jQuery('.flexslider').resize();
					}

				}
				setTimeout(function(){
					_customrecalcW2();
				},5);



				jQuery(window).load(function(){

					var _t = setTimeout(function(){

						_container.isotope({
							masonry: {},

							filter: '*',
							animationOptions: {
								duration: 750,
								easing: 'linear',
								queue: false
							}
						});

						jQuery('#portfolio_filter>li>a').bind("click", function(e){
							e.preventDefault();

							jQuery('#portfolio_filter>li.active').removeClass('active');
							jQuery(this).parent('li').addClass('active');

							var selector = jQuery(this).attr('data-filter');
							_container.isotope({
								filter: selector,
								animationOptions: {
									duration: 750,
									easing: 'linear',
									queue: false
								}
							 });

						});


					}, 50 );

					setTimeout(function() {
						_container.isotope('layout');
					}, 300);

				});



				// On Resize
				jQuery(window).resize(function() {

					if(window.customafterResizeApp2) {
						clearTimeout(window.customafterResizeApp2);
					}

					window.customafterResizeApp2 = setTimeout(function() {

						setTimeout(function(){
							_customrecalcW2();
						},5);

						setTimeout(function() {
							_container.isotope('layout');
						}, 500);

					}, 300);

				});
			}
		});
	}	/** end isotope **/

	$('.cont-more-episodes').delegate('.video-item a','click',function(e){
		e.preventDefault();

		var $videogrid = $(this).parents( '.video-episodes' );
            var $videobig = $videogrid.find('.video-episode-feature');
            var $itembox = $( this )
                .closest( '.video-item' );
            var $videourl = $( this )
                .attr( 'href' );

            if ( $videourl.search( 'youtu.be/' ) != -1 ) {
                var $id = $videourl.split( 'youtu.be/' )[ 1 ];
            } else {
                var $id = $videourl.split( '?v=' )[ 1 ];
            }

            $videobig.find( '.embed-responsive' )
                .empty();
            $( '.video-details h3' )
                .html( $itembox.find( '.title' )
                    .first()
                    .clone().text() );
            var $videoframe = $(
                '<iframe class="embed-responsive-item" width="100%" height="100%" src="//www.youtube.com/v/' +
                $id +
                '?autoplay=1&controls=1&modestbranding=1&rel=0" frameborder="0" allowfullscreen>'
            );
            $videobig.find( '.embed-responsive' )
                .first()
                .append( $videoframe );

            return false;
	});

	$('.owl-carousel').delegate('.owl-item .video-play','click',function(e){
		e.preventDefault();

		var $videogrid = $('.video-episodes' );
			var $videobig = $videogrid.find('.video-episode-feature');
			var $itembox = $( this )
				.closest( '.owl-item' );
			var $videourl = $( this )
				.attr( 'href' );

			if ( $videourl.search( 'youtu.be/' ) != -1 ) {
				var $id = $videourl.split( 'youtu.be/' )[ 1 ];
			} else {
				var $id = $videourl.split( '?v=' )[ 1 ];
			}

			$videobig.find( '.embed-responsive' )
				.empty();
			$( '.video-details h3' )
				.html( $itembox.find( '.post-title' )
					.first()
					.clone().text() );
			var $videoframe = $(
				'<iframe class="embed-responsive-item" width="100%" height="100%" src="//www.youtube.com/v/' +
				$id +
				'?autoplay=1&controls=1&modestbranding=1&rel=0" frameborder="0" allowfullscreen></iframe>'
			);
			$videobig.find( '.embed-responsive' )
				.first()
				.append( $videoframe );

				$( 'html, body' )
				                .animate( {
				                    scrollTop: $videogrid.offset()
				                        .top - 300
				                }, 300 );
			return false;
	});


});




jQuery( function ( $ ) {
    $( '.video-grid' )
        .delegate( '.video-grid-play', 'click', function ( e ) {
            e.preventDefault();



            var $videogrid = $( this )
                .closest( '.video-grid' );
            var $videobig = $videogrid.find( '.video-big-wrapper' );
            var $videourl = $( this )
                .attr( 'href' );
            if ( $videourl.search( 'youtu.be/' ) != -1 ) {
                var $id = $videourl.split( 'youtu.be/' )[ 1 ];
            } else {
                var $id = $videourl.split( '?v=' )[ 1 ];
            }

            $videobig.find( 'figure iframe' )
                .remove();

            // Swap the Vids
            var $thisBox = $( this )
                .closest( '.item-box' );

            if ( !( $thisBox.hasClass( 'item-box-big' ) ) ) {
                // If this box not in the big box

                var $theBiggerBox = $videobig.find( '.item-box' )
                    .first();
                $theBiggerBox.find( 'img' )
                    .css( {
                        'min-height': ""
                    } );
                $thisBox.css( {
                    'height': ""
                } );

                $thisBox.find( '.inner > img' )
                    .remove();

                var $biggerBoxSpanBlock = $theBiggerBox.find(
                        'span.block' )
                    .first();
                $biggerBoxSpanBlock.empty();
                var $biggerBoxSpanBlockACSS = $theBiggerBox.find(
                        '.video-grid-play' )
                    .first()
                    .attr( 'class' );
                var $thisBoxSpanBlock = $thisBox.find(
                        '.inner span.block' )
                    .first();
                var $thisBoxSpanBlockACSS = $thisBoxSpanBlock.find(
                        'a' )
                    .first()
                    .attr( 'class' );

                $theBiggerBox.find( '.inner .video-grid-play' )
                    .attr( 'class', $thisBoxSpanBlockACSS );
                $theBiggerBox.find( '.inner .video-grid-play' )
                    .appendTo( $biggerBoxSpanBlock );
                $thisBox.find( '.inner span.block .video-grid-play' )
                    .attr( 'class', $biggerBoxSpanBlockACSS );
                $thisBox.find( '.inner span.block .video-grid-play' )
                    .insertAfter( $thisBoxSpanBlock );
                $theBiggerBox.removeClass()
                    .addClass( $thisBox.attr( 'class' ) );
                $thisBox.removeClass()
                    .addClass(
                        'item-box item-box-big noshadow margin-bottom-10'
                    );

                $theBiggerBox.insertAfter( $thisBox );
                $thisBox.appendTo( $videobig );

                $( '.video-grid-details' )
                    .html( $thisBox.find( '.inner h3' )
                        .first()
                        .clone() );

            }

            // Change Height of NonPlaying Column

            // Change Width
            $videogrid.find( '.video-big-wrapper' )
                .removeClass( 'col-md-6' )
                .addClass( 'col-md-9 video-now-playing' );
            $videogrid.find( '.video-grid-column-wrapper' )
                .addClass( 'video-grid-playing' );

            var $videoPlayingHeight = $videogrid.find(
                    '.video-big-wrapper' )
                .height();
            var $videoNonPlayingPadding = 10;
            var $videoNonPlayingItemHeight = ( $videoPlayingHeight /
                4 ) - $videoNonPlayingPadding;


            $videogrid.find( '.video-grid-column-wrapper .item-box' )
                .css( 'height', $videoNonPlayingItemHeight );

            $videogrid.find( '.video-grid-column-wrapper .item-box' )
                .each( function ( i, v ) {

                    $( v )
                        .find( '.inner > img' )
                        .remove();

                    if ( i > 0 ) {
                        $( v )
                            .addClass( 'margin-top-10' );
                    }
                    var $newimage = $( v )
                        .find( 'img' )
                        .clone();

                    $newimage.prependTo( $( v )
                        .find( '.inner' ) );
                } );



            var $videoframe = $(
                '<div class="embed-responsive embed-responsive-16by9"> <iframe class="embed-responsive-item" width="100%" height="100%" src="//www.youtube.com/v/' +
                $id +
                '?autoplay=1&controls=1&modestbranding=1&rel=0" frameborder="0" allowfullscreen></iframe></div>'
            );
            $videobig.find( 'figure' )
                .first()
                .append( $videoframe );
        } );

    $( '#all-videos .video-grid-play' )
        .click( function ( e ) {
            e.preventDefault();
            $( '.item-box-big .video-grid-play' )
                .trigger( 'click' );
            var $videogrid = $( '.video-grid' )
                .first();
            var $videobig = $videogrid.find( '.video-big-wrapper' );
            var $itembox = $( this )
                .closest( '.item-box' );
            var $videourl = $( this )
                .attr( 'href' );

            if ( $videourl.search( 'youtu.be/' ) != -1 ) {
                var $id = $videourl.split( 'youtu.be/' )[ 1 ];
            } else {
                var $id = $videourl.split( '?v=' )[ 1 ];
            }

            $videobig.find( 'figure iframe' )
                .remove();
            $( '.video-grid-details' )
                .html( $itembox.find( '.inner h3' )
                    .first()
                    .clone() );
            var $videoframe = $(
                '<div class="embed-responsive embed-responsive-16by9"> <iframe class="embed-responsive-item" width="100%" height="100%" src="//www.youtube.com/v/' +
                $id +
                '?autoplay=1&controls=1&modestbranding=1&rel=0" frameborder="0" allowfullscreen></iframe></div>'
            );
            $videobig.find( 'figure' )
                .first()
                .append( $videoframe );

            $( 'html, body' )
                .animate( {
                    scrollTop: $videogrid.offset()
                        .top - 100
                }, 300 );


            if ( $( '.video-grid-column-wrapper' )
                .length != 1 ) {

                var $newvidcolumnwrapper = $(
                    '<div class="col-md-3 col-sm-6 col-xs-6 col-2xs-12 video-grid-column-wrapper video-grid-playing" />'
                );
                $( '.video-grid-column-wrapper' )
                    .remove();


                $( '#planning .item-box' )
                    .each( function () {
                        $newvidcolumnwrapper.append( $( this )
                            .clone() );
                    } );

                $newvidcolumnwrapper.css( 'max-height', $videogrid.find(
                        '.video-big-wrapper .item-box-big' )
                    .height() );
                $newvidcolumnwrapper.css( 'overflow', 'auto' );
                $newvidcolumnwrapper.insertAfter( $videobig );


                $videogrid.find( '.video-big-wrapper' )
                    .removeClass( 'col-md-6' )
                    .addClass( 'col-md-9 video-now-playing' );
                $videogrid.find( '.video-grid-column-wrapper' )
                    .addClass( 'video-grid-playing' );

                var $videoPlayingHeight = $videogrid.find(
                        '.video-big-wrapper' )
                    .height();
                var $videoNonPlayingPadding = 10;
                var $videoNonPlayingItemHeight = (
                    $videoPlayingHeight /
                    4 ) - $videoNonPlayingPadding;

                $videogrid.find(
                        '.video-grid-column-wrapper .item-box' )
                    .css( 'height', $videoNonPlayingItemHeight );

                $videogrid.find(
                        '.video-grid-column-wrapper .item-box' )
                    .each( function ( i, v ) {

                        $( v )
                            .find( '.inner > img' )
                            .remove();

                        if ( i > 0 ) {
                            $( v )
                                .addClass( 'margin-top-10' );
                        } else {
                            $( v )
                                .removeClass( 'margin-top-10' );
                        }
                        var $newimage = $( v )
                            .find( 'img' )
                            .clone();

                        $newimage.prependTo( $( v )
                            .find( '.inner' ) );
                    } );


            }

            return false;
        } );



    $( '#container-coming-soon .coming-soon-play' )
        .click( function ( e ) {
            e.preventDefault();

            var $videogrid = $(this).parents( '.cont-c-vid' );
            var $videobig = $videogrid
            var $itembox = $( this )
                .closest( '.item-box' );
            var $videourl = $( this )
                .attr( 'href' );

                console.log($videourl);
            if ( $videourl.search( 'youtu.be/' ) != -1 ) {
                var $id = $videourl.split( 'youtu.be/' )[ 1 ];
            } else {
                var $id = $videourl.split( '?v=' )[ 1 ];
            }

            $videobig.find( 'figure' )
                .empty();
            $( '.video-grid-details' )
                .html( $itembox.find( '.inner h3' )
                    .first()
                    .clone() );
            var $videoframe = $(
                '<iframe class="embed-responsive-item" width="100%" height="100%" src="//www.youtube.com/v/' +
                $id +
                '?autoplay=1&controls=1&modestbranding=1&rel=0" frameborder="0" allowfullscreen>'
            );
            $videobig.find( 'figure' )
                .first()
                .append( $videoframe );

            return false;
        } );

		
        } );
