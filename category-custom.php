<?php get_header(); ?>
	<div id="content">

		<?php // spit out all the gallery images into an unordered list
			echo('<ul class="slideshow autoplay">');
				if(get_field('gallery', 'option')):
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

		<h1 class="page-heading">
			<?php the_field('custom_header', 'option'); ?>
			<br>
			—
		</h1>

		<div class="page-intro">
			<?php the_field('custom_text', 'option'); ?>
		</div>

		<ul class="bicycle-list cf">
			<?php
				query_posts($query_string . '&posts_per_page=99');
				while ( have_posts() ) : the_post();
			?>

				<?php
					$attachment_id = get_field('featured_image');
					$size = "thumbnail"; // (thumbnail, medium, large, full or custom size)
					$image = wp_get_attachment_image_src( $attachment_id, $size );
				?>

				<li class="bike">
					<a href="<?php the_permalink(); ?>">
						<img class="scale" src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>" />
						<div class="title">
							<h2><?php the_title(); ?></h2>
						</div>
					</a>
				</li>

			<?php endwhile; ?>

		</ul>

	</div>
<?php get_footer(); ?>