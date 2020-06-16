jQuery(document).ready(() => {
    jQuery(".single-dropdown").on({
        mouseenter: function() {
            let dropdown_id = this.id;
            jQuery(".down-arrow#" + dropdown_id).attr('src', php_vars.url + '/src/img/down-arrow-white.svg');
            jQuery(".single-dropdown#" + dropdown_id).css("background-color", "#ff0000");
            jQuery(".dropdown-content#" + dropdown_id).css("display", "inherit");
        },
        mouseleave: function() {
            let dropdown_id = this.id;
            jQuery(".down-arrow#" + dropdown_id).attr('src', php_vars.url + '/src/img/down-arrow-red.svg');
            jQuery(".single-dropdown#" + dropdown_id).css("background-color", "transparent");
            jQuery(".dropdown-content#" + dropdown_id).css("display", "none");
        }
    });
});