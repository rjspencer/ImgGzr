<?php
/* THANKS TO:
 * PHP function to resize an image maintaining aspect ratio
 * http://salman-w.blogspot.com/2008/10/resize-images-using-phpgd-library.html
 *
 * Creates a resized (e.g. thumbnail, small, medium, large)
 * version of an image file and saves it as another file
 */

define('THUMBNAIL_IMAGE_MAX_WIDTH', 150);
define('THUMBNAIL_IMAGE_MAX_HEIGHT', 150);

function generate_image_thumbnail($source_image_path, $thumbnail_image_path)
{
    list($source_image_width, $source_image_height, $source_image_type) = getimagesize($source_image_path);
    switch ($source_image_type) {
        case IMAGETYPE_GIF:
            $source_gd_image = imagecreatefromgif($source_image_path);
            break;
        case IMAGETYPE_JPEG:
            $source_gd_image = imagecreatefromjpeg($source_image_path);
            break;
        case IMAGETYPE_PNG:
            $source_gd_image = imagecreatefrompng($source_image_path);
            break;
    }
    if ($source_gd_image === false) {
        return false;
    }
    $source_aspect_ratio = $source_image_width / $source_image_height;
    $thumbnail_aspect_ratio = THUMBNAIL_IMAGE_MAX_WIDTH / THUMBNAIL_IMAGE_MAX_HEIGHT;
    if ($source_image_width <= THUMBNAIL_IMAGE_MAX_WIDTH && $source_image_height <= THUMBNAIL_IMAGE_MAX_HEIGHT) {
        $thumbnail_image_width = $source_image_width;
        $thumbnail_image_height = $source_image_height;
    } elseif ($thumbnail_aspect_ratio > $source_aspect_ratio) {
        $thumbnail_image_width = (int) (THUMBNAIL_IMAGE_MAX_HEIGHT * $source_aspect_ratio);
        $thumbnail_image_height = THUMBNAIL_IMAGE_MAX_HEIGHT;
    } else {
        $thumbnail_image_width = THUMBNAIL_IMAGE_MAX_WIDTH;
        $thumbnail_image_height = (int) (THUMBNAIL_IMAGE_MAX_WIDTH / $source_aspect_ratio);
    }
    $thumbnail_gd_image = imagecreatetruecolor($thumbnail_image_width, $thumbnail_image_height);
    imagecopyresampled($thumbnail_gd_image, $source_gd_image, 0, 0, 0, 0, $thumbnail_image_width, $thumbnail_image_height, $source_image_width, $source_image_height);
    imagejpeg($thumbnail_gd_image, $thumbnail_image_path, 90);
    imagedestroy($source_gd_image);
    imagedestroy($thumbnail_gd_image);
    return true;
}
?>

<?php
//  ***   ImgGzr   ***
//
// Image Thumbnail Manager
// 
// Check if thumbnail already exists
// Create if thumbnail does not exist
// Recreate if thumbnail is less than X days old
//
// MAINTENANCE
// Periodically clear out old thumbnails 
// Use file containing date stamp of last thumb clearing operation
// If more than Y days, clean house
// Delete all thumbs over Z days old
//

function clearOldFiles($date, $dir)  {
    // if file creation date is older than $date, delete it
    $directory = opendir($dir);
    while( $file = readdir($directory))  {
        if( $filemtime($file) <= $date )
            unset('/img/thumbs' . $file);
    }
    closedir($directory);
}


// Resizer function
require_once('scripts/thumb_generator.php');

//VARIABLES
$runMaintenance = FALSE;
$lifeMaintenance = 604800;  //604,800 secs = 1 Week,  86,400 secs = 1 Day

// Check last update of maintenance file, set run variable if needed
$fileLastMaintenance = lastMaintenance.txt;
if ( time() - $filemtime('lastMaintenance.txt') >= $lifeMaintenance )) {
    $runMaintenance = TRUE; // call clearOldThumbs at end of page load
    


if ( date('Y-m-d')
    
if (!file_exists($cache_file) or (time() - filemtime($cache_file) >= $cache_life)){
    ob_start();
    resource_consuming_function();
    file_put_contents($cache_file,ob_get_flush());
}else{
    readfile($cache_file);
}



