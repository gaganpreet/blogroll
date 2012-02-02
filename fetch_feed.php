<?php
	require_once('simplepie.inc');
	include_once('config.inc.php');

	$blogs = json_decode(file_get_contents($db_file));

	$blog_list = Array();

	foreach($blogs as $blog)
		$blog_list[] = $blog->feed_url;
	fetch_feeds($blog_list);

	function fetch_feeds($blog_list)
	{
		global $csv_file;
		global $blogs;
		$feed = new SimplePie();
		
		$feed->set_feed_url($blog_list);
		$feed->enable_cache(true);
		$feed->set_cache_location('cache');
		$feed->set_cache_duration(3600);

		$feed->set_item_limit(1);
		$feed->init();
		$feed->handle_content_type();

		$fp = fopen($csv_file . "_new", 'w');
		foreach ($feed->get_items() as $item)
		{
			$feed_url = $item->get_feed()->feed_url;

			$title = $item->get_title();
			$permalink = $item->get_permalink();
			$desc = $item->get_description();
			
			if (strlen($desc) > 256)
				$desc = substr($desc, 0, 256) . " [...]";

			$blog_details = $blogs->$feed_url;
			
			
			fputcsv($fp, Array($item->get_date('U'), $title, $permalink, $desc, 
					$blog_details->blog_name, $blog_details->blog_url,
					$blog_details->author, $blog_details->email, $blog_details->batch,
					$blog_details->desc));
		}
		fclose($fp);
		rename($csv_file . "_new", $csv_file);
	}
	

?>
