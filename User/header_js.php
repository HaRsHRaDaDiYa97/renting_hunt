
    const mobile_nav = document.querySelector(".mobile-navbar-btn");
    const nav_header = document.querySelector(".header");
    const main = document.querySelector(".main");
    const box = document.querySelector(".box");

    const toggleNavbar = () => {
      // alert("Plz Subscribe ");
      nav_header.classList.toggle("active");
      main.classList.toggle("active3");
    };

    mobile_nav.addEventListener("click", () => toggleNavbar());
