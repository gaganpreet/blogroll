<?php
    header("Content-Type: text/xml");
    require_once('config.inc.php'); 
    $now = date("D, d M Y H:i:s T");

    echo("<?"); ?>xml version='1.0' encoding='UTF-8'?>
<rss version='2.0'>
<channel>

<title>IIIT Blogroll</title>
<link>http://web.iiit.ac.in/~gaganpreet/blogroll</link>
<description>IIIT Blogroll</description>
<language>en-us</language>
<pubDate><?php echo $now; ?></pubDate>
<lastBuildDate><?php echo $now; ?></lastBuildDate>

<?php
    $fp = fopen($csv_file, "r");
    if (isset($_GET['count']))
        $count = intval($_GET['count']);
    else
        $count = 25;
    $i = 0;
    while ($i < $count && $data = fgetcsv($fp))
    {
        list($pubDate, $title, $link, $desc, $blog_name, $blog_url, $author, $email, $batch, $blog_desc)
            = $data;
        $desc = htmlspecialchars($desc);
        $i = $i + 1;
        $date = date("D, d M Y H:i:s T", $pubDate);
        echo "<item><title>$title</title><link>$link</link><pubDate>$date</pubDate></item>\n<description>$desc</description>\n\n";
    }    

    fclose($fp);
?>
</channel>
</rss>
