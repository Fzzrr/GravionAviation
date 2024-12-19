
console.log('Welcome to GRAVION!');

document.querySelector('a[href="about.html"]').addEventListener("click", function (event) {
    event.preventDefault();
    window.location.href = "about.html";
});
