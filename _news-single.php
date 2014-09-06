<?php
	get_header();

	echo "<div id=\"content\">";

		while ( have_posts() ) : the_post();

		$featured = get_field("featured");

		// add class if it's a featured post
		if ($featured) {
			echo "<article class=\"post featured\">";
		} else {
			echo "<article class=\"post\">";
		}

		// prep the vimeo settings
		$vimeosettings = "&title=0&byline=0&portrait=0&color=666666&autoplay=0&loop=0&api=1\"
		width=\"660\"
		height=\"371\"
		frameborder=\"0\"
		webkitAllowFullScreen
		mozallowfullscreen
		allowFullScreen";

		// if theres a video - dump it out
		if(get_field("featured_video")) {
			echo "<iframe class=\"featured-content\" src=\"http://player.vimeo.com/video/" . get_field("featured_video") . "?player_id=player1" . $vimeosettings . "></iframe>";
		}

		// if theres an image - dump it out
		if(get_field("featured_image")) {
			echo "<img class=\"featured-content\" src=\"" . get_field("featured_image") . "\">";
		}

		// ... and then proceed with the post as normal

?>

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