<?php
    header("Content-Type: text/xml");
    require_once('config.inc.php'); 
    echo("<?"); ?>xml version='1.0' encoding='UTF-8'?>
<rss version='2.0'>
<channel>

<title>IIIT Blogroll</title>
<link>http://web.iiit.ac.in/~gaganpreet/blogroll</link>
<description>IIIT Blogroll</description>
<language>en-us</language>

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
        echo "<item><title>$title</title><link>$link</link>\n<description>$desc</description></item>\n\n";
    }    

    fclose($fp);
?>
</channel>
</rss>
