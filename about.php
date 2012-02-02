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
            	<li><a href="index.php">Home</a></li>
            	<li><a href="add.php">Add</a></li>
            	<li class="active"><a href="about.php">About</a></li>
            	<li><a href="rss.php">Feed</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container">
	<div class="span8">

		IIIT Blogroll is an aggregation of all blogs related to IIIT-H built using <a href="http://simplepie.org/">SimplePie</a>, <a href="http://twitter.github.com/bootstrap/index.html">Bootstrap</a>. <br />

		<br />
		Something is missing? <a href="https://github.com/gaganpreet/blogroll">Fork on github</a>, send pull requests or report issues.
		
	</div>
    </div> <!-- /container -->

  </body>
</html>
