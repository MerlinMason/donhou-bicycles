<?php get_header(); ?>
<div id="content">
	<?php while ( have_posts() ) : the_post() ?>

	<article class="post">

			<section class="text">
				<?php
					ob_start();
					the_content('Read the full post',true);
					$postOutput = preg_replace('/<img[^>]+./','', ob_get_contents());
					ob_end_clean();
					echo $postOutput;
				?>

			</section>

			<section class="img">
				<?php
					preg_match_all("/(<img [^>]*>)/",get_the_content(),$matches,PREG_PATTERN_ORDER);
					for( $i=0; isset($matches[1]) && $i < count($matches[1]); $i++ ) {
						echo $beforeEachImage . $matches[1][$i] . $afterEachImage;
					}?>
			</section>

		</article>

  <?php endwhile; ?>
</div>
<?php get_footer(); ?>