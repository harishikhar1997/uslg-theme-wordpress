<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */

?>
<div class="item col-lg-4 col-md-4 col-6 col-sm">
	<a href="<?= get_the_permalink() ?>" class="fancylight popup-btn" data-fancybox-group="light"> 
		<img class="img-fluid" src="<?= get_the_post_thumbnail_url() ?>" alt="">
	</a>
	<div class="card-block">
		<h4 class="card-title"><?= get_the_title() ?></h4>							
		<div class="card-text">
			<?= wp_trim_words( get_the_content(), 15, '...' ); ?>
		</div>
		<div class="meta">
			<a href="<?= get_the_permalink() ?>">Read More</a>
		</div>
	</div>
	<div class="card-footer">
		<span><?= get_the_date() ?></span>
		<span class="float-right"><i class="fa fa-share-alt" aria-hidden="true"></i></span>
	</div>										
</div>