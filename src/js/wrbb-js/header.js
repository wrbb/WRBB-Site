let isMobile = window.matchMedia("only screen and (max-width: 992px)").matches;

jQuery(".nav-item").on({
    mouseenter: function () {
        // Open dropdown
        let dropdown_id = this.id;
        jQuery(".dropdown-toggle#" + dropdown_id).toggleClass("selected");
        jQuery(".nav-item#" + dropdown_id).css("background-color", "#d30f0f");
        jQuery(".dropdown-content#" + dropdown_id).css("display", "inherit");
        if (isMobile) {
            // Wait 100 ms before restoring the link to prevent interference with the
            // opening of the dropdown.
            setTimeout(() => {
                jQuery(".dropdown-toggle#" + dropdown_id).css("pointer-events", "auto");
            }, 100);
        }
    },
    mouseleave: function () {
        // Close dropdown
        let dropdown_id = this.id;
        jQuery(".dropdown-toggle#" + dropdown_id).toggleClass("selected");
        jQuery(".nav-item#" + dropdown_id).css("background-color", "transparent");
        // Wait 10 ms before closing the dropdown.
        // This fixes some funny behavior on mobile.
        setTimeout(() => {
            jQuery(".dropdown-content#" + dropdown_id).css("display", "none");
        }, 10);
        if (isMobile) jQuery(".dropdown-toggle#" + dropdown_id).css("pointer-events", "none");
    }
});

// On mobile, toggle the header nav with the hamburger button
jQuery(".navbar-toggler").click(function () {
    jQuery(".wrbb-menu").toggleClass("selected");
    jQuery(".wrbb-navbar").toggleClass("selected");
});

if (isMobile) {
    // Close the header nav when the user clicks outside of it
    jQuery(document).click(function () {
        jQuery(".wrbb-menu").removeClass("selected");
        jQuery(".wrbb-navbar").removeClass("selected");
    })
    // Don't close the nav when the user clicks inside of it
    jQuery(".header").click(function (e) {
        e.stopPropagation();
    })
}
