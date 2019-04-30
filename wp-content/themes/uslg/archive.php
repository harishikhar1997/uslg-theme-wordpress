<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */
get_header('inner'); 
?>
<section class="section_resources pt-5 pb-5">
	<div class="container">		
		<div class="portfolio-menu">
			<ul>
					<?php
					$categories = get_categories( array(
			  		'orderby' => 'name',
			  		'order'   => 'ASC'
					) );
					foreach( $categories as $category ){?>
						<li class="btn btn-outline-dark <?= get_queried_object_id() == $category->term_id ? 'active' : ''; ?>"><a href="<?= get_category_link( $category->term_id ) ?>"><?= $category->name ?></a></li>
					<?php
						}
					?>
			</ul>
		</div>
	<div class="row">
		<div class="portfolio-item mt-5">
		<?php
		if ( have_posts() ) :
			?>
			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/post/content', get_post_format() );
			endwhile;
			the_posts_pagination(
				array(
					'prev_text'          => twentyseventeen_get_svg( array( 'icon' => 'arrow-left' ) ) . '<span class="screen-reader-text">' . __( 'Previous page', 'twentyseventeen' ) . '</span>',
					'next_text'          => '<span class="screen-reader-text">' . __( 'Next page', 'twentyseventeen' ) . '</span>' . twentyseventeen_get_svg( array( 'icon' => 'arrow-right' ) ),
					'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyseventeen' ) . ' </span>',
				)
			);

		else :
			get_template_part( 'template-parts/post/content', 'none' );
		endif;
		?>
			</div>
		</div>	
	</div>
</section>
<?php
get_footer();
