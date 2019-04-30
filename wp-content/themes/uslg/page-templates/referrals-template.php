<?php
/**
* Template Name: Refferals Template
**/

get_header('inner');
?>

<!-- referral section -->
<section class="referral_wrapper">
<div class="container">
	<div class="referral_inner">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
		the_content();
		endwhile;
		endif;
		?>
	</div>
</div>

<div class="refferalcontact_form" >
<?php echo do_shortcode('[contact-form-7 id="176" title="Referrals Contact Form"]'); ?>
</div>
				
</section>
<?php get_footer(); ?>