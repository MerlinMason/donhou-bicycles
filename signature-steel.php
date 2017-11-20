<?php /* Template Name: Signature Steel */ ?>
<?php get_header(); ?>
<div id="content">
	<?php while ( have_posts() ) : the_post() ?>

	<article class="post">

		<div class="mb-3x">
			<?php // spit out all the gallery images into an unordered list
				echo('<ul class="slideshow autoplay mb-2x">');
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
		</div>
		
		<?php // this loops through all variable content and the appropriate template type is used
			if(get_field('details')):
				while(the_repeater_field('details')):
					?>
						<?php if (get_sub_field('type') == "Heading") { ?>
							<h2 class="mt-2x mb-1x"><?php the_sub_field('heading'); ?></h2>
						<?php } ?>
						
						<?php if (get_sub_field('type') == "Text") { ?>
							<div><?php the_sub_field('text'); ?></div>
						<?php } ?>
						
						<?php if (get_sub_field('type') == "Image") { ?>
							<img class="fit mb-3x" src="<?php the_sub_field('image'); ?>" alt="<?php the_field('heading'); ?>">
						<?php } ?>
						
						<?php if (get_sub_field('type') == "Buy") { ?>
							<div class="buy">
								<p><?php the_sub_field('buy_text'); ?></p>
								<a class="button" href="<?php the_sub_field('buy_link'); ?>"><?php the_sub_field('buy_price'); ?></a>
							</div>
						<?php } ?>
						
						<?php if (get_sub_field('type') == "Sizing") { ?>
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
									<?php
										if(get_sub_field('sizing')):
											while(the_repeater_field('sizing')): ?>

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
						<?php } ?>
						
						<?php if (get_sub_field('type') == "Spec") { ?>
							<?php // spit out all the gallery images into an unordered list
								echo('<ul class="specs cf">');
									if(get_sub_field('spec')):
										while(the_repeater_field('spec')): ?>

												<li>
													<b><?php the_sub_field('label'); ?></b>
													<?php the_sub_field('value'); ?>
												</li>

											<?php
										endwhile;
									endif;
								echo ('</ul>');
							?>
						<?php } ?>
						
					<?php
				endwhile;
			endif;
		?>


	</article>

  <?php endwhile; ?>
</div>
<?php get_footer(); ?>