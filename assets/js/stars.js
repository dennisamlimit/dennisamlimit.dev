const canvas = document.getElementById('stars');
const ctx = canvas.getContext('2d');

let stars = [];
let shootingStars = [];

function initCanvas() {
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;

    stars = [];
    for (let i = 0; i < canvas.width * 0.2; i++) { 
        stars.push({
            x: Math.random() * canvas.width,
            y: Math.random() * canvas.height,
            radius: Math.random() * 1.5,
            alpha: Math.random()
        });
    }
}

function drawStars() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);

    stars.forEach(star => {
        ctx.beginPath();
        ctx.arc(star.x, star.y, star.radius, 0, Math.PI * 2);
        ctx.fillStyle = `rgba(255, 255, 255, ${star.alpha})`;
        ctx.fill();
    });

    shootingStars.forEach((star, idx) => {
        ctx.beginPath();
        ctx.moveTo(star.x, star.y);
        ctx.lineTo(star.x - star.len, star.y + star.len);
        ctx.strokeStyle = `rgba(255,255,255,${star.alpha})`;
        ctx.lineWidth = 2;
        ctx.stroke();

        star.x -= star.speed;
        star.y += star.speed;
        star.alpha -= 0.02;

        if (star.alpha <= 0) shootingStars.splice(idx, 1);
    });
}

function animate() {
    drawStars();
    requestAnimationFrame(animate);
}

function createShootingStar() {
    shootingStars.push({
        x: Math.random() * canvas.width,
        y: 0,
        len: Math.random() * (canvas.width * 0.05) + 50,
        speed: Math.random() * 10 + 6,
        alpha: 1
    });
}

window.addEventListener('resize', initCanvas);

setInterval(createShootingStar, 2500);
initCanvas();
animate();


