<?php
/**
 *
 * Template Name: Players
 *
 * The template for single player pages
 *
 *
 * @package tumbleweeds2015
 */

get_header(); ?>


			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
						<h1><?= get_the_title($post->post_parent) ?></h1>
					</header><!-- .entry-header -->
				
					<p><a href="/about">&laquo; Back to players</a></p>

					<div class="bio">
						<?php the_title( '<h2>', '</h2>' ); ?>
						<?php the_content(); ?>
					</div><!-- .bio -->
					
					<div id="players">
					<h4>More Bios</h4>
						<ul>
						<? 
							if(is_page() && $post->post_parent){
								 wp_list_pages( 'sort_column=menu_order&title_li=&child_of=' . $post->post_parent.'&exclude='.get_the_ID());
							}
						?>
						</ul>
					</div>
				
				</article><!-- #post-## -->


			<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>
