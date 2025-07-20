window.addEventListener('DOMContentLoaded', () =>{
    const container = document.getElementById('container-jumpscare');

    // le fantôme apparaît

    container.classList.add('show');

    // il disparaît au bout de 3 secondes (millisecondes dans le code)
    setTimeout(() => {
        container.classList.remove('show');

    }, 3000);
});