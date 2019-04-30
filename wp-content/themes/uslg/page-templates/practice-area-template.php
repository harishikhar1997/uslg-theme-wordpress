<?php
/**
* Template Name: Practice Area Template
**/

get_header('inner');
?>
<?php
$terms = get_terms([
    'taxonomy' => 'achievement_position',
    'hide_empty' => false,
]);
foreach ($terms as $key => $term) {
	if($term->term_id==3){
		continue;
	}
	else{ ?>
		<section class="section_heading" id="<?= $term->term_id ?>">
			<div class="container-fluid">
				<h1 class="main_headign c_black text-center"><?= $term->name ?></h1>
			</div>
		</section>
		<section class="section_listing pt-5 pb-5">
			<div class="container">
				<div class="row pt-5 pb-5">				
					<div class="list_count">
					<?php
					$args = array(
						'post_type' => 'achievements',
						'post_status' => 'publish',
		    			'posts_per_page' => -1,
						'tax_query' => array(
    						array(
    							'taxonomy' => 'achievement_position',
    							'field' => 'term_id',
    							'terms' => $term->term_id
     							)
  							)
						);
					$achievements = new WP_Query( $args );
					if ( $achievements->have_posts() ) {
			    	while ( $achievements->have_posts() ) :
			    	$achievements->the_post(); 
					?>
					<div class="col_2">
						<div class="counter">							  
							<h2 class="count-price">&#36;<sub> <?= get_field('achievement_amount')?></sub></h2>
							<h6 class="count-title"><?= get_field('achievement_amount_unit')?></h6>
							<hr class="heading_bg_black">
							<p class="count-text"><?= get_the_title() ?></p>
						</div>
					</div>
					<?php
 					endwhile;
					} 
    				wp_reset_query();
					?>
					</div>
				</div>
			</div>
		</section>
	<?php 
	}
}

?>
<?php get_footer(); ?>