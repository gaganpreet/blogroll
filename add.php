<?php include_once('header.inc.php') ?>
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
                <li><a href="index.php">Home</a></li>
                <li class="active"><a href="add.php">Add</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="rss.php">Feed</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container">
    <div class="span12">
        <h3>Add your blog</h3>
        <?php
            if ($_GET['error_message'])
                echo ('<div class="alert alert-error">' . $_GET['error_message'] . '</div>');
        ?>
        <br />
        <form action="takeadd.php" method="post" accept-charset="utf-8" class="form-horizontal">
            <fieldset>
                <div class="control-group">
                    <label for="blog_name">Blog Name:</label>
                    <div class="controls"><input class="input"name="blog_name" id="blog_name" value="<?php echo $_GET['blog_name']; ?>"></div>
                </div>

                <div class="control-group">
                    <label for="blog_url">Blog URL:</label>
                    <div class="controls"><input class="input"name="blog_url" id="blog_url" value="<?php echo $_GET['blog_url']; ?>"></div>
                </div>

                <div class="control-group">
                    <label for="feed_url">Feed URL:</label>
                    <div class="controls"><input class="input"name="feed_url" id="feed_url" value="<?php echo $_GET['feed_url']; ?>">
                        <span class="help-block inline">Make sure it's right!</span>
                    </div>
                </div>

                <div class="control-group">
                    <label for="author">Author:</label>
                    <div class="controls"><input class="input"name="author" id="author" value="<?php echo $_GET['author']; ?>"></div>
                </div>

                <div class="control-group">
                    <label for="email">E-Mail:</label>
                    <div class="controls"><input class="input"name="email" id="email" value="<?php echo $_GET['email']; ?>">
                        <span class="help-block inline">Non IIIT email blogs will be removed</span>
                    </div>
                </div>

                <div class="control-group">
                    <label for="batch">Batch:</label>
                    <div class="controls"><input class="input"name="batch" id="batch" value="<?php echo $_GET['batch']; ?>">
                        <span class="help-block inline">eg: BTech-2k6, MTech-2k7</span>
                    </div>
                </div>

                <div class="control-group">
                    <label for="desc">Description:</label>
                    <div class="controls"><input class="input"name="desc" id="desc" value="<?php echo $_GET['desc']; ?>"></div>
                </div>
                <div class="control-group">
                    <label for="captcha">Verify:</label>
                    <div class="controls">
                            <?php
                                  require_once('lib/recaptchalib.php');
                                    $publickey = "6LfRKM0SAAAAADLEwnXz1NnQNl9oX3QdRHndOLS6";
                                  echo recaptcha_get_html($publickey);
                            ?>
                </div>

                <div class="form-actions">
                    <input type="submit" class="btn btn-primary" value="Add to Blogroll">
                </div>
    </div>


    </div> <!-- /container -->

  </body>
</html>
