const el = document.getElementById("wrapper");
const toggleButton = document.getElementById("menu-toggle");

toggleButton.onclick = function () {
    el.classList.toggle("toggled");
};

const links = document.querySelectorAll(".nav-item>.link");
links.forEach(link => {
    link.addEventListener("click", function () {
        links.forEach(link => link.classList.remove("active"));
        this.classList.add("active");
    });
});