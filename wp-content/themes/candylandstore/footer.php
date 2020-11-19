<?php
/**
 * The template for displaying the footer
 */
?> 

            <footer class="footerWrapper">
            	<div class="container">
					<div class="footer">

					</div>
					<div class="copyright">
						<?php wp_footer(); ?>
						Candyland Store &copy;<?php echo date('Y'); ?>
					</div>
                </div>
            </footer>
		</div> <!-- end .wrapper -->
    </body>
    <?php
	// Check rows exists.
	if( have_rows('social_links', 'option') ): ?>
		<section class="social_media_sharing">
				
				<?php
				// Loop through rows.
				while( have_rows('social_links', 'option') ) : the_row();

					// Load sub field value.
					$icon = get_sub_field('icon');
					$color = get_sub_field('color');
					$link = get_sub_field('link');
					// Do something... ?>
					<a class="social_media_icon" style="background-color: <?php echo $color; ?>" href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>">
							<?php echo $icon; ?>
					</a>
				<?php
				// End loop.
				endwhile;

			// No value.
			else :
				// Do something...?>
		</section>
	<?php endif;
?>
</html>
