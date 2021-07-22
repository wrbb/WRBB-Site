jQuery(document).ready(() => {
    let isMobile = window.matchMedia("only screen and (max-width: 992px)").matches;

    jQuery(".dropdown-content").hide();
    jQuery(".wrbb-navbar").removeClass("display-none");

    if (isMobile) {
        // Close the header nav when the user clicks outside of it
        jQuery(document).click(function () {
            jQuery(".wrbb-menu").removeClass("nav-open");
            jQuery(".wrbb-navbar").removeClass("nav-open");
        })
        // Don't close the nav when the user clicks inside of it
        jQuery(".wrbb-navbar").click(function (e) {
            e.stopPropagation();
        })
    }
});

jQuery(".nav-item").on({
    mouseenter: function () {
        // Dropdown was opened
        let dropdown_id = this.id;
        jQuery(".nav-item#" + dropdown_id).css("background-color", "#d30f0f");
        jQuery(".dropdown-content#" + dropdown_id).show("fast");
        if (isMobile) {
            // Restore the dropdown title links because they are disabled until the user
            // opens the dropdown on mobile.
            // Wait 100 ms before doing so to prevent interference with the
            // opening of the dropdown.
            setTimeout(() => {
                jQuery(".dropdown-toggle#" + dropdown_id).css("pointer-events", "auto");
            }, 100);
        }
    },
    mouseleave: function () {
        // Dropdown was closed
        let dropdown_id = this.id;
        jQuery(".nav-item#" + dropdown_id).css("background-color", "inherit");
        jQuery(".dropdown-content#" + dropdown_id).hide("fast");
        if (isMobile) {
            jQuery(".dropdown-toggle#" + dropdown_id).css("pointer-events", "none");
        }
    }
});

// On mobile, toggle the header nav with the hamburger button
jQuery(".navbar-toggler").click(function () {
    jQuery(".wrbb-menu").toggleClass("nav-open");
    jQuery(".wrbb-navbar").toggleClass("nav-open");
});
