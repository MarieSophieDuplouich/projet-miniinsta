window.addEventListener('DOMContentLoaded', () =>{
    const container = document.getElementById('container-pub');

    // la pub 

    container.classList.add('show');

    //  disparaît au bout de 3 secondes (millisecondes dans le code) show dans css
    setTimeout(() => {
        container.classList.remove('show');
        const container = document.getElementById('container-pubdoor');
    container.classList.add('show');
    }, 3000);
});


// <!DOCTYPE html>
// <html>
// <body>

// <h1>The Window Object</h1>
// <h2>The setTimeout() and clearTimeout() Methods</h2>

// <p>Click "Stop" to prevent myGreeting() to execute. (You have 5 seconds)</p>

// <button onclick="myStopFunction()">Stop!</button>

// <h2 id="demo"></h2>

// <script>
// const myTimeout = setTimeout(myGreeting, 5000);

// function myGreeting() {
//   document.getElementById("demo").innerHTML = "Happy Birthday!"
// }

// function myStopFunction() {
//   clearTimeout(myTimeout);
// }
// </script>

// </body>
// </html>
