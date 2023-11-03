<?php
 /* Template Name: 4 Columns Layout */
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Newsmatic
 */
use Newsmatic\CustomizerDefault as ND;
get_header();

if( class_exists( 'Nekit_Render_Templates_Html' ) ) :
	$Nekit_render_templates_html = new Nekit_Render_Templates_Html();
	if( $Nekit_render_templates_html->is_template_available('single') ) {
		$single_rendered = true;
		echo $Nekit_render_templates_html->current_builder_template();
	} else {
		$single_rendered = false;
	}
else :
	$single_rendered = false;
endif;

if( ! $single_rendered ) : // ! $single_rendered
	?>
		<div id="theme-content">
			<?php
				/**
				 * hook - newsmatic_before_main_content
				 * 
				 */
				do_action( 'newsmatic_before_main_content' );
			?>
			<main id="primary" class="site-main">
				<div class="newsmatic-container">
					<div class="row">
					<div class="secondary-left-sidebar">
							<?php
								get_sidebar('left');
							?>
						</div>
						<div class="primary-content">
							<?php
								/**
								 * hook - newsmatic_before_inner_content
								 * 
								 */
								do_action( 'newsmatic_before_inner_content' );
							?>
							<div class="post-inner-wrapper">
								<?php

                                while ( have_posts() ) :
										the_post();
                                      the_content();
										

								endwhile;		

                                $args = array(
                                    'numberposts' => -1
                                );
                                $db_posts = get_posts($args);
                                foreach($db_posts as $currpost){
                                    get_template_part( 'template-parts/content', 'page-4' );
                                }
                                
									// while ( have_posts() ) :
									// 	the_post();

										

									// 	// If comments are open or we have at least one comment, load up the comment template.
									// 	if ( comments_open() || get_comments_number() ) :
									// 		comments_template();
									// 	endif;

									// endwhile; // End of the loop.
								?>
							</div>
						</div>
						
					</div>
				</div>
			</main><!-- #main -->
		</div><!-- #theme-content -->
	<?php
	endif;

get_footer();