<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header('inner'); 

$page_title=get_the_title();
// print_r($page_title);die();
$page_id=get_the_id();

$ID = url_to_postid('awards');
//print_r($ID);die();
?>



<section class="section_02 pt-5 pb-5">
	<div class="container">
		<div class="row">
			
			<div class="col_12" role="tabpanel">
				<div class="col_3">
					<h5 class="card-title">Our Attorneys</h5>
					<ul class="nav nav-pills brand-pills nav-stacked" role="tablist">
						
			<?php
			$i=0;
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

						<li role="presentation" class="brand-nav">
						<a class="<?= get_the_title() == $page_title ? 'active' : ''; ?>" href="<?= get_the_permalink() ?>"><?= get_the_title() ?></a>
						</li>
			<?php
			$i++;
 				endwhile;
				} //resetting the page loop
    	wp_reset_query(); //resetting the page query
			?>
				
					</ul>
				</div>
				
				<div class="col_9">
					<div class="tab-content">
						<div role="tabpanel" class="tab-pane active" id="tab1">
							<div class="row">
								<div class="col_5 text-center">								
									<div class="single_mid">
										<img class="img-fluid" src="<?= get_the_post_thumbnail_url() ?>" alt="">
									</div>               
								</div>
								<div class="col_7 text-left">
									<div class="single_service">
										 <h4><?= get_the_title() ?></h4>
										 <h6 class="mb-3 c_gray"><?= get_field('team_designation') ?></h6>
										 <div class="address">								
											<h6 class="mb-0">Practice Areas:</h6>
											<p><?= get_field('team_practice_description') ?></p>
											<h6 class="mb-0">Experience:</h6>
											<p><?= get_field('team_experience_description') ?></p>
											<h6 class="mb-0">Email:</h6>
											<p><?= get_field('team_email') ?></p>
											<h6 class="mb-0">Phone:</h6>
											<p><?= get_field('team_phone') ?></p>										
										</div>
										<div class="social-part">
											<a href="<?= get_field('facebook_link') ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a>
											<a href="<?= get_field('twitter_link') ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a>
											<a href="<?= get_field('instagram_link') ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a>
										</div>
									</div>
								</div>
							</div>
							<div class="row mt-5">
								<div class="f_wrap col_12 text-left">
									<h4>Personal Experience</h4>
									<p><?= get_field('team_personal_experience') ?></p>
								</div>
							</div>
							
							<div class="row">
								<h4 class="pl-3">Notable Cases</h4>
								<div class="f_wrap list_count">
									<?php
									$args = array(
									 'post_type' => 'achievements',
									 'post_status'       => 'publish',
									 'posts_per_page' => -1,   
									 'meta_query' => array(
									     array(
									         'key' => 'member_achievement',
									         'value' => '"' . get_the_ID() . '"', 
									        'compare' => 'LIKE'
									     )
									 )
									);
									$query = new WP_Query($args);
									if ( $query->have_posts() ) {
			    				while ( $query->have_posts() ) :
			    				$query->the_post(); 
									?>
									<div class="col_3">
										<div class="counter">							  
											<h2 class="count-price"><sub>$</sub><?= get_field('achievement_amount')?></h2>
											<h6 class="count-title"><?= get_field('achievement_amount_unit')?></h6>
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
							<div class="row mt-5">
								<div class="f_wrap col_12 text-left">								
									<?= get_field('team_notable_cases') ?>
								</div>
								<h4 class="pl-3">Awards and Accolades</h4>
								<ul class="f_wrap list_h_style">

					<?php
					$awards = get_field('team_awards');
					if(!empty($awards)){
					foreach ($awards as $key => $award) {?>
						<li><a href="javascript:void(0)"><img class="img-fluid" src="<?= get_the_post_thumbnail_url($award->ID) ?>" alt=""></a></li>
					<?php
					}
				}
					?>
						</ul>
						
					</div>
				</div>
						
					</div>
				</div>
			</div>
			
		</div>
	</div>
</section>	





	<?php //get_sidebar(); ?>

<?php
get_footer();
