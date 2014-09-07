<?php get_header(); ?>

<div id="content">

	<div class="gallery">

		<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

			<?php // spit out all the gallery images into an unordered list
				echo('<ul class="slideshow">');
					if(get_field('gallery')):
						while(the_repeater_field('gallery')):
							$attachment_id = get_sub_field('slide');
							$size = "large"; // (thumbnail, medium, large, full or custom size)
							$image = wp_get_attachment_image_src( $attachment_id, $size );
							?>

								<li>
									<img src="<?php echo $image[0]; ?>" />
								</li>

							<?php
						endwhile;
					endif;
				echo ('</ul>');
			?>

			<div class="description"><?php the_field('description'); ?></div>

		<?php endwhile; ?>

	</div>

</div>

<?php get_footer(); ?>