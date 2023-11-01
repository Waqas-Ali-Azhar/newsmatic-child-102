<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Newsmatic
 */



 if(!empty($_POST['submit'] == 'Save Scheule')){
	$openingTime = $_POST['opening'];
 	$closingTime = $_POST['closing'];

	update_option('opening_time',serialize($openingTime), false);
	update_option('closing_time',serialize($closingTime), false);
	wp_redirect(get_site_url());
	exit;
 }
 
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<?php newsmatic_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
			the_content();

		?>

		<?php 

			
			$time = array(
				"Opening Time",
				"09:00 AM",
				"10:00 AM",
				"11:00 AM",
				"12:00 PM",
				"Closing Time",
				"05:00 PM",
				"6:00 PM",
				"07:00 PM",
				"08:00 PM",

			);
			$days = array(
				"Monday",
				"Tuesday",
				"Wednesday",
				"Thursday",
				"Friday",
				"Saturday"
			);
		
		
		?>

		<form method="POST">

			<div class="field-group">
				<label>Store Timings</label>
				<div class="field">
					<div class="openingtime">
				<?php
				
						foreach($days as $dayOfWeek){

							echo "<div><label style='width:150px; display:inline-block'>".$dayOfWeek."</label><select name='opening[]'>";
							echo "<option value>Select Opening Time</option>";
							foreach($time as $hourDaily){
								if(strpos($hourDaily,"AM") == false && strpos($hourDaily,"PM") == false){
									echo "<optgroup label=".$hourDaily.">";	
								}
								else{
									echo "<option value='".$hourDaily."'>".$hourDaily."</option>";
								}
								
							}
							echo "</select></div>";

						}

						?>

					</div>
					<div class="closingtime">
						<?php 

						foreach($days as $dayOfWeek){

							echo "<div><select name='closing[]'>";
							echo "<option value>Select Closing Time</option>";
							foreach($time as $hourDaily){
								if(strpos($hourDaily,"AM") == false && strpos($hourDaily,"PM") == false){
									echo "<optgroup label=".$hourDaily.">";	
								}
								else{
									echo "<option value='".$hourDaily."'>".$hourDaily."</option>";
								}
								
							}
							echo "</select></div>";

						}

					?>
					</div>
				</div>
			</div>

			<input type="submit" value="Save Scheule" name="submit" />

		</form>



		
		<?php

			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'newsmatic' ),
					'after'  => '</div>',
				)
			);
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'newsmatic' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
