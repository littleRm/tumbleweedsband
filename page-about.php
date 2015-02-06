<?php
	/**
	 * The template for displaying the About the Band page.
	 *
	 * This is the template that displays all pages by default.
	 * Please note that this is the WordPress construct of pages
	 * and that other 'pages' on your WordPress site will use a
	 * different template.
	 *
	 * @package tumbleweeds2015
	 */
	function parsePlayer($str){
		$dom = new DOMDocument();
		@$dom->loadHTML($str);
		foreach($dom->getElementsByTagName('img') as $img){
			$imgSrc = $img->getAttribute('src');
			$imgAlt = $img->getAttribute('alt');
		}
		foreach($dom->getElementsByTagName('em') as $em){
			$plays = $em->nodeValue;
		}
		return array($imgSrc,$imgAlt,$plays);
	}
	get_header(); 
?>


			<?php while ( have_posts() ) : the_post(); ?>
				
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
						<h1><?= get_the_title() ?></h1>
					</header><!-- .entry-header -->
					<p><?=get_the_content();?></p>
				</article><!-- #post-## -->

			<?php endwhile; // end of the loop. 
			
			$my_wp_query = new WP_Query();
			$all_wp_pages = $my_wp_query->query(array('post_type' => 'page', 'posts_per_page' => -1));
			$current_page_ID = $post->ID;
			$child_pages = get_page_children( $current_page_ID, $all_wp_pages );
			foreach($child_pages as $c)
				$ids[$c->ID] = $c->post_name;
			$args = array(
			   'post_type' => 'page',
			   'orderby' => 'menu_order',
			   'order' => 'ASC',
			   'post__in' => array_keys($ids)
			);
			
			// The Query
			$the_query = new WP_Query( $args );
			$cnt=0;
			while ( $the_query->have_posts() ) {
				$the_query->the_post(); 
				if($cnt < 3) { ?>
			       <div class="bio">
						<?php the_title( '<h2>', '</h2>' ); ?>
						<?php the_content(); ?>
				   </div><!-- .bio -->
				<? }else { ?>
					<? if($cnt==3) { ?>
					<p>When the setting is right, the Tumbleweeds perform as the trio, but when a dance band is needed, bass, drums and steel guitar are added.</p>
					<p>This includes our family of amazingly talented musicians, that you can read more about below.</p>
					<? } ?>
					<? $info = parsePlayer(get_the_content());?>
					<div class="player" data-right-height-content>
						<? the_title( '<h4>', '</h4>' ); ?>
						<img class="thumb" src="<?=$info[0];?>" alt="<?=$info[1];?>"/>
						<p><?=ucwords(str_replace(array("(",")","/"),array("",""," / "),$info[2]));?></p>
						<p><a href="/about/<?=$ids[$post->ID];?>">Bio</a></p>
					</div>
					
				<? } ?>
				<? $cnt++; ?>
			<? }
			?>
			
<?php get_footer(); ?>
