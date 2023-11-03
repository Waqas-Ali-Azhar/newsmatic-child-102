<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Newsmatic
 */

 global $currpost;

//  print_r($currpost);exit;



?>
<a class="article-link" href="<?php echo get_permalink($currpost->ID); ?>">
<article id="post-<?php echo $currpost->ID; ?>" <?php post_class(); ?> >


<div class="post-thumbnail">
				<?php echo get_the_post_thumbnail($currpost); ?>
</div><!-- .post-thumbnail -->

	<div class="entry-content">
		<?php

		$desc = $currpost->post_content;
		$descSpace = explode(" ", $desc);
		$descShort = array_slice($descSpace,0,25);
		$descp = implode(" ",$descShort);
	    
		// exit;

			// echo  strip_tags($descp) ;
			if(!empty($currpost->post_excerpt)) {
				echo $currpost->post_excerpt;
			}
			else{
				echo "Lorem ipsum Lorem Ipsum";
			}
			

			
		?>
	</div><!-- .entry-content -->

	
</article>
		</a>
