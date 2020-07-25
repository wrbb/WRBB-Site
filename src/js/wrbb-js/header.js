let isMobile = window.matchMedia("only screen and (max-width: 992px)").matches;

jQuery(".nav-item").on({
    mouseenter: function () {
        let dropdown_id = this.id;
        jQuery(".dropdown-toggle#" + dropdown_id).toggleClass("selected");
        jQuery(".nav-item#" + dropdown_id).css("background-color", "#d30f0f");
        jQuery(".dropdown-content#" + dropdown_id).css("display", "inherit");
        if (isMobile)
            setTimeout(() => { jQuery(".dropdown-toggle").css("pointer-events", "auto"); }, 100);
    },
    mouseleave: function () {
        let dropdown_id = this.id;
        jQuery(".dropdown-toggle#" + dropdown_id).toggleClass("selected");
        jQuery(".nav-item#" + dropdown_id).css("background-color", "transparent");
        jQuery(".dropdown-content#" + dropdown_id).css("display", "none");
        if (isMobile)  jQuery(".dropdown-toggle").css("pointer-events", "none");
    }
});
