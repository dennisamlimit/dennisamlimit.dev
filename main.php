<!DOCTYPE html>
<html lang="de">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="„Dein Limit ist nur der Anfang von etwas Größerem.“">
    <meta name="theme-color" content="#4F8FFF">


    <meta property="og:type" content="website">
    <meta property="og:title" content="dennisamlimit">
    <meta property="og:description" content="„Dein Limit ist nur der Anfang von etwas Größerem.“">
    <meta property="og:image" content="https://dennisamlimit.dev/assets/media/profile.jpg">
    <meta property="og:image:width" content="250">
    <meta property="og:image:height" content="250">
    <meta property="og:url" content="https://dennisamlimit.dev">

   
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="dennisamlimit">
    <meta name="twitter:description" content="„Dein Limit ist nur der Anfang von etwas Größerem.“">
    <meta name="twitter:image" content="https://dennisamlimit.dev/assets/media/profile.jpg">


    <link rel="icon" href="assets/media/profile.jpg">

    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/tsparticles@2/tsparticles.bundle.min.js"></script>

</head>
<body>
<canvas id="stars"></canvas>

<div id="tsparticles"></div>


<audio id="bgAudio" loop>
    <source src="assets/media/background.mp3" type="audio/mpeg">
</audio>

<div id="overlay">
    <button id="startBtn">Click to Continue ヅ</button>
</div>

<div class="loading-screen" style="display:none;">
    <p id="loading-quote">„Dein Limit ist nur der Anfang von etwas Größerem.“</p>
</div>


<div id="clock" style="display:none;"></div>


<div id="date" style="display:none;"></div>



<div class="card">
    <a href="" target="_blank">
        <img src="assets/media/profile.jpg" alt="Profilbild" class="profile-pic">
    </a>
    <h2 class="username glow">dennisamlimit</h2>
    <p id="quote-placeholder" class="quote glitch glow" data-text="„Dein Limit ist nur der Anfang von etwas Größerem.“">
        „Dein Limit ist nur der Anfang von etwas Größerem.“
    </p>
    <div class="socials">
        <a href="https://discord.com/users/295554123070439436" target="_blank">
            <i class="fa-brands fa-discord"></i> interessenverlust
        </a>
        <a href="https://github.com/dennisamlimit" target="_blank">
            <i class="fa-brands fa-github"></i> dennisamlimit
        </a>
    </div>
</div>


<div id="viewCounter">
    <i class="fa-solid fa-eye"></i> 
    <span id="count">
        <?php
            $file = 'counter.txt';
            if (!file_exists($file)) file_put_contents($file, '0');
            $count = (int)file_get_contents($file) + 1;
            file_put_contents($file, $count);
            echo $count;
        ?>
    </span>
</div>


<button id="muteBtn"><i class="fa-solid fa-volume-high"></i></button>

<script src="assets/js/script.js"></script>
<script src="assets/js/stars.js"></script>
<script src="assets/js/title.js"></script>
</body>
</html>