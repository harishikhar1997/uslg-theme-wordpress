<?php
/**
* Template Name: Resources Template
**/

get_header('inner');
?>
<!-- Not In Use Work done in archieve.php -->

<section class="section_resources pt-5 pb-5">
	<div class="container">		
					
		<div class="portfolio-menu">
			<ul>
			   <li class="btn btn-outline-dark active" data-filter="*">All</li>
			   <li class="btn btn-outline-dark" data-filter=".blogs">Blogs</li>
			   <li class="btn btn-outline-dark" data-filter=".articles">Articles</li>
			   <li class="btn btn-outline-dark text" data-filter=".car">Car Accident Articles</li>
			   <li class="btn btn-outline-dark text" data-filter=".motorcycle">Motorcycle Accident Articles</li>
			   <li class="btn btn-outline-dark text" data-filter=".videos">Videos</li>
			</ul>
		</div>

		<div class="row">
		<div class="portfolio-item mt-5">
			
							   
				
			<?php
				$args = array(
		    		'post_type' => 'post',
		    		'post_status' => 'publish',
		    		'posts_per_page' => -1,
				);
				$p = new WP_Query( $args );
				if ( $p->have_posts() ) {
			    	while ( $p->have_posts() ) :
			    	$p->the_post(); 
  		?>

  		<div class="item blogs col-lg-4 col-md-4 col-6 col-sm">
				<a href="<?= get_the_permalink() ?>" class="fancylight popup-btn" data-fancybox-group="light"> 
					<img class="img-fluid" src="<?= get_the_post_thumbnail_url() ?>" alt="">
				</a>
				<div class="card-block">
					<h4 class="card-title"><?= get_the_title() ?></h4>							
					<div class="card-text">
						<?= get_the_content() ?>
					</div>
					<div class="meta">
						<a href="<?= get_the_permalink() ?>">Read More</a>
					</div>
				</div>
				<div class="card-footer">
					<span><?= get_field('post_date') ?></span>
					<span class="float-right"><i class="fa fa-share-alt" aria-hidden="true"></i></span>
				</div>										
			</div>

						<?php
				endwhile;
				} 
    	wp_reset_query();
			?>

<!-- 			<div class="item articles col-lg-4 col-md-4 col-6 col-sm">				   
				<a href="post-deatil.html" class="fancylight popup-btn" data-fancybox-group="light"> 
					<img class="img-fluid" src="images/resource2.jpg" alt="">
				</a>
				<div class="card-block">
					<h4 class="card-title">The Complete Guide to Motorcycle Safety Gear</h4>							
					<div class="card-text">
						Riding a motorcycle is a mode of transportation that is 33 times more dangerous than driving a car.
					</div>
					<div class="meta">
						<a href="post-deatil.html">Read More</a>
					</div>
				</div>
				<div class="card-footer">
					<span>October 3, 2018</span>
					<span class="float-right"><i class="fa fa-share-alt" aria-hidden="true"></i></span>
				</div>										
			</div>
			<div class="item car col-lg-4 col-md-4 col-6 col-sm">				   
				<a href="post-deatil.html" class="fancylight popup-btn" data-fancybox-group="light"> 
					<img class="img-fluid" src="images/resource3.jpg" alt="">
				</a>
				<div class="card-block">
					<h4 class="card-title">The Complete Guide to Motorcycle Safety Gear</h4>							
					<div class="card-text">
						Riding a motorcycle is a mode of transportation that is 33 times more dangerous than driving a car.
					</div>
					<div class="meta">
						<a href="post-deatil.html">Read More</a>
					</div>
				</div>
				<div class="card-footer">
					<span>October 3, 2018</span>
					<span class="float-right"><i class="fa fa-share-alt" aria-hidden="true"></i></span>
				</div>										
			</div>
			<div class="item blogs col-lg-4 col-md-4 col-6 col-sm">				   
				<a href="#" class="fancylight popup-btn" data-fancybox-group="light"> 
					<img class="img-fluid" src="images/resource1.jpg" alt="">
				</a>
				<div class="card-block">
					<h4 class="card-title">The Complete Guide to Motorcycle Safety Gear</h4>							
					<div class="card-text">
						Riding a motorcycle is a mode of transportation that is 33 times more dangerous than driving a car.
					</div>
					<div class="meta">
						<a href="#">Read More</a>
					</div>
				</div>
				<div class="card-footer">
					<span>October 3, 2018</span>
					<span class="float-right"><i class="fa fa-share-alt" aria-hidden="true"></i></span>
				</div>										
			</div>
			<div class="item articles col-lg-4 col-md-4 col-6 col-sm">				   
				<a href="#" class="fancylight popup-btn" data-fancybox-group="light"> 
					<img class="img-fluid" src="images/resource2.jpg" alt="">
				</a>
				<div class="card-block">
					<h4 class="card-title">The Complete Guide to Motorcycle Safety Gear</h4>							
					<div class="card-text">
						Riding a motorcycle is a mode of transportation that is 33 times more dangerous than driving a car.
					</div>
					<div class="meta">
						<a href="#">Read More</a>
					</div>
				</div>
				<div class="card-footer">
					<span>October 3, 2018</span>
					<span class="float-right"><i class="fa fa-share-alt" aria-hidden="true"></i></span>
				</div>										
			</div>
			<div class="item car col-lg-4 col-md-4 col-6 col-sm">				   
				<a href="#" class="fancylight popup-btn" data-fancybox-group="light"> 
					<img class="img-fluid" src="images/resource3.jpg" alt="">
				</a>
				<div class="card-block">
					<h4 class="card-title">The Complete Guide to Motorcycle Safety Gear</h4>							
					<div class="card-text">
						Riding a motorcycle is a mode of transportation that is 33 times more dangerous than driving a car.
					</div>
					<div class="meta">
						<a href="#">Read More</a>
					</div>
				</div>
				<div class="card-footer">
					<span>October 3, 2018</span>
					<span class="float-right"><i class="fa fa-share-alt" aria-hidden="true"></i></span>
				</div>										
			</div>
			<div class="item blogs col-lg-4 col-md-4 col-6 col-sm">				   
				<a href="#" class="fancylight popup-btn" data-fancybox-group="light"> 
					<img class="img-fluid" src="images/resource1.jpg" alt="">
				</a>
				<div class="card-block">
					<h4 class="card-title">The Complete Guide to Motorcycle Safety Gear</h4>							
					<div class="card-text">
						Riding a motorcycle is a mode of transportation that is 33 times more dangerous than driving a car.
					</div>
					<div class="meta">
						<a href="#">Read More</a>
					</div>
				</div>
				<div class="card-footer">
					<span>October 3, 2018</span>
					<span class="float-right"><i class="fa fa-share-alt" aria-hidden="true"></i></span>
				</div>										
			</div>
			<div class="item articles col-lg-4 col-md-4 col-6 col-sm">				   
				<a href="#" class="fancylight popup-btn" data-fancybox-group="light"> 
					<img class="img-fluid" src="images/resource2.jpg" alt="">
				</a>
				<div class="card-block">
					<h4 class="card-title">The Complete Guide to Motorcycle Safety Gear</h4>							
					<div class="card-text">
						Riding a motorcycle is a mode of transportation that is 33 times more dangerous than driving a car.
					</div>
					<div class="meta">
						<a href="#">Read More</a>
					</div>
				</div>
				<div class="card-footer">
					<span>October 3, 2018</span>
					<span class="float-right"><i class="fa fa-share-alt" aria-hidden="true"></i></span>
				</div>										
			</div>
			<div class="item car col-lg-4 col-md-4 col-6 col-sm">				   
				<a href="#" class="fancylight popup-btn" data-fancybox-group="light"> 
					<img class="img-fluid" src="images/resource3.jpg" alt="">
				</a>
				<div class="card-block">
					<h4 class="card-title">The Complete Guide to Motorcycle Safety Gear</h4>							
					<div class="card-text">
						Riding a motorcycle is a mode of transportation that is 33 times more dangerous than driving a car.
					</div>
					<div class="meta">
						<a href="#">Read More</a>
					</div>
				</div>
				<div class="card-footer">
					<span>October 3, 2018</span>
					<span class="float-right"><i class="fa fa-share-alt" aria-hidden="true"></i></span>
				</div>										
			</div>
			<div class="item blogs col-lg-4 col-md-4 col-6 col-sm">				   
				<a href="#" class="fancylight popup-btn" data-fancybox-group="light"> 
					<img class="img-fluid" src="images/resource1.jpg" alt="">
				</a>
				<div class="card-block">
					<h4 class="card-title">The Complete Guide to Motorcycle Safety Gear</h4>							
					<div class="card-text">
						Riding a motorcycle is a mode of transportation that is 33 times more dangerous than driving a car.
					</div>
					<div class="meta">
						<a href="#">Read More</a>
					</div>
				</div>
				<div class="card-footer">
					<span>October 3, 2018</span>
					<span class="float-right"><i class="fa fa-share-alt" aria-hidden="true"></i></span>
				</div>										
			</div>
			<div class="item articles col-lg-4 col-md-4 col-6 col-sm">				   
				<a href="#" class="fancylight popup-btn" data-fancybox-group="light"> 
					<img class="img-fluid" src="images/resource2.jpg" alt="">
				</a>
				<div class="card-block">
					<h4 class="card-title">The Complete Guide to Motorcycle Safety Gear</h4>							
					<div class="card-text">
						Riding a motorcycle is a mode of transportation that is 33 times more dangerous than driving a car.
					</div>
					<div class="meta">
						<a href="#">Read More</a>
					</div>
				</div>
				<div class="card-footer">
					<span>October 3, 2018</span>
					<span class="float-right"><i class="fa fa-share-alt" aria-hidden="true"></i></span>
				</div>										
			</div>
			<div class="item car col-lg-4 col-md-4 col-6 col-sm">				   
				<a href="#" class="fancylight popup-btn" data-fancybox-group="light"> 
					<img class="img-fluid" src="images/resource3.jpg" alt="">
				</a>
				<div class="card-block">
					<h4 class="card-title">The Complete Guide to Motorcycle Safety Gear</h4>							
					<div class="card-text">
						Riding a motorcycle is a mode of transportation that is 33 times more dangerous than driving a car.
					</div>
					<div class="meta">
						<a href="#">Read More</a>
					</div>
				</div>
				<div class="card-footer">
					<span>October 3, 2018</span>
					<span class="float-right"><i class="fa fa-share-alt" aria-hidden="true"></i></span>
				</div>										
			</div> -->
		</div>
		</div>	
		
	</div>
</section>



<?php get_footer(); ?>