<?php
/**
* Template Name: Attorneys Template
**/

get_header('inner');
?>

<section class="section_attorneys pt-5 pb-3">
	<div class="container">
		
		<div class="row">

	<?php
				$args = array(
		    		'post_type' => 'team',
		    		'post_status' => 'publish',
		    		'posts_per_page' => -1,
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
</section>



<?php get_footer(); ?>