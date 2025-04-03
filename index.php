<?php
$mediaDir = __DIR__ . '/media/';

$requestUri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
$filename = basename($requestUri);


if (!empty($filename) && file_exists($mediaDir . $filename)) {

    $_GET['file'] = $filename; 
    include 'media.php';
} else {

    include 'main.php';
}
?>
