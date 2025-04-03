<?php
// media.php

$requestUri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
$filename = basename($requestUri);

$filepath = __DIR__ . '/media/' . $filename;

if (empty($filename) || !file_exists($filepath)) {
    header('Location: https://dennisamlimit.dev');
    exit;
}

$mimeType = mime_content_type($filepath);
$fileLink = "/media/" . urlencode($filename);
$uploadDate = date("d.m.Y H:i", filemtime($filepath));

$textFileExtensions = ['txt', 'js', 'css', 'html', 'php', 'json', 'md'];
$fileExtension = pathinfo($filename, PATHINFO_EXTENSION);
$isTextFile = in_array(strtolower($fileExtension), $textFileExtensions);
$textContent = $isTextFile ? htmlspecialchars(file_get_contents($filepath)) : '';

$isAudio = strpos($mimeType, 'audio') === 0;
$isVideo = strpos($mimeType, 'video') === 0;
$isImage = strpos($mimeType, 'image') === 0;
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#4F8FFF">

    <title><?php echo htmlspecialchars($filename); ?> | dennisamlimit.dev</title>

    <meta property="og:title" content="dennisamlimit.dev - Media">
    <meta property="og:description" content="Upload: <?php echo $uploadDate; ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://dennisamlimit.dev/<?php echo urlencode($filename); ?>">
    <meta property="og:image" content="https://dennisamlimit.dev/media/<?php echo urlencode($filename); ?>">

    <link rel="stylesheet" href="style.css">
    <style>
        body, html {
            height: 100vh;
            margin: 0;
            background: #000;
            color: #fff;
            font-family: 'Montserrat', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            overflow: hidden;
        }

        .media-container {
            text-align: center;
            background: rgba(0,0,0,0.9);
            padding: 15px;
            border-radius: 15px;
        }

        img, video, audio {
            max-width: 80vw;
            max-height: 60vh;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(79,143,255,0.5);
            transition: transform 0.3s ease;
        }

        img:hover, video:hover {
            transform: scale(1.02);
        }

        audio {
            width: 80%;
            height: 40px;
        }

        .details {
            margin-top: 10px;
            opacity: 0.9;
        }

        .download-btn {
            display: inline-block;
            color: #fff;
            text-decoration: none;
            margin-top: 10px;
            background: #2E5090;
            padding: 8px 15px;
            border-radius: 5px;
            transition: background 0.3s ease;
        }

        .download-btn:hover {
            background: #4F8FFF;
        }

        pre {
            max-width: 80vw;
            max-height: 60vh;
            overflow: auto;
            background: rgba(255,255,255,0.1);
            border-radius: 10px;
            padding: 15px;
            text-align: left;
            white-space: pre-wrap;
            word-wrap: break-word;
            box-shadow: 0 0 15px rgba(79,143,255,0.3);
        }
    </style>
</head>
<body>

<div class="media-container">
    <?php if ($isVideo): ?>
        <video controls>
            <source src="/media/<?php echo htmlspecialchars($filename); ?>" type="<?php echo $mimeType; ?>">
            Dein Browser unterstützt das Video nicht.
        </video>
    <?php elseif ($isImage): ?>
        <img src="/media/<?php echo htmlspecialchars($filename); ?>" alt="<?php echo htmlspecialchars($filename); ?>">
    <?php elseif ($isAudio): ?>
        <audio controls>
            <source src="/media/<?php echo htmlspecialchars($filename); ?>" type="<?php echo $mimeType; ?>">
            Dein Browser unterstützt das Audioformat nicht.
        </audio>
    <?php elseif ($isTextFile): ?>
        <pre><?php echo $textContent; ?></pre>
    <?php else: ?>
        <p>Diese Datei kann nicht angezeigt werden.</p>
    <?php endif; ?>

    <div class="details">
        <p><strong>File:</strong> <?php echo htmlspecialchars($filename); ?></p>
        <p><strong>Upload:</strong> <?php echo $uploadDate; ?></p>
        <a href="/media/<?php echo htmlspecialchars($filename); ?>" download class="download-btn">Download</a>
    </div>
</div>

</body>
</html>