<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */

?>

<!-- Footer section -->
<div id="full" class="footer-bottom-area bg_gradient pt-5">
	<div class="container">
		<div class="row widgets footer-widgets">

			<div class="col-sm-12 col-md-8 col-12">
				<div class="single-widget widget-about">
					<div class="img-fluid">
					<?php dynamic_sidebar('footer-logo');?>
					</div>
					<?php dynamic_sidebar('footer-sidebar-1');?>
				</div>
			</div>

			<div class="col-sm-4 col-md-2 col-12">
				<div class="single-widget">
					<h5 class="widget-title">Quick Links</h5>
					<ul class="mt-2">
					<?php dynamic_sidebar('footer-sidebar-2');?>
					</ul>
				</div>
			</div>		

			<div class="col-sm-4 col-md-2 col-12">
				<?php dynamic_sidebar('footer-sidebar-3');?>
			</div>

		</div>
	</div>
	<div class="copyright">
		<p class="text-center c_white"><?= mb_copyright();?></p>
	</div>
</div>
	
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>	
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
<script type="text/javascript">
$(document).ready(function(){
$('#menuToggle').on('click', function() {
  $('body').toggleClass('changebackground');
})
});
</script>
<script type="text/javascript">

<!----  logo slider---------->	
$(document).ready(function(){
    $('.customer-logos').slick({
        slidesToShow: 6,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1500,
        arrows: false,
        dots: false,
        pauseOnHover: false,
        responsive: [{
            breakpoint: 768,
            settings: {
                slidesToShow: 4
            }
        }, {
            breakpoint: 520,
            settings: {
                slidesToShow: 3
            }
        }]
    });
});
</script>
<script type="text/javascript">
$(function() {
  $('a[href*=#]').on('click', function(e) {
    e.preventDefault();
    $('html, body').animate({ scrollTop: $($(this).attr('href')).offset().top}, 500, 'linear');
  });
});
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.2.0/jquery.flexslider-min.js"></script>
<script>
     $('.flexslider').flexslider({
	animation: "slide",
	controlNav: false
});
</script>
<!----  online link href="javascript:void(0)"---------->

<script type="text/javascript">
$(document).ready(function () {
$('.main_menu .dmenu').hover(function () {
        $(this).find('.sm-menu').first().stop(true, true).slideDown(150);
    }, function () {
        $(this).find('.sm-menu').first().stop(true, true).slideUp(105)
    });
});
<!----  video js---------->
    $(".video-play").on('click', function(e) {
        e.preventDefault(); 
        var vidWrap = $(this).parent(),
            iframe = vidWrap.find('.video iframe'),
            iframeSrc = iframe.attr('src'),
            iframePlay = iframeSrc += "?autoplay=1";
        vidWrap.children('.video-thumbnail').fadeOut();
        vidWrap.children('.video-play').fadeOut();
        vidWrap.find('.video iframe').attr('src', iframePlay);


    });
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.0.2/TweenMax.min.js"></script>
<script>
	 
var t1 = new TimelineMax({paused: true});

t1.to(".one", 0.8, {
 y: 6,
 rotation: 45,
 ease: Expo.easeInOut
});
t1.to(".two", 0.8, {
 y: -6,
 rotation: -45,
 ease: Expo.easeInOut,
 delay: -0.8
});

t1.to(".menu", 0.5, {
 top: "0%", 
 ease: Expo.easeInOut,
 background: "#fff",
 display:"block",
 delay: -0.5
});

t1.staggerFrom(".menu ul li", 0.3, {x: -50, opacity: 0, ease:Expo.easeOut}, 0.1);

t1.reverse();
$(document).on("click", ".toggle-btn-01", function() {
 t1.reversed(!t1.reversed());
});
$(document).on("click", "a1", function() {
 t1.reversed(!t1.reversed());
});
 </script>
<?php wp_footer(); ?>
</body>
</html>
