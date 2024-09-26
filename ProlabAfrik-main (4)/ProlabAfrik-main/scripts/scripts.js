const sr = ScrollReveal({
    reset: 'true',
});

sr.reveal('.fade-in', { opacity: 0, distance: '50px', duration: '1500'});
sr.reveal('.slide-up', { origin: 'bottom', distance: '50px' });
sr.reveal('.zoom-in', { scale: 0.8 });

function scrollToElement(elementId) {
    const element = document.getElementById(elementId);
    if (element) {
        element.scrollIntoView({
            behavior: 'smooth'
        })
    } else {
        console.error(`Element with id ${elementId} not found.`);
    }
}

function toggleMenu() {
    const nav = document.getElementById('navbar')
    const btn = document.getElementById('hamburger-menu-btn')
    if (nav.classList.contains('hidden')) {
        btn.innerHTML = 'x'
        nav.classList.remove('hidden')
    }
    else {
        btn.innerHTML = '&#9776'
        nav.classList.add('hidden')
    }}

    emailjs.init({
        publicKey: "VsR6SWX0k3EDu7Ajb",
    });
    
    window.onload = function() {
        document.getElementById('form').addEventListener('submit', function(event) {
            event.preventDefault();
            // Ces IDs proviennent des étapes précédentes
            emailjs.sendForm('contact_service', 'contact_form', this)
                .then(() => {
                    alert('Message envoyé avec succès !');
                }, (error) => {
                    console.log('Échec de l\'envoi...', error);
                });
        });
    }
    

