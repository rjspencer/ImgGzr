<!-- Student blog image preview and links -->
<div class="well"><center><b><?=ucwords($desc);?></b></center></div>
<div class="container">
<?php	
require_once('scripts/simple_html_dom.php');
require_once('scripts/url_to_absolute.php');

$file = fopen($page . '.csv', 'r');
while (($students = fgetcsv($file)) !== FALSE) { 
    $name = ucwords(trim($students[1]));
    $url = trim($students[2]);
    
	
	if(substr($url, 0, 4) !== 'http' && $url !== ''){
        $url = 'http://' . $url;
    }
	
if($url == ''){
?>	 
	 <div class="row">
            <div class="col-md-12">
              <p><h2><?=$name;?></h2>
			  <p>MISSING SITE ADDRESS</p>
			</div>
	</div>
<?php
	}
else {
	$html = file_get_html($url);

    $images = array();
	
    foreach($html->find('img') as $element) {
        $images[$element->src] = true;
    }
?>
          <!-- Student Blog Preview -->
          <div class="row">
            <div class="col-md-12">
              <p><h2><?=$name;?></h2> <a class="btn btn-default" href="<?=$url;?>" target="_blank" role="button">View Site &raquo;</a></p>
<?php
    $i=0;
    foreach($images as $url => $void) {
          echo '<img class="preview" src="' . $url . '" />';
          if($i == 8)
                  break;
          $i++;
    }
?>
        </div>
      </div>
      <hr>
<?php
	}
}
?>