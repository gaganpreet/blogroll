<?php
    
    require_once('lib/simplepie.inc');

    function load_and_verify_xml($url)
    {
        $feed = new SimplePie();
        $feed->set_feed_url($url);
        $feed->init();
        $feed->handle_content_type();

        $return = Array();

        $return["errors"] = "";
        $return["success"] = true;
        $return["feed_url"] = $url;

        if ($feed->error())
        {
            $return["errors"] = $feed->error();
            $return["success"] = false;
        }
        else if ($feed->feed_url != $url)
        {
            $return["success"] = false;
            $return["errors"] = "$url doesn't seem like the correct feed url, but " . $feed->feed_url . " does. If that's fine, just click on add feed again";
            $return["feed_url"] = $feed->feed_url;
        }
        
        else if (!$feed->get_item(0)->get_date())
        {
            $return["success"] = false;
            $return["errors"] = "Your feed doesn't have item dates";
        }
        return $return;
    }
    load_and_verify_xml($_GET['url']);


?>
