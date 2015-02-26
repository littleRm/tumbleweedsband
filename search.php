<?php
/**
 * The template for displaying search results pages.
 *
 * @package tumbleweeds2015
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<header class="page-header">
				<h1 class="page-title"><?php _e( 'Search'); ?></h1>
				<h3><?php printf( __( 'Search Results for: %s', 'tumbleweeds2015' ), '<span>' . get_search_query() . '</span>' ); ?></h3>
			</header><!-- .page-header -->

		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'content', 'search' );
				?>

			<?php endwhile; ?>

		<?php else : ?>

			<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'tumbleweeds2015' ); ?></p>
			

		<?php endif; ?>

		<?php get_search_form(); ?>
		<br>
		<br>
		</main><!-- #main -->
	</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
