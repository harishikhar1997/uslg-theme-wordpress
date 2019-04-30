<?php
/**
* Template Name: Locations Template
**/

get_header('inner');
?>

<!-- Locations section -->
<section class="section_location pt-5 pb-5">
	<div class="container">		
		<div class="row">
			<?php
				$args = array(
	    		'post_type' => 'uslg_locations',
	    		'post_status' => 'publish',
	    		'posts_per_page' => -1
				);
				$locations = new WP_Query( $args );

				if ( $locations->have_posts() ) {
		    	while ( $locations->have_posts() ) :
		    	$locations->the_post(); 
     		?>
			<div class="col-md-4 col-sm-6 mbo_30">
				<div class="box17">
					<img class="img-fluid" src="<?= get_the_post_thumbnail_url() ?>" alt="">
					<ul class="icon">
						<li><a href="javascript:void(0);"><i class="fa fa-search"></i></a></li>
						<li><a href="javascript:void(0);"><i class="fa fa-link"></i></a></li>
					</ul>
				</div>
				<div class="card-body pl-0">
				   <h5 class="card-title"><?= get_the_title() ?></h5>
				   <p class="card-text"><?= get_field('location_address')?></p>
				</div>
			</div>
			<?php
 			endwhile;
			}
    		wp_reset_query(); //resetting the page query
			?>
		</div>		
	</div>
</section>
<?php get_footer(); ?>