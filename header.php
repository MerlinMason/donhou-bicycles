<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <title><?php wp_title('|', true, 'right') ?> <?php bloginfo('name'); ?></title>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo( 'stylesheet_url' ) ?>?123">

    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <?php wp_enqueue_script('jquery'); ?>

    <?php wp_head(); ?>

	<script type="text/javascript">
		var _gaq = _gaq || [];
		_gaq.push(['_setAccount', 'UA-40667021-1']);
		_gaq.push(['_trackPageview']);

		(function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		})();
	</script>

</head>

<body <?php body_class(); ?> style="background-image:url(<?php the_field('site_background_image', 'option'); ?>);">
	<div id="page-wrap">

		<a href="http://shop.donhoubicycles.com/" id="shopnow"></a>

		<div id="header">
			<a href="<?php bloginfo('url'); ?>"></a>
		</div>

		<nav id="menu" role="navigation">
			<?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' ) ); ?>
		</nav><!-- #menu -->
