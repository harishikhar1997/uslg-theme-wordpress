<?php
/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header();
?>





<!-- slider section -->
<div class="flexslider left">
	<ul class="slides">

		<?php
		$args = array(
		    'post_type' => 'slider',
		    'post_status' => 'publish',
		    'posts_per_page' => -1,
				'tax_query' => array(
					array(
						'taxonomy' => 'silder_position',
						'field' => 'term_id',
						'terms' => 15
					)
		)

		);
		$sliders = new WP_Query( $args );

			if ( $sliders->have_posts() ) {
			    while ( $sliders->have_posts() ) :
			    	$sliders->the_post(); 
			 
     ?>
	
	
		<li>
			<img src="<?= get_the_post_thumbnail_url() ?>">
			<div class="meta">
				<h1><?= get_field('header_slide_title')?></h1>
				<p><?= get_field('header_slide_description')?></p>
				<div class="category">
					<div id="section01" class="demo">					  
					  <a href="#full"><img class="img-fluid" src="<?= get_stylesheet_directory_uri() ?>/resources/icons/HomepageArrow.png" alt=""></a>
					</div>
				</div>
			</div>
		</li>
<?php
			 
   	endwhile;
	} //resetting the page loop
    wp_reset_query(); //resetting the page query
?>


		
	</ul>
</div>

<!-- section 02 -->

<section class="section_02 pt-5 pb-5 bg_gradient">
	<div class="container">
		<div class="row">
			<div class="col_12">
				<div class="col_4">
					<h1 class="c_white main_headign_01 border_right text-center m-auto"><?= get_field('home_page_sub_title')?></h1>
					<!--hr class="heading_bg"></hr-->
				</div>
				<div class="col_8">
					<p class="justify-text mid_content_100 c_white"><?= get_field('home_page_sub_description')?></p>					
				</div>				
			</div>
		</div>
	</div>
</section>

<!-- section 03 -->
<section class="section_03 pt-5 pb-5" style="background-color:#f1f1f2;">
	<div class="container">
		<div class="row">
			
				<div class="col_12">
					<h1 class="main_headign c_black text-center"><?= get_field('home_page_practice')?></h1>					
				</div>
				<div class="row1">
				<?php
				$terms = get_terms([
    			'taxonomy' => 'achievement_position',
    			'hide_empty' => false,
				]);
				foreach ($terms as $key => $term) {
					if(get_field('is_featured',$term)==1){?>
					<div class="col-md-4 col-sm-6">
						<div class="box_12">
							<img src="<?= get_field('uslg_featured_image',$term) ?>">
							<div class="middle_content_100 text-center">
								<h3 class="title"><?= $term->name ?></h3>
								<div class="box-content">								
									<hr class="border_line_bg"></hr>
									<a href="<?= get_bloginfo('url').'/practice-areas/#'.$term->term_id ?>" class="learn_more">Learn More</a>
								</div>
							</div>
						</div>
					</div>
					<?php 
					}
					else{
						continue;
					}
					
				}
				?>
				</div>
				<div class="col_12">
				<div class="row1">				
					<p class="c_black pt-4"><?= get_field('home_page_practice_description')?></p>
				</div>
				</div>				
				
			
		</div>
	</div>
</section>

<!-- section 04 -->
<section class="section_04 pt-5 pb-5">
	<div class="container">
		<div class="row pt-5 pb-5">

					<div class="list_count">

				<?php

						$myterms = get_terms('achievement_position', 'orderby=none&hide_empty');    
		
						$args = array(
		    		'post_type' => 'achievements',
		    		'post_status' => 'publish',
		    		'posts_per_page' => 6,
		    		'tax_query' => array(
       		 	array(
            'taxonomy' => 'achievement_position',
            'field' => 'slug',
            'terms' => $myterms[0]->name,
        ),
    ),
					);
					$achievements = new WP_Query( $args );

					if ( $achievements->have_posts() ) {
			    	while ( $achievements->have_posts() ) :
			    	$achievements->the_post(); 
     		?>
     			<a href="<?= get_bloginfo('url').'/practice-areas/' ?>">
						<div class="col_2">
							<div class="counter">							  
								<h2 class="count-price">&#36;<sub><?= get_field('achievement_amount')?></sub></h2>
								<h6 class="count-title"><?= get_field('achievement_amount_unit')?></h6>
								<hr class="heading_bg_black"></hr>
								<p class="count-text"><?= get_the_title() ?></p>
							</div>
						</div>
					</a>
 		
<?php
 		endwhile;
			} //resetting the page loop
    	wp_reset_query(); //resetting the page query
		?>

						
					</div>
				
				
			
		</div>
	</div>
</section>

<!-- section 05 -->
<section class="section_05 pt-3 pb-4">
	<div class="container">
		<div class="row">		
			<div class="head_div text-center">
				<h1 class="main_headign c_black"><?= get_field('recent_case_studies_heading') ?></h1>				
			</div>		
		</div>
	</div>
	<div class="container">            
		<div class="row mt-30">
			<div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="100000">
				<div class="w-100 carousel-inner" role="listbox">
				  
					<?php
						$args = array(
		    		'post_type' => 'case_studies',
		    		'post_status' => 'publish',
		    		'posts_per_page' => -1,
					);
					$case_studies = new WP_Query( $args );

					$i=0;
					if ( $case_studies->have_posts() ) {
			    	while ( $case_studies->have_posts() ) :
			    	$case_studies->the_post(); 
     		?>

				  <div class="carousel-item  <?= $i==0 ? 'active' : ''; ?>">
					<div class="carousel-caption">
					  <div class="row">
						<div class="col-sm-6">
						  <img src="<?= get_the_post_thumbnail_url() ?>" alt="" class="img-fluid"/>
						</div>
						<div class="col-sm-6 mmt_30">
						  <div class="c_dark"><?= get_the_content() ?></div>
						</div>
					  </div>
					</div>
				  </div>

		<?php
				$i++;
 				endwhile;
				} //resetting the page loop
    		wp_reset_query(); //resetting the page query
		?>
				</div>
				<div class="navi_icon">
				<a class="left_arrow" href="#carouselExampleControls" role="button" data-slide="prev">
				  <span class="carousel-control-prev-icon ico" aria-hidden="true"></span>
				  <span class="sr-only">Previous</span>
				</a>
				<a class="right_arrow" href="#carouselExampleControls" role="button" data-slide="next">
				  <span class="carousel-control-next-icon ico" aria-hidden="true"></span>
				  <span class="sr-only">Next</span>
				</a>
				</div>
			  </div>
		</div>
	</div>	
</section>

<!-- section 06 -->

<section class="section_06 pt-5 pb-5 bg_gradient">
	<div class="container">
		<div class="row">
		
			
			<div class="col_12">
				<div class="col_4">
					<h1 class="c_white main_headign_01 border_right text-center m-auto"><?= get_field('testimonials_heading') ?></h1>
					<!--hr class="heading_bg"></hr-->
				</div>
				<div class="col_8 c_white">
							
					<div id="carouselExampleControls1" class="carousel slide" data-ride="carousel" data-interval="5000">
						<div class="w-100 carousel-inner" role="listbox">
					
					<?php
						$args = array(
		    		'post_type' => 'testimonials',
		    		'post_status' => 'publish',
		    		'posts_per_page' => -1,
					);
					$testimonials = new WP_Query( $args );

					$i=0;
					if ( $testimonials->have_posts() ) {
			    	while ( $testimonials->have_posts() ) :
			    	$testimonials->the_post(); 
     		?>		

							<div class="carousel-item  <?= $i==0 ? 'active' : ''; ?>">
								<div class="carousel-caption">
									<div class="row">
									<div class="col-sm-12">
										<p><?= get_the_content() ?></p>					
										<div class="form-group" id="rating-ability-wrapper">
											<a href="" class="pr-3 c_white"><?= get_field('testimony_author') ?></a>
											<?php $rating=get_field('rating'); 
											for($j=1;$j<6;$j++){?>
											<a class="btnrating <?= $j<=$rating? 'active' : ''; ?>" data-attr="<?= $j ?>" id="rating-star-<?= $j ?>">
												<i class="fa fa-star" aria-hidden="true"></i>
											</a>
										<?php }?>
										</div>
									</div>
									</div>
								</div>
							</div>

			<?php
				$i++;
 				endwhile;
				} //resetting the page loop
    		wp_reset_query(); //resetting the page query
		?>
						</div>	
					</div>
				
				</div>
			
			</div>
			
			
		</div>
	</div>
</section>


<!-- section 07 -->
<section class="section_07 pt-5">
	<div class="container">
		<div class="row">			
			<div class="col_4">
				<div class="head_div text-center">
					<h1 class="main_headign border_right_black c_black"><?= get_field('team_heading')?></h1>											
				</div>
			</div>
			<div class="col_8">
				<p class="c_dark"><?= get_field('team_description')?></p>
			</div>		
		</div>
		<div class="row mt-5">
			
			<?php
				$args = array(
		    		'post_type' => 'team',
		    		'post_status' => 'publish',
		    		'posts_per_page' => 3,
				);
				$team = new WP_Query( $args );
				if ( $team->have_posts() ) {
			    	while ( $team->have_posts() ) :
			    	$team->the_post(); 
     	?>


			<div class="col-sm-4">
				<div class="card">
					<a href="<?= get_the_permalink() ?>">
						<img class="card-img-top img-fluid" src="<?= get_the_post_thumbnail_url() ?>" alt="Attroney">
						<div class="card-body">
						   <h5 class="card-title"><?= get_the_title() ?></h5>
						   <hr class="heading_bg_black"></hr>
						   <p class="card-text"><?= get_field('designation')?></p>
						   
						</div>
					</a>
				</div>
			</div>

		<?php
 				endwhile;
				} //resetting the page loop
    		wp_reset_query(); //resetting the page query
		?>

		</div>
	
	</div>
</section>

<!-- section 08 -->
<section class="section_08 pb-5">
	<div class="container">		
		<div class="row mt-5">
		
			<div class="col_12">
				<div class="head_div text-center">
					<h1 class="main_headign c_white"><?= get_field('newsletter_heading') ?></h1>										
				</div>
			</div>
			<div class="col_12 mt-4">
			<div class="contact_form">
				<?php echo do_shortcode('[contact-form-7 id="91"]'); ?>
			</div>
			
			</div>
			
		</div>
	</div>
</section>

<?php get_footer(); ?>