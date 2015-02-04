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
				
				</article><!-- #post-## -->


			<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>
