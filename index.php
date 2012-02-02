<?php 
    include_once('header.inc.php');
    include_once('config.inc.php');

?>
  <body>

    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">

            <span class="i-bar"></span>
            <span class="i-bar"></span>
            <span class="i-bar"></span>
          </a>
          <a class="brand" href="#"><img src="iiit_logo.png" />IIIT Blogroll</a>
          <div class="nav-collapse">
            <ul class="nav">
                <li class="active"><a href="index.php">Home</a></li>
                <li><a href="add.php">Add</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="rss.php">Feed</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container">
    <div class="span12">

    <table class="table table-striped">
        <thead>
          <tr>
            <th style="width: 30%"><h3>Blog Name</h3></th>
            <th style="width: 70%"><h3>Latest post</h3></th>
          </tr>
        </thead>
        <?php
            $fp = fopen($csv_file, "r");
            if (isset($_GET['count']))
                $count = intval($_GET['count']);
            else
                $count = 10;
            $i = 0;
            while ($i < $count && $data = fgetcsv($fp))
            {
        ?>
        <tr>
            <td>
            <?php
                    list($pubDate, $title, $link, $desc, $blog_name, $blog_url, $author, $email, $batch, $blog_desc)
                        = $data;
                    echo "<a href='$blog_url'><h4>$blog_name</h4></a><br />by <a href='mailto:$email'>$author</a> ($batch)<br />$blog_desc";
                    $i = $i + 1;
            ?>
            </td>
            <td>
                    <?php echo "<a href='$link'><h4>$title</h4></a><br />$desc"; ?>
            </td>
        </tr>
        <?php
            }    
        ?>

        <?php
            fclose($fp);
        ?>
    </table>
        
    </div>
    </div> <!-- /container -->

  </body>
</html>
