window.addEventListener('scroll', function() {
    const subNavbar = document.querySelector('.sub-navbar');
    if (window.scrollY > 0) {
        subNavbar.style.backgroundColor = '#fff';
        subNavbar.style.backgroundColor = '#000'; 
    }
});
