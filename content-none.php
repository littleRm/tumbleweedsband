<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package tumbleweeds2015
 */
?>

<section class="no-results not-found">
	<header class="page-header">
		<h2 class="page-title"><?php _e( 'Nothing Found', 'tumbleweeds2015' ); ?></h2>
	</header><!-- .page-header -->

	<div class="page-content">

		<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching&nbsp;can&nbsp;help.', 'tumbleweeds2015' ); ?></p>
		<?php get_search_form(); ?>

	</div><!-- .page-content -->
</section><!-- .no-results -->
