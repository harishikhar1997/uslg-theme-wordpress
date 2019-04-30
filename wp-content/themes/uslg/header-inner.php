<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>USLG</title>
<!--link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i|Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet"-->
<link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i|Prata" rel="stylesheet"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.2.0/flexslider-min.css">


<!------ Include Custom css ---------->
<link href="<?= get_stylesheet_directory_uri() ?>/resources/css/custom.css" rel="stylesheet">
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<![endif]-->
<?php wp_head(); ?>
</head>


<body <?php body_class(); ?>>
<div class="right_bar_nav">
	<?php		
	// Get Logo
	$custom_logo_id = get_theme_mod( 'custom_logo' );
	$logoUrl = wp_get_attachment_image_src( $custom_logo_id , 'full' )[0];
	?>

	<?php if(!empty($logoUrl)){ ?>
	<a class="brand-navbar" href="<?= get_bloginfo('url') ?>"><img src="<?= $logoUrl ?>" class="img-fluid" alt="Responsive image"></a>
	<?php } ?>
	<nav role="navigation">
	  <div id="menuToggle">
		<input type="checkbox" />
		<span></span>
		<span></span>
		<span></span>
		<!-- main Menu -->
		<?php 
			$args = array(
			'theme_location'  => 'top',
			'container' => 'ul',
			'menu_id' => 'menu',
			'menu_class'=> 'nav-item',
			'container' => 'a',
			'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s<li class="nav-item">
			<hr class="border_line_bg">
			<a class="social_icon" href="'.mb_facebook().'"><i class="fa fa-facebook" aria-hidden="true"></i></a>
			<a class="social_icon" href="'.mb_twitter().'"><i class="fa fa-twitter" aria-hidden="true"></i></a>
			<a class="social_icon" href="'.mb_instagram().'"><i class="fa fa-instagram" aria-hidden="true"></i></a>
			<a class="social_icon" href="#"><font class="c_site_color">'.mb_showheaderphone().'</font></a></li></ul>'
			);
			wp_nav_menu( $args );
		?>   
	  </div>
	</nav>
</div>

<?php if ( is_archive() ) { 

	$queried_object = get_queried_object();
$term_id = $queried_object->term_id;?>
	<div class="inner_slide">
	<div class="container-fluid">
		<div class="row">
		<img class="img-fluid" src="<?= get_field('inner_banner_image','category_'.$term_id)?>" srcset="<?= get_field('inner_banner_image')?> 500w, <?= get_field('inner_banner_image','category_'.$term_id)?> 800w, <?= get_field('inner_banner_image','category_'.$term_id)?> 1024w" sizes="(min-width: 1024px) 1024px, 100vw">
		</div>
	</div>
</div>

<!-- section 02 -->
<section class="section_02 bg_gradient pt-5 pb-5">
	<div class="container">
		<div class="row">
			<div class="col_12">
				<div class="col_4">
					<h1 class="c_white main_headign_01 border_right text-center m-auto"><?= get_field('inner_sub_title','category_'.$term_id)?></h1>
					<!--hr class="heading_bg"></hr-->
				</div>
				<div class="col_8 c_white">
					<p class="justify-text mid_content_100"><?= get_field('inner_sub_description','category_'.$term_id)?></p>					
				</div>				
			</div>
		</div>
	</div>
</section>
<?php } else if(is_page('attorneys')){?>
<!-- inner slide section -->
<div class="inner_slide">
	<video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
		<source src="<?= get_field('banner_video')?>" type="video/mp4">
	</video>
</div>

<!-- section 02 -->
<section class="section_02 bg_gradient pt-5 pb-5">
	<div class="container">
		<div class="row">
			<div class="col_12">
				<div class="col_4">
					<h1 class="c_white main_headign_01 border_right text-center m-auto"><?= get_field('heading')?></h1>					
				</div>
				<div class="col_8 c_white">
					<p class="justify-text mid_content_100"><?= get_field('sub_heading')?></p>					
				</div>
			</div>
		</div>
	</div>
</section>

<?php } else {?>	

<!-- inner slide section -->
<div class="inner_slide">
	<div class="container-fluid">
		<div class="row">
		<img class="img-fluid" src="<?= get_field('inner_banner_image')?>" srcset="<?= get_field('inner_banner_image')?> 500w, <?= get_field('inner_banner_image')?> 800w, <?= get_field('inner_banner_image')?> 1024w" sizes="(min-width: 1024px) 1024px, 100vw">
		</div>
	</div>
</div>

<!-- section 02 -->
<section class="section_02 bg_gradient pt-5 pb-5">
	<div class="container">
		<div class="row">
			<div class="col_12">
				<div class="col_4">
					<h1 class="c_white main_headign_01 border_right text-center m-auto"><?= get_field('inner_sub_title')?></h1>
					<!--hr class="heading_bg"></hr-->
				</div>
				<div class="col_8 c_white">
					<?php
						if(is_page('locations') || is_page('contact') || is_singular('team')){
							$style = '';
						}else{
							$style = 'style="height:unset;"';
						}
					?>
					<p class="justify-text mid_content_100" <?= $style; ?> ><?= get_field('inner_sub_description')?></p>					
				</div>				
			</div>
		</div>
	</div>
</section>
<?php } ?>