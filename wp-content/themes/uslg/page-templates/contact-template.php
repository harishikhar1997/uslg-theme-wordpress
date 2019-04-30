<?php
/**
* Template Name: Contact Template
**/

get_header('inner');
?>
<!-- Locations section -->
<section class="section_contact pt-5 pb-5">
	<div class="container">	
				
		<div class="home-content1">
			<div class="row">
				<div class="col-sm-12 content1-left">
					<div class="span8">
						<div class="head_div text-left">
							
							<div class="address">								
								<div class="inline_div">
									<h2>Phone</h2>
									<address>
										<abbr title="Phone">P: </abbr> <?= mb_showheaderphone() ?>										
									</address>
								</div>
								<div class="inline_div">
									<h2>Fax</h2>
									<address>									
										<abbr title="Fax">F: </abbr> <?= mb_fax() ?>
									</address>
								</div>
								<div class="inline_div">
									<h2>Email</h2>
									<address>									
										<abbr title="Email">E: </abbr> <?= mb_email() ?>
									</address>
								</div>
								<div class="social-part">
									<a href="<?= mb_facebook() ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a>
									<a href="<?= mb_twitter() ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a>
									<a href="<?= mb_instagram() ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a>
								</div>
							</div>
							
						</div>
					</div>
				</div>				
			</div>
			<div class="row mt-5">
				
				<div class="col-md-4 content1-right">					
					<h6 class="main_headign c_black">I am interested in:</h6>
					<div class="check_box_list">
						<div class="checkbox">
							<input id="checkbox1" name="custom_chk" class="custom_chk" data-val="Free Case Consultation" type="checkbox">
							<label for="checkbox1">Free Case Consultation</label>
						</div>
						<div class="checkbox">
							<input id="checkbox2" name="custom_chk" class="custom_chk" data-val="Community Scholarships" type="checkbox">
							<label for="checkbox2">Community Scholarships</label>
						</div>
						<div class="checkbox">
							<input id="checkbox3" name="custom_chk" class="custom_chk" data-val="General Feedback" type="checkbox">
							<label for="checkbox3">General Feedback</label>
						</div>
						<div class="checkbox">
							<input id="checkbox4" name="custom_chk" class="custom_chk" data-val="Case Status" type="checkbox">
							<label for="checkbox4">Case Status</label>
						</div>
						<div class="checkbox">
							<input id="checkbox5" name="custom_chk" class="custom_chk" data-val="Media Inquiries" type="checkbox">
							<label for="checkbox5">Media Inquiries</label>
						</div>
						<div class="checkbox">
							<input id="checkbox6" name="custom_chk" class="custom_chk" data-val="Career Opportunities" type="checkbox">
							<label for="checkbox6">Career Opportunities</label>
						</div>
						<div class="checkbox">
							<input id="checkbox7" name="custom_chk" class="custom_chk" data-val="Referring a Client" type="checkbox">
							<label for="checkbox7">Referring a Client</label>
						</div>
					</div>
				</div>
				<div class="col-md-8 content1-left">
					<div class="ab_img">
						<img class="img-fluid" src="<?= get_field('background_image')?>" alt="">
						<div class="section_06 pt-5 pb-5">								
							<div class="col_12">										
								<div class="contact_slider c_white">													
									<div id="carouselExampleControls1" class="carousel slide" data-ride="carousel" data-interval="5000">
										<div class="w-100 carousel-inner" role="listbox">
											<?php
											$args = array(
											    'post_type' => 'slider',
											    'post_status' => 'publish',
											    'posts_per_page' => -1,
												'tax_query' => array(
						    						array(
						    							'taxonomy' => 'silder_position',
						    							'field' => 'term_id',
						    							'terms' => 14
						     							)
						  							)
												);
											$sliders = new WP_Query( $args );
											$i=0;
											if ( $sliders->have_posts() ) {
											    while ( $sliders->have_posts() ) :
											    	$sliders->the_post(); 
     										?>
											<div class="carousel-item <?= $i==0 ? 'active' : ''; ?>">
												<div class="carousel-caption">
													<div class="row">
													<div class="col-sm-12">
														<p><?= get_field('slide_text') ?></p>					
														<div class="form-group" id="rating-ability-wrapper">
															<a href="<?= get_field('author_url') ?>" class="pr-3 c_white">- <?= get_field('author_name') ?></a>						
														</div>
													</div>
													</div>
												</div>
											</div>
											<?php
											$i++;
   											endwhile;
											}
    										wp_reset_query();
											?>
										</div>	
									</div>								
								</div>						
							</div>								
						</div>
					</div>
				</div>
				<div class="col-sm-12">
					<div class="contact_form_02 mt-5">
					<?php echo do_shortcode('[contact-form-7 id="177" title="Contact Page Form"]'); ?>	
					</div>
				</div>
				
			</div>
			
		</div>	
	</div>
</section>
<script type="text/javascript">
	jQuery(document).ready(function(){
		var checkedData = '';
		jQuery('body').on('change','.custom_chk',function(){
			checkedData = '';
			jQuery("input:checkbox[name=custom_chk]:checked").each(function(){
				checkedData += jQuery(this).attr('data-val')+',';
			});
			checkedData = checkedData.replace(/^,|,$/g,'');
			jQuery("input[type='hidden'][name='interested-in']").val(checkedData);
		});
	});
</script>
<?php get_footer(); ?>