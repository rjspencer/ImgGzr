<?php
// ***   ImgGzr   ***
//
// artpreview.php
// Open sites list
// loop thru sites
// scrape images
// resize images
// send to browser
//
?>
<!-- Student blog image preview and links -->
<div class="well"><center><b><?=ucwords($desc);?></b></center></div>
<div class="container">
<?php
////////////////
// SETTINGS
////////////////

// Number of images to display per site
$imgPerSite = 8;

// Image thumbnail height
$imgThumbHeight = 150;

////////////////

require_once('scripts/simple_html_dom.php');
require_once('scripts/url_to_absolute.php');


// Get sites list
$file = fopen($page . '.csv', 'r');

// Loop - Scrape images, resize, display
while (($students = fgetcsv($file)) !== FALSE) { 
    $name = ucwords(trim($students[1]));
    $url = trim($students[2]);
    
	// add 'http://' if missing
	if(substr($url, 0, 7) !== 'http://' && $url !== ''){
        $url = 'http://' . $url;
    }
        
    // Image html container variable, reset to NULL in loop
    $imgDisplay = '';
        
    // Fill image container with images or proper error message
    if( $url == '' )
        $imgDisplay = 'ERROR - Missing Site Address';
    elseif( url_exists($url) == FALSE) 
        $imgDisplay = 'ERROR - Invalid Site Address';
    else {
        // URL is valid, time to get images
        $html = file_get_html($url);
        $images = array();
        
        foreach($html->find('img') as $element) {
            $images[$element->src] = true;
        }
        
        $i=0;
        foreach($images as $url => $void) {
            $imgDisplay .= '<img class="preview" src="' . $url . '" />';
            if($i == $imgPerSite)
                  break;
            $i++;
        }
        
    ?>
          <!-- Student Blog Preview -->
          <div class="row">
            <div class="col-md-12">
              <p><h2><?=$name;?></h2> <a class="btn btn-default" href="<?=$url;?>" target="_blank" role="button">View Site &raquo;</a></p>
              <?php echo $imgDisplay; ?>
        </div>
      </div>
      <hr>
<?php
	}
}
?>