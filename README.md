# 🌌 dennisamlimit.dev

A minimal, interactive intro/start page designed to create an atmospheric entry point to digital presence.

> _"Dein Limit ist nur der Anfang von etwas Größerem."_

---

## Features

- **Animated Star Background** with shooting stars
- **Background Music** with mute/unmute control
- **Live Clock and Date Display**
- **Quote Transition Animation**
- **Smooth Intro with Start Button and Overlay**
- **(Simple) View Counter**
- **Glowing text effects and interactive elements**
- **Dynamic Page Title Animation**

---

## How It Works

- When the page loads, a full-screen **overlay** with a start button appears.
- On clicking **Start**, a loading animation plays and the quote transitions into view.
- Background **music** starts playing (low volume), stars animate in the background.
- **Time and date** appear in fixed positions.
- The title in the browser tab animates continuously.

---

## Project Structure (Main Files)

- `index.php / main.php` – Main entry point with HTML structure
- `styles.css` – Styling with blur, glow, layout, and animations
- `script.js` – Core logic for transitions, audio, timing, view counter
- `stars.js` – Canvas-based starfield animation
- `title.js` – Animating browser tab title
- `media.php` – Optional media viewer (not required to run intro) 
- `.htaccess` – URL rewriting for clean access and fallback handling

.htaccess Content
```
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.+)$ index.php [L,QSA]
```

---

## Getting Started

### Requirements
- Any web server (Apache recommended for `.htaccess` routing)
- PHP 7+ (for `index.php`)

### Installation
1. Clone this repo or download the files.
2. Place them in your server directory.
3. Ensure `favicon.ico`, `profile.jpg`, and `audio file` are in the correct paths (won't include them).
4. Open `index.php` in a browser.

---


## 📄 License

MIT License. Free to use, modify, and distribute.

---

