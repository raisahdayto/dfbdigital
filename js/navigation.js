document.addEventListener('DOMContentLoaded', function () {
    const sections = document.querySelectorAll('section');
    const navLinks = document.querySelectorAll('.nav-link');
    const navbar = document.getElementById('navbar');
    const offset = 80;

    function changeLinkState() {
        let index = sections.length;

        while (--index && window.scrollY < sections[index].offsetTop - offset) { }

        navLinks.forEach((link) => link.classList.remove('active'));
        if (index >= 0) navLinks[index].classList.add('active');
    }

    window.addEventListener('scroll', function () {
        if (window.scrollY > offset) {
            navbar.classList.remove('transparent');
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
            navbar.classList.add('transparent');
        }

        changeLinkState();
    });

    navLinks.forEach((link) => {
        link.addEventListener('click', function (e) {
            e.preventDefault();
            const targetId = link.getAttribute('href');
            const targetSection = document.querySelector(targetId);

            navLinks.forEach(l => l.classList.remove('active'));
            link.classList.add('active');

            window.scrollTo({
                top: targetSection.offsetTop - offset,
                behavior: 'smooth'
            });
        });
    });
});