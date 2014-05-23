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
////////////////
// SETTINGS
////////////////
header('Access-Control-Allow-Origin: *');

$url = $_GET['_url']; //Site to scrape
// Number of images to display per site
$imgPerSite = 8;

// Image thumbnail height
$imgThumbHeight = 150;

////////////////

require_once('scripts/simple_html_dom.php');
require_once('scripts/url_to_absolute.php');
    
// add 'http://' if missing
if(substr($url, 0, 7) !== 'http://' && $url !== ''){
    $url = 'http://' . $url;
}
    
// Image html container variable, reset to NULL in loop
$imgDisplay = '';
    
// Fill image container with images or proper error message
if( $url == '' )
    $imgDisplay = 'ERROR - Missing Site Address';
//elseif( url_exists($url) == FALSE) 
    //$imgDisplay = 'ERROR - Invalid Site Address';
else {
    // URL is valid, time to get images
    $html = file_get_html($url);
    $images = array();
    
    foreach($html->find('img') as $element) {
        $images[$element->src] = true;
    }
    
    $i=0;
    foreach($images as $url => $void) {
        $imgDisplay .= '<img class="gallery_img" id="gallery_img_' . $i . '" src="' . $url . '" />';
        if($i == $imgPerSite)
              break;
        $i++;
    }
        
    ?>
          <!-- Student Blog Preview -->
        <a class="btn btn-default" href="<?=$url;?>" target="_blank" role="button">View Site &raquo;</a>
        <?php echo $imgDisplay; ?>
      <hr>
<?php
}
?>