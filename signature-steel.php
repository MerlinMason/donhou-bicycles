<?php /* Template Name: Signature Steel */ ?>
<?php get_header(); ?>
<div id="content">
	<?php while ( have_posts() ) : the_post() ?>

	<article class="post">

		<?php // spit out all the gallery images into an unordered list
			echo('<ul class="slideshow autoplay">');
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

		<h2><?php the_field('second_heading'); ?></h2>
		
		<div>
			<?php the_field('second_text'); ?>
		</div>

		<img class="fit" src="<?php the_field('second_image'); ?>" alt="<?php the_field('heading'); ?>">

		<?php // spit out all the gallery images into an unordered list
			echo('<ul class="specs cf">');
				if(get_field('specs')):
					while(the_repeater_field('specs')): ?>

							<li>
								<b><?php the_sub_field('label'); ?></b>
								<?php the_sub_field('value'); ?>
							</li>

						<?php
					endwhile;
				endif;
			echo ('</ul>');
		?>

		<div class="buy">
			<a class="button" href="<?php the_field('link_to_shop'); ?>"><?php the_field('price'); ?></a>
			<p>Click here to buy now</p>
		</div>

		<table class="sizes">
			<thead>
				<tr>
					<th></th>
					<th>Small (54cm)</th>
					<th>Medium (56cm)</th>
					<th>Large (58cm)</th>
				</tr>
			</thead>
			<tbody>
				<?php // spit out all the gallery images into an unordered list
					if(get_field('sizes')):
						while(the_repeater_field('sizes')): ?>

								<tr>
									<td><?php the_sub_field('name'); ?></td>
									<td><?php the_sub_field('small'); ?></td>
									<td><?php the_sub_field('medium'); ?></td>
									<td><?php the_sub_field('large'); ?></td>
								</tr>

							<?php
						endwhile;
					endif;
				?>
			</tbody>
		</table>


	</article>

  <?php endwhile; ?>
</div>
<?php get_footer(); ?>