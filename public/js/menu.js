// Menu hamburguesa
const toggleMenu = () => {
    const navigation = document.querySelector(".navigation");
    const burgerMenu = document.querySelector(".menu-icon");
    const src = burgerMenu.getAttribute("src");

    const isBurger = src === "images/menu/burger-menu.svg";

    const iconName = isBurger
        ? "images/menu/close.svg"
        : "images/menu/burger-menu.svg";

    burgerMenu.setAttribute("src", iconName);

    if (isBurger) {
        navigation.classList.add("navigation--mobile");
        navigation.classList.remove("navigation--mobile--fadeout");
    } else {
        navigation.classList.add("navigation--mobile--fadeout");
        setTimeout(() => {
            navigation.classList.remove("navigation--mobile");
        }, 300); // Match the duration of the fadeout animation
    }
};
