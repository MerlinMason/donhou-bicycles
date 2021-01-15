<?php

	if ( in_category(news) ) {

		include('_news-single.php');

	} elseif (in_category(custom) ) {

		include('_custom-single.php');

	} else {

		include('404.php');

	}

?>