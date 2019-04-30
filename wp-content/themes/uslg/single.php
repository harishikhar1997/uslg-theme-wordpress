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

get_header('inner');?>


<section class="types_motor_vehicle_01 pt-5">
	<div class="container">
		<div class="row">
            <div class="col-md-6 m-0">
            	<img src="<?= get_the_post_thumbnail_url()?>" class="img_height img-fluid">
            </div>
            <div class="col-md-6 m-0 mob_mt">
            	<h4><?= get_the_title()?></h4>

            	<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
							the_content();
							endwhile;
						 endif; ?>				
            </div>
        </div>
		<div class="row mt-5">
			<div class="f_wrap col_12 text-left">
				<h4><?= get_field('claim_heading') ?></h4>
				<p><?= get_field('claim_description') ?></p>				
			</div>
		</div>
	</div>
</section>

<!-- Consider the costs of your recovery section -->
<section class="consider_costs_recovery">
	<div class="container">
		<div class="row">
		    <div class="f_wrap col_12">
			<h4 class="mr-auto ml-auto mb-4 pl-0">Consider the costs of your recovery:</h4>
			<ul class="f_wrap list_h_style mb-4">
				

			<?php
					$count=1;
					
					$recoveries = get_field('recovery_areas');
					if(!empty($recoveries)){
						//print_r($recoveries);die();
					foreach ($recoveries as $key => $r)  {
						//while($count<=7){?>
					

				<li><a href="javascript:void(0)"><img class="img-fluid" src="<?= get_the_post_thumbnail_url($r->ID) ?>">
					<h6 class="mt-3 mb-0"><?= get_the_title($r->ID) ?></h6>
				</a></li>

				<?php
				$count++;//}
					}
				}

				if($count>=8){  ?>
					<li><a href="javascript:void(0)">
					<img class="img-fluid" src="<?php echo get_stylesheet_directory_uri(); ?>/resources/images/show-more.png" alt="">
					<h6 class="mt-3 mb-0">So much more</h6>
				</a></li>

<?php		}
				?>
				
			</ul>
			</div>
		</div>
	</div>
</section>

<!-- practice_areas_details-02 section -->
<section class="practice_areas_details-02">
	<div class="container">
		<div class="row">
			<div class="f_wrap col_12 text-left">				
				<p><?= get_field('recovery_description') ?></p>
			</div>
		</div>
		<ul class="row">		  
		  <li class="col_4 pl-0">
			  <div class="cnt-block equal-hight">				
				<p><a href="<?= get_field('file_report_link') ?>"><?= get_field('file_report') ?></a></p>			
			  </div>
		  </li>
		  <li class="col_4">
			  <div class="cnt-block equal-hight">				
				<p><a href="<?= get_field('medical_treatment_link') ?>"><?= get_field('medical_treatment') ?></a></p>			
			  </div>
		  </li>
		  <li class="col_4 pr-0">
			  <div class="cnt-block equal-hight">				
				<p><a href="<?= get_field('call_law_group_link') ?>"><?= get_field('call_law_group') ?></a></p>			
			  </div>
		  </li>
		</ul>
		<div class="row mt-5">
			<div class="f_wrap col_12 text-left">
				<p><?= get_field('recovery_links_description') ?></p>
			</div>
		</div>
		<div class="row mt-5">
			<div class="f_wrap col_12 text-left">				
				<h4><?= get_field('our_team_heading') ?></h4>
				<?= get_field('our_team_description') ?>
			</div>
		</div>
	</div>
</section>


<!-- Vehicle & Transportation Accidents section -->
<section class="vehicle_transportation_accidents pt-5 pb-5">
	<div class="container">
		<div class="row mb-4">		
			<div class="col-md-12">
				<div class="head_div text-left">
					<h1 class="main_headign c_black">Some Recent Verdicts:</h1>											
				</div>
			</div>
		</div>
		<div class="row">
			
			<?php
					$vers = get_field('recent_verdict');
					if(!empty($vers)){

					foreach ($vers as $key => $ver) {
					?>
			<div class="col_12">
				<div class="col_3 pl-0 text-center">				
					<h3 class="mb-3 pt-3 pb-3 bg-black"><sub>$</sub><?= get_field('count',$ver->ID) ?></h3>				
				</div>
				<div class="col_9 align_center">
					<p><?= get_post_field('post_content', $ver->ID); ?></p>					
				</div>
			</div>
			
		<?php		
				}
			}
		?>
			
		</div>
	</div>
</section>

<!-- We understand this may section  -->
<section class="we_understand pb-5">
	<div class="container">
		<div class="row mb-4">		
			<div class="col-md-12">
				<div class="head_div text-left">
					<h2 class="c_black">We understand this may be an extremely difficult time for you and your family, 
but we are here to help.</h2>
					<p>There is no law firm in Lancaster that is more:</p>
				</div>
			</div>
		</div>
		<ul class="row list_h_style">
			
			<?php
					$traits = get_field('all_traits_');
					if(!empty($traits)){

					foreach ($traits as $key => $trait) {
					?>

			<li><a href="#"><img class="img-fluid" src="<?= get_the_post_thumbnail_url($trait->ID) ?>" alt=""><?= get_the_title($trait->ID) ?></a></li>

			<?php		
				}
			}
		?>
		
		</ul>
	</div>
</section>



<!-- Location details section -->
<section class="section_08 pb-5 mt-0">
	<div class="container">		
		<div class="row mt-5">
		
			<div class="col_12">
				<div class="head_div text-center">
					<h1 class="main_headign c_white">How Can We Help You?</h1>										
				</div>
			</div>
			<div class="col_12 mt-4">
				<div class="contact_form">
					
					<?php echo do_shortcode('[contact-form-7 id="454" title="How we can help"]');?>
				</div>
			</div>
			
		</div>
	</div>
</section>



<?php
get_footer();
