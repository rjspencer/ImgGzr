<?php
//  ***   ImgGzr    ***
// Collection of functions for website image previewer


// Check if site exists by looking for a 200 header
function url_exists($url) {
    $getHeaders = @get_headers($url);
    if (preg_match("|200|", $getHeaders[0])) {
        // file exists
        return TRUE;
    } else {
        // file doesn't exists
        return FALSE;
    }
}
