function toggleSidebar() {
    let sidebar = document.querySelector(".sidebar");
    let toggleBtn = document.getElementById("toggleBtn");
    let userBar = document.querySelector(".user-bar");
    let content = document.getElementById("content");

    sidebar.classList.toggle("collapsed");
    userBar.classList.toggle("collapsed");
    content.classList.toggle("collapsed");

    // Alternar ícone do botão
    toggleBtn.innerHTML = sidebar.classList.contains("collapsed")
        ? '<i class="fas fa-chevron-right"></i>'
        : '<i class="fas fa-bars"></i>';
}

function toggleGestao() {
    let gestaoMenu = document.getElementById("gestaoMenu");
    let gestaoIcon = document.getElementById("gestaoIcon");

    if (gestaoMenu.classList.contains("show")) {
        gestaoMenu.classList.remove("show");
        gestaoIcon.classList.remove("fa-chevron-up");
        gestaoIcon.classList.add("fa-chevron-down");
    } else {
        gestaoMenu.classList.add("show");
        gestaoIcon.classList.remove("fa-chevron-down");
        gestaoIcon.classList.add("fa-chevron-up");
    }
}
