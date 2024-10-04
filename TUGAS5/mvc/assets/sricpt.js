// Smooth Scrolling for Internal Links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
        e.preventDefault();

        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});

// Button Click Effect - Adding a ripple effect to buttons
const buttons = document.querySelectorAll('.button');

buttons.forEach(button => {
    button.addEventListener('click', function(e) {
        let x = e.clientX - e.target.offsetLeft;
        let y = e.clientY - e.target.offsetTop;

        let ripple = document.createElement('span');
        ripple.style.left = `${x}px`;
        ripple.style.top = `${y}px`;
        this.appendChild(ripple);

        setTimeout(() => {
            ripple.remove();
        }, 600);
    });
});

// Dark Mode Toggle
const darkModeToggle = document.createElement('button');
darkModeToggle.innerHTML = "Toggle Dark Mode";
darkModeToggle.classList.add('button');
darkModeToggle.style.position = 'fixed';
darkModeToggle.style.bottom = '20px';
darkModeToggle.style.right = '20px';
darkModeToggle.style.zIndex = '1000';
document.body.appendChild(darkModeToggle);

darkModeToggle.addEventListener('click', () => {
    document.body.classList.toggle('dark-mode');

    const isDarkMode = document.body.classList.contains('dark-mode');
    if (isDarkMode) {
        darkModeToggle.innerHTML = "Light Mode";
    } else {
        darkModeToggle.innerHTML = "Dark Mode";
    }
});

// CSS for Dark Mode (this would be added in your style.css)
const darkModeCSS = document.createElement('style');
darkModeCSS.innerHTML = `
    body.dark-mode {
        background-color: #333;
        color: #f4f4f4;
        transition: all 0.5s ease;
    }

    body.dark-mode .main-content {
        background-color: #444;
        box-shadow: none;
    }

    body.dark-mode .header, body.dark-mode .footer {
        background-color: #111;
    }

    body.dark-mode a {
        color: #e74c3c;
    }

    body.dark-mode a:hover {
        color: #c0392b;
    }

    body.dark-mode .button {
        background-color: #e74c3c;
    }

    body.dark-mode .button:hover {
        background-color: #c0392b;
    }
`;
document.head.appendChild(darkModeCSS);
