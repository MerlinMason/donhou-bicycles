<?php

	if (is_home()) {

		// if home load news template and only show news posts
		query_posts($query_string . '&cat=3');
		include('category-news.php');

	}

?>