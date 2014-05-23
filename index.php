<!DOCTYPE html>
<html lang="en">
<?php
// ***   ImgGzr   ***
// Display images from a variety of sites
//
// Read a file with a collection of sites
// Scrape images from sites
// Shrink images to thumbnails
// Send thumbs and site links to user
//

// Set to default page if no page in in url
if(isset($_GET['page']))
    $page=$_GET['page'];
else
    $page='period1';

include('scripts/functions.php');

?>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

    <title>ImgGzr - HC Arts</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">

  </head>

  <body>
   <!-- Fixed navbar -->
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">HC Graphic Arts</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <!-- 
			<li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li> 
			-->
			<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Course Descriptions<b class="caret"></b></a>
              <ul class="dropdown-menu">
				<li><a href="index.php?page=gdl">Graphic Design & Layout</a></li>
				<li><a href="index.php?page=git">Graphic Imaging Technology</a></li>
			  </ul>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Artwork<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="index.php?page=period1">P1 - GIT1</a></li>
                <li><a href="index.php?page=period3">P3 - GDL1</a></li>
                <li><a href="index.php?page=period4">P4 - GDL2</a></li>
                <li><a href="index.php?page=period5">P5 - GIT2</a></li>
                <li><a href="index.php?page=period6">P6 - GDL2</a></li>
				<li class="divider"></li>
				<li><a href="http://learngdl.blogspot.com" target="_blank">Visit Assignment Blog &raquo;</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>


<?php
switch($page){
	case 'period1':
		$desc = 'Period 1 - Graphic Imaging Technology I';
		include('artpreview.php');
		break;
	case 'period3':
		$desc = 'Period 3 - Graphic Design & Layout I';
		include('artpreview.php');
		break;
	case 'period4':
		$desc = 'Period 4 - Graphic Design & Layout II';
		include('artpreview.php');
		break;
	case 'period5':
		$desc = 'Period 5 - Graphic Imaging Technology II';
		include('artpreview.php');
		break;
	case 'period6':
		$desc = 'Period 6 - Graphic Design & Layout II';
	case '':
		include('artpreview.php');
		break;
	case 'git':
		include('git.php');
		break;
	case 'gdl':
		include('gdl.php');
		break;
	}
?>
<hr>
      <footer>
        <p>&copy; Ryan Spencer 2014</p>
      </footer>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>