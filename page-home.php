<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package tumbleweeds2015
 */

get_header(); ?>


			<?php while ( have_posts() ) : the_post(); ?>
				
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<p class="hero">
						<? $content = get_the_content(); ?>
						<?=str_replace("<p","<p class=\"hero\"",$content);?>
					</p>
				</article><!-- #post-## -->

			<?php endwhile; // end of the loop. ?>
			
			<!--slideshow-->
			<? $slides = rwmb_meta('tw_slides',array('type'=>'file_advanced')); ?>
			<? if(is_array($slides) && !empty($slides)){ ?>
			<div id="slidy-container">
				<figure id="slidy">
				<? foreach($slides as $slide){ ?>
					<img src="<?=$slide['url'];?>" alt="<?=$slide['title'];?>">
				<? } ?>
				</figure>
			</div>
			<? } ?>
			<div class="quote">
				<blockquote>
				<?=rwmb_meta('tw_quote');?>
				</blockquote>
				<figcaption>&ndash; <?=rwmb_meta('tw_quote_source');?></figcaption>
			</div>
			
			<div class="row">
				<? $options = array('scope' => 'upcoming', 'limit' => 2, 'group_artists'=>'no', 'show_feeds'=>'no');?>
				<? if(gigpress_has_upcoming($options)){ ?>
				
					<div class="grid-two-thirds">
						<h4>Upcoming Shows</h4>
						<?=gigpress_shows($options);?>
					</div>
					<div class="grid-third">
				<? }else{ ?>
					<div class="noGigs">
				<? } ?>
						<h4><?=rwmb_meta('tw_right_header');?></h4>
						<?=apply_filters('the_content', rwmb_meta('tw_right_content'));?>
						
						
				</div><!--end grid-third-->
			</div><!--end row-->
			
			
			
<?php get_footer(); ?>
