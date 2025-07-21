window.addEventListener('DOMContentLoaded', () =>{
    const container = document.getElementById('container-pub');

    // la pub 

    container.classList.add('show');

    //  disparaît au bout de 3 secondes (millisecondes dans le code) show dans css
    setTimeout(() => {
        container.classList.remove('show');
        const container = document.getElementById('container-pubdoor');

    }, 3000);
});