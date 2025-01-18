const toggleButton = document.getElementsByClassName("toggle-button1")[0];
const navbarLinks = document.getElementsByClassName("navbar-links1")[0];

toggleButton.addEventListener("click", () => {
    navbarLinks.classList.toggle("active");
});
