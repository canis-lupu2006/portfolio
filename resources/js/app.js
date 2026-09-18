const toggle = document.querySelector('[data-nav-toggle]');
const menu = document.querySelector('#mobile-nav');
const header = document.querySelector('[data-header]');

if (toggle && menu) {
    toggle.addEventListener('click', () => {
        const open = menu.classList.toggle('hidden') === false;
        toggle.setAttribute('aria-expanded', String(open));
    });
}

if (header) {
    const onScroll = () => header.classList.toggle('is-scrolled', window.scrollY > 12);
    onScroll();
    window.addEventListener('scroll', onScroll, { passive: true });
}

const themeKey = 'mk-theme';
const themeButtons = document.querySelectorAll('[data-theme-toggle]');

const applyTheme = (theme) => {
    document.documentElement.dataset.theme = theme;
    try {
        localStorage.setItem(themeKey, theme);
    } catch (error) {}
    const meta = document.querySelector('meta[name="theme-color"]');
    if (meta) {
        meta.setAttribute('content', theme === 'light' ? '#f4ebe1' : '#0e0d0b');
    }
    themeButtons.forEach((button) => {
        button.setAttribute('aria-label', theme === 'dark' ? 'Activer le mode clair' : 'Activer le mode sombre');
    });
};

themeButtons.forEach((button) => {
    button.addEventListener('click', () => {
        applyTheme(document.documentElement.dataset.theme === 'light' ? 'dark' : 'light');
    });
});

applyTheme(document.documentElement.dataset.theme === 'light' ? 'light' : 'dark');


const reveals = document.querySelectorAll('[data-reveal]');

if (reveals.length && 'IntersectionObserver' in window) {
    const io = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-in');
                    io.unobserve(entry.target);
                }
            });
        },
        { threshold: 0.01, rootMargin: '0px 0px 15% 0px' },
    );

    reveals.forEach((el, index) => {
        el.style.transitionDelay = `${Math.min(index % 6, 5) * 70}ms`;
        io.observe(el);
    });
} else {
    reveals.forEach((el) => el.classList.add('is-in'));
}

const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

if (!reduceMotion) {
    const root = document.documentElement;

    window.addEventListener(
        'pointermove',
        (event) => {
            root.style.setProperty('--mx', `${event.clientX}px`);
            root.style.setProperty('--my', `${event.clientY}px`);
        },
        { passive: true },
    );

    document.querySelectorAll('[data-tilt]').forEach((card) => {
        card.addEventListener('pointermove', (event) => {
            const rect = card.getBoundingClientRect();
            const x = (event.clientX - rect.left) / rect.width;
            const y = (event.clientY - rect.top) / rect.height;
            card.style.transform = `perspective(900px) rotateX(${(0.5 - y) * 6}deg) rotateY(${(x - 0.5) * 8}deg) translateY(-4px)`;
        });

        card.addEventListener('pointerleave', () => {
            card.style.transform = '';
        });
    });

    document.querySelectorAll('[data-magnetic]').forEach((btn) => {
        btn.addEventListener('pointermove', (event) => {
            const rect = btn.getBoundingClientRect();
            const x = event.clientX - rect.left - rect.width / 2;
            const y = event.clientY - rect.top - rect.height / 2;
            btn.style.transform = `translate(${x * 0.18}px, ${y * 0.22}px)`;
        });

        btn.addEventListener('pointerleave', () => {
            btn.style.transform = '';
        });
    });

    document.querySelectorAll('[data-count]').forEach((el) => {
        const target = Number(el.getAttribute('data-count'));
        if (Number.isNaN(target)) {
            return;
        }

        const play = () => {
            const start = performance.now();
            const duration = 900;

            const tick = (now) => {
                const progress = Math.min((now - start) / duration, 1);
                const eased = 1 - (1 - progress) ** 3;
                el.textContent = String(Math.round(target * eased));
                if (progress < 1) {
                    requestAnimationFrame(tick);
                }
            };

            requestAnimationFrame(tick);
        };

        if ('IntersectionObserver' in window) {
            const io = new IntersectionObserver((entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        play();
                        io.unobserve(el);
                    }
                });
            });
            io.observe(el);
        } else {
            play();
        }
    });
} else {
    document.querySelectorAll('[data-count]').forEach((el) => {
        el.textContent = el.getAttribute('data-count');
    });
}

const board = document.querySelector('[data-work-board]');

if (board) {
    const rows = board.querySelectorAll('[data-preview]');
    const items = board.querySelectorAll('[data-preview-item]');

    const activate = (slug) => {
        rows.forEach((row) => row.classList.toggle('is-active', row.dataset.preview === slug));
        items.forEach((item) => item.classList.toggle('is-active', item.dataset.previewItem === slug));
    };

    rows.forEach((row) => {
        row.addEventListener('pointerenter', () => activate(row.dataset.preview));
        row.addEventListener('focus', () => activate(row.dataset.preview));
    });
}

const marquee = document.querySelector('.marquee-wrap');

if (marquee) {
    marquee.addEventListener('pointerenter', () => {
        const track = marquee.querySelector('.marquee');
        if (track) {
            track.style.animationPlayState = 'paused';
        }
    });
    marquee.addEventListener('pointerleave', () => {
        const track = marquee.querySelector('.marquee');
        if (track) {
            track.style.animationPlayState = 'running';
        }
    });
}
