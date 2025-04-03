document.addEventListener("DOMContentLoaded", () => {
    const overlay = document.getElementById('overlay');
    const startBtn = document.getElementById('startBtn');
    const bgAudio = document.getElementById('bgAudio');
    const muteBtn = document.getElementById('muteBtn');
    const muteIcon = muteBtn.querySelector('i');
    const clock = document.getElementById('clock');
    const date = document.getElementById('date');

    const loadingScreen = document.querySelector('.loading-screen');
    const loadingQuote = document.getElementById('loading-quote');
    const mainQuote = document.getElementById('quote-placeholder');

    loadingScreen.style.display = 'none';
    mainQuote.style.opacity = '0';
    clock.style.display = 'none';
    date.style.display = 'none';

    startBtn.addEventListener('click', () => {
        const card = document.querySelector('.card');

        startBtn.style.transition = 'opacity 0.5s ease';
        startBtn.style.opacity = '0';
        startBtn.style.pointerEvents = 'none';

        card.classList.add('fade-out');
        overlay.classList.add('black-screen');

        setTimeout(() => {
            loadingScreen.style.display = 'flex';
            loadingScreen.style.opacity = '1';

            loadingQuote.style.opacity = '0';
            loadingQuote.style.display = 'block';
            loadingQuote.style.animation = 'fadeGlow 3s ease-in-out forwards';

            setTimeout(() => {
                const toRect = mainQuote.getBoundingClientRect();
                const fromRect = loadingQuote.getBoundingClientRect();
            
                const deltaX = toRect.left - fromRect.left;
                const deltaY = toRect.top - fromRect.top;
            
                loadingQuote.style.transition = 'transform 1.5s ease';
                loadingQuote.style.transform = `translate(${deltaX}px, ${deltaY}px)`;
            
                setTimeout(() => {
                    loadingScreen.style.opacity = '0';
            
                    setTimeout(() => {
                        loadingScreen.style.display = 'none';
                        loadingQuote.style.display = 'none';
                        mainQuote.style.opacity = '1';
            
                        overlay.classList.add('fade-out');
                        setTimeout(() => {
                            overlay.style.display = 'none';
                        }, 1500);
                    }, 800);
            
                    bgAudio.play();
                    bgAudio.volume = 0.075;
            
                    clock.style.display = 'block';
                    date.style.display = 'block';
                }, 1600);
            }, 3500);
        }, 500);
    });

    muteBtn.addEventListener('click', () => {
        bgAudio.muted = !bgAudio.muted;
        muteIcon.classList.toggle('fa-volume-high');
        muteIcon.classList.toggle('fa-volume-xmark');
    });

    function updateClockAndDate() {
        const now = new Date();
        clock.textContent = now.toLocaleTimeString([], {hour: '2-digit', minute:'2-digit', second:'2-digit'});
        date.textContent = now.toLocaleDateString('de-DE', {weekday:'long', year:'numeric', month:'long', day:'numeric'});
    }

    setInterval(updateClockAndDate, 1000);
    updateClockAndDate();

    tsParticles.load("tsparticles", {
        fpsLimit: 60,
        fullScreen: { enable: true },
        background: { color: "transparent" },
        particles: {
            number: { value: 40, density: { enable: true, area: 800 } },
            color: { value: ["#4F8FFF", "#4F8FFF"] },
            shape: { type: "circle" },
            opacity: { value: { min: 0.1, max: 0.4 } },
            size: { value: { min: 1, max: 4 } },
            move: { enable: true, speed: 0.8, direction: "top", outMode: "out" },
            links: { enable: false },
        },
        interactivity: {
            events: {
                onHover: { enable: true, mode: "bubble" },
                onClick: { enable: true, mode: "repulse" },
            },
            modes: {
                bubble: { size: 8, distance: 150 },
                repulse: { distance: 100 },
            },
        },
        detectRetina: true,
    });
});
