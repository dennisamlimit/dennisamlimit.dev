const fullTitle = "dennisamlimit.dev";
let currentLength = fullTitle.length;
let shrinking = true;

function animateTitle() {
    if (shrinking) {
        document.title = fullTitle.substring(0, currentLength);
        currentLength--;
        if (currentLength <= 0) {
            shrinking = false;
            currentLength = 0;
        }
    } else {
        document.title = fullTitle.substring(0, currentLength);
        currentLength++;
        if (currentLength >= fullTitle.length) {
            shrinking = true;
            currentLength = fullTitle.length;
        }
    }
}

setInterval(animateTitle, 300);
