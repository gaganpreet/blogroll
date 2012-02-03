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

        if ($feed->error())
        {
            $return["errors"] = $feed->error();
            $return["success"] = false;
        }
        return $return;
    }


?>
