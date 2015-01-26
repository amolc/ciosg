<!-- Google CDN jQuery with fallback to local-->
<script type="text/javascript" src="js/jquery.mCustomScrollbar.concat.min.js"></script>
<script type="text/javascript">
		(function($){
			$(window).load(function(){
				$("#content_6").mCustomScrollbar({
					scrollButtons:{
						enable:true
					},
			advanced:{
     		   updateOnContentResize:true
    			},

					theme:"dark-thick"
				});
				$("#content_7").mCustomScrollbar({
					scrollButtons:{
						enable:true
					},

			advanced:{
     		   updateOnContentResize:true
    			},

					theme:"dark-thick"
				});
				$("#content_8").mCustomScrollbar({
					scrollButtons:{
						enable:true
					},
			advanced:{
     		   updateOnContentResize:true
    			},


					theme:"dark-thick"
				});
			});
		})(jQuery);
</script>
<script type="text/javascript" src="js/jquery.ui.widget.js"></script>
<script type="text/javascript" src="js/jquery.ui.rcarousel.js"></script>
<script type="text/javascript">
        jQuery(function($) {

            function generatePages() {
                var _total, i, _link;

                _total = $("#carousel").rcarousel("getTotalPages");

                for (i = 0; i < _total; i++) {
                	count ++;
                    _link = $("<a href='#'></a>");

                    $(_link)
                            .bind("click", {page: i},
                            function(event) {
                                $("#carousel").rcarousel("goToPage", event.data.page);
                                event.preventDefault();
                            }
                            )
                            .addClass("bullet off")
                            .appendTo("#pages");
                }

                // mark first page as active
                $("a:eq(0)", "#pages")
                        .removeClass("off")
                        .addClass("on")
                        .css( "background-image", "url(images/page-on.png)");

            }
       

            function pageLoaded(event, data) {
                $("a.on", "#pages")
                        .removeClass("on")
                        .css( "background-image", "url(images/page-off.png)");

                $("a", "#pages")
                        .eq(data.page)
                        .addClass("on")
                        .css( "background-image", "url(images/page-on.png)");
            }

            $("#carousel").rcarousel(
                    {
                        visible: 1,
                        step: 1,
                        speed: 700,
                        auto: {
                            enabled: true,
                            interval: 7000
                        },
                        width: 737,
                        height: 415,
                        start: generatePages,
                        pageLoaded: pageLoaded
                    }
            );


            $( "#ui-carousel-next")
                    .add("#ui-carousel-prev")
                    .add( ".bullet")
                    .hover(
                            function() {
                                $(this).css( "opacity", 0.7);
                            },
                            function() {
                                $(this).css( "opacity", 1.0);
                            }
                    );

                
            	var count = 0;
        	    count = <?php echo $list_count?>;

                    if(count == 1){
                    	$('#pages .off').remove();
                    }


            $.fn.videoPlay = function() {
                $("#carousel").rcarousel(
                    {
                        visible: 1,
                        step: 1,
                        speed: 700,
                        auto: {
                            enabled: false,
                            interval: 7000
                        },
                        width: 737,
                        height: 415,
                        start: generatePages,
                        pageLoaded: pageLoaded
                    }
                );
            };

            $.fn.videoPause = function() {
                $("#carousel").rcarousel(
                    {
                        visible: 1,
                        step: 1,
                        speed: 700,
                        auto: {
                            enabled: true,
                            interval: 7000
                        },
                        width: 737,
                        height: 415,
                        start: generatePages,
                        pageLoaded: pageLoaded
                    }
                );
            };

        });


</script>