<?php


// Include database configuration file
require_once 'config.php';

// Include URL Shortener library file
require_once 'class.URLShortner.php';

// Initialize Shortener class and pass PDO object
$shortener = new URLShortner($db);

// Retrieve short code from URL
$shortCode = $_GET["c"];

try{
    // Get URL by short code
    $url = $shortener->shortCodeToUrl($shortCode);
    
    // Redirect to the original URL
    header("Location: ".$url);
    exit;
}catch(Exception $e){
    // Display error
    echo $e->getMessage();
}


?>