<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Newsmatic
 */
use Newsmatic\CustomizerDefault as ND;
get_header();

if( class_exists( 'Nekit_Render_Templates_Html' ) ) :
	$Nekit_render_templates_html = new Nekit_Render_Templates_Html();
	if( $Nekit_render_templates_html->is_template_available('archive') ) {
		$archive_rendered = true;
		echo $Nekit_render_templates_html->current_builder_template();
	} else {
		$archive_rendered = false;
	}
else :
	$archive_rendered = false;
endif;

if( ! $archive_rendered ) : // ! $archive_rendered
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
							
							if ( have_posts() ) : ?>
							<header class="page-header">
								<?php
									if( ! is_author() ) :
										the_archive_title( '<h1 class="page-title newsmatic-block-title">', '</h1>' );
										the_archive_description( '<div class="archive-description">', '</div>' );
									endif;
								?>
							</header><!-- .page-header -->
							<div class="post-inner-wrapper news-list-wrap">
								<?php
									$args['archive_post_element_order'] = ND\newsmatic_get_customizer_option( 'archive_post_element_order' );
									$args['archive_post_meta_order'] = ND\newsmatic_get_customizer_option( 'archive_post_meta_order' );
										/* Start the Loop */
										while ( have_posts() ) :
											the_post();
											/*
											* Include the Post-Type-specific template for the content.
											* If you want to override this in a child theme, then include a file
											* called content-___.php (where ___ is the Post Type name) and that will be used instead.
											*/
                                            // print_r(get_post_type());
                                            // exit;
											get_template_part( 'template-parts/content', 'engineering', $args );
										endwhile;
										/**
										 * hook - newsmatic_pagination_link_hook
										 * 
										 * @package Newsmatic
										 * @since 1.0.0
										 */
										do_action( 'newsmatic_pagination_link_hook' );
								else :
									get_template_part( 'template-parts/content', 'none' );
								endif;
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