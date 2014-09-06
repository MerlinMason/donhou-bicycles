<?php get_header(); ?>
	<div id="content">

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