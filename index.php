<?php
// Include database configuration file
require_once 'config.php';

// Include URL Shortener library file
require_once 'class.URLShortner.php';

// Initialize Shortener class and pass PDO object
$shortener = new URLShortner($db);

// Long URL
$longURL = 'https://dev.to/vtrpldn/write-fewer-media-queries-with-the-clamp-css-function-2cl7';

// Prefix of the short URL 
$shortURL_Prefix = 'https://YOUR_PREFIX_URL.com/'; // with URL rewrite
$shortURL_Prefix = 'https://YUR_PREFIX_URL.com/?c='; // without URL rewrite

try{
    // Get short code of the URL
    $shortCode = $shortener->urlToShortCode($longURL);
    
    // Create short URL
    $shortURL = $shortURL_Prefix.$shortCode;
    
    // Display short URL
    echo 'Short URL: '.$shortURL;
}catch(Exception $e){
    // Display error
    echo $e->getMessage();
}
?>